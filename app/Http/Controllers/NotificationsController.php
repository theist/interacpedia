<?php

namespace App\Http\Controllers;

use App\Interacpedia\Notification;
use App\Interacpedia\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NotificationsController extends Controller
{
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
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public static function add( $model )
    {
        $user = User::findOrNew($model[ 'to_user' ]);
        $data = [];
        $data['user_id'] = $user->id;
        $data['model_type'] = get_class($model);
        $data['model_id'] = $model->id;
        if($data['model_type']=="App\\Interacpedia\\Message"){
            $data['type'] = 'message';
            $data['message'] = 'Has recibido un nuevo mensaje de ' . User::findOrNew($model[ 'from_user' ])->name;
        } else {
            $data['type'] = 'other';
            $data['message'] = 'Tienes una nueva notificacion en Interacpedia';
        }

        $not = Notification::create($data);
        if($data['type']=="message"){
            Mail::queue('emails.newmessage', ['user' => $user,'notification'=>$not,'model'=>$model], function ($m) use ($user) {
                $m->to($user->email, $user->name)->subject('Tienes un nuevo mensaje en Interacpedia');
            });
        }
    }
}
