<?php namespace App\Http\Controllers;

use App\Http\Requests\ChallengeRequest;
use App\Interacpedia\Challenge;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interacpedia\ChallengeCategory;
use App\Interacpedia\Repositories\ChallengeCategoriesRepositoryInterface;
use App\Interacpedia\Repositories\ChallengeTypesRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

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

        return view( 'challenges.create', compact( 'user', 'cities', 'categories','types' ) );
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
        flash()->success( 'Your challenge has been created!.' );

        return redirect( 'challenges' );
    }

    /**
     * Display the specified resource.
     *
     * @param Challenge $challenge
     * @return Response
     * @internal param int $id
     */
    public function show( Challenge $challenge )
    {
        return view( 'challenges.show', compact( 'challenge' ) );
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

        return view( 'challenges.edit', compact( 'user', 'challenge', 'cities', 'categories','types' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Challenge $challenge
     * @param Request $request
     * @return Response
     * @internal param int $id
     */
    public function update( Challenge $challenge, Request $request  )
    {
        $challenge->update($request->all());
        flash()->success( Lang::get('challenges/messages.edit_ok') );
        return redirect('challenges');
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
        flash()->success( Lang::get('challenges/messages.delete_ok') );
        return redirect('challenges');
    }

    /**
     * @param ArticleRequest|ChallengeRequest $request
     * @return mixed
     */
    private function createChallenge( ChallengeRequest $request )
    {
        $challenge = Auth::user()->challenges()->create( $request->all() );
        flash()->success( Lang::get('challenges/messages.create_ok') );
        return $challenge;
    }
}
