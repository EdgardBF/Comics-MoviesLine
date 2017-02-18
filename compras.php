<!DOCTYPE html>
<!--Con la siguiente linea de codigo se le dice al navegador que la pagina esta en idioma español-->
<html lang = "es">
<!--Aqui inicia el Head-->
  <head>
      <!--La siguiente linea de codigo sirve para poner las tildes-->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
      <title>Compras</title>
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
                <a href="index.php" class="brand-logo logo"><img src="img/logo.png"></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php" class="texto waves-effect waves-teal"><i class="material-icons left">home</i>INICIO</a></li>
                    <li><a href="productos.php" class="waves-effect waves-teal texto"><i class="material-icons left">extension</i>PRODUCTOS</a></li>
                    <li><a href="soporte_linea.php" class="waves-effect waves-teal texto"><i class="material-icons left">question_answer</i>SOPORTE EN LÍNEA</a></li>
                    <li><a href="login.php" class="waves-effect waves-teal texto"><i class="material-icons left">person</i>INICIAR SESIÓN</a></li>
                    <li class="active"><a href="#!" class="waves-effect waves-teal texto"><i class="material-icons">shopping_cart</i></a></li>
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
        <div class="row">
            <!--Se dice que tamaño del grid se usara-->
            <div class="col s12 m12 l12" >
            <!--Crea un menu de Tabs-->
                <ul id="tabs-swipe-demo" class="tabs z-depth-4">
                    <li class="tab col s5 "><a class="active" href="#test-swipe-1">Paso 1</a></li>
                    <li class="tab col s5"><a href="#test-swipe-2">Paso 2</a></li>
                </ul>
                <div id="test-swipe-1" class="col s12 cyan darken-3 z-depth-4">
                    <div class="center-align">
                        <p><h5 class="tipografia">PRODUCTOS A COMPRAR EN LA TIENDA</h5></p>
                    </div>
                    <!--Tarjetas-->
                    <div class="row">
                        <div class="col s12 m4">
                            <div class="card">
                                <div class="card-image">
                                    <img src="img/slider2.png">
                                    <a class="btn-floating halfway-fab waves-effect waves-light red" onclick="Materialize.toast('Eliminado del Carrito', 4000)"><i class="material-icons">close</i></a>
                                </div>
                                <div class="card-content">
                                    <p class="grey-text text-darken-4"><h5>Doctor Strange  $39.00</h5></p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <div class="card">
                                <div class="card-image">
                                    <img src="img/producto1.png">
                                    <a class="btn-floating halfway-fab waves-effect waves-light red" onclick="Materialize.toast('Eliminado del Carrito', 4000)"><i class="material-icons">close</i></a>
                                </div>
                                <div class="card-content">
                                    <p class="grey-text text-darken-4"><h5>Star Wars: The Force Awakens $46.00</h5></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light button-compra" type="submit" name="action">Siguiente
                        <i class="material-icons right">keyboard_arrow_right</i>
                    </button><br><br>
                </div>
                <div id="test-swipe-2" class="col s12 cyan darken-3 z-depth-4">
                    <div class="center-align">
                        <p><h5 class="tipografia">COMPRA ONLINE</h5></p>
                    </div>
                     <div class="row">
                     <!--Formulario para la compra de Articulos-->
                        <form class="col s12">
                            <div class="row ">
                                <div class="input-field col s6">
                                <input id="first_name" type="text" class="validate ">
                                <label for="first_name" class="black-text">Nombres</label>
                                </div>
                                <div class="input-field col s6">
                                <input id="last_name" type="text" class="validate">
                                <label for="last_name" class="black-text">Apellidos</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                <input id="email" type="email" class="validate">
                                <label for="email" class="black-text">Correo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                <input id="cod" type="text" class="validate">
                                <label for="cod" class="black-text">Codigo Postal</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                <input id="number" type="text" class="validate">
                                <label for="number" class="black-text">Numero</label>
                                </div>
                            </div>
                            <p><h5 class="tipografia">FORMAS DE PAGO</h5></p>
                            <div class="center-align">
                                <a href="#!"><img height="100" src="img/paypal.png"></a>
                                <a href="#!"><img height="100" src="img/visa-otros.png"></a>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                <input id="tarjeta" type="text" class="validate">
                                <label for="tarjeta" class="black-text">Tarjeta de Credito</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Terminos y Condiciones</a>
                    <!-- Modal Structure -->
                    <div id="modal1" class="modal modal-fixed-footer">
                        <div class="modal-content">
                            <h4>Terminos Y Condiciones</h4>
                            <p>Al Comprar en esta Tienda Online acepta, el producto de compra, y que los respectivos derechos de autor de cada articulo estan ligados a sus unicos propietarios.<br>
                            Esta Tienda solo es un medio por el cual se puede obtener el producto por un precio anteriormente estimado.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Acepto</a>
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Rechazo</a>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light button-compra disabled" type="submit" name="action">Comprar
                        <i class="material-icons right">shopping_cart</i>
                    </button><br><br>
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