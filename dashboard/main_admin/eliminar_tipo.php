<?php
require("../../lib/master.php");
master::header("Tiposs");

if(!empty($_GET)){

    try{
			$id = $_GET['id'];
			$sql = "DELETE FROM tipo_usuario WHERE id_tipo_usuario = ?";
		    $params = array($id);
		    Database::executeRow($sql, $params);
            master::showMessage(1, "Se elimino el usuario", "index_types.php");
            
    }
    catch(Exception $error)
    {
            master::showMessage(2, $error->getMessage(), null);
    }
    
}
master::footer("Usuarios");
?>