<?php
require("../../lib/master.php");
master::header("Login public");
$time = time();
$fecha = date("Y-m-d ", $time);
$sql = "SELECT * FROM registro";
$data = Database::getRows($sql, null);
if($data == null)
{
    header("location: registro.php");
}
if(!empty($_POST))
{
	$_POST = validator::validateForm($_POST);
  	$usuario = $_POST['usuario'];
  	$clave = $_POST['clave'];
  	try
    {
      	if($usuario != "" && $clave != "")
  		{
  			$sql = "SELECT * FROM registro WHERE usuario = ?";
		    $params = array($usuario);
		    $data = Database::getRow($sql, $params);
		    if($data != null)
		    {
		    	$hash = $data['clave'];
		    	if(password_verify($clave, $hash)) 
		    	{
            if($data['estado'] != 0)
            {
              if($data['conexion'] == 0)
              {
                $sql = "UPDATE registro SET conexion = ? WHERE usuario = ?";
                $params = array(1, $usuario);
                if(Database::executeRow($sql, $params))
                {
                  $_SESSION['id_registro'] = $data['id_registro'];
                  $_SESSION['usuario'] = $data['usuario'];
                  $_SESSION['key'] = 0;
                  header("location: main_user.php");	
                }              
                else
                {
                    throw new Exception(Database::$error[1]);
                }
              }
              else
              {
                mail($data['correo'], 'Conexión Invalida de Usuario, Comics & Movies Line', "Usuario se le informa que el dia ".$fecha.", mientras estaba conectado, Una persona desconocida intento ingresar a su Cuenta", 'From:alexander21171015@gmail.com');
                throw new Exception("El usuario esta Conectado actualmente");
              }	
            }
            else
            {
              throw new Exception("El usuario esta desactivado");
            }		      	
				}
				else 
				{
					throw new Exception("La clave ingresada es incorrecta");
				}
		    }
		    else
		    {
		    	throw new Exception("El alias ingresado no existe");
		    }
	  	}
	  	else
	  	{
	    	throw new Exception("Debe ingresar un alias y una clave");
	  	}
    }
    catch (Exception $error)
    {
        master::showMessage(2, $error->getMessage(), null);
    }
}
?>
   <!--en este es el contendor de inicio de sesion --> 
  <section class="container contenedor">
  <div class="row">
    <form class="col s12"method='post'>
        <div class="center-align">
        <i class="material-icons"><a class="icono">person_pin</a></i><!--Icono de la parte superior del formulario-->
        </div>
        <div class="input-field col s12">
          <input id="usuario" type="text" name="usuario" class="validate"  required/>
          <label for="usuario" class="cyan-text text-darken-3">Usuario</label><!--El cuadro de texto donde se pondra el nombre de usuario-->
        </div>
        <div class="input-field col s12">
          <input id="clave" type="password" name="clave" class="validate"  required/>
          <label for="clave" class="cyan-text text-darken-3">Contraseña</label><!--El cuadro de texto donde se colocara la contraseña-->
        </div>
        <div class="center-align  boton">
        <button type='submit' class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">play_arrow</i>Ingresar</button>
        <a href="recucontra.php" class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">location_searching</i>Recuperar contraseña</a> <!--Boton con el cual se ingrasara--> <!--Boton con el cual se ingrasara-->
        </div>
        <div class="center-align boton2">
        <a class="waves-effect waves-light btn  #00838f cyan darken-3" href="registro.php"><i class="material-icons right">face</i> Registrate!</a><!--boton para rederigirse a registro-->
        </div>
    </form>
  </div>
  </section>
<?php
master::footer("Login public");
?>