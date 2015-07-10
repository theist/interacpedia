<?php if ( !isset( $counter ) ) $counter = true; ?>
<?php if ( !isset( $format ) ) $format = 'horizontal'; ?>
<?php if ( !isset( $formid_suffix ) ) $formid_suffix = ""; ?>
<div class="text-center row">
    @if( $counter )
        <div class="col-md-{{ ($format=='horizontal')?'5':'12' }} text-center">
            <div class="count">{{ $model->likes->count() }}</div>
            <small>@lang('general/labels.likes')</small>
        </div>
    @endif
        @if(Auth::check())
            <div class="col-md-{{ ($counter && $format=='horizontal')?'7':'12' }} text-center">
                @if($like = $model->likes->where('user_id',Auth::user()->id)->first())
                    @include('likes.button_on',['like'=>$like,'counter'=>$counter,'formid_suffix'=>$formid_suffix])
                @else
                    @include('likes.button_off',['model'=>$model,'counter'=>$counter,'formid_suffix'=>$formid_suffix])
                @endif
            </div>
        @else
            <div class="col-md-{{ ($counter && $format=='horizontal')?'7':'12' }} text-center">
                <a class="btn btn-fixed-blue" href="/challenges/{{ $model->id }}"><i class="fa fa-thumbs-o-up"></i> @lang('general/labels.like')</a>
            </div>
        @endif
</div>
@section('footer')
    @parent
    <script>
        $(function () {
            function likes{{ $formid_suffix }}(){
                $('#likes-form{{ $formid_suffix }} .submit').on('click', function (e) {
                    e.preventDefault();
                    $.post(
                            $('#likes-form{{ $formid_suffix }}').prop('action'),
                            {
                                "_token": $('#likes-form{{ $formid_suffix }}').find('input[name=_token]').val(),
                                "model_id": $('#model_id{{ $formid_suffix }}').val(),
                                "model_type": $('#model_type{{ $formid_suffix }}').val(),
                                "counter": {{ ($counter)?1:0 }},
                                "format": '{{ ($format) }}',
                                "formid_suffix": '{{ $formid_suffix }}'
                            },
                            function (data) {
                                if (data.fail) {
                                } else {
                                    $("#model-likes{{ $formid_suffix }}").html(data);
                                    likes{{ $formid_suffix }}();
                                }
                            }
                    );
                    return false;
                });
                $('#delete-like{{ $formid_suffix }} .submit').on('click', function (e) {
                    e.preventDefault();
                    $.ajax({
                                url: $('#delete-like{{ $formid_suffix }}').prop('action'),
                                type: 'DELETE',
                                data: {
                                    "_token": $('#delete-like{{ $formid_suffix }}').find('input[name=_token]').val(),
                                    "counter": {{ ($counter)?1:0 }},
                                    "format": '{{ ($format) }}',
                                    "formid_suffix": '{{ $formid_suffix }}'
                                },
                                success: function (data) {
                                    if (data.fail) {
                                    } else {
                                        $("#model-likes{{ $formid_suffix }}").html(data);
                                        likes{{ $formid_suffix }}();
                                    }
                                }
                            }
                    );
                    return false;
                });
            }
            likes{{ $formid_suffix }}();
        })
    </script>
@stop