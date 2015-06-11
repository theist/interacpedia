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
                                            'projects'=>['label'=>'Proyectos','link'=>'/user/'.$user->id.'/projects']
                                            ],
                                    'active'=>''
                                ])
@stop

@section('content')
    <div class="row user-profile">
        @foreach($companies as $company)
            <div class="area">{{ $company->name }}</div>
        @endforeach
            <a class="btn btn-purple" href="{{ action('CompanyController@create') }}">Crear Nueva Empresa</a>
    </div>

@stop
