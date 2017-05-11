<?php
require("../../lib/master.php");
master::header("tipo_producto");

if(!empty($_GET)){

    try{
			$id = $_GET['id'];
			$sql = "DELETE FROM tipo_producto WHERE id_tipo_producto = ?";
		    $params = array($id);
		    Database::executeRow($sql, $params);
            master::showMessage(1, "Se elimino el Tipo de Producto", "tipo_producto.php");
            
    }
    catch(Exception $error)
    {
            master::showMessage(2, $error->getMessage(), null);
    }
    
}
master::footer("tipo_producto");
?>