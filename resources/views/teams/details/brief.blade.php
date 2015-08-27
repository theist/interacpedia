<div class="row full">
    <div class="main">
        <div class="content col-md-12">
            <h4>@lang('general/labels.brief' )</h4>
            <div class="row">
                <div class="col-md-4">Aquí se deben diligenciar los datos correspondientes al brief de la primera entrega del reto. <br></div>
                <div class="col-md-4 panel panel-info">
                    <div class="panel-heading">Formato</div>
                    <div class="panel-body">Tambien puedes tener este formato en un documento en word si lo necesitas imprimir o usar cómo guía mientras lo completas: <a
                            href="/docs/brief/Formato-Brief-Interacpedia-V3.docx">Formato-Brief-Interacpedia-V3.docx</a></div>
                </div>
                <div class="col-md-4 panel panel-info">
                    <div class="panel-heading">Ejemplo</div>
                    <div class="panel-body">Si deseas ver un ejemplo de Brief diligenciado, puedes descargar este documento: <a
                            href="/docs/brief/Ejemplo-Brief-Interacpedia-V1.pdf">Ejemplo-Brief-Interacpedia-V1.pdf</a></div>
                </div>
            </div>
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
