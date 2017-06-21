<?php
require("../../lib/master.php");
master::header("Comentarios");
//Revisa si el metodo get del id, no esta vacio
if(!empty($_GET)){
    try{
			$id = $_GET['id'];
            //Elimina un registro y muestra un mensaje
			$sql = "UPDATE comentarios SET id_tipo_comentario = 2 WHERE id_comentario = ?";
		    $params = array($id);
		    Database::executeRow($sql, $params);
            master::showMessage(1, "Se publico el comentario", "index_compag.php");
            
    }
    catch(Exception $error)
    {
            master::showMessage(2, $error->getMessage(), null);
    }
    
}
master::footer("ProductosAdmin");
?>