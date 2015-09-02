<?php if(!isset($label))$label = "Contacto Interacpedia";?>
<div class="user">
    <img class="img-circle" height="80" src="{{ imagestyle($user->avatar,'fit100x100') }}"
         alt="{{ $user->name }}"/><br/>
    <div class="contact">{{ $label }}</div>
    <div class="username">{{ $user->name }}</div>
    <div class="career">{{ $user->occupation()->career->name or "-" }}</div>
    @if($links)
    <div class="row links">
        <div class="col-md-6">
            @include('messages.add',['from'=>Auth::user()->id,'to'=>$user->id,'suffix'=>'_int_'.$user->id,'label'=> Lang::get('general/labels.contact')])
            <a href="/user/{{ $user->id }}">@lang('challenges/forms.full_bio')</a>
        </div>
        <div class="col-md-6"></div>

    </div>
    @endif
</div>