@extends('app')

@section('title')
    {{ $event->title }}
    @parent
@stop

@section('section-profile')
    @include('partials.event',['event'=>$event])
@stop

@section('section-submenu')
    @can('view-eventdetails', $event)
        <?php
        $items = [
                'info' => [ 'label' => 'Asistentes', 'link' => '/events/' . $event->id . '/info' ],
                'gallery' => [ 'label' => 'Galería', 'link' => '/events/' . $event->id . '/gallery' ],
                'comments' => [ 'label' => 'Comentarios', 'link' => '/events/' . $event->id . '/comments' ]
        ];
        ?>
    @else
        <?php
        $items = [
                'info' => [ 'label' => 'Asistentes', 'link' => '/events/' . $event->id . '/info' ]
        ];
        ?>
    @endcan
    @include('events.details.menu',['items'=>$items,
                                    'active'=>$option,
                                    'event'=>$event
                                ])
@stop
@section('content')
    <div class="row event-details{{ $option }}">
        @include('events.details.'.$option,['event'=>$event])
    </div>
@stop
@section('footer')
    @parent
    <script>
        $(document).delegate('*[data-toggle="lightbox"]', 'click', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
@stop