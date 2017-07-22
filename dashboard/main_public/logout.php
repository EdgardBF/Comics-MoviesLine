<?php
require('../../lib/database.php');
//Sale de la sesion Actual
session_name("Cliente");
session_start();
$sql = "UPDATE registro SET conexion = ? WHERE usuario = ?";
$params = array(0, $_SESSION['usuario']);
if(Database::executeRow($sql, $params))
{
    session_destroy();
    header("location: ../../public/");	
}              
else
{
    throw new Exception(Database::$error[1]);
}
?>