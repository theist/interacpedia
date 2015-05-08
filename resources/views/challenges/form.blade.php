<div class="row">
    <div class="col-md-6">
        <div class="field-type">
            <div class="label">
                <img src="/images/icons/forms/type.png" alt="@lang('challenges/forms.type')"/>@lang('challenges/forms.type')
            </div>
            <div class="form-group">
                {!! Form::select('category_id',$categories,null,['id' => 'category_id','class' => 'form-control select2']) !!}
            </div>
        </div>
        <div class="field-category">
            <div class="label">
                <img src="/images/icons/forms/category.png" alt="@lang('challenges/forms.category')"/>@lang('challenges/forms.category')
            </div>
            <div class="form-group">
                {!! Form::select('type_id',$types,null,['id' => 'type_id','class' => 'form-control select2']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="field-name">
            <div class="label">
                <img src="/images/icons/forms/name.png" alt="@lang('challenges/forms.name')"/>@lang('challenges/forms.name')
            </div>
            <div class="form-group">
                {!! Form::textarea('name',null,['class' => 'form-control','rows'=>'6']) !!}
            </div>
        </div>
    </div>
</div>
<div class="step_header">
    <small>@lang('challenges/forms.step',['step'=>2,'total'=>5])</small>
    @lang('challenges/forms.add_creators')
</div>
<div class="step_header">
    <small>@lang('challenges/forms.step',['step'=>3,'total'=>5])</small>
    @lang('challenges/forms.select_universities')
</div>
<div class="step_header">
    <small>@lang('challenges/forms.step',['step'=>4,'total'=>5])</small>
    @lang('challenges/forms.challenge_details')
</div>
<div class="step_header">
    <small>@lang('challenges/forms.step',['step'=>5,'total'=>5])</small>
    @lang('challenges/forms.looking_for')
</div>

<div class="form-group">
    {!! Form::label('description',Lang::get('general/labels.description').':') !!}
    {!! Form::textarea('description',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-purple form-control']) !!}
</div>

@section('footer')
    <script>
        $('.select2').select2();
    </script>
@stop