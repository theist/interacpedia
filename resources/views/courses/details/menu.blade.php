<div class="container-fluid challenge-submenu" id="section-submenu">
    <div class="container">
        <ul class="nav nav-pills">
            <?php $i=0;?>
            @foreach($items as $tag=>$item)
                @if($i>0)
                    <li class="divider"></li>
                @endif
                <li role="presentation" class="{{ ($active==$tag)?"active":"" }}"><a href="{{ $item['link'] }}">{{ $item['label'] }}</a></li>
                <?php $i++?>
            @endforeach
            @if( Auth::check() && Auth::user()->admin )
                <div class="pull-right">
                    {!! Form::open(array('route' => array('courses.destroy', $course->id), 'method' => 'delete')) !!}
                    <a class="btn" href="{{ action('CoursesController@edit',[$course->id]) }}">@lang('courses/forms.edit')</a>
                    <input  id="deleteCourse" type="submit" class="btn btn-purple" value="@lang('courses/forms.delete')">
                    {!! Form::close() !!}
                </div>
            @endif
        </ul>
    </div>
</div>

@section('footer')
    @parent
    <script>
        $('#deleteCourse').on('click',function(){
            return confirm('¿Estás seguro que quieres eliminar esta clase del sistema?');
        });
    </script>
@stop