<div class="content raised">
    <div class="image">
        <a href="{{ action('PartnersController@show',[$partner->id]) }}">
            <img class="img-responsive" src="{{ imagestyle($partner->image,'fit270x214') }}"
                 alt="{{ $partner->name }}"/>
        </a>
    </div>
    <div class="fields">
        <div class="title"><h4><a href="{{ action('PartnersController@show',[$partner->id]) }}">{{ $partner->name }}</a>
            </h4></div>
        <div class="body">{{ $partner->description }}</div>
        </div>
    </div>
</div>
