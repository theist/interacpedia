@extends('app')

@section('title')
    @lang('user/title.profile')
    @parent
@stop

@section('section-profile')
    @include('partials.profile')
@stop
@section('section-submenu')
    @if(Auth::user()->id==$user->id)
        @include('user.profile.menu',['items'=>[
                                                'info'=>['label'=>'Info','link'=>'/user/'. $user->id .'/info'],
                                                'challenges'=>['label'=>'Retos','link'=>'/user/'. $user->id .'/challenges'],
                                                'projects'=>['label'=>'Proyectos','link'=>'/user/'.$user->id.'/projects'],
                                                'messages'=>['label'=>'Mensajes','link'=>'/user/'.$user->id.'/messages'],
                                                'notifications'=>['label'=>'Notificaciones','link'=>'/user/'.$user->id.'/notifications']
                                                ],
                                        'active'=>$option
                                    ])
    @else
        @include('user.profile.menu',['items'=>[
                                                'info'=>['label'=>'Info','link'=>'/user/'. $user->id .'/info'],
                                                'challenges'=>['label'=>'Retos','link'=>'/user/'. $user->id .'/challenges'],
                                                'projects'=>['label'=>'Proyectos','link'=>'/user/'.$user->id.'/projects']
                                                ],
                                        'active'=>$option
                                    ])
    @endif
@stop

@section('content')
    <div class="row user-profile {{ $option }}">
        @include('user.profile.'.$option,['companies'=>$user->companies,'users'=>$users])
    </div>

@stop