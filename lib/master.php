<?php
require('database.php');
$documento = basename($_SERVER['PHP_SELF']);

class master
{
    public static function header($title){
        session_start();
        ini_set("date.timezone", "America/El_Salvador");
        print("
            <!DOCTYPE html>
            <html lang = 'es'>
            <!--Aqui inicia el Head-->
            <head>
                <!--La siguiente linea de codigo sirve para poner las tildes-->
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1'>
                <title>$title</title>
                <!--Se llaman los archivos CSS-->
                <link type='text/css' rel='stylesheet' href='../css/materialize.min.css'>
                <link type='text/css' rel='stylesheet' href='../css/estilos.css'>
                <link type='text/css' rel='stylesheet' href='../css/icon.css'>
                <link rel='shortcut icon' href='../img/logo.png'>
                <div id='fb-root'></div>
            </head>
            <!--Aqui comienza el body-->
            <body>
        ");
        if(isset($_SESSION['nombre_usuario']))
        {
            print("
                <div class='navbar-fixed z-depth-4' id='menu'>
                    <nav class='tipografia'>
                        <div class='nav-wrapper #00838f cyan darken-3'>
                            <a href='#!' class='brand-logo logo'><img src='../img/logo.png'></a>
                            <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
                            <ul class='right hide-on-med-and-down'>
                                <li><a href='index.php' class='texto waves-effect waves-teal'><i class='material-icons left'>home</i>INICIO</a></li>
                                <li><a href='productos.php' class='waves-effect waves-teal texto'><i class='material-icons left'>extension</i>PRODUCTOS</a></li>
                                <li><a href='soporte_linea.php' class='waves-effect waves-teal texto'><i class='material-icons left'>question_answer</i>SOPORTE EN LÍNEA</a></li>
                                <li class='active'><a href='login.php' class='waves-effect waves-teal texto'><i class='material-icons left'>person</i>INICIAR SESIÓN</a></li>
                                <li><a href='compras.php' class='waves-effect waves-teal texto'><i class='material-icons'>shopping_cart</i></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--Menu para el Mobil-->
                <ul class='side-nav cyan darken-4 z-depth-4' id='mobile-demo'>
                <li><a href='#!' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>home</i>INICIO</a></li>
                <li><a href='productos.php' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>extension</i>PRODUCTOS</a></li>
                <li><a href='soporte_linea.php' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>question_answer</i>SOPORTE EN LÍNEA</a></li>
                <li class='active'><a href='#!' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>person</i>INICIAR SESIÓN</a></li>
                <li><a href='compras.php' class='texto white-text waves-effect waves-teal'><i class='material-icons white-text'>shopping_cart</i>COMPRAS</a></li>
                </ul>
            
            ");

        }
        else
        {
            print("
                <div class='navbar-fixed z-depth-4' id='menu'>
                    <nav class='tipografia'>
                        <div class='nav-wrapper #00838f cyan darken-3'>
                            <a href='#!' class='brand-logo logo'><img src='../img/logo.png'></a>
                            <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
                            <ul class='right hide-on-med-and-down'>
                                <li><a href='index.php' class='texto waves-effect waves-teal'><i class='material-icons left'>home</i>INICIO</a></li>
                                <li><a href='productos.php' class='waves-effect waves-teal texto'><i class='material-icons left'>extension</i>PRODUCTOS</a></li>
                                <li><a href='soporte_linea.php' class='waves-effect waves-teal texto'><i class='material-icons left'>question_answer</i>SOPORTE EN LÍNEA</a></li>
                                <li class='active'><a href='login.php' class='waves-effect waves-teal texto'><i class='material-icons left'>person</i>INICIAR SESIÓN</a></li>
                                <li><a href='compras.php' class='waves-effect waves-teal texto'><i class='material-icons'>shopping_cart</i></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--Menu para el Mobil-->
                <ul class='side-nav cyan darken-4 z-depth-4' id='mobile-demo'>
                <li><a href='#!' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>home</i>INICIO</a></li>
                <li><a href='productos.php' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>extension</i>PRODUCTOS</a></li>
                <li><a href='soporte_linea.php' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>question_answer</i>SOPORTE EN LÍNEA</a></li>
                <li class='active'><a href='#!' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>person</i>INICIAR SESIÓN</a></li>
                <li><a href='compras.php' class='texto white-text waves-effect waves-teal'><i class='material-icons white-text'>shopping_cart</i>COMPRAS</a></li>
                </ul>
            
            ");

        }

    }

    public static function footer()
    {
        print("
            <footer class='page-footer tipografia #00838f cyan darken-3'>
                <div class='container'>
                <div class='row'>
                    <div class='col l6 s12'>
                    <h5 class='white-text'>Ubicación</h5>
                        <p class='grey-text text-lighten-4'><div id='map'></div></p>
                    </div>
                    <div class='col l4 offset-l2 s12'>
                        <h5 class='white-text'>Dirección</h5>
                        <ul>
                            <li><a class='grey-text text-lighten-3'>Carr. Panamericana, local numero 12, justo despues de la tienda que vende chorys y despues de la pizahut.</a></li>
                        </ul>
                        <h5 class='white-text'>Links</h5>
                        <ul>
                            <li><a class='grey-text text-lighten-3' href='#!'>
                                <div class='fb-like' data-href='https://www.facebook.com/TheTopComics' data-width='20' data-layout='button_count' data-action='like' data-size='large' data-show-faces='false' data-share='false'></div>    
                            </a></li>
                            <li><a class='grey-text text-lighten-3' href='#!'><a href='https://twitter.com/TheTopComics' class='twitter-follow-button' data-show-count='true' data-size='large'>Follow @TheTopComics</a></a></li>
                            <li><a class='grey-text text-lighten-3' href='#!'>
                            <div class='g-ytsubscribe' data-channel='ComicGameMexico' data-layout='default' data-count='default'></div>
                            </a></li>
                            <li><a class='grey-text text-lighten-3' href='#!'><a href='https://www.instagram.com/thetopcomicsoficial/' class='ig-b- ig-b-v-24'><img src='../img/instagram.png' alt='Instagram' /></a></a></li>
                        </ul>
                    </div>
                </div>
                </div>
                <div class='footer-copyright'>
                <div class='container'>
                © 2017 Copyright
                <a class='grey-text text-lighten-4 right' href='#!'>5588-7799</a>
                </div>
                </div>
            </footer>
            <script src='../js/jquery-3.1.1.min.js'></script>
            <script src='../js/materialize.min.js'></script>
            <script src='../js/main.js'></script>
            <script src='../js/mapa.js' async defer></script>
            <script async src='../js/tweet.js' charset='utf-8'></script>
            <script src='../js/youtube.js'></script>
           </body>
        </html>
        ");

    }

}
?>