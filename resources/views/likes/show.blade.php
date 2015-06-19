<div class="text-center row">
    <div class="col-md-5 text-right">
        <div class="count">{{ $model->likes->count() }}</div>
        <small>@lang('general/labels.likes')</small>
    </div>
    <div class="col-md-7 text-left">
        @if($like = $model->likes->where('user_id',Auth::user()->id)->first())
            @include('likes.button_on',['like'=>$like])
        @else
            @include('likes.button_off',['model'=>$model])
        @endif
    </div>
</div>
@section('footer')
    @parent
    <script>
        $(function () {
            function likes(){
                $('#likes-form .submit').on('click', function (e) {
                    e.preventDefault();
                    $.post(
                            $('#likes-form').prop('action'),
                            {
                                "_token": $('#likes-form').find('input[name=_token]').val(),
                                "model_id": $('#model_id').val(),
                                "model_type": $('#model_type').val()
                            },
                            function (data) {
                                if (data.fail) {
                                } else {
                                    $("#model-likes").html(data);
                                    likes();
                                }
                            }
                    );
                    return false;
                });
                $('#delete-like .submit').on('click', function (e) {
                    e.preventDefault();
                    $.ajax({
                                url: $('#delete-like').prop('action'),
                                type: 'DELETE',
                                data: {
                                    "_token": $('#delete-like').find('input[name=_token]').val()
                                },
                                success: function (data) {
                                    if (data.fail) {
                                    } else {
                                        $("#model-likes").html(data);
                                        likes();
                                    }
                                }
                            }
                    );
                    return false;
                });
            }
            likes();
        })
    </script>
@stop