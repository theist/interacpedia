<div class="row group">
    <div class="col-md-12 title">{{ $group->name }} ({{ ($group->private) ?'privado':'público'}})
        @if($group->users->count() == 0)
            <small class="pull-right">
                {!! Form::open(array('route' => array('groups.destroy', $group->id),'class'=>'deletegroup-form', 'method' => 'delete'))!!}
                <a class="deleteGroup delete-group"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></a>
                {!! Form::close() !!}
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
    <div class="col-md-12 text-center">
        <button class="btn btn-purple btn-xs" data-toggle="modal" data-groupid="{{ $group->id }}" data-target="#addUser">@lang('general/labels.add')</button>
    </div>
</div>
