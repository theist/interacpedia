<div class="post row">
    <div class="col-md-12">
        <h5>{{ $post->title }}</h5>
        <a target="_blank" href="{{ $post->url }}">{{ $post->url }}</a>
        <div class="author"><strong>@lang('general/labels.by'):</strong> {{ $post->author->displayName }}</div>
        <div class="date"><strong>@lang('general/labels.published'):</strong> {{ $post->published }}</div>
        <div class="comments"><strong>@lang('general/labels.comments'):</strong> {{ $post->replies->totalItems }}</div>
        <hr/>
    </div>
</div>