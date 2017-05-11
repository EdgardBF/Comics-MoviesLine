<?php
require("../../lib/master.php");
master::header("Comentario");
$time = time();
if(!empty($_GET)){

    try{
			$usuario = $_GET['usuario'];
            $comentario = $_GET['comentario'];
            $producto = $_GET['producto'];
            $calificacion = $_GET['calificacion'];
            $tipo = $_GET['tipo'];
            $fecha = date("Y-m-d ", $time);
            $sql = "SELECT id_registro FROM registro WHERE usuario = ?";
            $params = array($usuario);
            $data = Database::getRow($sql, $params);
            $id = $data['id_registro'];
			$sql = "INSERT INTO comentarios(id_registro,comentario, id_producto, calificacion, id_tipo_comentario, fecha) VALUES(?,?,?,?,?,?)";
            $params = array($id, $comentario, $producto, $calificacion, $tipo, $fecha );
		    Database::executeRow($sql, $params);
            master::showMessage(1, "El Comentario se ha enviado exitosamente", "../../public/productos.php");
            
    }
    catch(Exception $error)
    {
            master::showMessage(2, $error->getMessage(), null);
    }
    
}
master::footer("Comentario");
?>