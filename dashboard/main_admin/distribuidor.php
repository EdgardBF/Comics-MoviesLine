<?php
require("../../lib/master.php");
master::header("Distribuiciones");
//Busca registros en la Base de datos
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT id_distribucion, distribucion FROM distribucion WHERE distribucion LIKE ?";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT id_distribucion, distribucion FROM distribucion";
	$params = null;
}
$data = Database::getRows($sql, $params);
if($data != null)
{
?>
<!--Crea un buscador-->
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
			<a href='save_distribuciones.php' class='btn waves-effect #00838f cyan darken-3'><i class='material-icons'>note_add</i></a>
		</div>
	</div>
</form>
<!--Crea la tabla en donde los registros estaran-->
<table class='striped'>
	<thead>
		<tr>
			<th>Distribuciones</th>
            <th>ACCIONES</th>
		</tr>
	</thead>
	<tbody>
<?php
$mensaje = false;
//Ingresa los registros en la tabla
	foreach($data as $row)
	{
		print("
			<tr>
				<td>".$row['distribucion']."</td>
				<td>
					<a href='save_distribuciones.php?id=".$row['id_distribucion']."' class='waves-effect waves-light'><i class='material-icons cyan-text text-darken-3'>update</i></a>
					<a class='waves-effect waves-light' href='#modal1-".$row['id_distribucion']."'><i class='material-icons red-text text-darken-4'>highlight_off</i></a>
					<div id='modal1-".$row['id_distribucion']."' class='modal'>
						<div class='modal-content'>
							<h4>¡CUIDADO!</h4>
							<p>ESTA A PUNTO DE ELIMINAR UN DISTRIBUIDOR, ¿ESTA SEGURO?</p>
						</div>
						<div class='modal-footer'>
							<a href='#!' onclick='eliminardis(".$row['id_distribucion'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
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
	master::showMessage(4, "No hay registros disponibles", "save_distribuciones.php");
}
master::footer("distribuciones");
?>
