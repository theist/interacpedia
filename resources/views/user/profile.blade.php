@extends('app')

@section('title')
    @lang('user/title.profile')
    @parent
@stop

@section('section-profile')
    @include('partials.profile')
@stop
@section('section-submenu')
    @include('user.profile.menu',['items'=>[
                                            'info'=>['label'=>'Info','link'=>'/user/'. $user->id .'/info'],
                                            'challenges'=>['label'=>'Retos','link'=>'/user/'. $user->id .'/challenges'],
                                            'projects'=>['label'=>'Proyectos','link'=>'/user/'.$user->id.'/projects'],
                                            'competences'=>['label'=>'Competencias','link'=>'/user/'.$user->id.'/competences']
                                            ],
                                    'active'=>$option
                                ])
@stop

@section('content')
    <div class="row user-profile {{ $option }}">
        <div class="col-md-7">
            @include('user.profile.'.$option)
        </div>
        <div class="col-md-5">
            @include('user.profile.competences')
        </div>
    </div>

@stop