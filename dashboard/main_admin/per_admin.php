<?php
//se utiliza para saber cual es el tipo de usuario al que es y asi actulizarala 
require("../../lib/master.php");
master::header("Editar Administrador");
if(empty($_GET['id'])) 
{
    $id = null;
    $nombres = null;
    $correo = null;
    $alias = null;
    $permisos = 0;
}
else
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM administradores WHERE id_admin = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $nombres = $data['nombre'];
    $correo = $data['correo'];
    $alias = $data['usuario'];
    $permisos = $data['id_tipo_usuario'];
}
if(!empty($_POST))
{
    $permisos = $_POST['permisos'];

    try 
    {
      	if($nombres != "")
        {
            if($correo != "")
            {
                if($alias != "")
                {
                            $sql = "UPDATE administradores SET id_tipo_usuario = ? WHERE id_admin = ?";
                            $params = array($permisos, $id);
                    Database::executeRow($sql, $params);
                    master::showMessage(1, "Operación satisfactoria", "index_admin.php");
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
}
?>
<br>
<!--Formulario con el cual se muestran los datos y el unico habilitado es el combobox-->
<form form method='post'>
    <div class='row'>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>person</i>
          	<input disabled id='nombre' type='text' name='nombre' class='validate' value='<?php print($nombres); ?>' required/>
          	<label for='nombre'>Nombres</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>email</i>
            <input disabled id='correo' type='email' name='correo' class='validate' value='<?php print($correo); ?>' required/>
            <label for='correo'>Correo</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>person_pin</i>
            <input disabled id='usuario' type='text' name='usuario' class='validate' value='<?php print($alias); ?>' required/>
            <label  for='usuario'>Usuario</label>
        </div>
        <div class='input-field col s12 m6'>
            <?php
            $sql = "SELECT id_tipo_usuario, tipo FROM tipo_usuario";
            master::setCombo("Permisos", "permisos", $permisos, $sql);
            ?>
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