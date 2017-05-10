<?php
require("../../lib/master.php");
master::header("Usuarios");

if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT id_admin, nombre, correo, usuario, clave, tipo_usuario.tipo FROM administradores, tipo_usuario WHERE administradores.id_tipo_usuario=tipo_usuario.id_tipo_usuario AND nombre LIKE ? OR usuario LIKE ? ORDER BY nombre";
	$params = array("%$search%", "%$search%");
}
else
{
	$sql = $sql = "SELECT id_admin, nombre, correo, usuario, clave, tipo_usuario.tipo FROM administradores, tipo_usuario WHERE administradores.id_tipo_usuario=tipo_usuario.id_tipo_usuario ORDER BY nombre";
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
			<a href='registro_admin.php' class='btn waves-effect indigo'><i class='material-icons'>add_circle</i></a>
		</div>
	</div>
</form>
<table class='striped'>
	<thead>
		<tr>
			<th>NOMBRES</th>
			<th>CORREO</th>
			<th>USUARIO</th>
            <th>TIPO</th>
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
                <td>".$row['tipo']."</td>
				<td>
					<a href='per_admin.php?id=".$row['id_admin']."' class='waves-effect waves-light''><i class='material-icons'>mode_edit</i></a>
					<a class='waves-effect waves-light' href='#modal1-".$row['id_admin']."'><i class='material-icons'>delete</i></a>
					<div id='modal1-".$row['id_admin']."' class='modal'>
					<div class='modal-content'>
					<h4>¡CUIDADO!</h4>
					<p>ESTA A PUNTO DE ELIMINAR UN USUARIO, ¿ESTA SEGURO?</p>
					</div>
					<div class='modal-footer'>
					<a href='#!' onclick='eliminarD(".$row['id_admin'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Okay!</a>
					<a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>ÑO >:C</a>
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