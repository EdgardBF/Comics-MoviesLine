<!DOCTYPE html>
<html lang = "es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="css/materialize.min.css">
	  <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/icon.css">
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
                    <li><a href="soporte_linea.php" class="waves-effect waves-teal texto"><i class="material-icons left">question_answer</i>SOPORTE EN LÍNEA</a></li>
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
      <li class="active"><a href="#!" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">person</i>INICIAR SESIÓN</a></li>
      <li><a href="compras.php" class="texto white-text waves-effect waves-teal"><i class="material-icons white-text">shopping_cart</i>COMPRAS</a></li>
    </ul>
  <section class="container contenedor">
  <div class="row">
    <form class="col s12">
        <div class="center-align">
        <i class="material-icons"><a class="icono">person_pin</a></i>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate">
          <label for="last_name" class="cyan-text text-darken-3">Usuario</label>
        </div>
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password" class="cyan-text text-darken-3">Contraseña</label>
        </div>
        <div class="center-align  boton">
        <a class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">play_arrow</i>Ingresar</a>
        </div>
        <div class="center-align boton2">
        <a class="waves-effect waves-light btn  #00838f cyan darken-3" href="registro.php"><i class="material-icons right">face</i> Registrate!</a>
        </div>
    </form>
  </div>
  </section>
    <?php
    include('archivosmaestros/footer.php')
  ?>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/mapa.js" async defer></script>
    <script async src="js/tweet.js" charset="utf-8"></script>
    <script src="js/youtube.js"></script>
  </body>
  </html>