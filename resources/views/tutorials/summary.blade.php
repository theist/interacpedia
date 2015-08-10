<div class="content raised">
    <div class="image">
        <a href="{{ action('TutorialsController@show',[$tutorial->id]) }}">
            <img class="img-responsive" src="{{ imagestyle($tutorial->image,'fit270x214') }}"
                 alt="{{ $tutorial->title }}"/>
        </a>
    </div>
    <div class="fields">
        <div class="title"><h4><a href="{{ action('TutorialsController@show',[$tutorial->id]) }}">{{ $tutorial->title }}</a></h4></div>
        <div class="body">
            {{ $tutorial->description }}
        </div>
    </div>
</div>
