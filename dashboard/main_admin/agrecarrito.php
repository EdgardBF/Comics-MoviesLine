<?php
require("../../lib/master.php");
master::header("Carrito");
?>
<h3 class="center-align">Agregar a Carrito</h3>
<?php
//Revisa si el metodo get del id, no esta vacio
if(!empty($_GET)){
    
$id = $_GET['id'];
    if(!empty($_POST))
{
    $cantidad=$_POST['cantidad'];
    
    try{
            $time = time();
            $fes = date("Y-m-d ", $time);
            $sql = "SELECT *FROM carrito WHERE id_registro = ?";
	        $params = array($_SESSION['id_registro']);
            $data = Database::getRow($sql, $params);
            $id_carrito = $data['id_carrito'];
            $sql = "SELECT *FROM productos WHERE id_producto = ?";
	        $params = array($id);
            $st = Database::getRow($sql, $params);
            $stock = $st['cantidad'];
            if($data != null){
                if($cantidad <= $stock){
                $sql2 = "SELECT id_vista_carrito, productos.id_producto FROM vista_carrito, carrito, productos, registro WHERE carrito.id_registro = registro.id_registro AND vista_carrito.id_carrito = carrito.id_carrito AND productos.id_producto = vista_carrito.id_producto  AND  vista_carrito.id_producto = ? AND carrito.id_registro = ? ";
                $params2 = array($id, $_SESSION['id_registro']);
                $data2 = Database::getRow($sql2, $params2);
                if($data2 == null)
                {
                $sql = "INSERT INTO vista_carrito(id_carrito, id_producto, cantidad) VALUES(?, ?, ?)";
                $params = array($id_carrito, $id, $cantidad);
                Database::executeRow($sql, $params);
                $sql = "UPDATE productos SET cantidad = ($stock-$cantidad) WHERE id_producto = $id";
                $params = array($id);
                Database::executeRow($sql, $params);
                master::showMessage(1, "Operación satisfactoria", "../../public/productos.php");
                }
                else
                {
                    $sql = "UPDATE vista_carrito SET cantidad = cantidad+$cantidad WHERE id_vista_carrito = ?";
                    $params = array($data2['id_vista_carrito']);
                    Database::executeRow($sql, $params);
                    $sql = "UPDATE productos SET cantidad = ($stock-$cantidad) WHERE id_producto = $id";
                    $params = array($id);
                    Database::executeRow($sql, $params);
                    master::showMessage(1, "Actualizacion satisfactoria", "../../public/productos.php");
                }
                }
                else
                {
                    throw new Exception("No puede escojer mas de lo que se tiene en cantidad");
                }
            }
            else
            {
                if($cantidad <= $stock){
                $sql = "INSERT INTO carrito(id_registro, fecha) VALUES(?, ?)";
                $params = array($_SESSION['id_registro'], $fes);
                Database::executeRow($sql, $params);
                $sql = "SELECT *FROM carrito WHERE id_registro = ?";
	            $params = array($_SESSION['id_registro']);
                $poder = Database::getRow($sql, $params);
                $id_carrito = $poder['id_carrito'];
                $sql = "INSERT INTO vista_carrito(id_carrito, id_producto, cantidad) VALUES(?, ?, ?)";
                $params = array($id_carrito, $id, $cantidad);
                Database::executeRow($sql, $params);
                $sql = "UPDATE productos SET cantidad = ($stock-$cantidad) WHERE id_producto = $id";
                $params = array($id);
                Database::executeRow($sql, $params);
                master::showMessage(1, "Operación satisfactoria", "../../public/productos.php");
                }
                else
                {
                    throw new Exception("No puede escojer mas de lo que se tiene en cantidad");
                }


            }
            //Elimina un registro y muestra un mensaje
                
            
    }
    catch(Exception $error)
    {
            master::showMessage(2, $error->getMessage(), null);
    }
}
else
{
    $cantidad = null;
}
    
}
    $sql = "SELECT *FROM productos WHERE id_producto = ?";
    $params = array($id);
    $carta = Database::getRow($sql, $params);
                $sql2 = "SELECT AVG(calificacion) FROM comentarios WHERE id_producto = ?";
                $params2 = array($carta['id_producto']);
                $data2 = Database::getRow($sql2, $params2);
                print("
                <div class='row'>
                    <div class='col s12 m2 l4'>
                        <div class='card'>
                            <div class='card-image waves-effect waves-block waves-light'>
                                <img class='materialboxed' src='data:image/*;base64,$carta[imagen]' width='300' height='150'>
                            </div>
                            <div class='card-content row'>
                                <span class='card-title activator grey-text text-darken-4'>$carta[nombre_producto] $ $carta[precio_producto]<i class='material-icons right'>keyboard_arrow_down</i></span>
                                <p>Clasificacion Promedio de: ".round($data2['AVG(calificacion)'], 2)."</p>
                            </div>
                            <div class='card-reveal'>
                                <span class='card-title grey-text text-darken-4'>$carta[nombre_producto] $$carta[precio_producto]<i class='material-icons right'>close</i></span>
                                <p>$carta[descripcion]</p>
                            </div>
                        </div>
                    </div>
                ");
        ?>
    <div class='col s12 m8 l6'>
        
    <form form method='post'>
        <div class='input-field col s12'>
          	<i class='material-icons prefix'>person</i>
          	<input id='tipo_producto' type='number' name='cantidad' class='validate' value='<?php print($cantidad); ?>' required/>
          	<label for='tipo_producto'>Cantidad</label>
        </div>
        <div class='row center-align'>
            <a href='../../public/productos.php' class='btn waves-effect red'>Cancelar<i class='material-icons left'>highlight_off</i></a>
            <button type='submit' class='btn waves-effect blue'>Guardar<i class='material-icons left'>add_circle_outline</i></button>
        </div>
    </form>
    </div>
    </div>
        <?php


master::footer("Carrito");
?>