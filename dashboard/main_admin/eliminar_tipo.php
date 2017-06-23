<?php
require("../../lib/master.php");
master::header("Tiposs");
//Revisa si el metodo get del id, no esta vacio
if(!empty($_GET)){
    try{
			$id = $_GET['id'];
            //Elimina un registro y muestra un mensaje
			$sql = "DELETE FROM tipo_usuario WHERE id_tipo_usuario = ?";
		    $params = array($id);
                if(Database::executeRow($sql, $params))
	            {
            master::showMessage(1, "Se elimino el usuario", "index_types.php");
                }                             
                else
                {
                    throw new Exception(Database::$error[1]);
                }
    }
    catch(Exception $error)
    {
            master::showMessage(2, $error->getMessage(), "index_types.php");
    }
    
}
master::footer("Usuarios");
?>