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
            <div class="area">
                {{ $company->name }}<br/>
                <a class="btn" href="{{ action('CompaniesController@edit',['id'=>$company->id]) }}">@lang('general/labels.edit')</a>
            </div>
        @endforeach
            <a class="btn btn-purple" href="{{ action('CompaniesController@create') }}">@lang('general/labels.create') @lang('general/labels.company')</a>
    </div>

@stop
