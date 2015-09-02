<div class="user-profile">
    <div class="area">
        @foreach($user->notifications as $notification)
            <div class="notification row">
                <div class="col-md-5">
                    @if($notification->read == 0)
                        <span class="label label-success">Nuevo!!</span>
                        <?php $notification->read = 1;$notification->save();?>
                    @endif
                    <div class="content">{!! $notification->message !!}</div>
                </div>
                <div class="col-md-5">
                    <div class="created">{{ $notification->created_at }}</div>
                </div>
                <div class="col-md-2">
                    @if($notification->type=="message")
                        <a href="{{ action('MessagesController@show',[$notification->model_id]) }}">@lang('general/labels.see_message')</a>
                    @elseif($notification->type=="comment")
                        <?php $comment = \App\Interacpedia\Comment::findOrNew($notification->model_id);?>
                        <a href="{{ url('teams/'.$comment->model_id.'/comments') }}">@lang('general/labels.see_comment')</a>
                    @endif
                </div>
            </div>
            <hr/>
        @endforeach
    </div>
</div>
