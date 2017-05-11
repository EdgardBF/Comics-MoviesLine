<?php
require("../../lib/master.php");
master::header("Noticias");

if(!empty($_GET)){

    try{
			$id = $_GET['id'];
			$sql = "DELETE FROM noticia WHERE id_noticia = ?";
		    $params = array($id);
		    Database::executeRow($sql, $params);
            master::showMessage(1, "Se elimino la Noticia", "noticias.php");
            
    }
    catch(Exception $error)
    {
            master::showMessage(2, $error->getMessage(), null);
    }
    
}
master::footer("Noticias");
?>