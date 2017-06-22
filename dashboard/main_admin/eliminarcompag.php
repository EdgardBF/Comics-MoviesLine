<?php
require("../../lib/master.php");
master::header("Comentarios");
//Revisa si el metodo get del id, no esta vacio
if(!empty($_GET)){
    try{
			$id = $_GET['id'];
            //Elimina un registro y muestra un mensaje
			$sql = "DELETE FROM comentarios WHERE id_comentario = ?";
		    $params = array($id);
                if(Database::executeRow($sql, $params))
	            {
                    master::showMessage(1, "Se elimino el comentario", "index_compag.php");
                }                             
                else
                {
                    throw new Exception(Database::$error[1]);
                }
            
    }
    catch(Exception $error)
    {
            master::showMessage(2, $error->getMessage(), "index_compag.php");
    }
    
}
master::footer("Comentarios");
?>