<div class="col-md-12">
    <input type="hidden" name="model_id" id="model_id" value="{{ $model->id }}"/>
    <input type="hidden" name="model_type" id="model_type" value="{{ get_class($model) }}"/>
    {!! Form::input('text','name',null,['id' => 'name', 'maxlength' => 30,
    'placeholder'=>Lang::get('general/labels.new_group'),'class' =>
    'form-control input-sm maxlength']) !!}
</div>
<div class="col-md-6" style="padding-top: 10px">
    <input type="checkbox" name="private" id="private"> @lang('general/labels.private')
</div>
<div class="col-md-6">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-purple btn-xs']) !!}
</div>
@section('footer')
    @parent
    <script>
        $(function () {
            $('.maxlength').maxlength({
                alwaysShow: true,
                warningClass: "label label-success",
                limitReachedClass: "label label-danger",
                appendToParent: true,
                placement: "bottom-right"
            });
            $('#groups-form').on('submit', function (e) {
                var priv;
                if ($('#private').is(':checked')) {
                    priv = 1;
                } else {
                    priv = 0;
                }

                e.preventDefault();
                $.post(
                        $(this).prop('action'),
                        {
                            "_token": $(this).find('input[name=_token]').val(),
                            "name": $('#name').val(),
                            "private": priv,
                            "model_id": $('#model_id').val(),
                            "model_type": $('#model_type').val()
                        },
                        function (data) {
                            if (data.fail) {
                                $(".group-create").after('Error');
                            } else {
                                var target = $(".group-create");
                                var newEl = $(data+'<hr>');
                                newEl.hide().insertBefore(target).slideDown('slow');
                                $("#name").val('');
                                $("#private").val(false);
                            }
                        }
                );
                return false;
            });
        })
    </script>
@stop