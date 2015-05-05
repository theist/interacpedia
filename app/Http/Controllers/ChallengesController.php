<?php namespace App\Http\Controllers;

use App\Http\Requests\ChallengeRequest;
use App\Interacpedia\Challenge;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ChallengesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth',['only'=>['create','edit']]);
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
    public function create()
    {
        return view( 'challenges.create' );
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
        return view('challenges.show',compact('challenge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit( $id )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update( $id )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy( $id )
    {
        //
    }

    /**
     * @param ArticleRequest|ChallengeRequest $request
     * @return mixed
     */
    private function createChallenge( ChallengeRequest $request )
    {
        $challenge = Auth::user()->challenges()->create( $request->all() );

        return $challenge;
    }
}
