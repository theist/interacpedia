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

        $sent = [ ];
        $teams = Team::all();
        foreach($teams as $team){
            $users = $team->users;
            foreach($users as $user){
                if(in_array($user->id,$sent))continue;
                $data = [];
                $data[ "message_id" ] = null;
                $data[ "to_user" ] = $user->id;
                $data[ "from_user" ] = 9;
                $data[ "title" ] = "Imagen y nombre del equipo";
                $data[ "read" ] = 0;
                $data[ "content" ] = "Hola " . substr($user->name,0,strpos($user->name," ")) . ".
                Soy María Fernanda Escobar, la CDO de Interacpedia.

Quiero contarte que ésta semana te compartimos un nuevo tutorial sobre Encuestas, herramienta vital para validación de las ideas.
http://www.interacpedia.com/tutorials

Además, quiero compartirte algunas recomendaciones:
- Valida la solución con usuarios, ellos son la principal fuente de verificación.
- Realiza encuestas para que luego puedas sustentar tus decisiones.
- Investiga en campo, visita los lugares, pregunta y observa.
Ejemplo: El Metro autorizó que vayan a las estaciones a preguntar. Dí que Valerio, Diana o Maria Isabel Betancur te autorizó y cuenta que estás haciendo una investigación para el reto con Interacpedia, la universidad y la empresa.
- Analiza bien el documento del reto: objetivos, limitaciones, qué ya están haciendo..

Cómo vas con la parte gráfica de tu proyecto?
Si te puedo ayudar en algo me cuentas.
Fefe";
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
