@extends('app')

@section('title')
    @lang('general/menu.whatis')
    @parent
@stop

@section('section-banner')
    <div class="container about-us">
        <div class="banner-about text-center">
            <div class="row text-center"><a class="btn btn-danger" href="#" data-toggle="modal" data-target="#myModal2">English Version</a></div>
            <img class="logo img-responsive" src="/images/logos/que-es-interacpedia-logo.png" alt="Interacpedia"/>
            <h1>Plataforma colaborativa y metodología de innovación que une: <br/>
                <span class="empresas">Empresas</span> + <span class="universidades">Universidades</span> +
                <span class="estudiantes">Estudiantes</span> + <span class="gobierno">Gobierno</span> +
                <span class="sociedad">Sociedad </span><br/>
                para que los proyectos de las clases de las universidades del mundo <br/>
                <strong>tengan un uso real en la sociedad</strong>
            </h1>
        </div>
        <div class="row text-center"><a class="btn btn-blue" href="#" data-toggle="modal" data-target="#myModal">Ver Infographic</a></div>
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
        <div class="row text-center"><img class="img-responsive" src="/images/backgrounds/neurons.png" alt="Interacpedia"/></div>
        <div class="row text-center phrase2">¿Que podríamos lograr si unimos 1.4 billones de estudiantes en el mundo?</div>

        <div class="row text-center"><img class="img-responsive" src="/images/backgrounds/our-team.jpg" alt="Interacpedia"/></div>
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
        <div class="row text-center"><img class="img-responsive" src="/images/backgrounds/neurons-2.png" alt="Interacpedia"/></div>
        <div class="row text-center phrase">Asesores Expertos en relaciones internacionales, operaciones, finanzas, estrategia, comunicaciones, emprendimiento y educación.</div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row our-team">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12 text-center"><img src="/images/backgrounds/aboutus-lucas.png" alt="Santiago Lalinde"/></div>
                            <div class="col-md-12 name">Lucas Osorio</div>
                            <div class="col-md-12 summary"><strong>Exxon Mobil Qatar</strong><br>
                                Ingeniero Electrónico - Maestría Robótica Georgia Tech. <br>
                                +10 años en planeación estratégica, evaluación, proyectos y pxn en la industria petrolera. Liderado proyectos y operaciones en EEUU, España, Italia, y Qatar.
                                <br>
                                Programación, automatización y robótica. <br>
                                Múltiples becas y premios, Lider de proyectos  +U$100MM. Identificado por la gerencia como futuro líder Internacional.
                            </div>
                            <div class="col-md-12 position">CRO</div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12 text-center"><img src="/images/backgrounds/aboutus-caro.png" alt="Juan Carlos Orrego"/></div>
                            <div class="col-md-12 name">Carolina Tejada</div>
                            <div class="col-md-12 summary">Atlas Corps Fellow at <strong>Mozilla</strong> Foundation
                                <br>
                                Comunicadora con Posgrado en Sociología y Ciencia Política <br>
                                New York - USA <br>
                                10 años de experiencia en comunicación organizacional, formación, planeación de eventos, diseño y producción de medios impresos y audiovisuales. TCC, Fenalco, Organzación VID y Leonisa.
                                <br>
                                Directora Administrativa de Causa & Efecto: Desarrollo de competencias y cultura competitiva para desarrollar al máximo el potencial de las empresas del país.
                            </div>
                            <div class="col-md-12 position"></div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
        <div class="row text-center"><img class="img-responsive" src="/images/backgrounds/aboutus-creativity.jpg" alt="Ideaminds"/></div>
        <div class="row text-center ideaminds">
            <div class="created">Creado por:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div class="logo"><img src="/images/backgrounds/aboutus-ideaminds.png" alt="Ideaminds"/></div>
            <div class="copyright">&copy;{{ date("Y") }} IDEAMINDS. Todos los derechos reservados.</div>
            <div class="web">www.ideaminds.net</div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Interacpedia Infographic</h4>
                    </div>
                    <div class="modal-body">
                        <img class="img-responsive" src="/images/infographics/infographic-interacpedia-web.jpg" alt="Infographic"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">About Interacpedia</h4>
                    </div>
                    <div class="modal-body">
                        <img class="img-responsive" src="/images/infographics/about-us-en.jpg" alt="About us"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop