<?php
require("../../lib/master.php");
master::header("Usuarios");
//Revisa si el metodo get del id, no esta vacio
if(!empty($_GET)){
    try{
			$id = $_GET['id'];
            //Elimina un registro y muestra un mensaje
			$sql = "DELETE FROM registro WHERE id_registro = ?";
		    $params = array($id);
                if(Database::executeRow($sql, $params))
	            {
            master::showMessage(1, "Se elimino el usuario", "index_users.php");
                }                             
                else
                {
                    throw new Exception(Database::$error[1]);
                }
    }
    catch(Exception $error)
    {
            master::showMessage(1, $error->getMessage(), "index_users.php");
    }
    
}
master::footer("Usuarios");
?>