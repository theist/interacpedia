<h3>@lang('general/labels.posts')</h3>
@foreach($challenge->getPosts() as $post)
    <h4>{{ $post->title }}</h4>
    {!! $post->content !!}
@endforeach
