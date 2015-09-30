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
        $count = 0;

        $sent = [];
        $filter_teams = [4,6,10,18,21,19,27,29,33,31,34,39,38,41,42,44,52,57,56,55];
        $teams = Team::all();
        foreach($teams as $team){
            if(count($filter_teams)>0 && !in_array($team->id,$filter_teams))continue;
            $users = $team->users;
            foreach($users as $user){
                if(in_array($user->id,$sent))continue;
                $data = [];
                $data[ "message_id" ] = null;
                $data[ "to_user" ] = $user->id;
                $data[ "from_user" ] = 3;
                $data[ "title" ] = "Asistencia al evento del Exito";
                $data[ "read" ] = 0;
                $data[ "content" ] = "Hola " . substr($user->name,0,strpos($user->name," ")) . ".
                Estas son las personas que se inscribieron y enviaron las preguntas para el evento del Exito:
- Equipo 34: Mateo Ramirez y Yoel Funes - Eafit
- Equipo 55:  Victor Grajales y Anuar Laguna- UniRemington
- Equipo 56: Stephanie Ramires – UniRemington
- Equipo 57: Javier Llanos y Paula Pulgarin – UniRemington
- Equipo 10: David Giraldo – UPB
- Equipo 6: Samuel Pulgarín - Eafit
- Profesora: Carolina González - Eafit

Por ese motivo, son los únicos registrados para entrar.
Les escribo para evitar malentendidos, por si alguien mas estaba pensando en llegar al Exito el viernes.
Saludos
Santiago";
                $message = Message::create( $data );
                NotificationsController::add($message);
                $count++;
            }
        }
        echo $count;
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
