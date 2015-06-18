<div class="col-md-3">
    <blockquote class="blockquote-reverse help">
        Use este espacio para animar a los otros particpantes, hacer preguntas, responder las inquietudes de otros.
        <br/>Recuerda ser respetuoso con los demás.
    </blockquote>
</div>
<div class="col-md-9">
    <div class="form-group">
        {!! Form::input('text','title',null,['id' => 'title', 'maxlength' => 255,
        'placeholder'=>Lang::get('general/labels.write_title'),'class' =>
        'form-control maxlength']) !!}

    </div>
    <div class="form-group">
        {!! Form::textarea('comment', null, ['maxlength'=>400,'id'=>'comment','class' => 'form-control maxlength',
        'rows'=>5,
        'placeholder'=>Lang::get('general/labels.write_comment') . ' '
        .Lang::get('general/forms.in_chars',['chars'=>400])])
        !!}
    </div>
    <div class="form-group">
        <input type="hidden" name="model_id" id="model_id" value="{{ $model->id }}"/>
        <input type="hidden" name="model_type" id="model_type" value="{{ get_class($model) }}"/>
        {!! Form::submit($submitButtonText,['class' => 'btn btn-purple btn-big']) !!}
    </div>

</div>
@section('footer')
    @parent
    <script>
        $(function () {
            $('.select2').select2({
                placeholder: "Escoja una opción",
                allowClear: true,
                language: "es"
            });
            $('.maxlength').maxlength({
                alwaysShow: true,
                warningClass: "label label-success",
                limitReachedClass: "label label-danger",
                appendToParent: true,
                placement: "bottom-right"
            });
            $('#comments-form').on('submit', function (e) {
                e.preventDefault();
                $.post(
                        $(this).prop('action'),
                        {
                            "_token": $(this).find('input[name=_token]').val(),
                            "title": $('#title').val(),
                            "comment": $('#comment').val(),
                            "model_id": $('#model_id').val(),
                            "model_type": $('#model_type').val()
                        },
                        function (data) {
                            if (data.fail) {
                                $(".comment-create").after('Error');
                            } else {
                                var target = $(".comment-create");
                                var newEl = $(data);
                                newEl.hide().insertAfter(target).slideDown('slow');
                                $("#comment").val('');
                                $("#title").val('');
                                ondelete();
                            }
                        }
                );
                return false;
            });
            function ondelete(){
                $('.deleteComment').on('click', function () {
                    return confirm('¿Estás seguro que quieres eliminar este comentario?');
                });
                $('.delete-comment').on('submit', function (e) {
                    e.preventDefault();
                    $.ajax({
                                url: $(this).prop('action'),
                                type: 'DELETE',
                                data: {
                                    "_token": $(this).find('input[name=_token]').val()
                                },
                                success: function (data) {
                                    if (data.fail) {
                                        $(".comment-create").after('Error');
                                    } else {
                                        $(".comment-"+data.id).slideUp(500, function() {
                                            $(".comment-"+data.id).remove();
                                        });

//                                        $(this).closest('.comment').hide();
//                                        console.log(data.id);
                                    }
                                }
                            }
                    );
                    return false;
                });
            }
            ondelete();

        })
    </script>
@stop