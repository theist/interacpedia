<?php

namespace App\Http\Controllers;

use App\Interacpedia\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class CommentsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $comments = Comment::latest()->get();

        return view( 'comments.index', compact( 'comments' ) );
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
    public function store( Request $request )
    {
        //$this->createComment( $request );
        if ( $request->ajax() )
        {
            $user = Auth::user();
            $user->stats()->create(['action'=>'comments_add','value'=>$request->get('title'),'model_id'=>$request->get('model_id'),'model_type'=>$request->get('model_type')]);
            $comment = $user->comments()->create( $request->all() );
            return  view( 'comments.show', compact( 'comment' ) );
        } else
        {
            return ['fail'=>true];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Comment $comment
     * @return Response
     */
    public function show( Comment $comment )
    {
        return view( 'comments.show', compact( 'comment' ) );
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
    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return Response
     * @throws \Exception
     */
    public function destroy( Comment $comment )
    {
        $id = $comment->id;
        $comment->delete();
        return ['id'=>$id];
    }
}
