@extends('app')

@section('title')
    @lang('general/menu.whatis')
    @parent
@stop

@section('section-banner')
    <div class="container about-us">
        <div class="banner-about text-center">
            <h1>Plataforma colaborativa y metodología de innovación que une: <br/>
                <span class="empresas">Empresas</span> + <span class="universidades">Universidades</span> +
                <span class="estudiantes">Estudiantes</span> + <span class="gobierno">Gobierno</span> +
                <span class="sociedad">Sociedad </span><br/>
                para que los proyectos de las clases de las universidades del mundo <br/>
                <strong>tengan un uso real en la sociedad</strong>
            </h1>
        </div>
        <div class="row text-center"><h2>Transformamos</h2></div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-10"><h3>Innovación abierta</h3></div>
                            <div class="col-md-2 plus">+</div>
                        </div>
                        <div class="text">Involucrando conceptos sociales, tendencias mundiales y un nuevo formato dinámico de publicación de contenido</div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-10"><h3>Tecnología colaborativa</h3></div>
                            <div class="col-md-2 plus">+</div>
                        </div>
                        <div class="text">Generando, administrando y masificando conocimiento práctico</div>
                    </div>
                    <div class="col-md-4">
                        <h3>Soluciones Creativas</h3>
                        <div class="text">Enfocando los cursos como laboratorios de Co creación interactiva</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <h4>“Algunos de los mayores proyectos en la historia de la humanidad necesitaron más de 100.000 personas"</h4>
        </div>
        <div class="text-center">
            <img src="/images/backgrounds/neurons.png" alt="Interacpedia"/>
        </div>
    </div>
@stop