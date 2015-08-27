<div class="step_content">
    <?php $fields = [ 'problem', 'solution', 'benefits','analysis','obstacles','success','keys','others' ];?>
    @foreach($fields as $field)
        <div class="field-{{ $field }}">
            <div class="subtitle row">
                <div class="col-sm-1 text-center"><img src="/images/icons/32x32/describe.png"
                                                       alt="@lang('general/labels.brief_'.$field)"/></div>
                <div class="col-sm-11 text-left text">@lang('general/labels.brief_'.$field)</div>
            </div>
            <div class="form-group">
                <p class="help">@lang('general/labels.brief_'. $field .'_help')</p>
                {!! Form::textarea($field, null, ['maxlength'=>140,'class' => 'form-control maxlength', 'rows'=>7,
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