<!DOCTYPE html>
<!--Con la siguiente linea de codigo se le dice al navegador que la pagina esta en idioma español-->
<html lang = "es">
<!--Aqui inicia el Head-->
  <head>
      <!--La siguiente linea de codigo sirve para poner las tildes-->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
      <title>Inicio</title>
      <!--Se llaman los archivos CSS-->
      <link rel="stylesheet" href="css/materialize.min.css">
      <link rel="stylesheet" href="css/estilos.css">
      <link rel="stylesheet" href="css/icon.css">
  </head>
  <!--Aqui comienza el body-->
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
      <li><a href="iniciar_sesion.php" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">person</i>INICIAR SESIÓN</a></li>
      <li><a href="compras.php" class="texto white-text waves-effect waves-teal"><i class="material-icons white-text">shopping_cart</i>COMPRAS</a></li>
    </ul>
    <!--Se manda a llamar un archivo maestro del Slider-->
    <section>
      <?php
        include ('archivosmaestros/slider.php')
      ?>
    </section>
    <section>
      <div class="row">
        <!--Se dice que tamaño del grid se usara-->
        <div class="col s12 m12 l12" >
          <div class="card blue-grey darken-1 z-depth-4">
            <div class="card-content black-text">
              <span class="card-title center tipografia">Quienes Somos</span>
               <p class="texto-mayor center-align">Comics & Movies Line es una Tienda destinada para la compra online sobre diferentes tipos de peliculas, <br>
                con su respectivo comic en el que este basada, permitiendo al usuario un mayor conocimiento sobre esta, y de donde fue basada para su produccion.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <!--Se dice que tamaño del grid se usara-->
        <div class="col s12 m6">
          <div class="card blue-grey darken-1 z-depth-4">
            <div class="card-content black-text center-align">
              <span class="card-title center tipografia ">Visión</span>
              <p>La visión de Comics & Movies Line, es ser a finales de la década, una de las mayores tiendas en líneas, en dar un fácil acceso, buen tema de productos y confidencialidad con nuestros clientes.<br><br>En nuestra visión, también tenemos la de adecuar el estilo de lectura a la persona del presente, ya que pierde el sentido de lectura, y el habito del mismo.</p>
            </div>
          </div>
        </div>
        <!--Se dice que tamaño del grid se usara-->
        <div class="col s12 m6">
          <div class="card blue-grey darken-1 z-depth-4">
            <div class="card-content black-text center-align">
              <span class="card-title center tipografia">Misión</span>
              <p>La misión de Comics & Movies Line, es la de lograr que las personas al ver una película, se sepa de donde viene, por qué se creó y vea que, al leer un comic, encuentre un vasto universo que la imaginación ha creado para que el lector se puede entretener, ya que últimamente el hábito de lectura se pierde poco a poco.<br><br>Estamos seguros que, como tienda, C&M Line, logrará dar a los clientes un servicio de fácil acceso que se ajuste a sus necesidades, además de que nuestros productos tienen una duración garantizada.</p>
            </div>
          </div>
        </div>
        <!--Se dice que tamaño del grid se usara-->
        <div class="col s12 m6">
          <div class="card blue-grey darken-1 z-depth-4">
            <div class="card-content black-text center-align">
              <span class="card-title center tipografia">Valores</span>
              <p>En Comics & Movies Line valoramos a las personas y a los empleados, tenemos prioridad en el cuidado de los derechos de los empleados, sus familias, buscamos los mejores beneficios de los clientes, sin extraviar, descuidar o malgastar el producto, entregando personalmente el mismo en sus propias manos. </p>
            </div>
          </div>
        </div>
        <!--Se dice que tamaño del grid se usara-->
        <div class="col s12 m6">
          <div class="card blue-grey darken-1 z-depth-4">
            <div class="card-content black-text center-align">
              <span class="card-title center tipografia">Equipo De Trabajo</span>
              <p>El equipo de Trabajo consta de dos estudiantes del 3er Año de Sistemas Informaticos 2, B; del Instituto Tecnico Ricaldone, los cuales son:<br>
                Edgard Alexander Barrera Flamenco<br>
                Miguel Ángel Flores Reyes
              </p>
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