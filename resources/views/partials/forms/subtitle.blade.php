<div class="subtitle row">
    <div class="col-sm-{{ $col or "2" }} text-center"><img src="/images/icons/32x32/{{ $image }}.png"
                                           alt="@lang($title)"/></div>
    <div class="col-sm-{{ isset($col)?(12-$col):"10"}} text-left text">@lang($title)
        @if($optional)
            <small>@lang('general/labels.optional')</small>
        @endif
    </div>
</div>
