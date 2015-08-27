@extends('app')

@section('title')
    {{ $team->name }} # {{ $team->id }}
    @parent
@stop

@section('section-profile')
    @include('partials.course',['course'=>$team->course])
@stop

@section('section-submenu')
    <?php
    if ( Auth::check()
            && ( $team->users->contains( function ( $key, $value )
                    {
                        return $value->id == Auth::user()->id;
                    } )
                    || Auth::user()->id == $team->course->user->id
                    || Auth::user()->admin
            )
    )
    {
        $items = [
                'info' => [ 'label' => 'Info', 'link' => '/teams/' . $team->id . '/info' ],
                'brief' => [ 'label' => 'Brief', 'link' => '/teams/' . $team->id . '/brief' ],
                'docs' => [ 'label' => 'Documentos', 'link' => '/teams/' . $team->id . '/docs' ]
        ];
    } else
    {
        $items = [
                'info' => [ 'label' => 'Info', 'link' => '/teams/' . $team->id . '/info' ]
        ];
    }

    ?>
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