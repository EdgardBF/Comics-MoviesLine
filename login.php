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
    <section>
    <?php
      include ('archivosmaestros/slider.php')
    ?>
  </section>
    <?php
    include('archivosmaestros/footer.php')
  ?>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/main.js"></script>
  </body>
  </html>