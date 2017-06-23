<?php
require("../../lib/master.php");
master::header("Editar perfil");
$data = null;
$fecha1 = date("Y-m-d");
$id = $_GET['id'];
$sql1 = "SELECT nombre FROM registro WHERE id_registro = ?";
$params1 = array($id);
$data1 = Database::getRow($sql1, $params1);
$nombre = $data1['nombre'];
if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
  	$fecha = $_POST['fecha'];
    $fecha2 = $_POST['fecha1'];
    try 
    {
            $sql = "SELECT productos.nombre_producto, productos.precio_producto, compra.cantidad, compra.fecha FROM productos, registro, compra WHERE compra.fecha BETWEEN ? AND ? AND productos.id_producto = compra.id_producto AND registro.id_registro = compra.id_registro AND registro.id_registro = ?";
            $params = array($fecha, $fecha2, $id);
            $data = Database::getRows($sql, $params);
    }
    catch (Exception $error)
    {
        master::showMessage(2, $error->getMessage(), null);
    }
}
else
{
}
?>
<br>

<form method='post'>
    <div class='row'>
        <div class="input-field col s12">
                    <input id="disabled" class="cyan-text text-darken-3" disabled type="text" class="validate" name='usuario' value='<?php print($nombre); ?>'>
                    <label for="disabled" class="cyan-text text-darken-3">Usuario Nombre</label><!--El cuadro de texto donde se pondra el nombre de usuario-->
        </div>
        <div class='input-field col s12 m6' >
            <label>Fecha Inicio</label>
            <br>
          <input type="date" name='fecha' max='<?php print($fecha1); ?>' class="validate" >
        </div>
        <div class="input-field col s12 m6" >
            <label>Fecha Fin</label>
            <br>
          <input type="date" name='fecha1' min='<?php print($fecha1); ?>' class="validate">
        </div>
    <div class='row center-align'>
        <a href='main.php' class='btn waves-effect grey'><i class='material-icons'>cancel</i></a>
        <button type='submit' class='btn waves-effect blue'><i class='material-icons'>save</i></button>
    </div>
</form>
<div class='row'>
<div class="center-align">
<?php
     if($data != null)
                            {
             foreach ($data as $row) 
                                {
                    print("
                    
                        <div class='col s12 m4 '>
                            <div class='card card-panel teal darken-2 white-text'>
                                <div class='card-content'>
                                    <p class='grey-text text-darken-4'><h5>$row[nombre_producto] $ $row[precio_producto]</h5></p>
                                    <p class='grey-text text-darken-4'><h5>Cantidad: $row[cantidad]</h5></p>
                                    <p class='grey-text text-darken-4'><h5>Pagado: $ ".$row['cantidad']*$row['precio_producto']."</h5></p>
                                    <p class='grey-text text-darken-4'><h5>Fecha de compra: $ ".$row['fecha']."</h5></p>
                                </div>
                            </div>
                        </div>
                        

                        ");
                        }
                            }
                            else
                            {
                                 print("<div class='card-panel cyan darken-3'><i class='material-icons left'>warning</i>No hay registros disponibles en este momento.</div>");
                            }
?>
</div>
</div>
<?php
master::footer("Editar perfil");
?>