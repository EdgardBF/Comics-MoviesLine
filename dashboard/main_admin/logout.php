<?php
require('../../lib/database.php');
//utilizacion para deslogearse
session_name("admin");
session_start();
$sql = "UPDATE administradores SET conexion = ? WHERE usuario = ?";
$params = array(0, $_SESSION['usuario']);
if(Database::executeRow($sql, $params))
{
    session_destroy();
    header("location: ../../dashboard/");
}              
else
{
    throw new Exception(Database::$error[1]);
}
?>