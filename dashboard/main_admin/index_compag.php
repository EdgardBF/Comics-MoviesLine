<?php
require("../../lib/master.php");
master::header("Comentarios");
require_once '../../lib/Zebra_Pagination.php';
?>
<h3 class="center-align">Clasificación</h3>
<?php
//Busca registros en la Base de datos
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT comentarios.id_comentario, registro.usuario, comentarios.comentario, productos.nombre_producto, comentarios.calificacion, comentarios.id_tipo_comentario FROM comentarios, registro, productos WHERE registro.id_registro = comentarios.id_registro AND productos.id_producto = comentarios.id_producto AND comentarios.id_tipo_comentario = 3 AND (registro.usuario LIKE ? OR comentarios.comentario LIKE ? OR productos.nombre_producto LIKE ? OR comentarios.calificacion LIKE ?) ORDER BY comentarios.fecha";
	$params = array("%$search%", "%$search%", "%$search%", "%$search%");
}
else
{
    $sql = "SELECT comentarios.id_comentario, registro.usuario, comentarios.comentario, productos.nombre_producto, comentarios.calificacion, comentarios.id_tipo_comentario FROM comentarios, registro, productos WHERE registro.id_registro = comentarios.id_registro AND productos.id_producto = comentarios.id_producto AND comentarios.id_tipo_comentario = 3 ORDER BY comentarios.fecha desc";
	$params = null;
}
$data = Database::getRows($sql, $params);
?>
<main class="container">
<form method='post'>
<!--Crea un buscador-->
	<div class='row'>
		<div class='input-field col s6 m4'>
			<input id='buscar' type='text' name='buscar'/>
			<label for='buscar'>Buscar</label>
		</div>
            <div class='input-field col s6 m4'>
                <button type='submit' class='btn tooltipped waves-effect #00838f cyan darken-3' data-tooltip='Busca por Nombre, Comentario, Producto, Calificacion'>Buscar<i class='material-icons left'>search</i></button> 	
            </div>
	</div>
</form>
<!--Crea la tabla en donde los registros estaran-->
<?php
if($data != null)
{

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
			<th>Registros</th>
            <th>Comentarios</th>
			<th>Productos</th>
			<th>Calificación</th>
            <th>ACCIONES</th>
		</tr>
	</thead>
	<tbody>
<?php
$mensaje = false;
	//mete los datos en la tabla
	foreach($data as $row)
	{
		print("
			<tr>
				<td>".$row['usuario']."</td>
                <td>".$row['comentario']."</td>
				<td>".$row['nombre_producto']."</td>
				<td>".$row['calificacion']."</td>
                <td>
					<a class='waves-effect waves-light tooltipped' data-position='bottom' data-delay='50' data-tooltip='Ingresar' href='#modal2-".$row['id_comentario']."'><i class='material-icons green-text text-darken-4'>playlist_add_check</i></a>
                        <div id='modal2-".$row['id_comentario']."' class='modal'>
                        <div class='modal-content'>
                        <h4>¡CUIDADO!</h4>
                        <p>ESTA A PUNTO DE PUBLICAR EL COMENTARIO, ¿ESTA SEGURO?</p>
                        </div>
                        <div class='modal-footer'>
                        <a href='#!' onclick='actupag(".$row['id_comentario'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
                        <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>No</a>
                        </div>
                        </div>
                    <a class='waves-effect waves-light tooltipped' data-position='bottom' data-delay='50' data-tooltip='Eliminar' href='#modal1-".$row['id_comentario']."'><i class='material-icons red-text text-darken-4'>delete_forever</i></a>
					<div id='modal1-".$row['id_comentario']."' class='modal'>
					<div class='modal-content'>
					<h4>¡CUIDADO!</h4>
					<p>ESTA A PUNTO DE ELIMINAR UN REGISTRO, ¿ESTA SEGURO?</p>
					</div>
					<div class='modal-footer'>
					<a href='#!' onclick='eliminarP(".$row['id_comentario'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
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
	</main>
	");
	$pagination->render();
} //Fin de if que comprueba la existencia de registros. 
else
{
	print("<div class='card-panel cyan darken-3'><i class='material-icons left'>warning</i>No hay registros disponibles en este momento.</div></main>");
}
}else
{
	print("<div class='card-panel cyan darken-3'><i class='material-icons left'>warning</i>No hay registros disponibles en este momento.</div></main>");
}
master::footer("Comentarios");
?>