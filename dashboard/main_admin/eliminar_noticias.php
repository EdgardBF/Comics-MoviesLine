<?php
require("../../lib/master.php");
master::header("Noticias");
//Revisa si el metodo get del id, no esta vacio
if(!empty($_GET)){
    try{
			$id = $_GET['id'];
            //Elimina un registro y muestra un mensaje
			$sql = "DELETE FROM noticia WHERE id_noticia = ?";
		    $params = array($id);
                if(Database::executeRow($sql, $params))
	            {
            master::showMessage(1, "Se elimino la Noticia", "noticias.php");
                }                             
                else
                {
                    throw new Exception(Database::$error[1]);
                }
    }
    catch(Exception $error)
    {
            master::showMessage(2, $error->getMessage(), "noticias.php");
    }
    
}
master::footer("Noticias");
?>