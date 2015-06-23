<div class="container-fluid" id="section-submenu">
    <div class="container">
        <ul class="nav nav-pills">
            <?php $i=0;?>
            @foreach($items as $tag=>$item)
                @if($i>0)
                    <li class="divider"></li>
                @endif
                <li role="presentation" class="{{ ($active==$tag)?"active":"" }}"><a href="{{ $item['link'] }}">{{ $item['label'] }}</a></li>
                <?php $i++?>
            @endforeach
                @if($user->id == Auth::user()->id)
                    <li class="divider"></li>
                    <li class="btn btn-purple"><a href="/user/{{ $user->id }}/companies">@lang('general/labels.manage') @lang('general/labels.companies')</a></li>
                    <li class="btn"><a href="/user/{{ $user->id }}/edit">@lang('general/labels.edit') @lang('general/labels.my_profile')</a></li>
                @endif

        </ul>

    </div>
</div>