<div class="row comment-create">
    @include('comments.create',['model'=>$model])
</div>
@foreach($comments as $comment)
    @include('comments.show',array('comment'=>$comment))
@endforeach