<div class="row full">
    <div class="main">
        <div class="content col-md-12">
            <h4>{{ trans_choice('general/labels.images', 2 ) }}</h4>

            <p>A continuación se muestran las imágenes de este evento.</p>

            <div class="row documents">
                @unless($event->getMedia('gallery')->count() == 0)
                    <div class="col-md-12"><h4>Galería de Imágenes</h4></div>
                    @foreach($event->getMedia('gallery') as $img)
                        <div class="col-md-2">
                            <a class="images_link" href="{{ imagestyle($img->getUrl(),'width1200') }}"
                               data-toggle="lightbox"
                               data-gallery="multiimages" data-title="{{ $img->name }}">
                                <img class="img-responsive img-thumbnail"
                                     src="{{ imagestyle($img->getUrl(),'scale200x200') }}"
                                     alt="{{ $img->name }}"/>
                            </a>
                            @if(Auth::user()->admin && false)
                                <br>
                                <a href="/events/{{ $event->id }}/delfile/{{ $img->id }}"
                                   class="deldocument btn btn-danger">Eliminar</a>
                            @endif
                        </div>
                    @endforeach
                @endunless
                @unless($event->getMedia('eventphoto')->count() == 0)
                    <div class="col-md-12"><h4>Foto principal</h4></div>
                    @foreach($event->getMedia('eventphoto') as $img)
                        <div class="col-md-3">
                            <img class="img-responsive"
                                 src="{{ imagestyle($img->getUrl(),'fit270x214') }}"
                                 alt="{{ $img->name }}"/>
                        </div>
                    @endforeach
                @endunless
            </div>
            <hr>
            <div class="row well">
                {!! Form::open(['files'=>true,'method' => 'POST', 'action' => ['EventsController@addfile',$event->id]]) !!}
                <div class="form-group col-md-4">
                    {!! Form::label('image', Lang::get('general/labels.file')) !!}
                    {!! Form::file('image',['class' => 'form-control']) !!}
                    <p class="help-block">Puede cargar una imagen de su computador.</p>
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('name', Lang::get('general/labels.name')) !!}
                    {!! Form::text('name',null,['class' => 'form-control']) !!}
                    <p class="help-block">Puede dar un nombre a esta imagen.</p>
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('type', Lang::get('general/labels.type')) !!}
                    {!! Form::select('type', array('gallery' => 'Galería', 'eventphoto'=>'Foto principal'), 'gallery', ['placeholder' => 'Escoja un tipo...','class'=>'form-control']) !!}
                    <p class="help-block">Debe clasificar la imagen que está cargando.</p>
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
            return confirm('¿Estás seguro que quieres eliminar esta imagen?');
        });
    </script>
@stop