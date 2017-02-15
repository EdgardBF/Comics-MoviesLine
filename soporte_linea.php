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
    <div class="section white">
    <div class="row container">
       <ul class="collapsible " data-collapsible="accordion">
        <li>
            <div class="collapsible-header #00838f cyan darken-3"><i class="material-icons white-text text-darken-2">question_answer</i><a class="white-text text-darken-2 tipografia texto">Preguntas Frecuentes</a></div>
            <div class="collapsible-body #006064 cyan darken-4"><span>
                <h4>Preguntas Frecuentes</h4>
                <p>
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
                </p>
            
            </span></div>
        </li>
        <li>
            <div class="collapsible-header #00838f cyan darken-3"><i class="material-icons white-text text-darken-2">headset_mic</i><a class="white-text text-darken-2 tipografia texto">Asistencia técnica</a></div>
            <div class="collapsible-body #006064 cyan darken-4"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
        <li>
            <div class="collapsible-header #00838f cyan darken-3"><i class="material-icons white-text text-darken-2">help</i><a class="white-text text-darken-2 tipografia texto">Centro de ayuda</a></div>
            <div class="collapsible-body #006064 cyan darken-4"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
    </ul>
    </div>
    </div>
  <?php
    include('archivosmaestros/footer.php')
  ?>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/mapa.js" async defer></script>
    <script async src="js/tweet.js" charset="utf-8"></script>
</body>    
</html>