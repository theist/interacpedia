<?php

namespace App\Http\Controllers;

use App\Interacpedia\Follow;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $follows = Follow::latest()->get();

        return view( 'follows.index', compact( 'follows' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store( Request $request )
    {
        if ( $request->ajax() )
        {
            $follow = Auth::user()->follows()->create( $request->all() );
            $model = $follow->model;

            $counter = $request->get("counter",true);
            $format = $request->get("format",'horizontal');
            $formid_suffix = $request->get("formid_suffix",'');
            return view( 'follows.show', compact( 'model','counter','formid_suffix','format' ) );
        } else
        {
            return [ 'fail' => true ];
        }
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
     * @param Request $request
     * @param Follow $follow
     * @return Response
     * @throws \Exception
     */
    public function destroy( Request $request,Follow $follow )
    {
        $model = $follow->model;
        $follow->delete();
        $counter = $request->get("counter",true);
        $format = $request->get("format",'horizontal');
        $formid_suffix = $request->get("formid_suffix",'');
        return view( 'follows.show', compact( 'model','counter','formid_suffix','format' ) );
    }
}
