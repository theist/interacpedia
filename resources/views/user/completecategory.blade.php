@extends('app')

@section('title')
    @lang('user/title.complete')
    @parent
@stop

@section('content')
    <div class="wizard">
        <div class="header">
            <img src="/images/wizard/icon.png" alt="Interacpedia"/>
            @lang('challenges/forms.step',['step'=>0,'total'=>5])
        </div>
        <div class="body row">
            <div class="col-md-10 col-md-offset-1 wizard_content text-center">
                <div class="row">
                    <div class="col-md-12"><h1>Bienvenido a interacpedia!</h1></div>
                    <div class="col-md-8 col-md-offset-2"><div class="subtitle">@lang('user/messages.complete_category')</div></div>
                    <div class="col-md-6 col-md-offset-3 text-center"><h2>SELECCIONA TU PERFIL</h2></div>
                </div>
                <div class="row">
                    {!! Form::model($user,['method' => 'PATCH', 'action' => ['UserController@update',$user->id]]) !!}
                    <div class="select-category row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <li class="text-center {{ ($user->category=="Student")?"active":"inactive" }}" data-value="Student"><img src="/images/wizard/student.png" alt="Estudiante"><br>
                                        Estudiante
                                    </li>
                                    <p><small>Elige esta opción si actualmente estás matriculado en universidad o institución educativa.</small></p>
                                </div>
                                <div class="col-md-4">
                                    <li class="text-center {{ ($user->category=="Professor")?"active":"inactive" }}" data-value="Professor"><img src="/images/wizard/professor.png" alt="Profesor"><br>
                                        Profesor
                                    </li>
                                    <p><small>Elige esta opción si actualmente das clase en una universidad o institución educativa.</small></p>
                                </div>
                                <div class="col-md-4">
                                    <li class="text-center {{ ($user->category=="General Public")?"active":"inactive" }}" data-value="General Public"><img src="/images/wizard/general.png" alt="Públic General"><br>
                                        Público General
                                    </li>
                                    <p><small>Elige esta opción si actualmente no estás directamente vinculado a una universidad o institución educativa.</small></p>
                                </div>
                                {!! Form::hidden('category',null,['id'=>'category']) !!}
                                {!! Form::hidden('completecategory',true) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-md-offset-10">{!! Form::submit(Lang::get('general/labels.next'),['id'=>'next_button','class' => 'btn '.($user->category==""?'disabled':'')]) !!}</div>
                    </div>
                    {!! Form::close() !!}
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