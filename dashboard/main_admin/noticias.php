<?php
require("../../lib/master.php");
master::header("Noticias");
require_once '../../lib/Zebra_Pagination.php';
?>
<h3 class="center-align">Noticias</h3>
<?php
//Busca los registros en la Base de Datos
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT noticia.id_noticia, noticia.imagen, noticia.titulo_imagen, noticia.descripcion_imagen, noticia.estado, noticia.fecha, administradores.nombre FROM noticia, administradores WHERE administradores.id_admin=noticia.id_admin AND (noticia.titulo_imagen LIKE ? OR noticia.descripcion_imagen LIKE ?) ORDER BY noticia.fecha";
	$params = array("%$search%", "%$search%");
}
else
{
	$sql = "SELECT noticia.id_noticia, noticia.imagen, noticia.titulo_imagen, noticia.descripcion_imagen, noticia.estado, noticia.fecha, administradores.nombre FROM noticia, administradores WHERE administradores.id_admin=noticia.id_admin ORDER BY noticia.fecha";
	$params = null;
}
?>
<main class="container">
<form method='post'>
	<div class='row'>
		<div class='input-field col s6 m4'>
			<input id='buscar' type='text' name='buscar'/>
			<label for='buscar'>Buscar</label>
		</div>
            <div class='input-field col s6 m4'>
                <button type='submit' class='btn tooltipped waves-effect #00838f cyan darken-3' data-tooltip='Busca por Titulo y Descripción'>Buscar<i class='material-icons left'>search</i></button> 	
            </div>
            <div class='input-field col s12 m4'>
                <a href='save_noticias.php' class='btn waves-effect #00838f cyan darken-3'>Agregar<i class='material-icons left'>add_circle_outline</i></a>
            </div>
	</div>
</form>
<!--Crea la tabla en donde se meteran los registros-->
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
			<th>Imagen</th>
			<th>Titulo</th>
			<th>Descripcion</th>
			<th>Estado</th>
			<th>Ingresado Por</th>
			<th>Fecha Ingresada</th>
            <th>ACCIONES</th>
		</tr>
	</thead>
	<tbody>
<?php
$mensaje = false;
//Se ingresan los registros a la tabla
	foreach($data as $row)
	{
		print("
			<tr>
                <td><img src='data:image/*;base64,".$row['imagen']."' class='materialboxed' width='300' height='100'></td>
                <td>".$row['titulo_imagen']."</td>
				<td>".$row['descripcion_imagen']."</td>
		");
		if($row['estado'] == '0') {
				print("<td class='green-text text-darken-4'>Activado</td>");
		} else if($row['estado'] == '1') {
				print("<td class='red-text text-darken-4'>Desactivado</td>");
		}
            print("
				<td>".$row['nombre']."</td>
				<td>".$row['fecha']."</td>
				<td>
					<a href='save_noticias.php?id=".$row['id_noticia']."' class='waves-effect waves-light tooltipped' data-position='bottom' data-delay='50' data-tooltip='Modificar'><i class='material-icons cyan-text text-darken-3'>edit</i></a>
					<a class='waves-effect waves-light tooltipped' data-position='bottom' data-delay='50' data-tooltip='Eliminar' href='#modal1-".$row['id_noticia']."'><i class='material-icons red-text text-darken-4'>delete_forever</i></a>
					<div id='modal1-".$row['id_noticia']."' class='modal'>
						<div class='modal-content'>
							<h4>¡CUIDADO!</h4>
							<p>ESTA A PUNTO DE ELIMINAR UN REGISTRO, ¿ESTA SEGURO?</p>
						</div>
						<div class='modal-footer'>
							<a href='#!' onclick='eliminarN(".$row['id_noticia'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
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
master::footer("Noticias");
?>
