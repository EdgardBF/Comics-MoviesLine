<?php
require("../../lib/master.php");
master::header("Editar perfil");

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
  	$nombres = $_POST['nombre'];
    $correo = $_POST['correo'];
    $alias = $_POST['usuario'];
    $clave1 = $_POST['clave1'];
    $clave2 = $_POST['clave2'];

    try 
    {
      	if($nombres != "")
        {
            if($correo != "")
            {
                if($alias != "")
                {
                    if($clave1 != "" || $clave2 != "")
                    {
                        if($clave1 == $clave2)
                        {
                            $clave = password_hash($clave1, PASSWORD_DEFAULT);
                            $sql = "UPDATE registro SET nombre = ?, correo = ?, usuario = ?, clave = ? WHERE id_registro = ?";
                            $params = array($nombres, $correo, $alias, $clave, $_SESSION['id_registro']);
                        }
                        else
                        {
                            throw new Exception("Las contraseñas no coinciden");
                        }
                    }
                    else
                    {
                        $sql = "UPDATE registro SET nombre = ?, correo = ?, usuario = ? WHERE id_registro = ?";
                        $params = array($nombres, $correo, $alias, $_SESSION['id_registro']);
                    }
                if(Database::executeRow($sql, $params))
	            {
                    master::showMessage(1, "Operación satisfactoria", "main_user.php");
                }                             
                else
                {
                    throw new Exception(Database::$error[1]);
                }
                }
                else
                {
                    throw new Exception("Debe ingresar un nombre de usuario");
                }
            }
            else
            {
                throw new Exception("Debe ingresar un correo electrónico");
            }
        }
        else
        {
            throw new Exception("Debe ingresar el nombre completo");
        }
    }
    catch (Exception $error)
    {
        master::showMessage(2, $error->getMessage(), null);
    }
}
else
{
    //Selecciona los datos del registro
    $sql = "SELECT * FROM registro WHERE id_registro = ?";
    $params = array($_SESSION['id_registro']);
    $data = Database::getRow($sql, $params);
    $nombres = $data['nombre'];
    $correo = $data['correo'];
    $alias = $data['usuario'];
}
?>
<br>
<form method='post'>
    <div class='row'>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>person</i>
          	<input id='nombre' type='text' name='nombre' class='validate' value='<?php print($nombres); ?>' required/>
          	<label for='nombre'>Nombres</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>email</i>
            <input id='correo' type='email' name='correo' class='validate' value='<?php print($correo); ?>' required/>
            <label for='correo'>Correo</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>person_pin</i>
            <input id='usuario' type='text' name='usuario' class='validate' value='<?php print($alias); ?>' required/>
            <label for='usuario'>Usuario</label>
        </div>
    </div>
    <div class='row center-align'>
        <label>CAMBIAR CLAVE</label>
    </div>
    <div class='row'>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>security</i>
            <input id='clave1' type='password' name='clave1' class='validate'/>
            <label for='clave1'>Contraseña nueva</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>security</i>
            <input id='clave2' type='password' name='clave2' class='validate'/>
            <label for='clave2'>Confirmar contraseña</label>
        </div>
    </div>
            <div class='row center-align'>
                <a href='../../public/index.php' class='btn waves-effect red'>Cancelar<i class='material-icons left'>highlight_off</i></a>
                <button type='submit' class='btn waves-effect blue'>Guardar<i class='material-icons left'>add_circle_outline</i></button>
            </div>
</form>

<?php
master::footer("Editar perfil");
?>