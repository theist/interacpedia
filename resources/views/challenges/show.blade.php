@extends('app')

@section('title')
    {{ $challenge->name }}
    @parent
@stop

@section('section-profile')
    @include('partials.challenge',['challenge'=>$challenge])
@stop

@section('meta')
    <meta property="og:title" content="{{ $challenge->name }}"/>
    <meta property="og:url" content="http://www.interacpedia.com/challenges/{{ $challenge->id }}"/>
    <meta property="og:description" content="{{ $challenge->description }}"/>
    <meta property="fb:app_id" content="1579172622347450"/>
    <meta property="og:image" content="http://www.interacpedia.com{{ imagestyle($challenge->image,'scale200x200') }}"/>
    <meta property="og:image:width" content="200"/>
    <meta property="og:image:height" content="200"/>
    @parent
@stop

@section('section-submenu')
    @if ( Auth::check() && Auth::user()->inChallenge($challenge->id) )
        @include('challenges.details.menu',['items'=>[
                                                'info'=>['label'=>'Info','link'=>'/challenges/'. $challenge->id .'/info'],
                                                'participants'=>['label'=>'Participantes','link'=>'/challenges/'. $challenge->id .'/participants'],
                                                'documents'=>['label'=>'Documentos','link'=>'/challenges/'.$challenge->id.'/docs'],
                                                'comments'=>['label'=>'Comentarios','link'=>'/challenges/'.$challenge->id.'/comments']
                                                ],
                                        'active'=>$option
                                    ])
    @else
        @include('challenges.details.menu',['items'=>[
                                                'info'=>['label'=>'Info','link'=>'/challenges/'. $challenge->id .'/info'],
                                                'participants'=>['label'=>'Participantes','link'=>'/challenges/'. $challenge->id .'/participants'],
                                                'comments'=>['label'=>'Comentarios','link'=>'/challenges/'.$challenge->id.'/comments']
                                                ],
                                        'active'=>$option
                                    ])
    @endif

@stop


@section('content')
    <div class="row challenge-details{{ $option }}">
        @include('challenges.details.'.$option,['challenge'=>$challenge,'teams'=>$teams])
    </div>
@stop

@section('footer')
    @parent
    <script>
        $(document).delegate('*[data-toggle="lightbox"]', 'click', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                always_show_close: true,
                left_arrow_class: 'fa fa-chevron-left glyphicon-chevron-left',
                right_arrow_class: 'fa fa-chevron-right glyphicon-chevron-right'
            });
        });
    </script>
@stop