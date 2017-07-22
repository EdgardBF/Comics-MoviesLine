<?php
require("../../lib/master.php");
master::header("tipo_producto");
    if($_SESSION['eliminar'] == 0)
    {
    master::showMessage(2, "No tiene permisos para entrar", "main.php");
    }
    else
    {
//Revisa si el metodo get del id, no esta vacio
if(!empty($_GET)){
                if(isset($_GET['id']) && ctype_digit($_GET['id'])) 
{
    try{
			$id = $_GET['id'];
            //Elimina un registro y muestra un mensaje
			$sql = "DELETE FROM tipo_producto WHERE id_tipo_producto = ?";
		    $params = array($id);
                if(Database::executeRow($sql, $params))
	            {
            master::showMessage(1, "Se elimino el Tipo de Producto", "tipo_producto.php");
                }                             
                else
                {
                    throw new Exception(Database::$error[1]);
                }
    }
    catch(Exception $error)
    {
            master::showMessage(2, $error->getMessage(), "tipo_producto.php");
    }
}
else
{
     header("location: tipo_producto.php");
}
    
}
    }
master::footer("tipo_producto");
?>