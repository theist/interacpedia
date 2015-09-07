<?php

namespace App\Http\Controllers;

use App\Interacpedia\Message;
use App\Interacpedia\Notification;
use App\Interacpedia\Team;
use App\Interacpedia\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessagesController extends Controller {

    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function mass()
    {
        $teams = Team::all();
        foreach($teams as $team){
            $users = $team->users;
            foreach($users as $user){
                $data = [];
                $data[ "message_id" ] = null;
                $data[ "to_user" ] = $user->id;
                $data[ "from_user" ] = 1;
                $data[ "title" ] = "Imagen y nombre del equipo";
                $data[ "read" ] = 0;
                $data[ "content" ] = "Hola " . substr($user->name,0,strpos($user->name," ")) . ".
                Para completar la información de los equipos, necesitamos que carguen una FOTO del equipo
                en la sección de documentos, y que definan un NOMBRE para el equipo.
                Cuando hayan cargado la imagen y tengan definido un nombre, que alguno de los miembros
                del equipo, me responda este mensaje con el nombre escogido.
                Gracias! Saludos. Juan Carlos Orrego - CTO Interacpedia";
                $message = Message::create( $data );
                NotificationsController::add($message);
            }
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
        if($message->message_id && $message->message_id>0)
            $message = Message::find( $message->message_id );
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
