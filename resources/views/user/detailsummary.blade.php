<div class="content raised">
    <div class="row">
        <div class="col-md-3">
            <div class="image">
                <a href="{{ action('UserController@show',[$user->id]) }}">
                    <img class="img-circle" height="80" src="{{ imagestyle($user->avatar,'fit100x100') }}"
                         alt="{{ $user->name }}"/>
                </a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="fields">
                <div class="title"><h4><a href="{{ action('UserController@show',[$user->id]) }}">{{ $user->name }}</a></h4></div>
                <div class="email">{{ $user->email}}</div>
                <div class="data"><strong>@lang('general/labels.last_login'):</strong> {{ $user->lastLogin() }}</div>
                <div class="data"><strong>@lang('general/labels.comments'):</strong> {{ $user->comments->count() }}</div>
                <div class="data"><strong>{{ trans_choice('general/labels.messages',2) }} {{ trans_choice('general/labels.received',2) }} :</strong> {{ $user->messages->count() }}</div>
                <div class="data"><strong>{{ trans_choice('general/labels.messages',2) }} {{ trans_choice('general/labels.sent',2) }} :</strong> {{ $user->sentmessages->count() }}</div>
            </div>
        </div>
    </div>
</div>
