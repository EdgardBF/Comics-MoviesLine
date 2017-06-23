<?php
require("../../lib/master.php");
master::header("Usuarios");
//Revisa si el metodo get del id, no esta vacio
if(!empty($_GET)){
    try{
			$id = $_GET['id'];
                        //Elimina un registro y muestra un mensaje
			$sql = "SELECT estado FROM registro WHERE id_registro = ?";
		    $params = array($id);
		    $data = Database::getRow($sql, $params);
            if($data['estado'] == 0)
            {
                $sql = "UPDATE registro SET estado = 1 WHERE id_registro = ?";
                $params = array($id);
                Database::executeRow($sql, $params);
                master::showMessage(1, "Se activo el usuario", "index_users.php");

            }
            else
            {
                $sql = "UPDATE registro SET estado = 0 WHERE id_registro = ?";
                $params = array($id);
                Database::executeRow($sql, $params);
                master::showMessage(1, "Se desactivo el usuario", "index_users.php");

            }
            //Elimina un registro y muestra un mensaje
            
    }
    catch(Exception $error)
    {
            master::showMessage(1, $error->getMessage(), "index_users.php");
    }
    
}
master::footer("Usuarios");
?>