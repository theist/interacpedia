<div class="form-group">
    {!! Form::label('name','@lang('general/labels.name'):') !!}
    {!! Form::text('name',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description','@lang('general/labels.description'):') !!}
    {!! Form::textarea('description',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
</div>