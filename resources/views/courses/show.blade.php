@extends('app')

@section('title')
    {{ $course->name }}
    @parent
@stop

@section('section-profile')
    @include('partials.course',['course'=>$course])
@stop

@section('meta')
    <meta property="og:title" content="{{ $course->name }}"/>
    <meta property="og:url" content="http://www.interacpedia.com/challenges/{{ $course->id }}"/>
    <meta property="og:description" content="{{ $course->name }}"/>
    <meta property="fb:app_id" content="1579172622347450"/>
    <meta property="og:image"
          content="http://www.interacpedia.com{{ imagestyle('/images/courses/generic1.jpg','scale200x200') }}"/>
    <meta property="og:image:width" content="200"/>
    <meta property="og:image:height" content="200"/>
    @parent
@stop

@section('section-submenu')
    @can('view-coursedetails', $course)
        @include('courses.details.menu',['items'=>[
                                        'info' => [ 'label' => 'Info', 'link' => '/courses/' . $course->id . '/info' ],
                                        'teams' => [ 'label' => 'Equipos', 'link' => '/courses/' . $course->id . '/teams' ],
                                        'blog' => [ 'label' => 'Blog', 'link' => '/courses/' . $course->id . '/blog' ]],
                                'active'=>$option
                            ])
    @else
        @include('courses.details.menu',['items'=>[
                                        'info' => [ 'label' => 'Info', 'link' => '/courses/' . $course->id . '/info' ],
                                        'teams' => [ 'label' => 'Equipos', 'link' => '/courses/' . $course->id . '/teams' ]
                                        ],
                                'active'=>$option
                            ])
    @endcan
@stop


@section('content')
    <div class="row course-details{{ $option }}">
        @include('courses.details.'.$option,['course'=>$course,'challenges'=>$challenges,'students'=>$students,'teams'=>$teams])
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