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
        <div class="row text-center phrase">“Algunos de los mayores proyectos en la historia de la humanidad necesitaron más de 100.000 personas"</div>
        <div class="row text-center"><img src="/images/backgrounds/neurons.png" alt="Interacpedia"/></div>
        <div class="row text-center"><h4>¿Que podríamos lograr si unimos 1.4 billones de estudiantes en el mundo?</h4></div>

        <div class="row text-center"><img src="/images/backgrounds/our-team.jpg" alt="Interacpedia"/></div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row our-team">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12 text-center"><img src="/images/backgrounds/aboutus-santi.png" alt="Santiago Lalinde"/></div>
                            <div class="col-md-12 name">Santiago Lalinde</div>
                            <div class="col-md-12 summary">Administrador de Negocios especializado en Finanzas y Negocios por Internet con mas de 12 años de Experiencia en Marketing, Investigación de Mercados, Sistemas de Información, Ventas y Alta Gerencia. Creador de software y juegos (Copyright) con reconocimientos académicos, creatividad y diseño de procesos.</div>
                            <div class="col-md-12 position">CEO</div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12 text-center"><img src="/images/backgrounds/aboutus-juank.png" alt="Juan Carlos Orrego"/></div>
                            <div class="col-md-12 name">Juan Carlos Orrego</div>
                            <div class="col-md-12 summary">Ingeniero de Sistemas con más de 15 años de experiencia en creación, ejecución y gestión de mas de 200 proyectos digitales en América Latina.  Asesor del sector público y privado, en materia tecnológica y estrategia digital.</div>
                            <div class="col-md-12 position">CTO</div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12 text-center"><img src="/images/backgrounds/aboutus-fefe.png" alt="Maria Fernanda Escobar"/></div>
                            <div class="col-md-12 name">Maria Fernanda Escobar</div>
                            <div class="col-md-12 summary">Diseñadora gráfica, especializada en empaques y desarrollo de marca, con más de 8 años de experiencia en diseño de identidad corporativa, comunicación, publicidad, arte y manejo editorial a nivel local e internacional. Ganadora de beca por mejor Icfes.</div>
                            <div class="col-md-12 position">CDO</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row text-center"><img src="/images/backgrounds/neurons-2.png" alt="Interacpedia"/></div>
        <div class="row text-center phrase">Asesores Expertos en relaciones internacionales, operaciones, finanzas, estrategia, comunicaciones, emprendimiento y educación.</div>
        <div class="row text-center"><img src="/images/backgrounds/aboutus-creativity.jpg" alt="Ideaminds"/></div>
        <div class="row text-center">
            Creado por: <br/>
            <img src="/images/backgrounds/aboutus-ideaminds.png" alt="Ideaminds"/>
            &copy;{{ date("Y") }} IDEAMINDS. Todos los derechos reservados. <br/>
            www.ideaminds.net
        </div>
@stop