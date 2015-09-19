<div class="row comment comment-{{ $comment->id }}">
    <div class="col-md-3 text-center">
        <img class="img-circle" height="80" src="{{ imagestyle($comment->user->avatar,'fit100x100grayscale') }}"
             alt="{{ $comment->user->name }}"/><br/>
    </div>
    <div class="col-md-9">
        <div class="title">{{ $comment->title }}</div>
        <div class="author"><a href="/user/{{ $comment->user->id }}/info">
                {{ $comment->user->name }}
            </a></div>
        <div class="created">{{ $comment->created_at }}</div>
        <div class="text">{!! nl2br(e($comment->comment)) !!}</div>
        @can('delete-comment', $comment)
        {!! Form::open(array('route' => array('comments.destroy', $comment->id),'class'=>'delete-comment', 'method' => 'delete'))!!}
        <input type="submit" class="btn btn-danger btn-xs deleteComment" value="@lang('general/labels.delete')">
        {!! Form::close() !!}
        @endcan
        <hr/>
    </div>
</div>