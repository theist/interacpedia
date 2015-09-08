<?php

namespace App\Http\Controllers;

use App\Interacpedia\Challenge;
use App\Interacpedia\Notification;
use App\Interacpedia\Team;
use App\Interacpedia\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NotificationsController extends Controller {

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
     * @param  Request $request
     * @return Response
     */
    public function store( Request $request )
    {
        //
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
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update( Request $request, $id )
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

    public static function add( $model )
    {
        $data = [ ];
        $data[ 'model_type' ] = get_class( $model );
        $data[ 'model_id' ] = $model->id;
        if ( $data[ 'model_type' ] == "App\\Interacpedia\\Message" )
        {
            $user = User::findOrNew( $model[ 'to_user' ] );
            $data[ 'user_id' ] = $user->id;
            $data[ 'type' ] = 'message';
            $data[ 'message' ] = 'Has recibido un nuevo mensaje de ' . User::findOrNew( $model[ 'from_user' ] )->name;
            $not = Notification::create( $data );
            Mail::queue( 'emails.newmessage', [ 'user' => $user, 'notification' => $not, 'model' => $model ], function ( $m ) use ( $user )
            {
                $m->to( $user->email, $user->name )->subject( 'Tienes un nuevo mensaje en Interacpedia' );
            } );
        } else if ( $data[ 'model_type' ] == "App\\Interacpedia\\Brief" )
        {
            $admins = User::where( 'admin', 1 )->get();
            foreach ( $admins as $user )
            {
                $data[ 'user_id' ] = $user->id;
                $data[ 'type' ] = 'brief';
                $data[ 'message' ] = 'Se ha hecho una actualización a un Brief.';
                $text = '<h4>Hola ' . $user->name . '</h4><br>
                     <h5>' . Auth::user()->name . ' ha actualizado un brief.</h5><br>
                     ' . $team->name . ': #' . $team->id . '<br>
                     <a href="' . url( "teams/" . $model->team_id . "/brief" ) . '">Ver Brief</a>
                    ';
                $not = Notification::create( $data );
                Mail::queue( 'emails.notification', [ 'text' => $text ], function ( $m ) use ( $user )
                {
                    $m->to( $user->email, $user->name )->subject( 'Actualización a un Brief' );
                } );
            }
        } else if ( $data[ 'model_type' ] == "App\\Interacpedia\\Comment" )
        {
            $author = User::findOrNew( $model[ 'user_id' ] );
            $data[ 'type' ] = 'comment';
            if ( $model->model_type == "App\\Interacpedia\\Team" )
            {
                $team = Team::findOrNew( $model->model_id );
                foreach ( $team->users as $user )
                {
                    $data[ 'user_id' ] = $user->id;
                    $data[ 'message' ] = $author->name . ' ha hecho un nuevo comentario en tu equipo.';
                    $text = '<h4>Hola ' . $user->name . '</h4><br>
                     <h5>' . $author->name . ' ha hecho un nuevo comentario en tu equipo.</h5><br>
                     ' . $team->name . ': #' . $team->id . '<br>
                     <a href="' . url( "teams/" . $team->id . "/comments" ) . '">Ver Comentarios</a>
                    ';
                    $not = Notification::create( $data );
                    Mail::queue( 'emails.notification', [ 'text' => $text ], function ( $m ) use ( $user )
                    {
                        $m->to( $user->email, $user->name )->subject( 'Tu equipo tiene un nuevo comentario en Interacpedia' );
                    } );
                }
                foreach ( $team->course->mentors as $mentor )
                {
                    $user = $mentor->user;
                    $data[ 'user_id' ] = $user->id;
                    $data[ 'message' ] = $author->name . ' ha hecho un nuevo comentario en un equipo de una de tus clases.';
                    $text = '<h4>Hola ' . $user->name . '</h4><br>
                     <h5>' . $author->name . ' ha hecho un nuevo comentario en un equipo de una de tus clases.</h5><br>
                     ' . $team->name . ': #' . $team->id . '<br>
                     <a href="' . url( "teams/" . $team->id . "/comments" ) . '">Ver Comentarios</a>
                    ';
                    $not = Notification::create( $data );
                    Mail::queue( 'emails.notification', [ 'text' => $text ], function ( $m ) use ( $user )
                    {
                        $m->to( $user->email, $user->name )->subject( 'Uno de tus equipos tiene un nuevo comentario en Interacpedia' );
                    } );
                }
                $admins = User::where( 'admin', 1 )->get();
                foreach ( $admins as $user )
                {
                    $data[ 'user_id' ] = $user->id;
                    $data[ 'message' ] = $author->name . ' ha hecho un nuevo comentario en un equipo.';
                    $text = '<h4>Hola ' . $user->name . '</h4><br>
                     <h5>' . $author->name . ' ha hecho un nuevo comentario en un equipo.</h5><br>
                     ' . $team->name . ': #' . $team->id . '<br>
                     <a href="' . url( "teams/" . $team->id . "/comments" ) . '">Ver Comentarios</a>
                    ';
                    $not = Notification::create( $data );
                    Mail::queue( 'emails.notification', [ 'text' => $text ], function ( $m ) use ( $user )
                    {
                        $m->to( $user->email, $user->name )->subject( 'Un equipo tiene un nuevo comentario en Interacpedia' );
                    } );
                }
            } else if ( $model->model_type == "App\\Interacpedia\\Challenge" )
            {
                $challenge = Challenge::findOrNew( $model->model_id );
                $admins = User::where( 'admin', 1 )->get();
                foreach ( $admins as $user )
                {
                    $data[ 'user_id' ] = $user->id;
                    $data[ 'message' ] = $author->name . ' ha hecho un nuevo comentario en un reto.';
                    $text = '<h4>Hola ' . $user->name . '</h4><br>
                     <h5>' . $author->name . ' ha hecho un nuevo comentario en un reto.</h5><br>
                     Reto: ' . $challenge->name . '<br>
                     <a href="' . url( "challenges/" . $challenge->id . "/comments" ) . '">Ver Comentarios</a>
                    ';
                    $not = Notification::create( $data );
                    Mail::queue( 'emails.notification', [ 'text' => $text ], function ( $m ) use ( $user )
                    {
                        $m->to( $user->email, $user->name )->subject( 'Un reto tiene un nuevo comentario en Interacpedia' );
                    } );
                }
            }
        } else if($data[ 'model_type' ] == "Spatie\\MediaLibrary\\Media"){
            $data[ 'type' ] = 'media';
            if ( $model->model_type == "App\\Interacpedia\\Team" )
            {
                $team = Team::findOrNew( $model->model_id );
                $admins = User::where( 'admin', 1 )->get();
                foreach ( $admins as $user )
                {
                    $data[ 'user_id' ] = $user->id;
                    $data[ 'message' ] = 'Se ha cargado un nuevo documento en un equipo.';
                    $text = '<h4>Hola ' . $user->name . '</h4><br>
                     <h5>Se ha cargado un nuevo documento en un equipo.</h5><br>
                     ' . $team->name . ': #' . $team->id . '<br>
                     <a href="' . url( "teams/" . $team->id . "/docs" ) . '">Ver Documentos</a>
                    ';
                    $not = Notification::create( $data );
                    Mail::queue( 'emails.notification', [ 'text' => $text ], function ( $m ) use ( $user )
                    {
                        $m->to( $user->email, $user->name )->subject( 'Se ha cargado un documento a Un equipo' );
                    } );
                }
            }
        } else {
            $data[ 'type' ] = 'other';
            $data[ 'message' ] = 'Tienes una nueva notificacion en Interacpedia';
        }
    }
}
