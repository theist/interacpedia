<div class="row comment comment-{{ $comment->id }}">
    <div class="col-md-3 text-center">
        <img class="img-circle" height="80" src="{{ imagestyle($comment->user->avatar,'fit100x100grayscale') }}"
             alt="{{ $comment->user->name }}"/><br/>
    </div>
    <div class="col-md-9">
        <div class="title">{{ $comment->title }}</div>
        <div class="author">{{ $comment->user->name }}</div>
        <div class="created">{{ $comment->created_at }}</div>
        <div class="text">{!! $comment->comment !!}</div>
        @if(Auth::user()->id == $comment->user->id)
            {!! Form::open(array('route' => array('comments.destroy', $comment->id),'class'=>'delete-comment', 'method' => 'delete'))!!}
            <input  type="submit" class="btn btn-danger btn-xs deleteComment" value="@lang('general/labels.delete')">
            {!! Form::close() !!}
        @endif
        <hr/>
    </div>
</div>