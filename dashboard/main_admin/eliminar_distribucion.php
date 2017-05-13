<?php
require("../../lib/master.php");
master::header("Distribucion");
//Revisa si el metodo get del id, no esta vacio
if(!empty($_GET)){
    try{
			$id = $_GET['id'];
            //Elimina un registro y muestra un mensaje
			$sql = "DELETE FROM distribucion WHERE id_distribucion = ?";
		    $params = array($id);
		    Database::executeRow($sql, $params);
            master::showMessage(1, "Se elimino el distribuidor", "distribuidor.php");
            
    }
    catch(Exception $error)
    {
            master::showMessage(2, $error->getMessage(), null);
    }
    
}
master::footer("Distribucion");
?>