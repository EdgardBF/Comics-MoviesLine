<?php
require("../../lib/master.php");
master::header("Tipo_Producto");

if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT id_tipo_producto, tipo_producto FROM tipo_producto WHERE tipo_producto LIKE ?";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT id_tipo_producto, tipo_producto FROM tipo_producto";
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
			<a href='save_tipo_producto.php' class='btn waves-effect indigo'><i class='material-icons'>add_circle</i></a>
		</div>
	</div>
</form>
<table class='striped'>
	<thead>
		<tr>
			<th>Tipos de Productos</th>
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
				<td>".$row['tipo_producto']."</td>
				<td>
					<a href='save_tipo_producto.php?id=".$row['id_tipo_producto']."' class='blue-text'><i class='material-icons'>mode_edit</i></a>
					<a class='waves-effect waves-light' href='#modal1-".$row['id_tipo_producto']."'><i class='material-icons'>delete</i></a>
					<div id='modal1-".$row['id_tipo_producto']."' class='modal'>
						<div class='modal-content'>
							<h4>¡CUIDADO!</h4>
							<p>ESTA A PUNTO DE ELIMINAR UN TIPO DE PRODUCTO, ¿ESTA SEGURO?</p>
						</div>
						<div class='modal-footer'>
							<a href='#!' onclick='eliminarTP(".$row['id_tipo_producto'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
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
	master::showMessage(4, "No hay registros disponibles", "save_tipo_producto.php");
}
master::footer("Tipo_Producto");
?>
