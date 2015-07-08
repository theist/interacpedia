<?php if(!isset($counter))$counter = true;?>
<?php if(!isset($formid_suffix))$formid_suffix = "";?>
<div class="text-center row">
    @if( $counter )
    <div class="col-md-5 text-right">
        <div class="count">{{ $model->follows->count() }}</div>
        <small>{{ trans_choice('general/labels.followers', $model->follows->count() ) }}</small>
    </div>
    @endif
    <div class="col-md-{{ ($counter)?'7':'12' }} text-left">
        @if($follow = $model->follows->where('user_id',Auth::user()->id)->first())
            @include('follows.button_on',['follow'=>$follow,'counter'=>$counter,'formid_suffix'=>$formid_suffix])
        @else
            @include('follows.button_off',['model'=>$model,'counter'=>$counter,'formid_suffix'=>$formid_suffix])
        @endif
    </div>
</div>
@section('footer')
    @parent
    <script>
        $(function () {
            function follows{{ $formid_suffix }}(){
                $('#follows-form{{ $formid_suffix }} .submit').on('click', function (e) {
                    e.preventDefault();
                    $.post(
                            $('#follows-form{{ $formid_suffix }}').prop('action'),
                            {
                                "_token": $('#follows-form{{ $formid_suffix }}').find('input[name=_token]').val(),
                                "model_id": $('#model_id').val(),
                                "model_type": $('#model_type').val(),
                                "counter": {{ ($counter)?1:0 }},
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