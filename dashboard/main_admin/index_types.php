<?php
//mandamos a llamar a nuestro archivo maestro
require("../..//lib/master.php");
//colocamos el metodo de header
master::header("Tipos");
//hacemos una condicional diciendo que si el post esta vacio muestre los registros normales sino que los muestre solo los que se han pedido en el parametro
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT * FROM tipo_usuario WHERE tipo LIKE ? ORDER BY tipo";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT * FROM tipo_usuario ORDER BY tipo";
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
			<a href='save_types.php' class='btn waves-effect #00838f cyan darken-3'><i class='material-icons'>note_add</i></a>
		</div>
	</div>
</form>
<!--la calse striped hace que se intercale el color de la tabla-->
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
//hacemos una condicional que si el valor de cada uno de estas es iguala uno entonces se pondra el incono de cheque
	foreach($data as $row)
	{
		print("
			<tr>
				<td>".$row['tipo']."</td>
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
					<a href='save_types.php?id=".$row['id_tipo_usuario']."' class='waves-effect waves-light'><i class='material-icons cyan-text text-darken-3'>update</i></a>
					<a class='waves-effect waves-light' href='#modal1-".$row['id_tipo_usuario']."'><i class='material-icons red-text text-darken-4'>highlight_off</i></a>
					<div id='modal1-".$row['id_tipo_usuario']."' class='modal'>
					<div class='modal-content'>
					<h4>¡CUIDADO!</h4>
					<p>ESTA A PUNTO DE ELIMINAR UN USUARIO, ¿ESTA SEGURO?</p>
					</div>
					<div class='modal-footer'>
					<a href='#!' onclick='eliminarT(".$row['id_tipo_usuario'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
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
	master::showMessage(4, "No hay registros disponibles", "save_types.php");
}
//llamada del footer
master::footer("Tipos");
?>