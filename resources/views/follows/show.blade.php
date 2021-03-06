<?php if ( !isset( $counter ) ) $counter = true; ?>
<?php if ( !isset( $format ) ) $format = 'horizontal'; ?>
<?php if ( !isset( $formid_suffix ) ) $formid_suffix = ""; ?>
<div class="text-center row">
    @if( $counter )
        <div class="col-md-{{ ($format=='horizontal')?'5':'12' }} text-center">
            <div class="count">{{ $model->follows->count() }}</div>
            <small>{{ trans_choice('general/labels.followers', $model->follows->count() ) }}</small>
        </div>
    @endif
    @if(Auth::check())
        <div class="col-md-{{ ($counter && $format=='horizontal')?'7':'12' }} text-center">
            @if($follow = $model->follows->where('user_id',Auth::user()->id)->first())
                @include('follows.button_on',['follow'=>$follow,'counter'=>$counter,'formid_suffix'=>$formid_suffix])
            @else
                @include('follows.button_off',['model'=>$model,'counter'=>$counter,'formid_suffix'=>$formid_suffix])
            @endif
        </div>
    @else
        <div class="col-md-{{ ($counter && $format=='horizontal')?'7':'12' }} text-center">
            <?php $class = strtolower(get_class($model)) ?>
            <a class="btn btn-fixed-purple" href="/{{ str_replace('app\\interacpedia\\','',$class) }}s/{{ $model->id }}"><i class="fa fa-share"></i> @lang('general/labels.follow')</a>
        </div>
    @endif
</div>
@section('footer')
    @parent
    <script>
        $(function () {
            function follows{{ $formid_suffix }}() {
                $('#follows-form{{ $formid_suffix }} .submit').on('click', function (e) {
                    e.preventDefault();
                    $.post(
                            $('#follows-form{{ $formid_suffix }}').prop('action'),
                            {
                                "_token": $('#follows-form{{ $formid_suffix }}').find('input[name=_token]').val(),
                                "model_id": $('#model_id{{ $formid_suffix }}').val(),
                                "model_type": $('#model_type{{ $formid_suffix }}').val(),
                                "counter": {{ ($counter)?1:0 }},
                                "format": '{{ ($format) }}',
                                "formid_suffix": '{{ $formid_suffix }}'
                            },
                            function (data) {
                                if (data.fail) {
                                } else {
                                    $("#model-follows{{ $formid_suffix }}").html(data);
                                    follows{{ $formid_suffix }}();
                                }
                            }
                    );
                    return false;
                });
                $('#delete-follow{{ $formid_suffix }} .submit').on('click', function (e) {
                    e.preventDefault();
                    $.ajax({
                                url: $('#delete-follow{{ $formid_suffix }}').prop('action'),
                                type: 'DELETE',
                                data: {
                                    "_token": $('#delete-follow{{ $formid_suffix }}').find('input[name=_token]').val(),
                                    "counter": {{ ($counter)?1:0 }},
                                    "format": '{{ ($format) }}',
                                    "formid_suffix": '{{ $formid_suffix }}'
                                },
                                success: function (data) {
                                    if (data.fail) {
                                    } else {
                                        $("#model-follows{{ $formid_suffix }}").html(data);
                                        follows{{ $formid_suffix }}();
                                    }
                                }
                            }
                    );
                    return false;
                });
            }

            follows{{ $formid_suffix }}();
        })
    </script>
@stop