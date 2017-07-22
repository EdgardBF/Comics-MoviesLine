<?php
//mandamos a llamar a nuestro archivo maestro
require("../..//lib/master.php");
//colocamos el metodo de header
master::header("Login");
//aqui colocamos una validacion la cual es que si no hay resgristro en admin entonces nos enviara a crear uno
$sql = "SELECT * FROM administradores";
$data = Database::getRows($sql, null);
if($data == null)
{
    header("location: registro_admin.php");
}

//aqui mandamos a llamar al metodo post y colocamos la conficionales necesesarias
if(!empty($_POST))
{
	if(isset($_SESSION['intetos']))
	{

	}
	else
	{
		$_SESSION['intetos'] = 0;
	}
	$_POST = validator::validateForm($_POST);
  	$usuario = $_POST['usuario'];
  	$clave = $_POST['clave'];
						if(isset($_SESSION['usu']))
	{

	}
	else
	{
		$_SESSION['usu'] = $usuario;
	}
	if( $_SESSION['usu'] == $usuario)
	{

	}
	else
	{
		$_SESSION['usu'] == $usuario;
		$_SESSION['intetos'] = 0;
	}
  	try
    {
      	if($usuario != "" && $clave != "")
  		{
  			$sql = "SELECT * FROM administradores WHERE usuario = ?";
		    $params = array($usuario);
		    $data = Database::getRow($sql, $params);
		    if($data != null)
		    {
					$hash = $data['clave'];
					if ($data['estado'] ==2)
					{
					if(password_verify($clave, $hash) && $data['estado'] ==2 ) 
					{
						$sql = "UPDATE administradores SET estado = ? WHERE usuario = ?";
						$params = array(1, $usuario);
						if(Database::executeRow($sql, $params))
						{
							
						}                             
						else
						{
								throw new Exception(Database::$error[1]);
						}

					}
					else
					{
						throw new Exception("el usuario es bloqueado");
					}
					}

					if($_SESSION['intetos']<3)
					{
		    	if(password_verify($clave, $hash)) 
					{
						
				$sql1 = "SELECT administradores.usuario, tipo_usuario.tipo , seleccionar, crear, leer, actualizar, eliminar FROM administradores, tipo_usuario WHERE administradores.id_tipo_usuario=tipo_usuario.id_tipo_usuario AND administradores.usuario = ?";
		    $params1 = array($usuario);
		    $data1 = Database::getRow($sql1, $params1);
			    	  $_SESSION['id_admin'] = $data['id_admin'];
			        $_SESSION['usuario'] = $data['usuario'];
							$_SESSION['seleccionar'] = $data1['seleccionar'];
							$_SESSION['crear'] = $data1['crear'];
							$_SESSION['leer'] = $data1['leer'];
							$_SESSION['actualizar'] = $data1['actualizar'];
							$_SESSION['eliminar'] = $data1['eliminar'];
              $_SESSION['key'] = 1;
							$_SESSION['estado'] = $data['estado'];
					if ($data['estado'] ==1)
					{
              master::showMessage(1, "Usuario activado", "main.php");
					}
					else
					{
							header("location: main.php");
					}
			      	
				}
				else 
				{
						$_SESSION['intetos'] =  $_SESSION['intetos']+1;
					 echo $_SESSION['intetos'];
					throw new Exception("La clave ingresada es incorrecta");
				}
					}
					else
					{
						include ('../../archivosmaestros/generar.php');
            $pass = new generar();
            $password = $pass->nueva(8);
            $clave = password_hash($password, PASSWORD_DEFAULT);
						$_SESSION['intetos'] = 0;
						$sql = "UPDATE administradores SET estado = ?, clave = ? WHERE usuario = ?";
						$params = array(2, $clave, $usuario);
						 echo $password;
            mail($data['correo'], 'Clave Comics&MovieLine', "Administrador alguien ah exedido el numero de intetos para ingresar a tu cuenta por lo cual se a bloqueado puede desbloquearla
						colocando la siguiente clave que debes ingresar en el login junto con tu nombre de usuario en vez de tu contraseña, La cual es: $password", 'From:miguelrocker3@gmail.com');
						if(Database::executeRow($sql, $params))
						{
						 throw new Exception("Demasiados intentos");
						}                             
						else
						{
								throw new Exception(Database::$error[1]);
						}
						
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
          <input id="usuario" type="text" name="usuario" class="validate" autocomplete="off" required/>
          <label for="usuario" class="cyan-text text-darken-3">Usuario</label><!--El cuadro de texto donde se pondra el nombre de usuario-->
        </div>
        <div class="input-field col s12">
          <input id="clave" type="password" name="clave" class="validate"  required/>
          <label for="clave" class="cyan-text text-darken-3">Contraseña</label><!--El cuadro de texto donde se colocara la contraseña-->
        </div>
        <div class="center-align  boton">
        <button type='submit' class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">play_arrow</i>Ingresar</button>
				<a href="recucontra.php" class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">location_searching</i>Recuperar contraseña</a> <!--Boton con el cual se ingrasara-->
        </div>
    </form>
  </div>
  </section>
<?php
master::footer("Login");
?>