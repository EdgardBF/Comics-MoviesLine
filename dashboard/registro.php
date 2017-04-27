<!DOCTYPE html>
<!--Con la siguiente linea de codigo se le dice al navegador que la pagina esta en idioma español-->
<html lang = "es">
<!--Aqui inicia el Head-->
<head>
     <!--La siguiente linea de codigo sirve para poner las tildes-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
    <title>Registro</title>
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
                    <li><a href="index.php" class="texto waves-effect waves-teal"><i class="material-icons left">home</i>INICIO</a></li>
                    <li><a href="productos.php" class="waves-effect waves-teal texto"><i class="material-icons left">extension</i>PRODUCTOS</a></li>
                    <li><a href="soporte_linea.php" class="waves-effect waves-teal texto"><i class="material-icons left">question_answer</i>SOPORTE EN LÍNEA</a></li>
                    <li><a href="login.php" class="waves-effect waves-teal texto"><i class="material-icons left">person</i>INICIAR SESIÓN</a></li>
                    <li><a href="compras.php" class="waves-effect waves-teal texto"><i class="material-icons">shopping_cart</i></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!--Menu para el Mobil-->
    <ul class="side-nav cyan darken-4 z-depth-4" id="mobile-demo">
      <li><a href="index.php" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">home</i>INICIO</a></li>
      <li><a href="productos.php" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">extension</i>PRODUCTOS</a></li>
      <li><a href="soporte_linea.php" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">question_answer</i>SOPORTE EN LÍNEA</a></li>
      <li><a href="login.php" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">person</i>INICIAR SESIÓN</a></li>
      <li><a href="compras.php" class="texto white-text waves-effect waves-teal"><i class="material-icons white-text">shopping_cart</i>COMPRAS</a></li>
    </ul>
    <!--Uso de un contenedor para colocar los datos y de una clase para el cambio de colores-->
    <section class="container contenedor2">
    <div class="row">
        <form class="col s12">
            <div class="center-align">
            <i class="material-icons"><a class="icono">note_add</a></i><!--Icono de la parte superior-->
            </div>
            <div class="input-field col s12">
                <input id="last_name" type="text" class="validate">
                <label for="last_name" class="cyan-text text-darken-3">Nombre completo</label><!--El cuadro de texto donde se pondra el nombre completo-->
            </div>
            <div class="input-field col s12">
                <input id="email" type="email" class="validate">
                <label for="email" class="cyan-text text-darken-3">Email</label><!--El cuadro de texto donde se pondra el Email-->
            </div>
            <div class="input-field col s12">
                <input id="last_name" type="text" class="validate">
                <label for="last_name" class="cyan-text text-darken-3">Usuario</label><!--El cuadro de texto donde se pondra el nombre de usuario-->
            </div>
            <div class="input-field col s12">
                <input id="password" type="password" class="validate">
                <label for="password" class="cyan-text text-darken-3">Contraseña</label><!--El cuadro de texto donde se pondra la contraseña-->
            </div>
             <div class="input-field col s12">
                <input id="password" type="password" class="validate">
                <label for="password" class="cyan-text text-darken-3">Verificar Contraseña</label><!--El cuadro de texto donde se pondra para verificar la contraseña-->
            </div>
            <div class="center-align  boton">
                <a class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">create</i>Crear</a><!--boton para poner guardar-->
            </div>
            <div class="center-align boton2">
                <a class="waves-effect waves-light btn  #00838f cyan darken-3" href="login.php"><i class="material-icons right">face</i> Ya existo!</a><!--boton para redirigirse de un solo-->
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