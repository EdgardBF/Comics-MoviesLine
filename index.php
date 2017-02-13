<!DOCTYPE html>
<html lang = "es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/materialize.min.css">
	  <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/icon.css">
</head>
<body>
    <div class="navbar-fixed" id="menu">
        <nav class="tipografia">
            <div class="nav-wrapper #00838f cyan darken-3">
                <a href="#!" class="brand-logo logo"><img src="img/logo.png"></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li class="active"><a href="#!" class="texto"><i class="material-icons left">home</i>INICIO</a></li>
                    <li><a href="productos.php" class="texto"><i class="material-icons left">extension</i>PRODUCTOS</a></li>
                    <li><a href="soporte_linea.php" class="texto"><i class="material-icons left">question_answer</i>SOPORTE EN LÍNEA</a></li>
                    <li><a href="iniciar_sesion.php" class="texto"><i class="material-icons left">person</i>INICIAR SESIÓN</a></li>
                    <li><a href="compras.php" class="texto"><i class="material-icons">shopping_cart</i></a></li>
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
    <section>
    <?php
      include ('archivosmaestros/slider.php')
    ?>
  </section>
  <section>
    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
        <div class="card-content white-text">
            <span class="card-title center tipografia">Quienes Somos</span>
            <p>I am a very simple card. I am good at containing small bits of information.
            I am convenient because I require little markup to use effectively.</p>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title center tipografia">Visión</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title center tipografia">Misión</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title center tipografia">Valores</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title center tipografia">Equipo de trabajo</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
          </div>
        </div>
      </div>
  </section>
<?php
  include('archivosmaestros/footer.php')
?>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>