<?php
//llamamos a nuestra clase maestra
require("../../lib/master.php");
master::header("Admin");
//Revisa si el metodo get del id, no esta vacio
if(!empty($_GET)){
    try{
			$id = $_GET['id'];
            //crea una condicional para que este no se borre a si mismo
            if($id == $_SESSION["id_admin"])
            {
                master::showMessage(3, "No se puede eliminar ustede mismo", "index_admin.php");
            }
            else
            {
                //Elimina un registro y muestra un mensaje
                $sql = "DELETE FROM administradores WHERE id_admin = ?";
                $params = array($id);
                Database::executeRow($sql, $params);
                master::showMessage(1, "Se elimino el usuario", "index_admin.php");
            }

            
    }
    //cacha para si hay alguna error
    catch(Exception $error)
    {
            master::showMessage(2, $error->getMessage(), null);
    }
    
}
master::footer("admin");
?>