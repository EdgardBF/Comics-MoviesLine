<?php
require("../../lib/master.php");
master::header("ProductosAdmin");
//Revisa si el metodo get del id, no esta vacio
if(!empty($_GET)){
    try{
			$id = $_GET['id'];
            //Elimina un registro y muestra un mensaje
			$sql = "DELETE FROM productos WHERE id_producto = ?";
		    $params = array($id);
                if(Database::executeRow($sql, $params))
	            {
            master::showMessage(1, "Se elimino el producto", "productos_admin.php");
                }                             
                else
                {
                    throw new Exception(Database::$error[1]);
                }
    }
    catch(Exception $error)
    {
            master::showMessage(2, $error->getMessage(), "productos_admin.php");
    }
    
}
master::footer("ProductosAdmin");
?>