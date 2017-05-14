<?php
//mandamos a llamar a nuestro archivo maestro
require("../../lib/master.php");
//colocamos el metodo de header
master::header("Usuarios");
//hacemos una condicional diciendo que si el post esta vacio muestre los registros normales sino que los muestre solo los que se han pedido en el parametro
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT * FROM registro WHERE nombre LIKE ? OR usuario LIKE ? ORDER BY nombre";
	$params = array("%$search%", "%$search%");
}
else
{
	$sql = "SELECT * FROM registro ORDER BY nombre";
	$params = null;
}
//ejecutamos el metodo get rows para ver si tenemos respuesta
$data = Database::getRows($sql, $params);
if($data != null)
{
?>
<!--Tabla en donde se muestran los datos-->
<form method='post'>
	<div class='row'>
		<div class='input-field col s6 m4'>
			<i class='material-icons prefix'>search</i>
			<input id='buscar' type='text' name='buscar'/>
			<label for='buscar'>Buscar</label>
		</div>
		<div class='input-field col s6 m4'>
			<button type='submit' class='btn waves-effect #00838f cyan darken-3'><i class='material-icons'>check_circle</i></button> 	
		</div>
	</div>
</form>
<table class='striped'>
	<thead>
		<tr>
			<th>NOMBRES</th>
			<th>CORREO</th>
			<th>USUARIO</th>
			<th>ACCIÓN</th>
		</tr>
	</thead>
	<tbody>

<?php
$mensaje = false;
	foreach($data as $row)
	{
		print("
			<tr>
				<td>".$row['nombre']."</td>
				<td>".$row['correo']."</td>
				<td>".$row['usuario']."</td>
				<td>
					<a class='waves-effect waves-light' href='#modal1-".$row['id_registro']."'><i class='material-icons red-text text-darken-4'>highlight_off</i></a>
					<div id='modal1-".$row['id_registro']."' class='modal'>
					<div class='modal-content'>
					<h4>¡CUIDADO!</h4>
					<p>ESTA A PUNTO DE ELIMINAR UN USUARIO, ¿ESTA SEGURO?</p>
					</div>
					<div class='modal-footer'>
					<a href='#!' onclick='eliminar(".$row['id_registro'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
					<a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>No</a>
					</div>
					</div>
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
	master::showMessage(4, "No hay registros disponibles", null);
}
master::footer("Usuarios");
?>