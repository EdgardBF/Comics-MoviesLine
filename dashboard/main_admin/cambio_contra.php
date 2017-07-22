<?php
//mandamos a llamar a nuestro archivo maestro
require("../../lib/master.php");
//colocamos el metodo de header
master::header("Editar perfil Admin");
//hacemos una condicional diciendo que si el post esta vacio muestre los registros normales sino que los muestre solo los que se han pedido en el parametro
if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
    $clave1 = $_POST['clave1'];
    $clave2 = $_POST['clave2'];
    $clave3 = $_POST['clave3'];
    $clave4 = $_POST['clave4'];
    $id = $_SESSION['id_admin'];
    $sql = "SELECT clave FROM administradores WHERE id_admin = ?";
    $params = array($id);
    $data1 = Database::getRow($sql, $params);
    $clavea = $data1['clave'];
    try 
    {
                    if($clave3 != "" || $clave4 != "" )
                    {
                        if($clave1 != "" || $clave2 != "" )
                    {

                        if($clave4 == $clave3 )
                        {
                            if($clave1 == $clave2 )
                        {
                            if(password_verify($clave3, $clavea))
                            {
                        if(strlen($clave1)>=8)
                            {
                                if(Validator::validatepass($clave1))
                                {
                            if(password_verify($clave1, $clavea))
                            {
                                throw new Exception("La Contraseña debe ser diferente a la anterior");
                            }
                            else
                            {   $time = time();
                                $fes = date("Y-m-d ", $time);
                                $clave = password_hash($clave1, PASSWORD_DEFAULT);
                                $sql = "UPDATE administradores SET clave = ?, fecha_cambio_contra = ?, estado = ? WHERE id_admin = ?";
                                $params = array($clave, $fes,0, $_SESSION['id_admin']);
                            }
                                }
                                else
                                {
                                    throw new Exception("La contraseña debe tener numeros y letras tanto mayusculas como minusculas y caracteres especiales");
                                }
                            }
                            else
                            {
                                throw new Exception("La contraseña debe ser de 8 o mas caracteres");
                            }
                                
                            }
                            else
                            {
                                throw new Exception("La Contraseña actual es incorrecta");
                            }
                            
                        }
                        else
                        {
                            throw new Exception("Las contraseñas no coinciden");
                        }
                        }
                        else
                        {
                            throw new Exception("Las contraseñas nuevas no coinciden");
                        }
                    }
                    else
                    {
                        throw new Exception("Debe ingresar la nueva contraseña");
                    }
                    }
                    else
                    {
                        throw new Exception("Debe ingresar la contraseña");
                    }
                    if(Database::executeRow($sql, $params))
                    {
                        master::showMessage(1, "Operación satisfactoria, vuelvete a loguear", "logout.php");
                    }                             
                    else
                    {
                        throw new Exception(Database::$error[1]);
                    }
    }
    catch (Exception $error)
    {
        master::showMessage(2, $error->getMessage(), null);
    }
}
else
{
    $sql = "SELECT * FROM administradores WHERE id_admin = ?";
    $params = array($_SESSION['id_admin']);
    $data = Database::getRow($sql, $params);
    $nombres = $data['nombre'];
    $correo = $data['correo'];
    $alias = $data['usuario'];
}
?>
<br>
<!--Formulario con el cual se podra modificar toda la informacion-->
<form method='post'>
    <div class='row'>
<div class='row center-align'>
        <label>COLOCAR CLAVE ACTUAL</label>
    </div>
    <div class='row'>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>security</i>
            <input id='clave1' type='password' name='clave3' class='validate'/>
            <label for='clave1'>Contraseña actual</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>security</i>
            <input id='clave2' type='password' name='clave4' class='validate'/>
            <label for='clave2'>Confirmar contraseña</label>
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
        <a href='main.php' class='btn waves-effect grey'><i class='material-icons'>cancel</i></a>
        <button type='submit' class='btn waves-effect blue'><i class='material-icons'>save</i></button>
    </div>
</form>

<?php
master::footer("Editar perfil");
?>