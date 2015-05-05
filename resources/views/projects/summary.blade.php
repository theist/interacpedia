<div>
    <h2><a href="{{ action('ProjectsController@show',[$project->id]) }}">{{ $project->name }}</a></h2>
    <div class="body">{{ $project->description}}</div>
</div>
