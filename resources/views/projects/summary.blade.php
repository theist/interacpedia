<div class="content">
    <div class="image"><img class="img-responsive" src="{{ imagestyle($project->image,'fit330x297') }}"
                            alt="{{ $project->name }}"/></div>
    <div class="fields">
        <div class="title"><h4><a href="{{ action('ProjectsController@show',[$project->id]) }}">{{ $project->name }}</a>
            </h4></div>
        <div class="body">{{ $project->description}}</div>
        <div class="more-link"><a href="{{ action('ProjectsController@show',[$project->id]) }}">Read more +</a></div>
        <div class="links">
            <a class="button btn " href="">Like</a>
            <a class="button btn " href="">Share</a>
            <a class="button btn " href="">Participate</a>
        </div>
    </div>
</div>
