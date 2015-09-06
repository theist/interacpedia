<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interacpedia\Career;
use App\Interacpedia\City;
use App\Interacpedia\Company;
use App\Interacpedia\Country;
use App\Interacpedia\Course;
use App\Interacpedia\Occupation;
use App\Interacpedia\Position;
use App\Interacpedia\Sector;
use App\Interacpedia\Tag;
use App\Interacpedia\University;
use App\Interacpedia\User;
use Illuminate\Auth\Guard;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));

    }
    public function show( $id )
    {
        $user = User::find( $id );
        $option = 'info';
        $tags_vision = $user->tags()->where( 'type', 'personal_vision' )->lists( 'name', 'id' );
        $tags_dreams = $user->tags()->where( 'type', 'dreams' )->lists( 'name', 'id' );
        $tags_likes = $user->tags()->where( 'type', 'likes' )->lists( 'name', 'id' );
        $tags_work_in = $user->tags()->where( 'type', 'work_in' )->lists( 'name', 'id' );
        $tags_work_companies = $user->tags()->where( 'type', 'work_companies' )->lists( 'name', 'id' );
        $tags_work_areas = $user->tags()->where( 'type', 'work_areas' )->lists( 'name', 'id' );
        $tags_contribution = $user->tags()->where( 'type', 'contribution' )->lists( 'name', 'id' );
        $tags_in_areas = $user->tags()->where( 'type', 'in_areas' )->lists( 'name', 'id' );
        $tags_searching_resources = $user->tags()->where( 'type', 'searching_resources' )->lists( 'name', 'id' );
        $tags_searching_experts = $user->tags()->where( 'type', 'searching_experts' )->lists( 'name', 'id' );
        $tags_searching_personal = $user->tags()->where( 'type', 'searching_personal' )->lists( 'name', 'id' );
        $users = User::orderBy('name','asc')->lists( 'name', 'id' );
        $messages = $user->allmessages();
        $notifications = $user->allnotifications();
        return view( 'user.profile', compact( 'user', 'option', 'users','messages', 'notifications',
            'tags_vision', 'tags_dreams', 'tags_likes',
            'tags_work_in', 'tags_work_companies', 'tags_work_areas', 'tags_contribution', 'tags_in_areas',
            'tags_searching_resources', 'tags_searching_experts', 'tags_searching_personal' ) );
    }

    /**
     * Displays a user profile
     *
     * @param Authenticatable $user
     * @return Authenticatable
     */
    public function profile( Authenticatable $user, $id = null, $option = null )
    {
        if ( $id ) $user = User::find( $id );
        if ( !$option ) $option = "info";
        $tags_vision = $user->tags()->where( 'type', 'personal_vision' )->lists( 'name', 'id' );
        $tags_dreams = $user->tags()->where( 'type', 'dreams' )->lists( 'name', 'id' );
        $tags_likes = $user->tags()->where( 'type', 'likes' )->lists( 'name', 'id' );
        $tags_work_in = $user->tags()->where( 'type', 'work_in' )->lists( 'name', 'id' );
        $tags_work_companies = $user->tags()->where( 'type', 'work_companies' )->lists( 'name', 'id' );
        $tags_work_areas = $user->tags()->where( 'type', 'work_areas' )->lists( 'name', 'id' );
        $tags_contribution = $user->tags()->where( 'type', 'contribution' )->lists( 'name', 'id' );
        $tags_in_areas = $user->tags()->where( 'type', 'in_areas' )->lists( 'name', 'id' );
        $tags_searching_resources = $user->tags()->where( 'type', 'searching_resources' )->lists( 'name', 'id' );
        $tags_searching_experts = $user->tags()->where( 'type', 'searching_experts' )->lists( 'name', 'id' );
        $tags_searching_personal = $user->tags()->where( 'type', 'searching_personal' )->lists( 'name', 'id' );
        $users = User::orderBy('name','asc')->lists( 'name', 'id' );
        $messages = $user->allmessages();
        $notifications = $user->allnotifications();
        return view( 'user.profile', compact( 'user', 'option', 'users','messages', 'notifications',
            'tags_vision', 'tags_dreams', 'tags_likes',
            'tags_work_in', 'tags_work_companies', 'tags_work_areas', 'tags_contribution', 'tags_in_areas',
            'tags_searching_resources', 'tags_searching_experts', 'tags_searching_personal' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Authenticatable $user
     * @return Response
     * @internal param int $id
     */
    public function edit( Authenticatable $user )
    {
        $tags_vision = Tag::where( 'type', 'personal_vision' )->lists( 'name', 'id' );
        $tags_dreams = Tag::where( 'type', 'dreams' )->lists( 'name', 'id' );
        $tags_likes = Tag::where( 'type', 'likes' )->lists( 'name', 'id' );
        $tags_work_in = Tag::where( 'type', 'work_in' )->lists( 'name', 'id' );
        $tags_work_companies = Tag::where( 'type', 'work_companies' )->lists( 'name', 'id' );
        $tags_work_areas = Tag::where( 'type', 'work_areas' )->lists( 'name', 'id' );
        $tags_contribution = Tag::where( 'type', 'contribution' )->lists( 'name', 'id' );
        $tags_in_areas = Tag::where( 'type', 'in_areas' )->lists( 'name', 'id' );
        $tags_searching_resources = Tag::where( 'type', 'searching_resources' )->lists( 'name', 'id' );
        $tags_searching_experts = Tag::where( 'type', 'searching_experts' )->lists( 'name', 'id' );
        $tags_searching_personal = Tag::where( 'type', 'searching_personal' )->lists( 'name', 'id' );

        return view( 'user.edit', compact( 'user',
            'tags_vision', 'tags_dreams', 'tags_likes',
            'tags_work_in', 'tags_work_companies', 'tags_work_areas', 'tags_contribution', 'tags_in_areas',
            'tags_searching_resources', 'tags_searching_experts', 'tags_searching_personal' ) );
    }

    public function companies( Authenticatable $user )
    {
        $companies = Company::all();

        return view( 'user.companies', compact( 'user', 'companies' ) );
    }

    /**
     * @param Authenticatable $user
     * @return \Illuminate\View\View
     */
    public function completecategory( Authenticatable $user )
    {
        return view( 'user.completecategory', compact( 'user' ) );
    }
  /**
     * @param Authenticatable $user
     * @return \Illuminate\View\View
     */
    public function completetyc( Authenticatable $user )
    {
        return view( 'user.completetyc', compact( 'user' ) );
    }

    /**
     * @param Authenticatable $user
     * @return \Illuminate\View\View
     */
    public function completeend( Authenticatable $user )
    {
        return view( 'user.completeend', compact( 'user' ) );
    }
    /**
     * @param Authenticatable $user
     * @return \Illuminate\View\View
     */
    public function completecity( Authenticatable $user )
    {
        $cities = City::orderBy('name','asc')->lists( 'name', 'id' );
        $countries = Country::orderBy('name','asc')->lists( 'name', 'id' );

        return view( 'user.completecity', compact( 'user', 'cities', 'countries' ) );
    }

    /**
     * @param Authenticatable $user
     * @return \Illuminate\View\View
     */
    public function completeoccupations( Authenticatable $user )
    {
        $types = Occupation::getValues( 'type' );
        $universities = University::where( 'name', '<>', 'Todas' )->lists( 'name', 'id' );
        $companies = Company::where( 'name', '<>', 'Todas' )->lists( 'name', 'id' );
        $careers = Career::where( 'name', '<>', 'Todas' )->lists( 'name', 'id' );
        $courses = Course::where( 'name', '<>', 'Todos' )->lists( 'name', 'id' );
        $positions = Position::where( 'name', '<>', 'Todos' )->lists( 'name', 'id' );
        $sectors = Sector::where( 'name', '<>', 'Todos' )->orderBy('name','asc')->lists( 'name', 'id' );
        $occupation = Occupation::firstOrNew( [ 'user_id' => $user->id ] );

        return view( 'user.completeoccupations', compact( 'user', 'occupation', 'types', 'universities', 'companies',
            'careers', 'positions', 'courses', 'sectors'
        ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Authenticatable $user
     * @param Request $request
     * @return Response
     */
    public function update( Authenticatable $user, Request $request )
    {
        $user->stats()->create(['action'=>'profile_update','value'=>'Form submission']);
        $this->syncTags( $user, 'personal_vision', $request->input( 'tags_vision_list', array() ) );
        $this->syncTags( $user, 'dreams', $request->input( 'tags_dreams_list', array() ) );
        $this->syncTags( $user, 'likes', $request->input( 'tags_likes_list', array() ) );
        $this->syncTags( $user, 'work_in', $request->input( 'tags_work_in_list', array() ) );
        $this->syncTags( $user, 'work_companies', $request->input( 'tags_work_companies_list', array() ) );
        $this->syncTags( $user, 'work_areas', $request->input( 'tags_work_areas_list', array() ) );
        $this->syncTags( $user, 'contribution', $request->input( 'tags_contribution_list', array() ) );
        $this->syncTags( $user, 'in_areas', $request->input( 'tags_in_areas_list', array() ) );
        $this->syncTags( $user, 'searching_resources', $request->input( 'tags_searching_resources_list', array() ) );
        $this->syncTags( $user, 'searching_experts', $request->input( 'tags_searching_experts_list', array() ) );
        $this->syncTags( $user, 'searching_personal', $request->input( 'tags_searching_personal_list', array() ) );
        if ( $request->input( 'completeoccupations', false ) )
        {
            $occ = Occupation::firstOrNew( [ 'user_id' => $user->id ] );
            $occ->user_id = $user->id;
            $occ->type = $request->input( 'type' );
            $occ->experience = $request->input( 'experience', 0 );
            $occ->university_id = $request->input( 'university_id' );
            $occ->company_id = $request->input( 'company_id' );
            $occ->career_id = $request->input( 'career_id' );
            $occ->sector_id = $request->input( 'sector_id' );
            $occ->course_id = $request->input( 'course_id' );
            $occ->position_id = $request->input( 'position_id' );
            $occ->save();
            return redirect( 'user/completeend' );
        } else
        {
            if(str_contains($request->input('birthdate')," ")){
                $request->merge( array( 'birthdate' => date("Y-m-d",strtotime($request->input('birthdate'))) ) );
            }
            $user->update( $request->all() );
            if ( $request->input( 'completecategory', false ) )
                return redirect( 'user/completecity' );
            else if ( $request->input( 'completecity', false ) )
                return redirect( 'user/completeoccupations' );
            else if ( $request->input( 'completetyc', false ) )
                return redirect( 'user/completecategory' );
        }

        return redirect( 'user/profile' );
    }

    /**
     * @param Authenticatable $user
     * @param $type
     * @param array $tags
     */
    public function syncTags( Authenticatable $user, $type, array $tags )
    {

        $ids = Tag::where( 'type', $type )->get()->lists( 'id' );
        //if($type=='likes') dd($ids);
        if ( count( $ids ) > 0 )
            $user->tags()->detach( $ids );
        foreach ( $tags as $tag )
        {
            if ( $model = Tag::where( 'id', $tag )->where( 'type', $type )->first() )
            {
                $user->tags()->attach( $tag );
            } else
            {
                $model = Tag::firstOrCreate( [ 'name' => $tag, 'type' => $type ] );
                $user->tags()->attach( $model->id );
            }
        }
    }
}
