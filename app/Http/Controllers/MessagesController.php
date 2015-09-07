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

        $sent = [
            79,84,86,100,80,81,82,85,90,92,93,102,101,83,
            88,89,94,96,506,91,97,98,99,95,67,71,
68,
78,
35,
77,
70,
74,
34,
69,
33,
72,
257,
477,
73,
264,
76,
75,
496,
497,
498,
499,
500,
501,
502,
503,
504,
40,
37,
38,
12,
39,
419,
418,
410,
464,
409,
427,
408,
401,
402,
404,
403,
422,
414,
416,
413,
415,
421,
466,
463,
406,
411,
424,
405,
400,
412,
425,
423,
420,
465,
426,
513,
417,
428,
407,
433,
443,
444,
445,
449,
450,
451,
452,
441,
442,
460,
461,
437,
438,
439,
440,
434,
435,
436,
462,
430,
431,
432,
446,
447,
448,
459,
453,
454,
455,
456,
429,
457,
458,
467,
384,
383,
382,
390,
471,
386,
385,
469,
378,
387,
381,
380,
371,
377,
376,
468,
388,
389,
372,
373,
375,
379,
374,
470,
355,
357,
346,
476,
356,
353,
365,
366,
352,
362,
345,
368
        ];
        $teams = Team::all();
        foreach($teams as $team){
            $users = $team->users;
            foreach($users as $user){
                if(in_array($user->id,$sent))continue;
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
                //$message = Message::create( $data );
                //NotificationsController::add($message);
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
