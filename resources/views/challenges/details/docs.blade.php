<div class="row full">
    <div class="main">
        <div class="content col-md-12">
            <h4>{{ trans_choice('general/labels.documents', 2 ) }}</h4>

            <p>A continuación se listan los documentos detallados disponibles para este reto. Recuerda que puedes acceder a estos documentos
            porque estas participando en este reto. Estos documentos pueden contener información confidencial de las empresas postulantes y
                por tanto deben ser manipulados con responsabilidad.</p>

            {{--<div class="row users">--}}
                {{--@foreach($teams as $team)--}}
                    {{--@foreach($team->users as $st)--}}
                        {{--<div class="user summary col-md-4 {{ $st->agree?'agree':'not-agree' }}">--}}
                            {{--@include('user.summary',['user'=>$st])--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--@endforeach--}}
            {{--</div>--}}
        </div>
    </div>
</div>