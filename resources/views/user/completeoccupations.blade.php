@extends('app')

@section('title')
    @lang('user/title.complete')
    @parent
@stop

@section('content')
    <div class="wizard">
        <div class="header">
            <img src="/images/wizard/icon.png" alt="Interacpedia"/>
            @lang('challenges/forms.step',['step'=>2,'total'=>5])
        </div>
        <div class="body row">
            <div class="col-md-10 col-md-offset-1 wizard_content text-center">
                <div class="row">
                    <div class="col-md-12"><h1 class="steps">Empieza a completar tu perfil</h1></div>
                    <div class="col-md-8 col-md-offset-2"><div class="subtitle">Agrega tu ocupación principal</div></div>
                </div>
                {!! Form::model($user,['method' => 'PATCH', 'action' => ['UserController@update',$user->id]]) !!}
                {!! Form::hidden('completeoccupations',true) !!}
                <div class="row" style="margin-bottom: 30px">
                    <div class="col-md-4 col-md-offset-1 text-left">
                        @lang('general/labels.my_occupation_is'): <br/>
                        <select name="type" id="type" class="form-control select2">
                            @foreach($types as $type)
                                <option {{ ($type==$occupation->type) ?"selected":""}} value="{{ $type }}">@lang('general/labels.'.$type)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 text-left">
                        <div class="career {{ ($occupation->type=="student"||$occupation->type=="")?"":"hidden" }}">
                            @lang('general/labels.career'): <br/>
                            <select name="career_id" id="career_id" class="form-control select2">
                                @foreach($careers as $id=>$car)
                                    <option {{ ($id==$occupation->career_id) ?"selected":""}} value="{{ $id }}">{{ $car }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="sector {{ ($occupation->type!="student" && $occupation->type!="")?"":"hidden" }}">
                            @lang('general/labels.sector'): <br/>
                            <select name="sector_id" id="sector_id" class="form-control select2">
                                @foreach($sectors as $id=>$sec)
                                    <option {{ ($id==$occupation->sector_id) ?"selected":""}} value="{{ $id }}">{{ $sec }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 text-left">
                        <span id="experience_label">{{ ($occupation->type=="student"||$occupation->type=="")?"Semestre":"Experiencia" }}</span>:<br/>
                        <input type="text" value="{{ $occupation->experience }}" placeholder="Años" name="experience" id="experience" class="form-control"/>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 30px">
                    <div class="col-md-4 col-md-offset-1 text-left">
                        <div class="university {{ ($occupation->type=="student"||$occupation->type=="")?"":"hidden" }}">
                            @lang('general/labels.educative_institution'): <br/>
                            <select name="university_id" id="university_id" class="form-control select2">
                                @foreach($universities as $id=>$uni)
                                    <option {{ ($id==$occupation->university_id) ?"selected":""}} value="{{ $id }}">{{ $uni }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="company {{ ($occupation->type!="student"&&$occupation->type!="")?"":"hidden" }}">
                            @lang('general/labels.company'): <br/>
                            <select name="company_id" id="company_id" class="form-control select2">
                                @foreach($companies as $id=>$com)
                                    <option {{ ($id==$occupation->company_id) ?"selected":""}} value="{{ $id }}">{{ $com }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 text-left">
                        <div class="course {{ ($occupation->type=="student"||$occupation->type=="")?"":"hidden" }}">
                            @lang('general/labels.course'): <br/>
                            <select name="course_id" id="course_id" class="form-control select2">
                                @foreach($courses as $id=>$cou)
                                    <option {{ ($id==$occupation->course_id) ?"selected":""}} value="{{ $id }}">{{ $cou }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="position {{ ($occupation->type!="student"&&$occupation->type!="")?"":"hidden" }}">
                            @lang('general/labels.position'): <br/>
                            <select name="position_id" id="position_id" class="form-control select2">
                                @foreach($positions as $id=>$pos)
                                    <option {{ ($id==$occupation->position_id) ?"selected":""}} value="{{ $id }}">{{ $pos }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 30px">
                    <div class="row">
                        <div class="col-md-2"><a class="btn btn-purple" href="{{ action('UserController@completecity') }}">@lang('general/labels.previous')</a></div>
                        <div class="col-md-2 col-md-offset-8">{!! Form::submit(Lang::get('general/labels.next'),['id'=>'next_button','class' => 'btn']) !!}</div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    <script>
        $('.select2').select2();
        $('#type').on('change',function(){
            if($(this).val()=='student'){
                $('.university,.career,.course').removeClass('hidden');
                $('.university select,.career select,.course select').select2();
                $('.company,.sector,.position').addClass('hidden');
                $('#experience_label').html('Semestre');
            } else {
                $('.company,.sector,.position').removeClass('hidden');
                $('.company select,.sector select,.position select').select2();
                $('.university,.career,.course').addClass('hidden');
                $('#experience_label').html('Experiencia');
            }
        });
    </script>
@stop