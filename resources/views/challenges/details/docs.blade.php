<div class="row full">
    <div class="main">
        <div class="content col-md-12">
            <h4>{{ trans_choice('general/labels.documents', 2 ) }}</h4>

            <p>A continuación se listan los documentos detallados disponibles para este reto. Recuerda que puedes
                acceder a estos documentos
                porque estas participando en este reto. Estos documentos pueden contener información confidencial de las
                empresas postulantes y
                por tanto deben ser manipulados con responsabilidad.</p>

            <div class="row documents">
                @foreach($challenge->getMedia('documents') as $doc)
                    <div class="document summary col-md-6 panel">
                        <hr>
                        <strong>{{ $doc->name }}</strong><br>
                        <a target="_blank" href="{{ $doc->getUrl() }}">{{ $doc->file_name }}</a><br>
                        @lang('general/labels.size'): {{ $doc->humanReadableSize }}
                        @if(Auth::check() && Auth::user()->admin)
                            <br>
                            <a href="/challenges/{{ $challenge->id }}/delfile/{{ $doc->id }}"
                               class="deldocument btn btn-danger">Eliminar</a>
                        @endif
                    </div>
                @endforeach
            </div>
            @if(Auth::check() && Auth::user()->admin)
                <hr>
                <div class="row well">
                    {!! Form::open(['files'=>true,'method' => 'POST', 'action' => ['ChallengesController@addfile',$challenge->id]]) !!}
                    <div class="form-group col-md-5">
                        {!! Form::label('document', Lang::get('general/labels.file')) !!}
                        {!! Form::file('document',['class' => 'form-control']) !!}
                        <p class="help-block">Puede cargar un documento de su computador.</p>
                    </div>
                    <div class="form-group col-md-5">
                        {!! Form::label('name', Lang::get('general/labels.name')) !!}
                        {!! Form::text('name',null,['class' => 'form-control']) !!}
                        <p class="help-block">Puede dar un nombre para este documento.</p>
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::submit(Lang::get('general/labels.upload'),['class' => 'btn btn-purple btn-big']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            @endif
        </div>

    </div>
</div>
</div>
@section('footer')
    @parent
    <script>
        $('.deldocument').on('click', function () {
            return confirm('¿Estás seguro que quieres eliminar este documento?');
        });
    </script>
@stop