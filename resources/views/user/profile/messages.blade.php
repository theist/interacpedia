<div class="user-profile">
    @foreach($user->allmessages() as $message)
        <div class="row area message">
            <div class="col-md-2">
                <a href="/user/{{ $message->from->id }}/info"><img class="img-circle"
                                                                   src="{{ imagestyle($message->from->avatar,'fit100x100') }}"
                                                                   alt="{{ $message->from->name }}"/></a>
            </div>
            <div class="col-md-4">
                <div><strong>De:</strong> {{ $message->from->name }}</div>
                <div class="created">{{ $message->created_at }}</div>
            </div>
            <div class="col-md-6">
                <div class="title"><strong>Asunto:</strong> {{ $message->title }}</div>
                <div class="content">{{ $message->content }}</div>
            </div>
        </div>
        @foreach($message->messages as $msg)
            <div class="row area message">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-4">
                    <div><strong>De:</strong> {{ $msg->from->name }}</div>
                    <div class="created">{{ $msg->created_at }}</div>
                </div>
                <div class="col-md-6">
                    <div class="title"><strong>Asunto:</strong> {{ $msg->title }}</div>
                    <div class="content">{{ $msg->content }}</div>
                </div>

            </div>

        @endforeach

        <hr/>
    @endforeach
</div>
@include('messages.add')
