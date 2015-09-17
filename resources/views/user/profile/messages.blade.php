
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
                <div><strong>De:</strong> <a href="/user/{{ $message->from->id }}/info">{{ $message->from->name }}</a></div>
                <div class="created">{{ $message->created_at }}</div>
            </div>
            <div class="col-md-6">
                @if($message->to)
                    <div><strong>Para:</strong> <a href="/user/{{ $message->to->id }}/info">{{ $message->to->name }}</a></div>
                    <div class="title">
                        @if($message->read == 0 && Auth::user()->id==$message->to->id)
                            <span class="label label-success">Nuevo!!</span>
                        @endif
                        <strong>Asunto:</strong> <a href="{{ action('MessagesController@show',[$message->id]) }}">{{ $message->title!=""?$message->title:"Sin Asunto" }}</a>
                    </div>
                @endif

                @foreach($message->messages as $msg)
                    <div class="row">
                        <div class="col-md-6"><strong>Respuesta:</strong> <a href="/user/{{ $msg->from->id }}/info">{{ $msg->from->name }}</a></div>
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

@section('scripts')
    <script src="/js/selectize.js"></script>
    <script>
        $(function() {
            var REGEX_EMAIL = '([a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*@' +
                    '(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)';

            $(".selectize").selectize({
                persist: false,
                valueField: 'id',
                labelField: 'name',
                searchField: ['name', 'email'],
                options: [
                        @if(isset($users))
                        @foreach($users as $us)
                        {id:{{ $us->id }}, email: '{{ $us->email }}', name: '{{ $us->name }}'},
                    @endforeach
                    @endif
            ],
                render: {
                    item: function(item, escape) {
                        return '<div>' +
                                (item.name ? '<span class="name">' + escape(item.name) + '</span>' : '')  +
                                '</div>';
                    },
                    option: function(item, escape) {
                        var label = item.name || item.email;
                        var caption = item.name ? item.email : null;
                        return '<div>' +
                                '<span class="name">' + escape(label) + '</span>' +
                                (caption ? '<span class="caption">' + escape(caption) + '</span>' : '') +
                                '</div>';
                    }
                },
                createFilter: function(input) {
                    var match, regex;

                    // email@address.com
                    regex = new RegExp('^' + REGEX_EMAIL + '$', 'i');
                    match = input.match(regex);
                    if (match) return !this.options.hasOwnProperty(match[0]);

                    // name <email@address.com>
                    regex = new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i');
                    match = input.match(regex);
                    if (match) return !this.options.hasOwnProperty(match[2]);

                    return false;
                },
                create: function(input) {
                    if ((new RegExp('^' + REGEX_EMAIL + '$', 'i')).test(input)) {
                        return {email: input};
                    }
                    var match = input.match(new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i'));
                    if (match) {
                        return {
                            email : match[2],
                            name  : $.trim(match[1])
                        };
                    }
                    alert('Invalid email address.');
                    return false;
                }
            });
            $('.maxlength').maxlength({
                alwaysShow: true,
                warningClass: "label label-success",
                limitReachedClass: "label label-danger",
                appendToParent: true,
                placement: "bottom-right"
            });
        });

    </script>
@stop
