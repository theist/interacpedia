@foreach($groups as $group)
    @include('groups.show',array('group'=>$group))
    <hr/>
@endforeach
<div class="row group-create">
    @include('groups.create',['model'=>$model])
</div>
