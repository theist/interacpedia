<?php if(!isset($counter))$counter = true;?>
<div class="text-center row">
    @if( $counter )
    <div class="col-md-5 text-right">
        <div class="count">{{ $model->follows->count() }}</div>
        <small>{{ trans_choice('general/labels.followers', $model->follows->count() ) }}</small>
    </div>
    @endif
    <div class="col-md-{{ ($counter)?'7':'12' }} text-left">
        @if($follow = $model->follows->where('user_id',Auth::user()->id)->first())
            @include('follows.button_on',['follow'=>$follow,'counter'=>$counter])
        @else
            @include('follows.button_off',['model'=>$model,'counter'=>$counter])
        @endif
    </div>
</div>
@section('footer')
    @parent
    <script>
        $(function () {
            function follows(){
                $('#follows-form .submit').on('click', function (e) {
                    e.preventDefault();
                    $.post(
                            $('#follows-form').prop('action'),
                            {
                                "_token": $('#follows-form').find('input[name=_token]').val(),
                                "model_id": $('#model_id').val(),
                                "model_type": $('#model_type').val(),
                                "counter": {{ ($counter)?1:0 }}
                            },
                            function (data) {
                                if (data.fail) {
                                } else {
                                    $("#model-follows").html(data);
                                    follows();
                                }
                            }
                    );
                    return false;
                });
                $('#delete-follow .submit').on('click', function (e) {
                    e.preventDefault();
                    $.ajax({
                                url: $('#delete-follow').prop('action'),
                                type: 'DELETE',
                                data: {
                                    "_token": $('#delete-follow').find('input[name=_token]').val(),
                                    "counter": {{ ($counter)?1:0 }}
                                },
                                success: function (data) {
                                    if (data.fail) {
                                    } else {
                                        $("#model-follows").html(data);
                                        follows();
                                    }
                                }
                            }
                    );
                    return false;
                });
            }
            follows();
        })
    </script>
@stop