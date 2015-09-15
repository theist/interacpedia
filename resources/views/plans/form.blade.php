<div class="step_content">
    <div class="field-name">
        <div class="subtitle row">
            <div class="col-sm-1 text-center"><img src="/images/icons/32x32/describe.png"
                                                   alt="@lang('general/labels.proyect_title')"/></div>
            <div class="col-sm-11 text-left text">@lang('general/labels.proyect_title')</div>
        </div>
        <div class="form-group">
            <p class="help">@lang('general/help.proyect_title_help')</p>
            {!! Form::text('title', null, ['maxlength'=>140,'class' => 'form-control maxlength']) !!}
        </div>
    </div>
    <?php $fields = [ 'team_description', 'focus',
            'solution', 'benefits',
            'validation', 'analysis',
            'obstacles', 'success',
            'activities',
            'resources', 'social',
            'others', 'sample' ];?>


    @foreach($fields as $field)
        <div class="field-{{ $field }}">
            <div class="subtitle row">
                <div class="col-sm-1 text-center"><img src="/images/icons/32x32/describe.png"
                                                       alt="@lang('general/labels.plan_'.$field)"/></div>
                <div class="col-sm-11 text-left text">@lang('general/labels.plan_'.$field)</div>
            </div>
            <div class="form-group">
                <p class="help">@lang('general/help.plan_'. $field .'_help')</p>
                {!! Form::textarea($field, null, ['maxlength'=>400,'class' => 'form-control maxlength', 'rows'=>7,
                'placeholder'=>Lang::get('general/labels.write_here')]) !!}
            </div>
        </div>
    @endforeach
    <div class="form-group">
        {!! Form::submit($submitButtonText,['class' => 'btn btn-purple btn-big']) !!}
        <a class="btn btn-gray btn-big cancel">@lang('general/labels.cancel')</a>
    </div>
</div>
@section('footer')
    @parent
    <script>
        $('.maxlength').maxlength({
            alwaysShow: true,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger",
            appendToParent: true,
            placement: "bottom-right"
        });
    </script>
@stop