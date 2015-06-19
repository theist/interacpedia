<div class="row group">
    <div class="col-md-12 title">{{ $group->name }} ({{ ($group->private) ?'privado':'público'}})</div>
    @foreach($group->users as $us)
        <div class="col-md-12 name">{{ $us->name }}</div>
    @endforeach
</div>
