<?php
//mandamos a llamar a nuestro archivo maestro
require("../..//lib/master_c.php");
//colocamos el metodo de header
master::header("Login public");
//aqui colocamos una validacion la cual es que si no hay resgristro en admin entonces nos enviara a crear uno
$sql = "SELECT * FROM registro";
$data = Database::getRows($sql, null);
if($data == null)
{
    header("location: registro.php");
}
//aqui mandamos a llamar al metodo post y colocamos la conficionales necesesarias
    try {
    if(!empty($_POST))
    {
        $usuario = $_POST['usuario'];
        $sql = "SELECT correo FROM registro WHERE usuario = ?";
        $params = array($usuario);
        $data = Database::getRow($sql, $params);
        $correo = $data['correo'];
        if($data != null)
        {
            include ('../../archivosmaestros/generar.php');
            $pass = new generar();
            $password = $pass->nueva(8);
            $clave = password_hash($password, PASSWORD_DEFAULT);
            echo $password;
            $sql = "UPDATE registro SET clave = ?, estado = ? WHERE usuario = ?";
            $params = array($clave, 3, $usuario);
            mail($correo, 'Clave Comics&MovieLine', "Usuario aqui te colocamos una Clave que debe colocar para despues cambiarla por tu Clave, La cual es: $password", 'From:miguelrocker3@gmail.com');
            if(Database::executeRow($sql, $params))
            {
                master::showMessage(1, "Nueva Contraseña enviada al correo", "login.php");
            }                             
            else
            {
                throw new Exception(Database::$error[1]);
            }

        }
        else
        {
            throw new Exception("El usuario no existe");
        }

    }
    }
    catch (Exception $error)
    {
        master::showMessage(2, $error->getMessage(), null);
    }

?>
<h3 class="center-align">Recuperar Contraseña</h3>
   <!--en este es el contendor de inicio de sesion --> 
  <section class="container contenedor">
  <div class="row">
    <form class="col s12"method='post'>
        <div class="center-align">
        <i class="material-icons"><a class="icono">person_pin</a></i><!--Icono de la parte superior del formulario-->
        </div>
        <div class='input-field col s12 m12 '>
          	<i class='material-icons prefix'>person</i>
          	<input id='nombre' type='text' name='usuario' class='validate' autocomplete="off" required/>
          	<label for='nombre'>Nombres de Usuario</label>
        </div>
        <div class="center-align  boton">
        <button type='submit' class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">play_arrow</i>Enviar</button>
				<a href="login.php" class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">location_searching</i>Regresar</a> <!--Boton con el cual se ingrasara-->
        </div>
    </form>
  </div>
  </section>
<?php
master::footer("Login public");
?>