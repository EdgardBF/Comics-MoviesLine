<?php
//mandamos a llamar a nuestro archivo maestro
require("../../lib/master.php");
//colocamos el metodo de header
master::header("Usuarios");
require_once '../../lib/Zebra_Pagination.php';
?>
<h3 class="center-align">Usuarios</h3>
<?php
//hacemos una condicional diciendo que si el post esta vacio muestre los registros normales sino que los muestre solo los que se han pedido en el parametro
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT * FROM registro WHERE nombre LIKE ? OR usuario LIKE ? ORDER BY id_registro desc";
	$params = array("%$search%", "%$search%");
}
else
{
	$sql = "SELECT * FROM registro ORDER BY id_registro desc";
	$params = null;
}
//ejecutamos el metodo get rows para ver si tenemos respuesta
?>
<!--Tabla en donde se muestran los datos-->
<main class="container">
<form method='post'>
	<div class='row'>
		<div class='input-field col s6 m4'>
			<input id='buscar' type='text' name='buscar'/>
			<label for='buscar'>Buscar</label>
		</div>
            <div class='input-field col s6 m4'>
                <button type='submit' class='btn tooltipped waves-effect #00838f cyan darken-3' data-tooltip='Busca por Usuario, Nombre'>Buscar<i class='material-icons left'>search</i></button> 	
            </div>
	</div>
</form>
<?php
	//Cuenta la cantidad de registros mostrados
	$registros = Database::numRows($sql,$params);
	//Numero de registros para mostrar en pantalla
	$resultados = 6;
	//Iniciar clase Zebra
	$pagination = new Zebra_Pagination();
	//Funciones de Zebra
	$pagination->records($registros);
	$pagination->records_per_page($resultados);
	//Modificar Select y Limitar por pagina
	$sql .= " LIMIT ".(($pagination->get_page()-1)*$resultados).",".$resultados;
	$data = Database::getRows($sql, $params);
	if($data != null) {
?>
<table class='striped'>
	<thead>
		<tr>
			<th>Nombres</th>
			<th>Correos</th>
			<th>Usuarios</th>
      <th>Estados</th>
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
				<td>".$row['nombre']."</td>
				<td>".$row['correo']."</td>
				<td>".$row['usuario']."</td>
								");
				if($row['estado'] == 0)
				{
					print("<td>Desactivado</td>");
				print ("
				<td>
					<a class='waves-effect waves-light' href='historialcu.php?id=".$row['id_registro']."'><i class='material-icons green-text text-darken-4'>highlight_off</i></a>
					<a class='waves-effect waves-light' href='#modal1-".$row['id_registro']."'><i class='material-icons blue-text text-darken-4'>highlight_off</i></a>
					<div id='modal1-".$row['id_registro']."' class='modal'>
					<div class='modal-content'>
					<h4>¡CUIDADO!</h4>
					<p>ESTA A PUNTO DE ACTIVAR UN USUARIO, ¿ESTA SEGURO?</p>
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
				else
				{
					print("<td>Activado</td>");
								print ("
				<td>
					<a class='waves-effect waves-light' href='historialcu.php?id=".$row['id_registro']."'><i class='material-icons green-text text-darken-4'>highlight_off</i></a>
					<a class='waves-effect waves-light' href='#modal1-".$row['id_registro']."'><i class='material-icons red-text text-darken-4'>highlight_off</i></a>
					<div id='modal1-".$row['id_registro']."' class='modal'>
					<div class='modal-content'>
					<h4>¡CUIDADO!</h4>
					<p>ESTA A PUNTO DE DESACTIVAR UN USUARIO, ¿ESTA SEGURO?</p>
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
	}
	print("
		</tbody>
	</table>
		</main>
	");
		$pagination->render();
} //Fin de if que comprueba la existencia de registros. 
else
{
	print("<div class='card-panel cyan darken-3'><i class='material-icons left'>warning</i>No hay registros disponibles en este momento.</div></main>");
}
master::footer("Usuarios");
?>