<!DOCTYPE html>
<!--Con la siguiente linea de codigo se le dice al navegador que la pagina esta en idioma español-->
<html lang = "es">
<!--Aqui inicia el Head-->
  <head>
      <!--La siguiente linea de codigo sirve para poner las tildes-->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
      <title>Productos</title>
      <!--Se llaman los archivos CSS-->
      <link rel="stylesheet" href="css/materialize.min.css">
      <link rel="stylesheet" href="css/estilos.css">
      <link rel="stylesheet" href="css/icon.css">
      <link rel="shortcut icon" href="img/logo.png">
      <div id="fb-root"></div>
  </head>
  <!--Aqui comienza el body-->
  <body>
    <!--El menu para PC-->
    <div class="navbar-fixed z-depth-4" id="menu">
        <nav class="tipografia">
            <div class="nav-wrapper cyan darken-3">
                <a href="index.php" class="brand-logo logo"><img src="img/logo.png"></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php" class="texto waves-effect waves-teal"><i class="material-icons left">home</i>INICIO</a></li>
                    <li class="active"><a href="#!" class="waves-effect waves-teal texto"><i class="material-icons left">extension</i>PRODUCTOS</a></li>
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
      <li class="active"><a href="soporte_linea.php" class="texto white-text waves-effect waves-teal"><i class="material-icons left white-text">question_answer</i>SOPORTE EN LÍNEA</a></li>
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
                <div class="row">
                    <!--Se dice que tamaño del grid se usara-->
                    <div class="col s12 m6 l6 center-align">
                        <p><h5 class="tipografia">PRODUCTOS EN COMICS AND MOVIES LINE</h5></p>
                    </div>
                    <!--Se dice que tamaño del grid se usara-->
                    <div class="col s12 m6 l6" >
                        <nav>
                            <div class="nav-wrapper ">
                                <form>
                                    <div class="input-field cyan darken-3 z-depth-4">
                                        <input id="search" type="search" required>
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image ">
                                <img class="materialboxed" src="img/slider2.png">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Doctor Strange $59.00<i class="material-icons right">keyboard_arrow_down</i></span>
                                <p><a onclick="Materialize.toast('Agregado al Carrito', 4000)">Agregar al Carrito</a></p>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star_half</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star_border</i></a>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Doctor Strange  $59.00<i class="material-icons right">close</i></span>
                                <p>La adquisición de este producto lleva consigo una copia original de la película estrenada el 2016 de Doctor Strange, con su respectivo comic en el que fue basado denominado Doctor Strange: The Oath, a un precio de $59.00.</p>
                            </div>
                            <div class="card-action">
                                <div class="center-align">
                                    <a class="waves-effect waves-light btn cyan darken-3 separar" href="#modal1"> <span class="reponsivo">comentarios</span> <i class="material-icons"><span class="icono-boton">comment</span></i></a>
                                </div>
                                <!-- Modal Structure -->
                                <div id="modal1" class="modal bottom-sheet modal-fixed-footer">
                                    <div class="modal-content">
                                    <h4>Comentarios</h4>
                                    <div class="input-field col s12">
                                        <input id="last_name" type="text" class="validate">
                                        <label for="last_name" class="cyan-text text-darken-3">Comentario</label><!--El cuadro de texto donde se colocara el comentario-->
                                    </div>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat grey-text text-darken-4">Enviar</a>
                                        <a href="registro.php" class=" modal-action modal-close waves-effect waves-green btn-flat grey-text text-darken-4">Registrate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image ">
                                <img class="materialboxed" src="img/slider3.png">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Batman vs Superman: Dawn of Justice $47.00<i class="material-icons right">keyboard_arrow_down</i></span>
                                <p><a onclick="Materialize.toast('Agregado al Carrito', 4000)">Agregar al Carrito</a></p>
                                <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star_half</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star_border</i></a>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Batman vs Superman: Dawn of Justice $47.00<i class="material-icons right">close</i></span>
                                <p>La adquisición de este producto lleva consigo una copia original de la película estrenada el 2016 de Batman vs Superman: Dawn of Justice, con su respectivo comic en el que fue basado denominado The Dark Knight Returns, a un precio de $47.00.</p>
                            </div>
                            <div class="card-action">
                                <div class="center-align">
                                    <a class="waves-effect waves-light btn cyan darken-3 separar" href="#modal2"> <span class="reponsivo">comentarios</span> <i class="material-icons"><span class="icono-boton">comment</span></i></a>
                                </div>
                                <!-- Modal Structure -->
                                <div id="modal2" class="modal bottom-sheet modal-fixed-footer">
                                    <div class="modal-content">
                                    <h4>Comentarios</h4>
                                    <div class="input-field col s12">
                                        <input id="last_name" type="text" class="validate">
                                        <label for="last_name" class="cyan-text text-darken-3">Comentario</label><!--El cuadro de texto donde se colocara el comentario-->
                                    </div>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat grey-text text-darken-4">Enviar</a>
                                        <a href="registro.php" class=" modal-action modal-close waves-effect waves-green btn-flat grey-text text-darken-4">Registrate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image ">
                                <img class="materialboxed" src="img/slider4.png">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">The Peanuts $25.00<i class="material-icons right">keyboard_arrow_down</i></span>
                                <p><a onclick="Materialize.toast('Agregado al Carrito', 4000)">Agregar al Carrito</a></p>
                                <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star_half</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star_border</i></a>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Snoopy & Charlie Brown: Peanuts $25.00<i class="material-icons right">close</i></span>
                                <p>La adquisición de este producto lleva consigo una copia original de la película estrenada el 2015 de Snoopy & Charlie Brown: Peanuts, con uno de los comics mas representativos para crear esta pelicula Snoopy y el Baron Rojo, a un precio de $25.00.</p>
                            </div>
                            <div class="card-action">
                                <div class="center-align">
                                    <a class="waves-effect waves-light btn cyan darken-3 separar" href="#modal3"> <span class="reponsivo">comentarios</span> <i class="material-icons"><span class="icono-boton">comment</span></i></a>
                                </div>
                                <!-- Modal Structure -->
                                <div id="modal3" class="modal bottom-sheet modal-fixed-footer">
                                    <div class="modal-content">
                                    <h4>Comentarios</h4>
                                    <div class="input-field col s12">
                                        <input id="last_name" type="text" class="validate">
                                        <label for="last_name" class="cyan-text text-darken-3">Comentario</label><!--El cuadro de texto donde se colocara el comentario-->
                                    </div>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat grey-text text-darken-4">Enviar</a>
                                        <a href="registro.php" class=" modal-action modal-close waves-effect waves-green btn-flat grey-text text-darken-4">Registrate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image ">
                                <img class="materialboxed" src="img/producto1.png">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Star Wars: The Force Awakens $46.00<i class="material-icons right">keyboard_arrow_down</i></span>
                                <p><a onclick="Materialize.toast('Agregado al Carrito', 4000)">Agregar al Carrito</a></p>
                                <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star_half</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star_border</i></a>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Star Wars: The Force Awakens $46.00<i class="material-icons right">close</i></span>
                                <p>La adquisición de este producto lleva consigo una copia original de la película estrenada el 2015 de Star Wars: The Force Awakens, con uno de los comics que salieron gracias a esta grandiosa pelicula denominada Star Wars: The Force Awakens de Marvel Comics, a un precio de $46.00.</p>
                            </div>
                            <div class="card-action">
                                <div class="center-align">
                                    <a class="waves-effect waves-light btn cyan darken-3 separar" href="#modal4"> <span class="reponsivo">comentarios</span> <i class="material-icons"><span class="icono-boton">comment</span></i></a>
                                </div>
                                <!-- Modal Structure -->
                                <div id="modal4" class="modal bottom-sheet modal-fixed-footer">
                                    <div class="modal-content">
                                    <h4>Comentarios</h4>
                                    <div class="input-field col s12">
                                        <input id="last_name" type="text" class="validate">
                                        <label for="last_name" class="cyan-text text-darken-3">Comentario</label><!--El cuadro de texto donde se colocara el comentario-->
                                    </div>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat grey-text text-darken-4">Enviar</a>
                                        <a href="registro.php" class=" modal-action modal-close waves-effect waves-green btn-flat grey-text text-darken-4">Registrate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image ">
                                <img class="materialboxed" src="img/producto2.png">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Capitán América: Civil War $57.00<i class="material-icons right">keyboard_arrow_down</i></span>
                                <p><a onclick="Materialize.toast('Agregado al Carrito', 4000)">Agregar al Carrito</a></p>
                                <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star_half</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star_border</i></a>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Capitán América: Civil War $57.00<i class="material-icons right">close</i></span>
                                <p>La adquisición de este producto lleva consigo una copia original de la película estrenada el 2016 de Capitán América: Civil War, con uno de los comics con el que fue basado llamado Civil War, de la Compañia de Marvel Comics, a un precio de $57.00.</p>
                            </div>
                            <div class="card-action">
                                <div class="center-align">
                                    <a class="waves-effect waves-light btn cyan darken-3 separar" href="#modal5"> <span class="reponsivo">comentarios</span> <i class="material-icons"><span class="icono-boton">comment</span></i></a>
                                </div>
                                <!-- Modal Structure -->
                                <div id="modal5" class="modal bottom-sheet modal-fixed-footer">
                                    <div class="modal-content">
                                    <h4>Comentarios</h4>
                                    <div class="input-field col s12">
                                        <input id="last_name" type="text" class="validate">
                                        <label for="last_name" class="cyan-text text-darken-3">Comentario</label><!--El cuadro de texto donde se colocara el comentario-->
                                    </div>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat grey-text text-darken-4">Enviar</a>
                                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat grey-text text-darken-4">Registrate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image ">
                                <img class="materialboxed" src="img/producto3.png">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">The Amazing Spider-Man 2: el poder de Electro $37.00<i class="material-icons right">keyboard_arrow_down</i></span>
                                <p><a onclick="Materialize.toast('Agregado al Carrito', 4000)">Agregar al Carrito</a></p>
                                <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star_half</i></a>
                                    <a class="btn-floating btn-small waves-effect cyan darken-3"><i class="material-icons">star_border</i></a>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">The Amazing Spider-Man 2: el poder de Electro $37.00<i class="material-icons right">close</i></span>
                                <p>La adquisición de este producto lleva consigo una copia original de la película estrenada el 2014 de The Amazing Spider-Man 2: el poder de Electro, con uno de los comics mas sobresalientes de esta historia denominada Amazing Spider-Man #2, a un precio de $37.00.</p>
                            </div>
                            <div class="card-action">
                                <div class="center-align">
                                    <a class="waves-effect waves-light btn cyan darken-3 separar" href="#modal6"> <span class="reponsivo">comentarios</span> <i class="material-icons"><span class="icono-boton">comment</span></i></a>
                                </div>
                                <!-- Modal Structure -->
                                <div id="modal6" class="modal bottom-sheet modal-fixed-footer">
                                    <div class="modal-content">
                                    <h4>Comentarios</h4>
                                    <div class="input-field col s12">
                                        <input id="last_name" type="text" class="validate">
                                        <label for="last_name" class="cyan-text text-darken-3">Comentario</label><!--El cuadro de texto donde se colocara el comentario-->
                                    </div>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    <hr>
                                    <h5>Nombre_usaurio</h5>
                                    <p>
                                        Lugar donde ira el comentario de los clientes
                                    </p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat grey-text text-darken-4">Enviar</a>
                                        <a href="registro.php" class=" modal-action modal-close waves-effect waves-green btn-flat grey-text text-darken-4">Registrate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <section>
    <ul class="pagination center-align texto tipografia ">
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="active cyan darken-3"><a href="#!">1</a></li>
        <li class="waves-effect cyan darken-3"><a href="#!">2</a></li>
        <li class="waves-effect cyan darken-3"><a href="#!">3</a></li>
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>
  </section>
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