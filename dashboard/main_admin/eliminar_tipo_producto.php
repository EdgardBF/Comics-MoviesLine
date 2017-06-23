<?php
require("../../lib/master.php");
master::header("tipo_producto");
//Revisa si el metodo get del id, no esta vacio
if(!empty($_GET)){
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
master::footer("tipo_producto");
?>