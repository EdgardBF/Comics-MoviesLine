<?php
require("../lib/master.php");
master::header("Registro");
?>
    <!--Uso de un contenedor para colocar los datos y de una clase para el cambio de colores-->
    <section class="container contenedor2">
    <div class="row">
        <form class="col s12">
            <div class="center-align">
            <i class="material-icons"><a class="icono">note_add</a></i><!--Icono de la parte superior-->
            </div>
            <div class="input-field col s12">
                <input id="last_name" type="text" class="validate">
                <label for="last_name" class="cyan-text text-darken-3">Nombre completo</label><!--El cuadro de texto donde se pondra el nombre completo-->
            </div>
            <div class="input-field col s12">
                <input id="email" type="email" class="validate">
                <label for="email" class="cyan-text text-darken-3">Email</label><!--El cuadro de texto donde se pondra el Email-->
            </div>
            <div class="input-field col s12">
                <input id="last_name" type="text" class="validate">
                <label for="last_name" class="cyan-text text-darken-3">Usuario</label><!--El cuadro de texto donde se pondra el nombre de usuario-->
            </div>
            <div class="input-field col s12">
                <input id="password" type="password" class="validate">
                <label for="password" class="cyan-text text-darken-3">Contraseña</label><!--El cuadro de texto donde se pondra la contraseña-->
            </div>
             <div class="input-field col s12">
                <input id="password" type="password" class="validate">
                <label for="password" class="cyan-text text-darken-3">Verificar Contraseña</label><!--El cuadro de texto donde se pondra para verificar la contraseña-->
            </div>
            <div class="center-align  boton">
                <a class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">create</i>Crear</a><!--boton para poner guardar-->
            </div>
            <div class="center-align boton2">
                <a class="waves-effect waves-light btn  #00838f cyan darken-3" href="login.php"><i class="material-icons right">face</i> Ya existo!</a><!--boton para redirigirse de un solo-->
            </div>
        </form>
  </div>
  </section>
<?php
master::footer();
?>