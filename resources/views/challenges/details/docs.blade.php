<div class="row full">
    <div class="main">
        <div class="content col-md-12">
            <h4>{{ trans_choice('general/labels.documents', 2 ) }}</h4>

            <p>A continuación se listan los documentos detallados disponibles para este reto. Recuerda que puedes acceder a estos documentos
            porque estas participando en este reto. Estos documentos pueden contener información confidencial de las empresas postulantes y
                por tanto deben ser manipulados con responsabilidad.</p>

            <div class="row documents">
                @foreach($challenge->getMedia('documents') as $doc)
                        <div class="document summary col-md-12">
                            <hr>
                            <strong>{{ $doc->name }}:</strong>
                            <a target="_blank" href="{{ $doc->getUrl() }}">{{ $doc->file_name }}</a>
                            {{ $doc->humanReadableSize }}
                        </div>
                @endforeach
            </div>
        </div>
    </div>
</div>