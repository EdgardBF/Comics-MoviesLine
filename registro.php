<!DOCTYPE html>
<html lang = "es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/materialize.min.css">
	  <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/icon.css">
    <div id="fb-root"></div>
</head>
<body>
    <div class="navbar-fixed" id="menu">
        <nav class="tipografia">
            <div class="nav-wrapper #00838f cyan darken-3">
                <a href="#!" class="brand-logo logo"><img src="img/logo.png"></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="contactos.html" class="texto">Contactos</a></li>
                    <li><a href="instalaciones.html" class="texto">Instalaciones</a></li>
                    <li><a href="ofertas-academicas.html" class="texto">Ofertas Academicas</a></li>
                    <li><a href="cursos-verano.html" class="texto">Cursos de verano</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <ul class="side-nav" id="mobile-demo">
        <li><a href="contactos.html">Contactos</a></li>
        <li><a href="instalaciones.html">Instalaciones</a></li>
        <li><a href="ofertas-academicas.html">Ofertas Academicas</a></li>
        <li><a href="cursos-verano.html">Cursos de verano</a></li>
    </ul>
    <section class="container contenedor2">
    <div class="row">
        <form class="col s12">
            <div class="center-align">
            <i class="material-icons"><a class="icono">note_add</a></i>
            </div>
            <div class="input-field col s12">
                <input id="last_name" type="text" class="validate">
                <label for="last_name" class="cyan-text text-darken-3">Nombre completo</label>
            </div>
            <div class="input-field col s12">
                <input id="email" type="email" class="validate">
                <label for="email" class="cyan-text text-darken-3">Email</label>
            </div>
            <div class="input-field col s12">
                <input id="last_name" type="text" class="validate">
                <label for="last_name" class="cyan-text text-darken-3">Usuario</label>
            </div>
            <div class="input-field col s12">
                <input id="password" type="password" class="validate">
                <label for="password" class="cyan-text text-darken-3">Contraseña</label>
            </div>
             <div class="input-field col s12">
                <input id="password" type="password" class="validate">
                <label for="password" class="cyan-text text-darken-3">Verificar Contraseña</label>
            </div>
            <div class="center-align  boton">
                <a class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">create</i>Crear</a>
            </div>
            <div class="center-align boton2">
                <a class="waves-effect waves-light btn  #00838f cyan darken-3" href="#!"><i class="material-icons right">face</i> Ya existo!</a>
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