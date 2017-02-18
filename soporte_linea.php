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
    <link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/icon.css">
    <link rel="shortcut icon" href="img/logo.png">
    <div id="fb-root"></div>
</head>
<body>
       <!--El menu para PC-->
    <div class="navbar-fixed z-depth-4" id="menu">
        <nav class="tipografia">
            <div class="nav-wrapper #00838f cyan darken-3">
                <a href="#!" class="brand-logo logo"><img src="img/logo.png"></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li class="active"><a href="#!" class="texto waves-effect waves-teal"><i class="material-icons left">home</i>INICIO</a></li>
                    <li><a href="productos.php" class="waves-effect waves-teal texto"><i class="material-icons left">extension</i>PRODUCTOS</a></li>
                    <li class="active"><a href="#!" class="waves-effect waves-teal texto"><i class="material-icons left">question_answer</i>SOPORTE EN LÍNEA</a></li>
                    <li><a href="login.php" class="waves-effect waves-teal texto"><i class="material-icons left">person</i>INICIAR SESIÓN</a></li>
                    <li><a href="compras.php" class="waves-effect waves-teal texto"><i class="material-icons">shopping_cart</i></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!--Menu para el Mobil-->
    <ul class="side-nav cyan darken-4 z-depth-4" id="mobile-demo">
      <li class="active"><a href="#!" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">home</i>INICIO</a></li>
      <li><a href="productos.php" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">extension</i>PRODUCTOS</a></li>
      <li><a href="soporte_linea.php" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">question_answer</i>SOPORTE EN LÍNEA</a></li>
      <li><a href="iniciar_sesion.php" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">person</i>INICIAR SESIÓN</a></li>
      <li><a href="compras.php" class="texto white-text waves-effect waves-teal"><i class="material-icons white-text">shopping_cart</i>COMPRAS</a></li>
    </ul>
    <!--Se manda a llamar un archivo maestro del Slider-->
    <section>
      <?php
        include ('archivosmaestros/slider.php')
      ?>
    </section>
    <!--se crea una seccion de acordeon-->
  </section>
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
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                </p>
                <h5>¿Su locaclizacion?</h5>
                <p class="justificar">
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet

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
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                </p>
                <h5>¿Que hago con la garantia?</h5>
                <p class="justificar">
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet

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
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                </p>
                <h5>¿posee quejas de nuestros envios?</h5>
                <p class="justificar">
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                </p>    
            </span></div>
        </li>
    </ul>
    </div>
    </div>
    <!--Uso de archivo maestro para el footer-->
  <?php
    include('archivosmaestros/footer.php')
  ?>
  <!--archivos javascrip utilizados-->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/mapa.js" async defer></script>
    <script async src="js/tweet.js" charset="utf-8"></script>
    <script src="js/youtube.js"></script>
</body>    
</html>