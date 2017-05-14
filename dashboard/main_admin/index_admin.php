<?php
//mandamos a llamar a nuestro archivo maestro
require("../../lib/master.php");
//colocamos el metodo de header
master::header("Administradores");
//hacemos una condicional diciendo que si el post esta vacio muestre los registros normales sino que los muestre solo los que se han pedido en el parametro
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = $sql = "SELECT id_admin, nombre, correo, usuario, clave, tipo_usuario.tipo FROM administradores, tipo_usuario WHERE administradores.id_tipo_usuario=tipo_usuario.id_tipo_usuario AND nombre LIKE ? ORDER BY nombre";
	$params = array("%$search%");
}
else
{
	$sql = $sql = "SELECT id_admin, nombre, correo, usuario, clave, tipo_usuario.tipo FROM administradores, tipo_usuario WHERE administradores.id_tipo_usuario=tipo_usuario.id_tipo_usuario ORDER BY nombre";
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
		<div class='input-field col s12 m4'>
			<a href='registro_admin.php' class='btn waves-effect #00838f cyan darken-3'><i class='material-icons'>note_add</i></a>
		</div>
	</div>
</form>
<!--la calse striped hace que se intercale el color de la tabla-->
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
//empesamos a mandar los datos que se necesitan
	foreach($data as $row)
	{
		print("
			<tr>
				<td>".$row['nombre']."</td>
				<td>".$row['correo']."</td>
				<td>".$row['usuario']."</td>
                <td>".$row['tipo']."</td>
				<td>
					<a href='per_admin.php?id=".$row['id_admin']."' class='waves-effect waves-light'><i class='material-icons cyan-text text-darken-3'>update</i></a>
					<a class='waves-effect waves-light ' href='#modal1-".$row['id_admin']."'><i class='material-icons red-text text-darken-4'>highlight_off</i></a>
					<div id='modal1-".$row['id_admin']."' class='modal'>
					<div class='modal-content'>
					<h4>¡CUIDADO!</h4>
					<p>ESTA A PUNTO DE ELIMINAR UN USUARIO, ¿ESTA SEGURO?</p>
					</div>
					<div class='modal-footer'>
					<a href='#!' onclick='eliminarD(".$row['id_admin'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
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
	master::showMessage(4, "No hay registros disponibles", "registro_admin.php");
}
master::footer("Usuarios");
?>