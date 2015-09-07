
<div class="user-profile">
    <div class="row">
        <div class="col-md-2">
            @include('messages.add',['suffix'=>'1'])
        </div>
        <div class="col-md-10 text-right">
            {!! $messages->render() !!}
        </div>
    </div>
    @foreach($messages as $message)
        <?php if ( $message->message_id ) continue; ?>
        <div class="row area message">
            <div class="col-md-2">
                <a href="/user/{{ $message->from->id }}/info"><img height="30" class="img-circle"
                                                                   src="{{ imagestyle($message->from->avatar,'fit100x100') }}"
                                                                   alt="{{ $message->from->name }}"/></a>
            </div>
            <div class="col-md-4">
                <div><strong>De:</strong> {{ $message->from->name }}</div>
                <div class="created">{{ $message->created_at }}</div>
            </div>
            <div class="col-md-6">
                <div><strong>Para:</strong> {{ $message->to->name }}</div>
                <div class="title">
                    @if($message->read == 0 && Auth::user()->id==$message->to->id)
                        <span class="label label-success">Nuevo!!</span>
                    @endif
                    <strong>Asunto:</strong> <a href="{{ action('MessagesController@show',[$message->id]) }}">{{ $message->title!=""?$message->title:"Sin Asunto" }}</a>
                </div>
                @foreach($message->messages as $msg)
                    <div class="row">
                        <div class="col-md-6"><strong>Respuesta:</strong> {{ $msg->from->name }}</div>
                        <div class="col-md-6">{{ $msg->created_at }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        <hr/>
    @endforeach
    <div class="row">
        <div class="col-md-2">
            @include('messages.add',['suffix'=>'2'])
        </div>
        <div class="col-md-10 text-right">
            {!! $messages->render() !!}
        </div>
    </div>
</div>


