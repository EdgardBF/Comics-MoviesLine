<!DOCTYPE html>
<!--Con la siguiente linea de codigo se le dice al navegador que la pagina esta en idioma español-->
<html lang = "es">
<!--Aqui inicia el Head-->
<head>
     <!--La siguiente linea de codigo sirve para poner las tildes-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
    <title>Soporte en Linea</title>
    <!--Se llaman los archivos CSS-->
      <link rel="stylesheet" href="../css/materialize.min.css">
      <link rel="stylesheet" href="../css/estilos.css">
      <link rel="stylesheet" href="../css/icon.css">
      <link rel="shortcut icon" href="../img/logo.png">
    <div id="fb-root"></div>
</head>
<body>
       <!--El menu para PC-->
    <div class="navbar-fixed z-depth-4" id="menu">
        <nav class="tipografia">
            <div class="nav-wrapper #00838f cyan darken-3">
                <a href="#!" class="brand-logo logo"><img src="../img/logo.png"></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#!" class="texto waves-effect waves-teal"><i class="material-icons left">home</i>INICIO</a></li>
                    <li><a href="productos.php" class="waves-effect waves-teal texto"><i class="material-icons left">extension</i>PRODUCTOS</a></li>
                    <li class="active"><a href="#!" class="waves-effect waves-teal texto"><i class="material-icons left">question_answer</i>SOPORTE EN LÍNEA</a></li>
                    <li><a href="../dashboard/login.php" class="waves-effect waves-teal texto"><i class="material-icons left">person</i>INICIAR SESIÓN</a></li>
                    <li><a href="../dashboard/compras.php" class="waves-effect waves-teal texto"><i class="material-icons">shopping_cart</i></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!--Menu para el Mobil-->
    <ul class="side-nav cyan darken-4 z-depth-4" id="mobile-demo">
      <li><a href="#!" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">home</i>INICIO</a></li>
      <li><a href="productos.php" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">extension</i>PRODUCTOS</a></li>
      <li  class="active"><a href="soporte_linea.php" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">question_answer</i>SOPORTE EN LÍNEA</a></li>
      <li><a href="iniciar_sesion.php" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">person</i>INICIAR SESIÓN</a></li>
      <li><a href="compras.php" class="texto white-text waves-effect waves-teal"><i class="material-icons white-text">shopping_cart</i>COMPRAS</a></li>
    </ul>
    <!--Se manda a llamar un archivo maestro del Slider-->
    <section>
      <?php
        include ('../archivosmaestros/slider.php')
      ?>
    </section>
    <!--se crea una seccion de acordeon-->
    <div class="section white"><!--Uso de una seccion blanca de materialize-->
    <div class="row container"><!--Uso del contenedor de materialize-->
       <ul class="collapsible " data-collapsible="accordion"><!--Este es la parte de acordeon donde se mostrara de primero el titulo y luego al darle click la demas informacion-->
        <li>
            <!--Titulo del primero -->
            <div class="collapsible-header #00838f cyan darken-3"><i class="material-icons white-text text-darken-2">question_answer</i><a class="white-text text-darken-2 texto">Preguntas Frecuentes</a></div>
            <div class="collapsible-body #006064 cyan darken-4 white-text text-darken-2"><span>
                <!--contenido del primero -->
                <h4>Preguntas Frecuentes</h4>
                <br>
                <h5>¿Metodo de compra?</h5>
                <p class="justificar">
                    la empresa ofrece una metodo de compra en linea y a domicilio con el cual usted puede comprar de manera remota o puede venir a nuestra tienda
                    en el apartado de compras en linea la empresa ofrece dos metodos de compra la compra por medio de la tarjeta de credito y la compra por medio
                    de una cuenta de paypal las cuales se veran mas a detalle en el apartado de compras de la pagina web, la unica tarjeta que la tienda acepta
                    es master no de otro tipo debido a la seguridad que mastercard posee.
                </p>
                <h5>¿Su locaclizacion?</h5>
                <p class="justificar">
                    nosotros nos encontramos en centroameria, el salvador, san salvador, encuentre mas informacion en el pie de pagina.

                </p>
            </span></div>
        </li>
        <li>
            <!--Titulo del segundo -->
            <div class="collapsible-header #00838f cyan darken-3"><i class="material-icons white-text text-darken-2">headset_mic</i><a class="white-text text-darken-2 texto">Asistencia técnica</a></div>
            <div class="collapsible-body #006064 cyan darken-4 white-text text-darken-2"><span>
                <!--contenido del segundo -->
                <h4>Asistencia técnica</h4>
                <br>
                <h5>¿Donde contactar?</h5>
                <p class="justificar">
                    Puede contactarnos a travez del numero el cual esta en nuestro pie de pagina o si decea llamar a nuestro atencion a cliente el numero es 7777-7777.
                </p>
                <h5>¿Que hago con la garantia?</h5>
                <p class="justificar">
                    Si su paquete salio defectuoso entonces contactenos al travez del servicio al cliente ellos les diran que hacer.

                </p>
            </span></div>
        </li>
        <li>
            <!--Titulo del tercero -->
            <div class="collapsible-header #00838f cyan darken-3"><i class="material-icons white-text text-darken-2">help</i><a class="white-text text-darken-2 texto">Centro de ayuda</a></div>
            <div class="collapsible-body #006064 cyan darken-4 white-text text-darken-2"><span>
                <!--contenido del tercero -->
                <h4>Centro de ayuda</h4>
                <br>
                <h5>¿Tienes problemas?</h5>
                <p class="justificar">
                    Puedes contactar con nosotros a travez de los numeros de abajo o tambien puede escribirnos por las redes sosciales o a nuestra atencion al cliente.
                </p>
                <h5>¿posee quejas de nuestros envios?</h5>
                <p class="justificar">
                   Puede decirnos su experiencia con nosotros a travez de nuestras redes sociales o llamando a atencion al cliente.
                </p>    
            </span></div>
        </li>
        <li>
            <!--Titulo del tercero -->
            <div class="collapsible-header #00838f cyan darken-3"><i class="material-icons white-text text-darken-2">comment</i><a class="white-text text-darken-2 texto">Comentarios</a></div>
            <div class="collapsible-body #006064 cyan darken-4 white-text text-darken-2"><span>
                <!--contenido del tercero -->
                <h4>Comentarios</h4>
                <br>
                <h5>Nombre_Usuario</h5>
                <p class="justificar">
                    En esta seccion se colocaran los comentarioa de los clientes
                </p>
                <hr>
                <h5>Nombre_Usuario</h5>
                <p class="justificar">
                    En esta seccion se colocaran los comentarioa de los clientes
                </p>
                <hr>
            </span></div>
        </li>
    </ul>
    </div>
    </div>
    <!--contenedor de comentario-->
    <section class="container contenedor">
        <div class="row">
            <form class="col s12">
                <div class="center-align">
                    <i class="material-icons"><a class="icono">mode_comment</a></i><!--Icono de la parte superior del formulario-->
                </div>
                <div class="input-field col s12">
                    <input id="disabled"  disabled value="" type="text" class="validate">
                    <label for="disabled" class="cyan-text text-darken-3">Usuario_Nombre</label><!--El cuadro de texto donde se pondra el nombre de usuario-->
                </div>
                <div class="input-field col s12">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name" class="cyan-text text-darken-3">Comentario</label><!--El cuadro de texto donde se colocara el comentario-->
                </div>
                <div class="center-align  boton">
                    <a class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">cloud_upload</i>Enviar</a> <!--Boton con el cual se enviara el commentraio-->
                </div>
                <div class="center-align boton2">
                    <a class="waves-effect waves-light btn  #00838f cyan darken-3" href="registro.php"><i class="material-icons right">face</i> Registrate!</a><!--boton para rederigirse a registro-->
                </div>
            </form>
        </div>
    </section>
    <!--Uso de archivo maestro para el footer-->
  <?php
    include('../archivosmaestros/footer.php')
  ?>
  <!--archivos javascrip utilizados-->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/materialize.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/mapa.js" async defer></script>
    <script async src="../js/tweet.js" charset="utf-8"></script>
    <script src="../js/youtube.js"></script>
</body>    
</html>