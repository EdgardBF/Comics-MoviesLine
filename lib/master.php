<?php
//mandamos a llamar a nuestros archivos maestros de conexion a base de datos y validador de forms
require('database.php');
require('validator.php');
//Inicio del nombre de la clase denominada master
class master
{
    //mandamos a llamar un metodo de la clase llama header el cual tendra todos los archivos css de la pagina y nav de la pagina
    public static function header($title){
        session_start();    
        ini_set("date.timezone", "America/El_Salvador");
        //colocamos una condicional que si se esta en el sitio publico usara esa direccion 
        if($title=="Inicio" || $title=="Soporte_Linea" || $title=="Productos"){
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
                <link type='text/css' rel='stylesheet' href='../css/zebra_pagination.css'>
                <link type='text/css' rel='stylesheet' href='../css/estilos.css'>
                <link type='text/css' rel='stylesheet' href='../css/sweetalert2.min.css'/>
                <link type='text/css' rel='stylesheet' href='../css/icon.css'>
                <script type='text/javascript' src='../js/sweetalert2.min.js'></script>
                <script type='text/javascript' src='../js/validator.js'></script>
                <link rel='shortcut icon' href='../img/logo.png'>
                <div id='fb-root'></div>
            </head>
            <!--Aqui comienza el body-->
            <body>
        ");
        }
        //sino esta en esas paginas estara en esta
        else{
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
                <link type='text/css' rel='stylesheet' href='../../css/materialize.min.css'>
                <link type='text/css' rel='stylesheet' href='../../css/estilos.css'>
                <link type='text/css' rel='stylesheet' href='../../css/zebra_pagination.css'>
                <link type='text/css' rel='stylesheet' href='../../css/sweetalert2.min.css'/>
                <link type='text/css' rel='stylesheet' href='../../css/icon.css'>
                <script type='text/javascript' src='../../js/sweetalert2.min.js'></script>
                <script type='text/javascript' src='../../js/validator.js'></script>
                <link rel='shortcut icon' href='../../img/logo.png'>
                <div id='fb-root'></div>
            </head>
            <!--Aqui comienza el body-->
            <body>
        ");
        }
        if(isset($_SESSION['usuario']))
        {
            $documento = basename($_SERVER['PHP_SELF']);
            if($documento =="login.php")
			{
				self::showMessage(3, "¡No puede!", "main.php");
				self::footer("Restrict");
				exit;
			}
            //esta cantidad de condicionales se utilizan para el menu del sitio publico
            $activo1 = null;
            $activo2 = null;
            $activo3 = null;
            $activo4 = null;
            $activo5 = null;
            if ($documento=="index.php"){
                $activo1='active';
                $activo2 = null;
                $activo3 = null;
                $activo4 = null;
                $activo5 = null;
            }
            else if ($documento=="productos.php"){
                $activo1=null;
                $activo2 = 'active';
                $activo3 = null;
                $activo4 = null;
                $activo5 = null;
            }
            else if($documento=="soporte_linea.php"){
                $activo1=null;
                $activo2 = null;
                $activo3 = 'active';
                $activo4 = null;
                $activo5 = null;
            }
            else if($documento=="login.php"){
                $activo1=null;
                $activo2 = null;
                $activo3 = null;
                $activo4 = 'active';
                $activo5 = null;
            }
            else if($documento=="compras.php"){
                $activo1=null;
                $activo2 = null;
                $activo3 = null;
                $activo4 = null;
                $activo5 = 'active';  
            }
            //condifcional que si se encuentra en esta paginas lo llevaran al nav publico de la pagina
            if($title=="Inicio" || $title=="Soporte_Linea" || $title=="Productos" || $title=="Editar perfil" || $title=="Carrito"){
                if($title=="Editar perfil" || $title=="Carrito" )
                {
                    print("
                        <div class='navbar-fixed z-depth-4' id='menu'>
                            <nav class='tipografia'>
                                <div class='nav-wrapper #00838f cyan darken-3'>
                                    <a href='#!' class='brand-logo logo'><img src='../../img/logo.png'></a>
                                    <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
                                    <ul class='right hide-on-med-and-down'>
                                        <li class='$activo1'><a href='../../public/index.php' class='texto waves-effect waves-teal'><i class='material-icons left'>home</i>INICIO</a></li>
                                        <li class='$activo2'><a href='../../public/productos.php' class='waves-effect waves-teal texto'><i class='material-icons left'>extension</i>PRODUCTOS</a></li>
                                        <li class='$activo3'><a href='../../public/soporte_linea.php' class='waves-effect waves-teal texto'><i class='material-icons left'>question_answer</i>SOPORTE EN LÍNEA</a></li>
                                        <li class='$activo4'><a href='../dashboard/main_public/login.php' class='dropdown-button texto' data-activates='dropdown'><i class='material-icons left'>mood</i>".$_SESSION['usuario']."</a></li>
                                        <li class='$activo5'><a href='../dashboard/main_public/compras.php' class='waves-effect waves-teal texto'><i class='material-icons'>shopping_cart</i></a></li>
                                    </ul>
                                    <ul id='dropdown' class='dropdown-content'>
                                        <li><a href='../dashboard/main_public/perfil.php'><i class='material-icons left'>edit</i>Editar perfil</a></li>
                                        <li><a href='../main_public/logout.php'><i class='material-icons left'>clear</i>Salir</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!--Menu para el Mobil-->
                        <ul class='side-nav cyan darken-4 z-depth-4' id='mobile-demo'>
                        <li class='$activo1'><a href='../public/index.php' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>home</i>INICIO</a></li>
                        <li class='$activo2'><a href='../public/productos.php' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>extension</i>PRODUCTOS</a></li>
                        <li class='$activo3'><a href='../public/soporte_linea.php' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>question_answer</i>SOPORTE EN LÍNEA</a></li>
                        <li class='$activo4'><a class='texto dropdown-button'><i class='material-icons left white-text'>mood</i>".$_SESSION['usuario']."</a></li>
                        <li class='$activo5'><a href='../dashboard/main_public/compras.php' class='texto white-text waves-effect waves-teal'><i class='material-icons white-text'>shopping_cart</i>COMPRAS</a></li>
                        </ul>
                        <ul id='dropdown' class='dropdown-content'>
                        <li><a href='perfil.php'><i class='material-icons left'>edit</i>Editar perfil</a></li>
                        <li><a href='../dashboard/main_public/logout.php'><i class='material-icons left'>clear</i>Salir</a></li>
                        </ul>
                        <main>
                    
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
                                        <li class='$activo1'><a href='../public/index.php' class='texto waves-effect waves-teal'><i class='material-icons left'>home</i>INICIO</a></li>
                                        <li class='$activo2'><a href='../public/productos.php' class='waves-effect waves-teal texto'><i class='material-icons left'>extension</i>PRODUCTOS</a></li>
                                        <li class='$activo3'><a href='../public/soporte_linea.php' class='waves-effect waves-teal texto'><i class='material-icons left'>question_answer</i>SOPORTE EN LÍNEA</a></li>
                                        <li class='$activo4'><a href='../dashboard/main_public/login.php' class='dropdown-button texto' data-activates='dropdown'><i class='material-icons left'>mood</i>".$_SESSION['usuario']."</a></li>
                                        <li class='$activo5'><a href='../dashboard/main_public/compras.php' class='waves-effect waves-teal texto'><i class='material-icons'>shopping_cart</i></a></li>
                                    </ul>
                                    <ul id='dropdown' class='dropdown-content'>
                                        <li><a href='../dashboard/main_public/perfil.php'><i class='material-icons left'>edit</i>Editar perfil</a></li>
                                        <li><a href='../dashboard/main_public/logout.php'><i class='material-icons left'>clear</i>Salir</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!--Menu para el Mobil-->
                        <ul class='side-nav cyan darken-4 z-depth-4' id='mobile-demo'>
                        <li class='$activo1'><a href='../public/index.php' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>home</i>INICIO</a></li>
                        <li class='$activo2'><a href='../public/productos.php' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>extension</i>PRODUCTOS</a></li>
                        <li class='$activo3'><a href='../public/soporte_linea.php' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>question_answer</i>SOPORTE EN LÍNEA</a></li>
                        <li class='$activo4'><a class='texto dropdown-button'><i class='material-icons left white-text'>mood</i>".$_SESSION['usuario']."</a></li>
                        <li class='$activo5'><a href='../dashboard/main_public/compras.php' class='texto white-text waves-effect waves-teal'><i class='material-icons white-text'>shopping_cart</i>COMPRAS</a></li>
                        </ul>
                        <ul id='dropdown' class='dropdown-content'>
                        <li><a href='perfil.php'><i class='material-icons left'>edit</i>Editar perfil</a></li>
                        <li><a href='../dashboard/main_public/logout.php'><i class='material-icons left'>clear</i>Salir</a></li>
                        </ul>
                        <main>
                    ");
                }
            }
            //sino se mandara al nav de administrador
            else{
                    if($_SESSION['key'] == 0)
                    {
                        master::showMessage(2, "NO TIENE PERMISOS", "../../index.php");
                    }
                    else
                    {
                 print("
                <div class='navbar-fixed z-depth-4' id='menu'>
                    <nav class='tipografia'>
                        <div class='nav-wrapper #00838f cyan darken-3'>
                            <a href='#!' class='brand-logo logo'><img src='../../img/logo.png'></a>
                            <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
                            <ul class='right hide-on-med-and-down'>
                            <li><a href='main.php' class='texto waves-effect waves-teal'><i class='material-icons left'>home</i>Inicio</a></li>
                            <li><a class='texto dropdown-button' data-activates='dropdown4'><i class='material-icons left white-text'>arrow_drop_down</i>Productos</a></li>
                            <ul id='dropdown4' class='dropdown-content'>
								 <li><a href='productos_admin.php' class='waves-effect waves-teal texto'><i class='material-icons left'>extension</i>Productos</a></li>
								<li><a href='tipo_producto.php' class='waves-effect waves-teal texto'><i class='material-icons left'>event_seat</i>Tipo de Productos</a></li>
                                <li><a href='noticias.php' class='waves-effect waves-teal texto'><i class='material-icons left'>fiber_new</i>Noticias</a></li>
                                <li><a href='comentarios.php' class='waves-effect waves-teal texto'><i class='material-icons left'>question_answer</i>Comentarios</a></li>
                                <li><a href='distribuidor.php' class='waves-effect waves-teal texto'><i class='material-icons left'>airplanemode_active</i>Distribuidores</a></li>
							</ul>
                            <li><a class='texto dropdown-button' data-activates='dropdown3'><i class='material-icons left white-text'>arrow_drop_down</i>Usuarios</a></li>
                            <ul id='dropdown3' class='dropdown-content'>
								 <li><a href='index_users.php' class='waves-effect waves-teal texto'><i class='material-icons left'>question_answer</i>Usuarios</a></li>
								 <li><a href='index_types.php' class='waves-effect waves-teal texto'><i class='material-icons left'>face</i>Tipos Usuario</a></li>
                                 <li><a href='index_admin.php' class='texto waves-effect waves-teal'><i class='material-icons left'>vpn_key</i>Administradores</a></li>
							</ul>
                            <li><a class='texto dropdown-button' data-activates='dropdown2'><i class='material-icons left white-text'>mood</i>".$_SESSION['usuario']."</a></li>
                            </ul>
                            <ul id='dropdown2' class='dropdown-content'>
								<li><a href='perfil.php'><i class='material-icons left'>edit</i>Perfil</a></li>
								<li><a href='../../dashboard/main_admin/logout.php'><i class='material-icons left'>clear</i>Salir</a></li>
							</ul>
                        </div>
                    </nav>
                </div>
                <!--Menu para el Mobil-->
                <ul class='side-nav cyan darken-4 z-depth-4' id='mobile-demo'>
                <li ><a href='index_admin.php' class='texto waves-effect waves-teal'><i class='material-icons left'>vpn_key</i>Administradores</a></li>
                <li ><a href='productos_admin.php' class='waves-effect waves-teal texto'><i class='material-icons left'>extension</i>Productos</a></li>
                    <li><a href='index_types.php' class='waves-effect waves-teal texto'><i class='material-icons left'>face</i>Tipos Usuario</a></li>
                    <li><a href='main.php' class='texto waves-effect waves-teal'><i class='material-icons left'>home</i>Inicio</a></li>
                    <li><a href='index_users.php' class='waves-effect waves-teal texto'><i class='material-icons left'>question_answer</i>Usuarios</a></li>
                    <li><a href='tipo_producto.php' class='waves-effect waves-teal texto'><i class='material-icons left'>event_seat</i>Tipo de Productos</a></li>
                    <li><a href='noticias.php' class='waves-effect waves-teal texto'><i class='material-icons left'>fiber_new</i>Noticias</a></li>
                    <li><a href='comentarios.php' class='waves-effect waves-teal texto'><i class='material-icons left'>question_answer</i>Comentarios</a></li>
                    <li><a href='distribuidor.php' class='waves-effect waves-teal texto'><i class='material-icons left'>airplanemode_active</i>Distribuidores</a></li>
                    <li><a class='texto dropdown-button' data-activates='dropdown1'><i class='material-icons left'>mood</i>".$_SESSION['usuario']."</a></li>
                </ul>
                <ul id='dropdown1' class='dropdown-content'>
                <li><a href='../main/profile.php'><i class='material-icons left'>edit</i>Editar perfil</a></li>
                <li><a href='../../dashboard/main_admin/logout.php'><i class='material-icons left'>clear</i>Salir</a></li>
                </ul>
                <main>
            
            ");
                    }
            }

        }
        //estas son la codicional porsi no se ha iniciado sesion
        else
        {
            $documento = basename($_SERVER['PHP_SELF']);
            $activo1 = null;
            $activo2 = null;
            $activo3 = null;
            $activo4 = null;
            $activo5 = null;
            if ($documento=="index.php"){
                $activo1='active';
                $activo2 = null;
                $activo3 = null;
                $activo4 = null;
                $activo5 = null;
            }
            else if ($documento=="productos.php"){
                $activo1=null;
                $activo2 = 'active';
                $activo3 = null;
                $activo4 = null;
                $activo5 = null;
            }
            else if($documento=="soporte_linea.php"){
                $activo1=null;
                $activo2 = null;
                $activo3 = 'active';
                $activo4 = null;
                $activo5 = null;
            }
            else if($documento=="login.php"){
                $activo1=null;
                $activo2 = null;
                $activo3 = null;
                $activo4 = 'active';
                $activo5 = null;
            }
            else if($documento=="compras.php"){
                $activo1=null;
                $activo2 = null;
                $activo3 = null;
                $activo4 = null;
                $activo5 = 'active';  
            }
 if($title=="Inicio" || $title=="Soporte_Linea" || $title=="Productos"){
            print("
                <div class='navbar-fixed z-depth-4' id='menu'>
                    <nav class='tipografia'>
                        <div class='nav-wrapper #00838f cyan darken-3'>
                            <a href='#!' class='brand-logo logo'><img src='../img/logo.png'></a>
                            <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
                            <ul class='right hide-on-med-and-down'>
                                <li class='$activo1'><a href='../public/index.php' class='texto waves-effect waves-teal'><i class='material-icons left'>home</i>INICIO</a></li>
                                <li class='$activo2'><a href='../public/productos.php' class='waves-effect waves-teal texto'><i class='material-icons left'>extension</i>PRODUCTOS</a></li>
                                <li class='$activo3'><a href='../public/soporte_linea.php' class='waves-effect waves-teal texto'><i class='material-icons left'>question_answer</i>SOPORTE EN LÍNEA</a></li>
                                <li class='$activo4'><a href='../dashboard/main_public/login.php' class='waves-effect waves-teal texto'><i class='material-icons left'>person</i>INICIAR SESIÓN</a></li>
                                <li class='$activo5'><a href='../dashboard/main_public/compras.php' class='waves-effect waves-teal texto'><i class='material-icons'>shopping_cart</i></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--Menu para el Mobil-->
                <ul class='side-nav cyan darken-4 z-depth-4' id='mobile-demo'>
                <li class='$activo1'><a href='../public/index.php' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>home</i>INICIO</a></li>
                <li class='$activo2'><a href='../public/productos.php' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>extension</i>PRODUCTOS</a></li>
                <li class='$activo3'><a href='../public/soporte_linea.php' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>question_answer</i>SOPORTE EN LÍNEA</a></li>
                <li class='$activo4'><a href='../dashboard/main_public/login.php' class='texto white-text waves-effect waves-teal'><i class='material-icons left white-text'>person</i>INICIAR SESIÓN</a></li>
                <li class='$activo5'><a href='../dashboard/main_public/compras.php' class='texto white-text waves-effect waves-teal'><i class='material-icons white-text'>shopping_cart</i>COMPRAS</a></li>
                </ul>
                <main>
            
            ");
            }
            else{
                 print("
                <div class='navbar-fixed z-depth-4' id='menu'>
                    <nav class='tipografia'>
                        <div class='nav-wrapper #00838f cyan darken-3'>
                            <a href='../../index.php' class='brand-logo logo'><img src='../../img/logo.png'></a>
                        </div>
                    </nav>
                </div>
                <!--Menu para el Mobil-->
                <ul class='side-nav cyan darken-4 z-depth-4' id='mobile-demo'>
                </ul>   
                <main>         
            ");
                        //se utiliza para validar la entrada
            if($documento !="login.php" && $documento != "registro_admin.php" && $documento != "registro.php")
			{
				self::showMessage(3, "¡Debe iniciar sesión!", "login.php");
				self::footer("Restrict");
				exit;
			}
            }

        }

    }

//metodo para el footer de la pagina
    public static function footer($title)
    {
        if($title=="Inicio" || $title=="Soporte_Linea" || $title=="Productos" || $title=="Login public"){
            if($title=="Login public")
            {
                print("
                </main>
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
            <script src='../../js/jquery-3.1.1.min.js'></script>
            <script src='../../js/materialize.min.js'></script>
            <script src='../../js/main.js'></script>
            <script src='../../js/mapa.js' async defer></script>
            <script async src='../../js/tweet.js' charset='utf-8'></script>
            <script src='../../js/youtube.js'></script>
           </body>
        </html>
        ");

            }
            else
            {
                print("
                </main>
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
    else{
                print("
                </main>
            <footer class='page-footer tipografia #00838f cyan darken-3'>
				<div class='container'>
					<div class='row'>
						<div class='col s12 m6'>
							<h5 class='white-text'>Dashboard</h5>
							<a class='white-text' href='mailto:dacasoft@outlook.com'><i class='material-icons left'>email</i>Comunicate con Nosotros</a>
						</div>
						<div class='col s12 m6'>
							<h5 class='white-text'>Enlaces</h5>
							<a class='white-text' href='../../public/' target='_blank'><i class='material-icons left'>store</i>Sitio público</a>
						</div>
					</div>
				</div>
				<div class='footer-copyright'>
					<div class='container'>
						<span> © 2017 Copyright</span>
						<span class='white-text right'>Diseñado con <a class='red-text text-accent-1' href='http://materializecss.com/' target='_blank'><b>Materialize</b></a></span>
					</div>
				</div>
            </footer>
            <script src='../../js/jquery-3.1.1.min.js'></script>
            <script src='../../js/materialize.min.js'></script>
            <script src='../../js/main.js'></script>
            <script src='../../js/mapa.js' async defer></script>
            <script async src='../../js/tweet.js' charset='utf-8'></script>
            <script src='../../js/youtube.js'></script>
           </body>
        </html>
        ");
    }

    }
    //este metodo es usado para la alertas de sweet alert en donde se pido el tipo el mensaje que llevara y adonde se redirijira
 public static function showMessage($type, $message, $url)
	{
		if(is_numeric($message))
		{
			switch($message)
			{
				case 1045:
					$text = "Autenticación desconocida";
					break;
				case 1049:
					$text = "Base de datos desconocida";
					break;
				case 1054:
					$text = "Nombre de campo desconocido";
					break;
				case 1062:
					$text = "Dato duplicado, no se puede guardar";
					break;
				case 1146:
					$text = "Nombre de tabla desconocido";
					break;
				case 1451:
					$text = "Registro ocupado, no se puede eliminar";
					break;
				case 2002:
					$text = "Servidor desconocido";
					break;
				default:
					$text = "Ocurrio un problema, contacte al administrador";
			}
		}
		else
		{
			$text = $message;
		}

		switch($type)
		{
			case 1:
				$title = "Éxito";
				$icon = "success";
				break;
			case 2:
				$title = "Error";
				$icon = "error";
				break;
			case 3:
				$title = "Advertencia";
				$icon = "warning";
				break;
			case 4:
				$title = "Aviso";
				$icon = "info";
		}

		if($url != null)
		{
			print("<script>swal({title: '$title', text: '$text', type: '$icon', confirmButtonText: 'Aceptar', allowOutsideClick: false, allowEscapeKey: false}).then(function(){location.href = '$url'})</script>");
		}
		else
		{
			print("<script>swal({title: '$title', text: '$text', type: '$icon', confirmButtonText: 'Aceptar', allowOutsideClick: false, allowEscapeKey: false})</script>");
		}
	}
//este metodo es para colocar los datos del combobox
    public static function setCombo($label, $name, $value, $query)
	{
		$data = Database::getRows($query, null);
		print("<select name='$name' required>");
		if($data != null)
		{
			if($value == null)
			{
				print("<option value='' disabled selected>Seleccione una opción</option>");
			}
			foreach($data as $row)
			{
				if(isset($_POST[$name]) == $row[0] || $value == $row[0])
				{
					print("<option value='$row[0]' selected>$row[1]</option>");
				}
				else
				{
					print("<option value='$row[0]'>$row[1]</option>");
				}
			}
		}
		else
		{
			print("<option value='' disabled selected>No hay registros</option>");
		}
		print("
			</select>
			<label>$label</label>
		");
	}

}
?>