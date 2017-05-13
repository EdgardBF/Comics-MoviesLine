<?php
require("../../lib/master.php");
master::header("Registro");
//Verifica que hayan datos a guardar
if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $clave1 = $_POST['clave1'];
    $clave2 = $_POST['clave2'];
    $permisos = $_POST['permisos'];
    try{
        if($nombre !="")
        {
            if($correo !="")
            {
                if($usuario != "")
                {
                    if($permisos != "")
                    {
                        if($clave1 != "" && $clave2 != "")
                        {
                            if($clave1 == $clave2)
                            {
                                $clave = password_hash($clave1, PASSWORD_DEFAULT);
                                $sql = "INSERT INTO administradores(nombre, correo, usuario, clave, id_tipo_usuario) VALUES(?, ?, ?, ?, ?)";
                                $params = array($nombre, $correo, $usuario, $clave, $permisos);
                                Database::executeRow($sql, $params);
                                master::showMessage(1, "Operación satisfactoria", "login.php");
                            }
                            else
                            {
                                throw new Exception("Las contraseñas no coinciden");
                            }
                    }
                    else
                    {
                        throw new Exception("Debe ingresar un clave");
                    }

                    }
                    else
                    {
                        throw new Exception("Debe ingresar un tipo de permisos");
                    }

                }
                else
                {
                     throw new Exception("Debe ingresar un usuario");
                }

            }
            else
            {
                throw new Exception("Debe ingresar un correo electrónico");
            }
        }
        else
        {
            throw new Exception("Debe ingresar un nombre");
        }


    }
    catch(Exception $error){
        master::showMessage(2, $error->getMessage(), null);
    }
}
else
{
    $nombre = null;
    $correo = null;
    $usuario = null;
    $clave1 = null;
    $clave2 = null;
    $permisos = null;
}
?>
    <!--Uso de un contenedor para colocar los datos y de una clase para el cambio de colores-->

    <section class="container contenedor2">
    <div class="row">
        <form class="col s12" method='post'>
            <div class="center-align">
            <i class="material-icons"><a class="icono">note_add</a></i><!--Icono de la parte superior-->
            </div>
            <div class="input-field col s12">
                <input id="nombre" type="text" name="nombre" class="validate" value='<?php print($nombre); ?>' required/>
                <label for="nombre" class="cyan-text text-darken-3">Nombre completo</label><!--El cuadro de texto donde se pondra el nombre completo-->
            </div>
            <div class="input-field col s12">
                <input id="correo" type="email" name='correo' class="validate"  value='<?php print($correo); ?>' required/>
                <label for="correo" class="cyan-text text-darken-3">Email</label><!--El cuadro de texto donde se pondra el Email-->
            </div>
            <div class="input-field col s12">
                <input id="usuario" type="text" name="usuario" class="validate" value='<?php print($usuario); ?>' required/>
                <label for="usuario" class="cyan-text text-darken-3">Usuario</label><!--El cuadro de texto donde se pondra el nombre de usuario-->
            </div>
            <div class="input-field col s12">
                <input id="clave1" type="password" name='clave1' class="validate" required>
                <label for="clave1" class="cyan-text text-darken-3">Contraseña</label><!--El cuadro de texto donde se pondra la contraseña-->
            </div>
             <div class="input-field col s12">
                <input id="clave2" type="password" name='clave2' class="validate" required>
                <label for="clave2" class="cyan-text text-darken-3">Verificar Contraseña</label><!--El cuadro de texto donde se pondra para verificar la contraseña-->
            </div>
        <div class='input-field col s12 m6'>
            <?php
            $sql = "SELECT id_tipo_usuario, tipo FROM tipo_usuario";
            master::setCombo("Permisos", "permisos", $permisos, $sql);
            ?>
        </div>
            <div class="center-align  boton">
                <button type='submit' class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">create</i>Crear</button><!--boton para poner guardar-->
            </div>
            <div class="center-align boton2">
                <a class="waves-effect waves-light btn  #00838f cyan darken-3" href="login.php"><i class="material-icons right">face</i> Ya existo!</a><!--boton para redirigirse de un solo-->
            </div>
        </form>
  </div>
  </section>
<?php
master::footer("Registro");
?>