<?php
$content = str_limit( strip_tags($post->content,"<img>"),400);
$content = str_replace('<img','<img class="img-responsive img-thumbnail"', $content);
?>
<div class="post row">
    <div class="col-md-12">
        <h5>{{ $post->title }}</h5>
        {!! $content !!}
        <hr/>
    </div>
</div>