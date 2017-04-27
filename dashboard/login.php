<?php
require("../lib/master.php");
master::header("Login");
?>
   <!--en este es el contendor de inicio de sesion --> 
  <section class="container contenedor">
  <div class="row">
    <form class="col s12">
        <div class="center-align">
        <i class="material-icons"><a class="icono">person_pin</a></i><!--Icono de la parte superior del formulario-->
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate">
          <label for="last_name" class="cyan-text text-darken-3">Usuario</label><!--El cuadro de texto donde se pondra el nombre de usuario-->
        </div>
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password" class="cyan-text text-darken-3">Contraseña</label><!--El cuadro de texto donde se colocara la contraseña-->
        </div>
        <div class="center-align  boton">
        <a class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">play_arrow</i>Ingresar</a> <!--Boton con el cual se ingrasara-->
        </div>
        <div class="center-align boton2">
        <a class="waves-effect waves-light btn  #00838f cyan darken-3" href="../dashboard/registro.php"><i class="material-icons right">face</i> Registrate!</a><!--boton para rederigirse a registro-->
        </div>
    </form>
  </div>
  </section>
<?php
master::footer();
?>