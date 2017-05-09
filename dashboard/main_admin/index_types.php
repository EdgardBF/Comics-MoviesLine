<?php
require("../..//lib/master.php");
master::header("main_index");
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT * FROM tipo_usuario WHERE tipo_usuario LIKE ? OR id_tipo_usuario LIKE ? ORDER BY id_tipo_usuario";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT * FROM tipo_usuario ORDER BY tipo_usuario";
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
			<a href='save_types.php' class='btn waves-effect indigo'><i class='material-icons'>add_circle</i></a>
		</div>
	</div>
</form>
<table class='striped'>
	<thead>
		<tr>
			<th>Tipo Usuario</th>
			<th>Seleccionar</th>
			<th>Crear</th>
			<th>Leer</th>
			<th>Actalizar</th>
			<th>Eliminar</th>
            <th>Acciones</th>
		</tr>
	</thead>
	<tbody>

<?php
	foreach($data as $row)
	{
		print("
			<tr>
				<td>".$row['tipo_usuario']."</td>
				<td>
		");
		if($row['seleccionar'] == 1)
		{
			print("<i class='material-icons'>check</i>");
		}
		else
		{
			print("<i class='material-icons'>chec</i>");
		}
		print("
				</td>
                <td>
		");
		if($row['crear'] == 1)
		{
			print("<i class='material-icons'>check</i>");
		}
		else
		{
			print("<i class='material-icons'>chec</i>");
		}
        
		print("
				</td>
                <td>
		");
		if($row['leer'] == 1)
		{
			print("<i class='material-icons'>check</i>");
		}
		else
		{
			print("<i class='material-icons'>chec</i>");
		}
		print("
				</td>
                <td>
		");
		if($row['actualizar'] == 1)
		{
			print("<i class='material-icons'>check</i>");
		}
		else
		{
			print("<i class='material-icons'>chec</i>");
		}
		print("
				</td>
                <td>
		");
		if($row['eliminar'] == 1)
		{
			print("<i class='material-icons'>check</i>");
		}
		else
		{
			print("<i class='material-icons'>chec</i>");
		}
		print("
				</td>
				<td>
					<a href='save.php?id=".$row['id_tipo_usuario']."' class='blue-text'><i class='material-icons'>mode_edit</i></a>
					<a href='delete.php?id=".$row['id_tipo_usuario']."' class='red-text'><i class='material-icons'>delete</i></a>
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
	Page::showMessage(4, "No hay registros disponibles", "save.php");
}
master::footer("main");
?>