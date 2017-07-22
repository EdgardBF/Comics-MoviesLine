<?php
//llamamos a nuestra clase maestra
require("../../lib/master.php");
master::header("Admin");
    if($_SESSION['eliminar'] == 0)
    {
    master::showMessage(2, "No tiene permisos para entrar", "main.php");
    }
    else
    {
//Revisa si el metodo get del id, no esta vacio
if(!empty($_GET)){
            if(isset($_GET['id']) && ctype_digit($_GET['id'])) 
{
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
                if(Database::executeRow($sql, $params))
	            {
                    master::showMessage(1, "Se elimino el usuario", "index_admin.php");
                }                             
                else
                {
                    throw new Exception(Database::$error[1]);
                }
            }

            
    }
    //cacha para si hay alguna error
    catch(Exception $error)
    {
            master::showMessage(2, $error->getMessage(), "index_admin.php");
    }
}
else
{
    header("location: index_admin.php");
}
    
}
    }
master::footer("admin");
?>