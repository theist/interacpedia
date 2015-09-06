<div class="row full">
    <div class="main">
        <div class="content col-md-12">
            <h4>{{ trans_choice('general/labels.documents', 2 ) }}</h4>

            <p>A continuación se listan los documentos cargados por este equipo. Recuerda que puedes
                acceder a estos documentos porque eres miembro de este equipo.</p>

            <div class="row documents">
                @unless($team->getMedia('infographics')->count() == 0)
                    <div class="col-md-12"><h4>Infografías</h4></div>
                    @foreach($team->getMedia('infographics') as $doc)
                        <div class="document summary col-md-6 panel">
                            <hr>
                            <strong>{{ $doc->name }}</strong><br>
                            <a target="_blank" href="{{ $doc->getUrl() }}">{{ $doc->file_name }}</a><br>
                            @lang('general/labels.size'): {{ $doc->humanReadableSize }}
                            <br>
                            <a href="/teams/{{ $team->id }}/delfile/{{ $doc->id }}"
                               class="deldocument btn btn-danger">Eliminar</a>
                        </div>
                    @endforeach
                @endunless
                @unless($team->getMedia('others')->count() == 0)
                        <div class="col-md-12"><h4>Otros</h4></div>
                    @foreach($team->getMedia('others') as $doc)
                        <div class="document summary col-md-6 panel">
                            <hr>
                            <strong>{{ $doc->name }}</strong><br>
                            <a target="_blank" href="{{ $doc->getUrl() }}">{{ $doc->file_name }}</a><br>
                            @lang('general/labels.size'): {{ $doc->humanReadableSize }}
                            <br>
                            <a href="/teams/{{ $team->id }}/delfile/{{ $doc->id }}"
                               class="deldocument btn btn-danger">Eliminar</a>
                        </div>
                    @endforeach
                @endunless
            </div>
            <hr>
            <div class="row well">
                {!! Form::open(['files'=>true,'method' => 'POST', 'action' => ['TeamsController@addfile',$team->id]]) !!}
                <div class="form-group col-md-4">
                    {!! Form::label('document', Lang::get('general/labels.file')) !!}
                    {!! Form::file('document',['class' => 'form-control']) !!}
                    <p class="help-block">Puede cargar un documento de su computador.</p>
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('name', Lang::get('general/labels.name')) !!}
                    {!! Form::text('name',null,['class' => 'form-control']) !!}
                    <p class="help-block">Puede dar un nombre para este documento.</p>
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('type', Lang::get('general/labels.type')) !!}
                    {!! Form::select('type', array('infographics' => 'Infografía', 'others' => 'Otros'), null, ['placeholder' => 'Escoja un tipo...','class'=>'form-control']) !!}
                    <p class="help-block">Debe escoger que tipo de archivo está cargando.</p>
                </div>
                <div class="form-group col-md-2">
                    {!! Form::submit(Lang::get('general/labels.upload'),['class' => 'btn btn-purple btn-big']) !!}
                </div>
                {!! Form::close() !!}
            </div>
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