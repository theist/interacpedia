<?php namespace App\Http\Controllers;

use App\Http\Requests\ChallengeRequest;
use App\Interacpedia\Challenge;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ChallengesController extends Controller {

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
        flash()->success( 'Your chellange has been created!.' );

        return redirect( 'challenges' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show( $id )
    {
        //
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
        $challenge = Auth::user()->chellenges()->create( $request->all() );

        return $challenge;
    }
}
