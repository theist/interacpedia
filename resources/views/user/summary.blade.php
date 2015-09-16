<div class="content raised">
    <div class="row">
        <div class="col-md-3">
            <div class="image">
                <a href="{{ action('UserController@show',[$user->id]) }}">
                    <img class="img-circle img-responsive" height="80"
                         src="{{ imagestyle($user->avatar,'fit100x100') }}"
                         alt="{{ $user->name }}"/>
                </a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="fields row">
                <div class="col-md-12 title"><h4><a
                                href="{{ action('UserController@show',[$user->id]) }}">{{ $user->name }}</a></h4></div>
                <div class="col-md-12 email">{{ $user->email}}</div>
                @if($user->completed())
                    <div class="col-md-2 badgein">
                        <img src="/images/badges/perfil_ok.png"
                             alt="Este usuario completó su perfil!"
                             class="img-responsive" data-toggle="tooltip" data-placement="bottom"
                             title="Este usuario completó su perfil!">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@section('footer')
    @parent
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop