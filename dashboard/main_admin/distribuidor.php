<?php
require("../../lib/master.php");
master::header("Distribuiciones");
require_once '../../lib/Zebra_Pagination.php';
?>
<h3 class="center-align">Distribuidor</h3>
<?php
//Busca registros en la Base de datos
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT id_distribucion, distribucion FROM distribucion WHERE distribucion LIKE ? ORDER BY id_distribucion desc";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT id_distribucion, distribucion FROM distribucion ORDER BY id_distribucion desc";
	$params = null;
}
?>
<!--Crea un buscador-->
<main class="container">
<form method='post'>
	<div class='row'>
		<div class='input-field col s6 m4'>
			<input id='buscar' type='text' name='buscar'/>
			<label for='buscar'>Buscar</label>
		</div>
            <div class='input-field col s6 m4'>
                <button type='submit' class='btn tooltipped waves-effect #00838f cyan darken-3' data-tooltip='Busca por Nombre'>Buscar<i class='material-icons left'>search</i></button> 	
            </div>
            <div class='input-field col s12 m4'>
                <a href='save_distribuciones.php' class='btn waves-effect #00838f cyan darken-3'>Agregar<i class='material-icons left'>add_circle_outline</i></a>
            </div>
	</div>
</form>
<!--Crea la tabla en donde los registros estaran-->
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
<table class='striped responsive-table centered'>
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
					<a href='save_distribuciones.php?id=".$row['id_distribucion']."' class='waves-effect waves-light tooltipped' data-position='bottom' data-delay='50' data-tooltip='Modificar'><i class='material-icons cyan-text text-darken-3'>edit</i></a>
					<a class='waves-effect waves-light tooltipped' data-position='bottom' data-delay='50' data-tooltip='Eliminar' href='#modal1-".$row['id_distribucion']."'><i class='material-icons red-text text-darken-4'>delete_forever</i></a>
					<div id='modal1-".$row['id_distribucion']."' class='modal'>
						<div class='modal-content'>
							<h4>¡CUIDADO!</h4>
							<p>ESTA A PUNTO DE ELIMINAR UN REGISTRO, ¿ESTA SEGURO?</p>
						</div>
						<div class='modal-footer'>
							<a href='#!' onclick='eliminardis(".$row['id_distribucion'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
							<a href='#!' class='modsal-action modal-close waves-effect waves-green btn-flat'>No</a>
						</div>
					</div>
				</td>
			</tr>
		");
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
master::footer("distribuciones");
?>
