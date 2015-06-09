<div class="user">
    <img class="img-circle" height="80" src="{{ imagestyle($user->avatar,'fit100x100') }}"
         alt="{{ $user->name }}"/><br/>
    <div class="contact">@lang('general/labels.contact')</div>
    <div class="username">{{ $user->name }}</div>
    <div class="career">{{ $user->occupation()->career->name or "-" }}</div>
    <div class="website">http://</div>
    @if($links)
    <div class="row links">
        <div class="col-md-6"><a href="">@lang('challenges/forms.full_bio')</a></div>
        <div class="col-md-6"><a href="">@lang('general/labels.contact')</a></div>
    </div>
    @endif
</div>