<div class="post row">
    <div class="col-md-12">
        <h5>{{ $post->title }}</h5>
        {!! str_limit( strip_tags($post->content,"<img>"),400) !!}
        <hr/>
    </div>
</div>