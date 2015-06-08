<div class="container">
    <div class="row profile">
        <div class="col-md-6">
            <div class="col-md-3">
                <div class="image">
                    <img class="img-circle" src="{{ imagestyle($user->avatar,'fit100x100') }}" alt="{{ $user->name }}"/>
                </div>
            </div>
            <div class="col-md-9">
                <div class="name">
                    {{ $user->name }}
                </div>
                <div class="location">
                    <img class="" src="/images/icons/flags/co.png" alt="Colombia"/>
                    @if($user->city)
                        {{ $cities[$user->city] }}, Colombia <br/>
                    @endif
                    Universidad: Sin especificar
                </div>
            </div>
        </div>
        <div class="col-md-6 text-right">
            <div class="social">
                <br/>
                0 @lang('user/profile.followers') / 0 @lang('user/profile.following')<br/>
                <a class="btn" href="">@lang('user/profile.follow')</a>
                <a class="btn btn-darkblue" href="">@lang('user/profile.contact')</a>
            </div>
        </div>
    </div>

</div>