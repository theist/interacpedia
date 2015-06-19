<div class="row group">
    <div class="col-md-12 title">{{ $group->name }} ({{ ($group->private) ?'privado':'público'}})
        @if($group->users->count() == 0)
            <small class="pull-right">
                <a class="delete-group" href="{{ route('groups.destroy', $group->id) }}"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></a>
            </small>
        @endif
    </div>
    @if($group->users->count() >0)
        @foreach($group->users as $us)
            <div class="col-md-12 name">{{ $us->name }}</div>
        @endforeach
    @else
        <div class="col-md-12 name">@lang('general/labels.without_users')</div>
    @endif
</div>
