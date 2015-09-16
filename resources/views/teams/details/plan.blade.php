<div class="row full">
    <div class="main">
        <div class="content col-md-12">
            <h4>@lang('general/labels.proyect_plan' )</h4>

            <div class="row">
                <div class="col-md-4">Aquí se deben diligenciar los datos correspondientes al plan del proyecto. <br>
                </div>
                <div class="col-md-4 panel panel-info">
                    <div class="panel-heading">Tutorial</div>
                    <div class="panel-body image">
                        <a href="/tutorials/15">
                            <img class="img-responsive img-thumbnail" src="/images/tutorials/plan/header-small.jpg"
                                 alt="Como hacer el plan">
                        </a>
                    </div>
                </div>
                <div class="col-md-4 panel panel-info">
                    <div class="panel-heading">Formato</div>
                    <div class="panel-body">También puedes tener este formato en un documento en word si lo necesitas
                        imprimir o usar cómo guía mientras lo completas:
                        <a target="_blank"
                           href="/docs/plan/Formato-PlanProyecto-Interacpedia-V1.docx">Formato-PlanProyecto-Interacpedia-V1.docx</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                {!! Form::model($plan,['method' => 'PATCH', 'action' => ['PlansController@update',$plan->id]]) !!}
                @include('plans.form',['submitButtonText' => Lang::get('general/labels.update')])
                {!! Form::close() !!}
                @include('errors.alerts')
            </div>
        </div>
    </div>
</div>
</div>
