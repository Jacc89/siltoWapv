<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php  echo constant('NOMBRESITIO'); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style0.css">

</head>
<body class="font">
<!--menu-->

    <header id="header-home">
        <div class="container-fluid nav">
            <div class="container">
                <div class="row barra">
                    <div class="col-lg-2">
                        <a href="index.php">
                            <img  width="200" height="60" src="public/img/SILTO.png" alt="logo de la pagina">
                        </a>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-9">
                        <ul class="text-center">
                        <li><a href="<?php echo constant('URL'); ?>index.php">Inicio</a></li>
                            <li><a data-scroll href="#quehacemos">Que Hacemos</a></li>
                            <li><a data-scroll href="#servicios">Servicios</a></li>
                            <li><a data-scroll href="#equipo">Equipo</a></li>
                            <li><a data-scroll href="#contacto">Contacto</a></li>
                            <li><a href="<?php echo constant('URL'); ?>index/Autenticar?auth=1">Ingreso</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--slider-->
        <div class="hd-slider">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-7"></div>
                    <!-- carrusel de frases -->
                    <div class="col-md-5 hero">
                        <div id="carouselExampleControls" class="carousel slide"   data-ride="carousel">
                            <div class="carousel-inner">
                            <div class="carousel-item active">
                                <h2>
                                <p class="mySlides" >“No hay nada más común que encontrar consideraciones sobre el suministro que afecten a las líneas estratégicas de una campaña y de una guerra”.<br>  Sun Tzu </p>
                                <p class="mySlides" >“No sé qué demonio es eso de la “logística” de la que Marshall siempre está hablando, pero quiero un poco de ella”. <br>  George S. Patton </p>
                                <p class="mySlides" >“La historia de la guerra demuestra que, nueve de cada diez veces,<br> un ejército es derrotado porque sus líneas de suministros fueron cortadas”. <br>  Adolf Hitler</p>
                                <p class="mySlides" >“Por mi experiencia en tiempos de guerra, soy insistente con que el saber hacer de la logística se debe preservar, en que no hay nada más importante en la guerra que la logística”. <br> General Douglas MacArthur</p>
                                </h2>
                            </div>
                            </div>
                            <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>



<!--main seccion 1-->
<main>
    <div class="container-fluid ">
        <section class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="quienes" id="quehacemos">
                        <h1 class="h1">
                            QUE HACEMOS
                        </h1>
                        <p>Optimizar sus servicios logisticos, monitoreando y controlando sus despachos, interactuando en tiempo real y generando reportes en la plataforma.
                        </p>
                    </div>
                </div>
    <!--Misión Visión columnas-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mision-vision">
                            <img src="public/img/onepage/mision.jpg" alt="imagen Misión">
                            <h1 class="h1">
                                MISIÓN
                            </h1>
                            <p>Somos un equipo de tecnológos dedicados al desarrollo de plataformas web a medida, ofreciendo soluciones  informáticas a ninel nacional.

                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mision-vision">
                            <img src="public/img/onepage/vision.png" alt="imagen Misión">
                            <h1 class="h1">
                                VISIÓN
                            </h1>
                            <p>
                                Pretedemos estar el año 2022 a la vanguardia de los mejores proveedores de      desarrollos informáticos, ofreciendo sevicios en el mercado nacional, innovando de acuerdo a los cambios generados por los avances tecnológicos.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--main seccion 2-->
        <section class="container " >
            <h1 class="h1" id="servicios" >NUESTROS SERVICIOS</h1>
            <div class="row">
                <!--rol-->
                <div class="col-lg-6 text-center">
                    <a class="btn " data-toggle="collapse" href="#rol" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><h1 class="leter">Cargo Usuario</h1>
                        <img class="tama" src="public/img/onepage/cargo.png" alt="imagen Misión"></a>
                    <div class="collapse " id="rol">
                        <div class="card card-body">
                        <strong>
                            <p class="">La plataforma tendra diferentes cargos para los usuarios en los cuales se encuentran los siguientes: <br>1. Administrador es el encargado del sistema y tendra los permisos para el manejo de la plataforma. <br>2. El supervisor es el encargado de las solicitudes de los bodegueros y las rutas. <br>3. Bodeguero es el encargado de realizar solicitudes de los centro de acopio y bodega principal.</p>
                            </strong>
                        </div>
                    </div>
                </div>
                <!--solicitud-->
                <div class="col-lg-6 text-center">
                    <a class="btn " data-toggle="collapse" href="#solicitud" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><h1 class="leter">Solicitud de Pedidos</h1><img  class="tama" src="public/img/onepage/solicitud.png" alt="imagen Misión"></a>
                    <div class="collapse " id="solicitud">
                        <div class="card card-body">
                            <p><b>La solicitud de las rutas  es realizada apartir de pedidos de los centros de acopio, oficinas para el trasporte de mercancioa o de documentacion de la empresa, o de personal solicitado en diferentes puntos.</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--Planeamiento-->
            <div class="row">
                <div class="col-lg-6">
                    <a class="btn " data-toggle="collapse" href="#planeamiento" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><h1 class="leter">Planeamiento</h1>
                    <img class="tama" src="public/img/onepage/planeamiento.png" alt="imagen Misión"></a>
                    <div class="collapse " id="planeamiento">
                        <div class="card card-body">
                                <p>
                               <b> El planeamiento es realizado apartir de las solicitudes que se encuentren activas en la plataforma y asi el supervisor podra planear la logistica para que se cumplan a totalidad las solicitudes realizadas anteriormente.</b>
                                </p>
                        </div>
                    </div>
                </div>
            <!--rutas-->
                <div class="col-lg-6">
                    <a class="btn " data-toggle="collapse" href="#ruta" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><h1 class="leter">Rutas</h1>
                    <img class="tama" src="public/img/onepage/rutas.png" alt="imagen Misión"></a>
                    <div class="collapse " id="ruta">
                        <div class="card card-body">
                            <strong>
                                <p>
                                    Las rutas son planeadas de acuerdo a las solocitudes y son efectuadas dependiendo la cantidad de pedido que hay  en los centros de acopio de la empresa, este sera realizado por los contratistas o los vehículos de propiedad de la empresa .
                                </p>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </section><br>
<!-- Seccion de equipo -->
        <section class="container text-center equipoS ">
            <h1 class="h1" id="equipo">EQUIPO</h1>
            <div class="row">
                <!-- integrante 1 -->
                <div class="col-md-4">
                    <div class="modal-bootstrap">
                            <div class="modal-area-button">
                                <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#castro"><h3 class="equipoN">Alexandra Castro </h3>
                                <img class="avatar"src="public/img/onepage/fotoAle.png"></a>
                            </div>
                        </div>
                    </div>
                    <!-- integrante 2 -->
                <div class="col-md-4">
                    <div class="modal-bootstrap">
                        <div class="modal-area-button">
                            <a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#lopez"><h3 class="equipoN">Jhonatan Lopez</h3><img class="avatar" src="public/img/onepage/jhonatan.png"></a>
                        </div>
                    </div>
                </div>
                <!-- integrante 3 -->
                <div class="col-md-4">
                    <div class="modal-bootstrap">
                        <div class="modal-area-button">
                            <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#lara"><h3 class="equipoN">Lida Patricia Lara</h3><img class="avatar" src="public/img/onepage/lida.jpg"></a>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-2"></div>
                <!-- integrante 4 -->
                <div class="col-md-4">
                    <div class="modal-bootstrap">
                        <div class="modal-area-button">
                            <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#alarcon"><h3 class="equipoN">Mauricio Alarcon </h3><img class="avatar" src="public/img/onepage/mauro.png"></a>
                        </div>
                    </div>
                </div>
                <!-- integrante 5 -->
                <div class="col-md-4">
                    <div class="modal-bootstrap">
                        <div class="modal-area-button">
                            <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#hoyos"><h3 class="equipoN">Victor Hoyos</h3><img class="avatar" src="public/img/onepage/victor.jpg"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main><br>


<!--footer-->

<footer>
    <div id="rectangulo">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <!-- seccion mapa -->
                <div class="col-md-5 map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d127257.47050688774!2d-74.066258!3d4.630461!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sco!4v1589858547133!5m2!1ses!2sco" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-md-5">
                    <div class="contacto" id="contacto">
                        <h2 >CONTACTO </h2>
                        <p><h3>Tel: 3138252764<br>
                        Direccion: CDA Chía Sena <br>
                        Correo: siltoadsi@gmail.com</h3>
                        </p>

                    </div>
                </div>
                <!-- seccion de redes sociales-->
                <div class="col-md-1 redes">
                    <div>
                        <ul>
                            <li><a href="https://twitter.com/Silto16">
                                    <img width="50" height="50" src="public/img/redes/043-twitter.png" alt="imagen de twitter">
                                </a>
                            </li>
                            <li><a href="https://www.facebook.com/groups/1653448328150890/?ref=share">
                                    <img width="50" height="50" src="public/img/redes/021-facebook.png" alt="imagen de facebook">
                                </a>
                            </li>
                            <li><a href="https://api.whatsapp.com/send?phone=573138252764">
                                    <img  width="50" height="50" src="public/img/redes/035-whatsapp.png" alt="imagen de whatsapp">
                                </a>
                            </li>

                        </ul>

                    </div>
            </div>
        </div>
    </div>
    </div>
</footer>
<!-- Modal Alexandra Castro Clavijo -->
<div id="castro" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Alexandra Castro Clavijo</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <i class="fa fa-check modal-check-pro"></i>
                <img class="avatar" src="public/img/onepage/fotoAle.png">
                <h4>Tecnologa ADSI</h4>
                <p>Analista de sistemas, bases de datos, programadora PHP, HTML5, Bootstrap 4, desarrolladora encargada del FROND-END de aplicación y colaboración en el BACK-END de la misma.<br>
                <b> Contacto</b><br>
                Email: jacastro9087@misena.edu.co<br>
                Email: laflacalex9@gmail.com<br>
                Cel:312 317 3124<br>
                </p>
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<!-- modal Jhonatan Lopez -->
<div id="lopez" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title">Jhonatan Lopez Gonzalez</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <img class="avatar" src="public/img/onepage/jhonatan.png">
                <h4>Tecnologo ADSI</h4>
                <p>Analista, programador PHP, HTML5, Bootstrap 4, desarrollador apoyo del FROND-END de aplicación y colaboración en el BACK-END de la misma.<br>
                <b> Contacto</b><br>
                Email: jrlopez62@misena.edu.co<br>
                Email: ccl.ticlopez@gmail.com<br>
                Cel:312 273 4752<br>
                </p>
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Cerrar</a>
            </div>
        </div>
    </div>
</div>
    <!-- modal Patricia Lara -->
<div id="lara" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title">Lida Patricia Lara Dimate</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <img class="avatar" src="public/img/onepage/lida.jpg">
                <h4>Tecnologa ADSI</h4>
                <p>Tecnologo en analisis  y desarrollo  de informacion enfasis en analisis y levantamiento de requerimientos y documentacion de la aplicacion.<br>
                Contacto<br>
                Email: lplara67@misena.edu.co<br>
                Email: lucianajoh1113@gmail.com<br>
                Cel:322 243 5548<br>
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<!-- modal Mauricio Alarcon -->
<div id="alarcon" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title">Mauricio Alarcon Casallas</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <img class="avatar" src="public/img/onepage/mauro.png">
                <h4>Tecnólogo ADSI</h4>
                <p>Analista y desarrollador de sistemas informáticos, con conocimientos en lenguajes HTML, PHP.  Elaboración de diagramas UML . Colaborador del BACK-END de la aplicación.
                <b>Contacto</b><br>
                Email: cmalarcon82@misena.edu.co <br>
                Celular: 3214050655</p>
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<!-- modal Victor Hoyos -->
<div id="hoyos" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title">Victor Hoyos Sandobal</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <img class="avatar" src="public/img/onepage/victor.jpg">
                <h4>Tecnologo ADSI</h4>
                <p>Analista y desarrollador con conocimientos de HTML y PHP, Encargado del BACK-END de la aplicacion. Lider de proyecto a cargo de la aplicaciòn.</p>
                <p><b>Contacto</b></p>
                <p>Email: victorhoyoscolombia@gmail.com <br>Celular: 313 8252764</p>
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Cerrar</a>
            </div>
        </div>
    </div>
</div>

<!-- carrusel de slider header -->
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 10000); // Change image every 10 seconds
}
</script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- <script src="<?php echo constant('URL'); ?>public/js/dist/smooth-scroll.min.js"></script> -->

</body>
</html>