<?php
require("../../lib/master.php");
master::header("tipo_producto");
//Obtiene la Hora del Sistema
$time = time();
//Verifica que hayan datos a guardar, con el metodo Get,en el Id de la pagina
if(empty($_GET['id'])) 
{
    $id = null;
    $tipo_producto = null;
}
else
{
    $id = $_GET['id'];
    $sql = "SELECT tipo_producto FROM tipo_producto WHERE id_tipo_producto = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $tipo_producto = $data['tipo_producto'];
}

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
    $tipo_producto = $_POST['tipo_producto'];

    try{
        //Valida que los datos no esten vacios
        if($tipo_producto !="")
        {
            //Guarda los registros en la Base de Datos
            if($id == null)
            {
                $sql = "INSERT INTO tipo_producto(tipo_producto) VALUES(?)";
                $params = array($tipo_producto);
            }
            else
            {
                $sql = "UPDATE tipo_producto SET tipo_producto = ? WHERE id_tipo_producto = ?";
                $params = array($tipo_producto, $id);
            }
            Database::executeRow($sql, $params);
            master::showMessage(1, "Operación satisfactoria", "tipo_producto.php");
      }
        else
        {
            throw new Exception("Debe ingresar un Tipo de Producto adecuada");
        }
    }
    catch(Exception $error){
        master::showMessage(2, $error->getMessage(), null);
    }
}
else
{}

?>
    <!--Uso de un contenedor para colocar los datos y de una clase para el cambio de colores-->

    <form form method='post'>
    <div class='row'>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>person</i>
          	<input id='tipo_producto' type='text' name='tipo_producto' class='validate' value='<?php print($tipo_producto); ?>' required/>
          	<label for='tipo_producto'>Tipo de Producto</label>
        </div>
    </div>
    <div class='row center-align'>
        <a href='tipo_producto.php' class='btn waves-effect red'><i class='material-icons'>cancel</i></a>
        <button type='submit' class='btn waves-effect blue'><i class='material-icons'>save</i></button>
    </div>
    </form>
<?php
master::footer("tipo_producto")
?>