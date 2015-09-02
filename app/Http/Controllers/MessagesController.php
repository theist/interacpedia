<?php

namespace App\Http\Controllers;

use App\Interacpedia\Message;
use App\Interacpedia\Notification;
use App\Interacpedia\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessagesController extends Controller {

    public function mass()
    {
        $users = User::where('id','<>',3)->get();
        foreach($users as $user){
            $data = [];
            $data[ "message_id" ] = null;
            $data[ "to_user" ] = $user->id;
            $data[ "from_user" ] = 3;
            $data[ "title" ] = "¿Cómo vas?";
            $data[ "read" ] = 0;
            $data[ "content" ] = "Hola " . substr($user->name,0,strpos($user->name," ")) . ". Cuéntame que tal te ha parecido Interacpedia? Has escrito comentarios en los retos, posteado en el Blog, contactado el mentor de la clase o el coordinador de la empresa..? Como vas con el Brief/Plan? Recuerda que éste viernes a la 1:30 es la visita al Metro. Lleva preguntas para el Foro. Si te puedo ayudar en algo no dudes en escribirme. Saludos Santiago";
            $message = Message::create( $data );
            NotificationsController::add($message);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
            $data = $request->all();
            if ( $data[ "message_id" ] == "" )
                $data[ "message_id" ] = null;
            $message = Message::create( $data );
            NotificationsController::add($message);
            return $message;
        } else
        {
            return [ 'fail' => true ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Authenticatable $user
     * @param Message $message
     * @param  int $id
     * @return Response
     */
    public function show( Authenticatable $user, Message $message, $id = null )
    {
        if ( $id ) $message = Message::find( $id );
        return view('messages.show',compact('message','user'));

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
}
