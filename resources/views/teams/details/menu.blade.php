<div class="container-fluid challenge-submenu" id="section-submenu">
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
                <a class="btn back" href="/courses/{{ $team->course->id }}/teams">@lang('general/labels.return_to_course')</a>
        </ul>
    </div>
</div>
