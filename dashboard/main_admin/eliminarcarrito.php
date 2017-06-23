<?php
require("../../lib/master.php");
master::header("Usuarios");
//Revisa si el metodo get del id, no esta vacio
if(!empty($_GET)){
    try{
        	$id = $_GET['id'];
            $sql = $sql = "SELECT id_vista_carrito, productos.id_producto, vista_carrito.cantidad FROM vista_carrito, carrito, productos, registro WHERE carrito.id_registro = registro.id_registro AND vista_carrito.id_carrito = carrito.id_carrito AND productos.id_producto = vista_carrito.id_producto  AND  id_vista_carrito = ?";
            $params = array($id);
            $data = Database::getRow($sql, $params);
            $cantidad = $data['cantidad'];
            $prod = $data['id_producto'];
            $sql = "UPDATE productos SET cantidad = cantidad+$cantidad WHERE id_producto = ?";
            $params = array($prod);
            $data = Database::executeRow($sql, $params);
			$sql = "DELETE FROM vista_carrito WHERE id_vista_carrito = ?";
		    $params = array($id);
		    Database::executeRow($sql, $params);
            master::showMessage(1, "Se elimino del carrito", "../main_public/compras.php");
            
    }
    catch(Exception $error)
    {
            master::showMessage(1, $error->getMessage(), null);
    }
    
}
master::footer("Usuarios");
?>