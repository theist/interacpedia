<div class="row story">
    <div class="col-md-4">
        <img class="img-responsive img-rounded" src="{{ imagestyle($story->image,'fit330x297') }}" alt="{{ $story->title }}"/>
    </div>
    <div class="col-md-8">
        <div class="title"><h4><a href="{{ action('StoriesController@show',[$story->id]) }}">{{ $story->title }}</a></h4></div>
        <div class="published">{{ $story->published }}</div>
        <div class="body">{{ $story->summary}}</div>
        <div class="links">
            <a class="button btn btn-purple" href="">Learn more</a>
            <a class="button btn btn-purple" href="">See all stories</a>
            <a class="button btn btn-purple" href="">Share this story</a>
        </div>
    </div>
</div>
