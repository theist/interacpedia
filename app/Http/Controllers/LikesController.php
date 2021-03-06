<?php

namespace App\Http\Controllers;

use App\Interacpedia\Like;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $likes = Like::latest()->get();

        return view( 'likes.index', compact( 'likes' ) );

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
     * @return Response
     */
    public function store(Request $request)
    {
        if ( $request->ajax() )
        {
            $like = Auth::user()->likes()->create( $request->all() );
            $model = $like->model;
            $counter = $request->get("counter",true);
            $format = $request->get("format",'horizontal');
            $formid_suffix = $request->get("formid_suffix",'');
            return  view( 'likes.show', compact( 'model','counter','formid_suffix','format' ) );
        } else
        {
            return ['fail'=>true];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Like $like
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function destroy( Like $like, Request $request )
    {
        $model = $like->model;
        $like->delete();
        $counter = $request->get("counter",true);
        $format = $request->get("format",'horizontal');
        $formid_suffix = $request->get("formid_suffix",'');

        return  view( 'likes.show', compact( 'model','counter','formid_suffix','format' ) );
    }
}
