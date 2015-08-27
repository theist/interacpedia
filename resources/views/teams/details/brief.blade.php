<div class="row full">
    <div class="main">
        <div class="content col-md-12">
            <h4>@lang('general/labels.brief' )</h4>
            <p>Aquí se deben diligenciar los datos correspondientes al brief de la primera entrega del reto.</p>
            <hr>
            <div class="row">
                {!! Form::model($brief,['method' => 'PATCH', 'action' => ['BriefsController@update',$brief->id]]) !!}
                @include('briefs.form',['submitButtonText' => Lang::get('general/labels.update')])
                {!! Form::close() !!}
                @include('errors.alerts')
            </div>
        </div>
    </div>
</div>
</div>
