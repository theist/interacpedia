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
                <div class="subtitle">{{ $user->email}}</div>
            </div>
        </div>
    </div>
</div>
