@extends('app')

@section('title')
    @lang('user/title.complete')
    @parent
@stop

@section('content')
    <h1>@lang('user/title.complete')</h1>
    <hr/>
    <p class="lead">@lang('user/messages.complete_category')</p>
    {!! Form::model($user,['method' => 'PATCH', 'action' => ['UserController@update',$user->id]]) !!}
    <div class="select-category">
        <div class="col-md-1"></div>
        <div class="panel panel-default col-md-3">
            <div class="panel-body">
                <li class="text-center inactive" data-value="Student"><img
                            src="/images/icons/profiles/icon-students.png"><br>Students
                </li>
                <p>
                    <small>Select this category if you are currently registered as an active student at any
                        university.
                    </small>
                </p>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="panel panel-default col-md-3">
            <div class="panel-body">
                <li class="text-center inactive" data-value="General Public"><img
                            src="/images/icons/profiles/icon-society.png"><br>General Public
                </li>
                <p>
                    <small>Select this category if .......</small>
                </p>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="panel panel-default col-md-3">
            <div class="panel-body">
                <li class="text-center inactive" data-value="Professor"><img
                            src="/images/icons/profiles/icon-mentors.png"><br>Professor
                </li>
                <p>
                    <small>Select this category if .......</small>
                </p>
            </div>
        </div>
    </div>
    {!! Form::hidden('category',null,['class' => 'form-control','id'=>'category']) !!}
    <div class="form-group">
        {!! Form::submit('Update your profile',['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop
@section('footer')
    <script>
        $(".select-category li").click(function () {
            $(".select-category li").removeClass('active');
            $(".select-category li").addClass('inactive');
            $('#category').val(this.getAttribute('data-value'));
            $(this).removeClass('inactive');
            $(this).addClass('active');
        });

        $(".select-category li").hover(function () {
            $(this).addClass('transition');
        }, function () {
            $(this).removeClass('transition');
        });
    </script>
@stop