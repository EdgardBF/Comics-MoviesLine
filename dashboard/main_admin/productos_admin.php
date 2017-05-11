<?php
require("../../lib/master.php");
master::header("ProductosAdmin");

if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT productos.id_producto, productos.nombre_producto, productos.precio_producto, tipo_producto.tipo_producto, distribucion.distribucion, productos.descripcion, productos.imagen FROM productos, distribucion, tipo_producto WHERE productos.id_tipo_producto = tipo_producto.id_tipo_producto AND productos.id_distribucion = distribucion.id_distribucion AND (productos.nombre_producto LIKE ? OR productos.precio_producto LIKE ? OR tipo_producto.tipo_producto LIKE ? OR  distribucion.distribucion LIKE ?) ORDER BY productos.fecha";
	$params = array("%$search%", "%$search%", "%$search%", "%$search%");
}
else
{
	$sql = "SELECT productos.id_producto, productos.nombre_producto, productos.precio_producto, tipo_producto.tipo_producto, distribucion.distribucion, productos.descripcion, productos.imagen FROM productos, distribucion, tipo_producto WHERE productos.id_tipo_producto = tipo_producto.id_tipo_producto AND productos.id_distribucion = distribucion.id_distribucion ORDER BY productos.fecha";
	$params = null;
}
$data = Database::getRows($sql, $params);
if($data != null)
{
?>
<form method='post'>
	<div class='row'>
		<div class='input-field col s6 m4'>
			<i class='material-icons prefix'>search</i>
			<input id='buscar' type='text' name='buscar'/>
			<label for='buscar'>Buscar</label>
		</div>
		<div class='input-field col s6 m4'>
			<button type='submit' class='btn waves-effect green'><i class='material-icons'>check_circle</i></button> 	
		</div>
		<div class='input-field col s12 m4'>
			<a href='save_products.php' class='btn waves-effect indigo'><i class='material-icons'>add_circle</i></a>
		</div>
	</div>
</form>
<table class='striped'>
	<thead>
		<tr>
			<th>NOMBRES</th>
			<th>PRECIOS ($)</th>
			<th>TIPOS DE PRODUCTOS</th>
			<th>DISTRIBUCIONES</th>
            <th>DESCRIPCIONES</th>
            <th>IMAGENES</th>
            <th>ACCIONES</th>
		</tr>
	</thead>
	<tbody>
<?php
$mensaje = false;
	foreach($data as $row)
	{
		print("
			<tr>
				<td>".$row['nombre_producto']."</td>
				<td>".$row['precio_producto']."</td>
				<td>".$row['tipo_producto']."</td>
                <td>".$row['distribucion']."</td>
                <td>".$row['descripcion']."</td>
                <td><img src='data:image/*;base64,".$row['imagen']."' class='materialboxed' width='300' height='100'></td>
				<td>
					<a href='save_products.php?id=".$row['id_producto']."' class='blue-text'><i class='material-icons'>mode_edit</i></a>
					<a class='waves-effect waves-light' href='#modal1-".$row['id_producto']."'><i class='material-icons'>delete</i></a>
					<div id='modal1-".$row['id_producto']."' class='modal'>
						<div class='modal-content'>
							<h4>¡CUIDADO!</h4>
							<p>ESTA A PUNTO DE ELIMINAR UN PRODUCTO, ¿ESTA SEGURO?</p>
						</div>
						<div class='modal-footer'>
							<a href='#!' onclick='eliminarPro(".$row['id_producto'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
							<a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>No</a>
						</div>
					</div>
				</td>
				</td>
			</tr>
		");
	}
	print("
		</tbody>
	</table>
	");
} //Fin de if que comprueba la existencia de registros. 
else
{
	master::showMessage(4, "No hay registros disponibles", "save_products.php");
}
master::footer("ProductosAdmin");
?>
