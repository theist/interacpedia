@extends('app')

@section('title')
    @lang('user/title.complete')
    @parent
@stop

@section('content')
    <div class="wizard">
        <div class="header">
            <img src="/images/wizard/icon.png" alt="Interacpedia"/>
            @lang('challenges/forms.step',['step'=>4,'total'=>4])
        </div>
        <div class="body row">
                <div class="col-md-10 col-md-offset-1 wizard_content scroll text-center">
                    <div class="row">
                        <div class="col-md-12"><h1>Has terminado la primera parte!</h1></div>
                        <div class="col-md-8 col-md-offset-2"><div class="subtitle">Gracias por completar la información básica de tu perfil,
                                Ahora te invitamos a que completes tu información haciendo uso del siguiente botón:</div></div>
                        <div class="col-md-6 col-md-offset-3 text-center"><a href="/user/{{ $user->id }}/edit" class="btn btn-purple">Editar mi perfil</a></div>
                    </div>
                </div>
        </div>
    </div>
@stop
@section('footer')
    <script>
        $(".select-category li").click(function () {
            $(".select-category li").removeClass('active');
            $(".select-category li").addClass('inactive');
            $('#category').val(this.getAttribute('data-value'));
            $(this).removeClass('inactive');
            $(this).addClass('active');
            $('#next_button').removeClass('disabled');
        });

        $(".select-category li").hover(function () {
            $(this).addClass('transition');
        }, function () {
            $(this).removeClass('transition');
        });
    </script>
@stop