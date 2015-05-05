<a href="{{ action('PartnersController@show',[$partner->id]) }}">
    <img class="img-responsive center-block" src="{{ imagestyle($partner->image,'fit200x100') }}" alt="{{ $partner->name }}"/>
</a>

