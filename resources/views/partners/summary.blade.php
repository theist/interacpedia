<a href="{{ action('PartnersController@show',[$partner->id]) }}">
    <img class="img-responsive center-block" src="{{ imagestyle($partner->logo,'fit200x100') }}" alt="{{ $partner->name }}"/>
</a>

