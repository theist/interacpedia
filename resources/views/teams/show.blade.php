@extends('app')

@section('title')
    {{ $team->name }} # {{ $team->id }}
    @parent
@stop

@section('section-profile')
    @include('partials.course',['course'=>$team->course])
@stop

@section('section-submenu')
    @can('view-teamdetails', $team)
        <?php
        $items = [
                'info' => [ 'label' => 'Info', 'link' => '/teams/' . $team->id . '/info' ],
                'brief' => [ 'label' => 'Brief', 'link' => '/teams/' . $team->id . '/brief' ],
                'docs' => [ 'label' => 'Documentos', 'link' => '/teams/' . $team->id . '/docs' ],
                'comments' => [ 'label' => 'Comentarios', 'link' => '/teams/' . $team->id . '/comments' ]
        ];
        ?>
    @else
        <?php
        $items = [
                'info' => [ 'label' => 'Info', 'link' => '/teams/' . $team->id . '/info' ]
        ];
        ?>
    @endcan
    @include('teams.details.menu',['items'=>$items,
                                    'active'=>$option,
                                    'team'=>$team
                                ])
@stop
@section('content')
    <div class="row team-details{{ $option }}">
        @include('teams.details.'.$option,['team'=>$team,'brief'=>$brief])
    </div>
@stop