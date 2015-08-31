<div class="container-fluid challenge-submenu" id="section-submenu">
    <div class="container">
        <ul class="nav nav-pills">
            <?php $i = 0;?>
            @foreach($items as $tag=>$item)
                @if($i>0)
                    <li class="divider"></li>
                @endif
                <li role="presentation" class="{{ ($active==$tag)?"active":"" }}"><a
                            href="{{ $item['link'] }}">{{ $item['label'] }}</a></li>
                <?php $i ++?>
            @endforeach
            <div class="pull-right">
                {!! Form::open(array('route' => array('challenges.destroy', $challenge->id), 'method' => 'delete')) !!}
                @can('update-challenge', $challenge)
                <a class="btn"
                   href="{{ action('ChallengesController@edit',[$challenge->id]) }}">@lang('challenges/forms.edit')</a>
                @endcan
                @can('delete-challenge', $challenge)
                <input id="deleteChallenge" type="submit" class="btn btn-purple"
                       value="@lang('challenges/forms.delete')">
                @endcan
                {!! Form::close() !!}
            </div>
        </ul>
    </div>
</div>

@section('footer')
    @parent
    <script>
        $('#deleteChallenge').on('click', function () {
            return confirm('¿Estás seguro que quieres eliminar este reto del sistema?');
        });
    </script>
@stop