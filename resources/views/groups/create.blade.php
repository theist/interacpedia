{!! Form::model( $group = new \App\Interacpedia\Group, ['url' => 'groups','id'=>'groups-form','class'=>'col-md-12 text-center'] ) !!}
@include('groups.form',['model'=>$model,'submitButtonText' => Lang::get('general/labels.add') . ' ' . trans_choice('general/labels.groups', 1 ) ])
{!! Form::close() !!}
@section('footer')
    @parent
    <script>
        $('.deleteGroup').on('click', function () {
            if( confirm('¿Estás seguro que quieres eliminar este Grupo?')){
//                ondeletegroup();
                $(this).closest('.deletegroup-form').submit();
            }
        });
        function ondeletegroup(){
            $('.deletegroup-form').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                            url: $(this).prop('action'),
                            type: 'DELETE',
                            data: {
                                "_token": $(this).find('input[name=_token]').val()
                            },
                            success: function (data) {
                                if (data.fail) {
//                                $(".comment-create").after('Error');
                                } else {
                                    document.location.reload();
//                                $(".comment-"+data.id).slideUp(500, function() {
//                                    $(".comment-"+data.id).remove();
//                                });

//                                        $(this).closest('.comment').hide();
//                                        console.log(data.id);
                                }
                            }
                        }
                );
                return false;
            });
        }
        ondeletegroup();

    </script>
@stop