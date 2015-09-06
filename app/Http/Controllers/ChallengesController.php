<?php namespace App\Http\Controllers;

use App\Http\Requests\ChallengeRequest;
use App\Interacpedia\Career;
use App\Interacpedia\Challenge;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interacpedia\ChallengeCategory;
use App\Interacpedia\Course;
use App\Interacpedia\Repositories\ChallengeCategoriesRepositoryInterface;
use App\Interacpedia\Repositories\ChallengeTypesRepositoryInterface;
use App\Interacpedia\Reward;
use App\Interacpedia\Searching;
use App\Interacpedia\Tag;
use App\Interacpedia\University;
use App\Interacpedia\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Spatie\MediaLibrary\Media;

class ChallengesController extends Controller {

    protected $categories;
    protected $cities;
    protected $types;

    public function __construct( ChallengeCategoriesRepositoryInterface $categories,
                                 ChallengeTypesRepositoryInterface $types )
    {
        $this->categories = $categories;
        $this->types = $types;
        $this->cities = [ 'Undefined', 'Bogotá D.C.', 'Medellín', 'Cali' ];
        $this->middleware( 'auth', [ 'only' => [ 'create', 'edit' ] ] );
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $challenges = Challenge::latest()->get();

        return view( 'challenges.index', compact( 'challenges' ) );
    }


    /**
     * Show the form for creating a new challenge.
     *
     * @return Response
     */
    public function create( Authenticatable $user )
    {
        $categories = $this->categories->selectList();
        $types = $this->types->selectList();
        $cities = $this->cities;
        $rewards = Reward::all();
        $searchings = Searching::all();
        $actual_stages = Challenge::getValues( 'actual_stage' );
        $desired_stages = Challenge::getValues( 'desired_stage' );
        $universities = University::lists( 'name', 'id' );
        $careers = Career::lists( 'name', 'id' );;
        $courses = Course::lists( 'name', 'id' );
        $professors = [ ];
        $creators = User::lists( 'name', 'id' );
        $tags = Tag::where( 'type', 'challenge' )->lists( 'name', 'id' );
        $ch_universities = [ ];
        $ch_careers = [ ];
        $ch_courses = [ ];
        $ch_creators = [ $user->id ];

        return view('errors.unavailable');
        return view( 'challenges.create', compact( 'user',
            'cities', 'categories', 'types', 'rewards', 'searchings',
            'actual_stages', 'desired_stages', 'tags', 'universities', 'careers', 'courses', 'professors', 'creators',
            'ch_universities', 'ch_careers', 'ch_courses', 'ch_creators' ) );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Challenge $challenge
     * @param Authenticatable $user
     * @return Response
     * @internal param int $id
     */
    public function edit( Challenge $challenge, Authenticatable $user )
    {
        $categories = $this->categories->selectList();
        $types = $this->types->selectList();
        $cities = $this->cities;
        $rewards = Reward::all();
        $searchings = Searching::all();
        $actual_stages = $challenge->getValues( 'actual_stage' );
        $desired_stages = $challenge->getValues( 'desired_stage' );
        $universities = University::lists( 'name', 'id' );
        $careers = Career::lists( 'name', 'id' );;
        $courses = Course::lists( 'name', 'id' );
        $professors = [ ];
        $creators = User::lists( 'name', 'id' );
        $tags = Tag::where( 'type', 'challenge' )->lists( 'name', 'id' );
        $ch_universities = $challenge->universities()->lists( 'id' );
        $ch_careers = $challenge->careers()->lists( 'id' );
        $ch_courses = $challenge->courses()->lists( 'id' );
        $ch_creators = $challenge->creators()->lists( 'id' );


        return view( 'challenges.edit', compact( 'user',
            'challenge', 'cities', 'categories', 'types', 'rewards', 'searchings',
            'actual_stages', 'desired_stages', 'tags', 'universities', 'careers', 'courses', 'professors', 'creators',
            'ch_universities', 'ch_careers', 'ch_courses', 'ch_creators' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChallengeRequest $request
     * @return Response
     */
    public function store( ChallengeRequest $request )
    {
        $this->createChallenge( $request );
        flash()->success( Lang::get( 'challenges/messages.create_ok' ) );

        return redirect( 'challenges' );
    }

    public function delfile( $challenge, $file, Request $request )
    {
        $challenge = Challenge::find( $challenge );
        if($m = Media::find($file)){
            $m->delete();
            flash()->success( Lang::get( 'general/labels.file_deleted' ) );
        }
        return redirect( 'challenges/'.$challenge->id . '/docs' );
    }

    public function addfile( $challenge, Request $request )
    {
        $challenge = Challenge::find( $challenge );
        if($request->file('document')){
            $challenge->addMedia($request->file('document'))->usingName($request->input('name'))->toCollection('documents');
            flash()->success( Lang::get( 'general/labels.file_uploaded' ) );
        }
        return redirect( 'challenges/'.$challenge->id . '/docs' );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Challenge $challenge
     * @param Request $request
     * @return Response
     * @internal param int $id
     */
    public function update( Challenge $challenge, Request $request )
    {
        $challenge->update( $request->all() );
        $this->syncRewards( $challenge, $request->input( 'rewards_list', array() ) );
        $this->syncSearchings( $challenge, $request->input( 'searchings_list', array() ) );
        $this->syncTags( $challenge, $request->input( 'tag_list', array() ) );
        $this->syncUniversities( $challenge, $request->input( 'university_list', array() ) );
        $this->syncCareers( $challenge, $request->input( 'career_list', array() ) );
        //$this->syncCourses( $challenge, $request->input( 'course_list', array() ) );
        $this->syncCreators( $challenge, $request->input( 'creator_list', array() ) );
        flash()->success( Lang::get( 'challenges/messages.edit_ok' ) );
        if($request->file('document')){
            $challenge->addMedia($request->file('document'))->toCollection('documents');
        }
        if ( $challenge->image == "" )
        {
            $challenge->image = "/images/challenges/challenge.jpg";
            $challenge->save();
        }
        $challenge->groups()->where( 'name', 'Grupo general' )->where( 'private', false )->firstOrCreate( [ 'name' => 'Grupo general', 'private' => false ] );

        return redirect( 'challenges/'.$challenge->id );
    }


    /**
     * @param ArticleRequest|ChallengeRequest $request
     * @return mixed
     */
    private function createChallenge( ChallengeRequest $request )
    {
        $challenge = Auth::user()->challenges()->create( $request->all() );
        $this->syncRewards( $challenge, $request->input( 'rewards_list', array() ) );
        $this->syncSearchings( $challenge, $request->input( 'searchings_list', array() ) );
        $this->syncTags( $challenge, $request->input( 'tag_list', array() ) );
        $this->syncUniversities( $challenge, $request->input( 'university_list', array() ) );
        $this->syncCareers( $challenge, $request->input( 'career_list', array() ) );
        $this->syncCourses( $challenge, $request->input( 'course_list', array() ) );
        $this->syncCreators( $challenge, $request->input( 'creator_list', array() ) );
        flash()->success( Lang::get( 'challenges/messages.create_ok' ) );

        if ( $challenge->image == "" )
        {
            $challenge->image = "/images/challenges/challenge.jpg";
            $challenge->save();
        }
        $challenge->groups()->where( 'name', 'Grupo general' )->where( 'private', false )->firstOrCreate( [ 'name' => 'Grupo general', 'private' => false ] );

        return $challenge;
    }

    /**
     * Display the specified resource.
     *
     * @param Challenge $challenge
     * @return Response
     * @internal param int $id
     */
    public function show( Challenge $challenge, $id = null, $option = null )
    {
        if ( $id ) $challenge = Challenge::find( $id );
        $user = $challenge->user()->getResults();
        if ( !$option ) $option = "info";
        /* TO DO: move this relations into one object with properties.
         * */

        $universities = [ ];
        $items = $challenge->universities()->lists( 'name', 'id' );
        foreach ( $items as $id => $name )
        {
            $universities[ ] = [ "id" => $id, "name" => $name ];
        }
        $careers = [ ];
        $items = $challenge->careers()->lists( 'name', 'id' );
        foreach ( $items as $id => $name )
        {
            $careers[ ] = [ "id" => $id, "name" => $name ];
        }
        $courses = [ ];
        $items = $challenge->courses()->lists( 'name', 'id' );
        foreach ( $items as $id => $name )
        {
            $courses[ ] = [ "id" => $id, "name" => $name ];
        }
        $professors = [ ];
        $users = User::all();
        $teams = $challenge->teams()->get();

        if ( Auth::check() )
        {
            return view( 'challenges.show', compact( 'challenge', 'user', 'universities', 'careers', 'courses', 'professors', 'teams', 'users','option' ) );
        } else
        {
            return view( 'challenges.showbrief', compact( 'challenge', 'user', 'universities', 'careers', 'courses', 'professors', 'users' ) );
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Challenge $challenge
     * @return Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy( Challenge $challenge )
    {
        $challenge->delete();
        flash()->success( Lang::get( 'challenges/messages.delete_ok' ) );

        return redirect( 'challenges' );
    }

    /**
     * @param Challenge $challenge
     * @param array $rewards
     */
    public function syncRewards( Challenge $challenge, array $rewards )
    {
        $challenge->rewards()->sync( $rewards );
    }

    /**
     * @param Challenge $challenge
     * @param array $searchings
     */
    public function syncSearchings( Challenge $challenge, array $searchings )
    {
        $challenge->searchings()->sync( $searchings );
    }

    /**
     * @param Challenge $challenge
     * @param array $universities
     */
    public function syncUniversities( Challenge $challenge, array $universities )
    {
        $unis = [ ];
        foreach ( $universities as $university )
        {
            if ( $university != "" ) $unis[ ] = $university;
        }
        $challenge->universities()->sync( $unis );
    }

    /**
     * @param Challenge $challenge
     * @param array $careers
     */
    public function syncCareers( Challenge $challenge, array $careers )
    {
        $items = [ ];
        foreach ( $careers as $car )
        {
            if ( $car != "" ) $items[ ] = $car;
        }
        $challenge->careers()->sync( $items );
    }

    /**
     * @param Challenge $challenge
     * @param array $courses
     */
    public function syncCourses( Challenge $challenge, array $courses )
    {
        $items = [ ];
        foreach ( $courses as $course )
        {
            if ( $course != "" ) $items[ ] = $course;
        }
        $challenge->courses()->sync( $items );
    }

    /**
     * @param Challenge $challenge
     * @param array $creators
     */
    public function syncCreators( Challenge $challenge, array $creators )
    {
        $items = [ ];
        foreach ( $creators as $creator )
        {
            if ( $creator != "" ) $items[ ] = $creator;
        }
        $challenge->creators()->sync( $items );
    }


    /**
     * @param Challenge $challenge
     * @param array $tags
     */
    public function syncTags( Challenge $challenge, array $tags )
    {
        $ids = Tag::where( 'type', 'challenge' )->get()->lists( 'id' );
        if ( count( $ids ) > 0 )
            $challenge->tags()->detach( $ids );
        foreach ( $tags as $tag )
        {
            if ( is_numeric($tag) && $model = Tag::where( 'id', $tag )->where( 'type', 'challenge' )->first() )
            {
                $challenge->tags()->attach( $tag );
            } else
            {
                $model = Tag::firstOrCreate( [ 'name' => $tag, 'type' => 'challenge' ] );
                $challenge->tags()->attach( $model->id );
            }
        }
    }
}
