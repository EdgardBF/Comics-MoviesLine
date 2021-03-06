<?php
require("../../lib/master.php");
master::header("Comentarios");
require_once '../../lib/Zebra_Pagination.php';
?>
<h3 class="center-align">Comentarios</h3>
<?php
//Busca registros en la Base de datos
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	//La siguiente linea de codigo busca los datos en la tabla de comentarios
	$sql = "Select C.id_comentario, R.usuario, C.comentario, P.nombre_producto, C.calificacion, T.tipo_comentario From comentarios C Join registro R On C.id_registro = R.id_registro LEFT Join productos P ON C.id_producto = P.id_producto Join tipo_comentario T ON C.id_tipo_comentario = T.id_tipo_comentario WHERE R.usuario LIKE ? OR C.comentario LIKE ? OR P.nombre_producto LIKE ? OR T.tipo_comentario LIKE ? OR C.calificacion LIKE ? ORDER BY C.fecha";
	$params = array("%$search%", "%$search%", "%$search%", "%$search%", "%$search%");
}
else
{
	$sql = "Select C.id_comentario, R.usuario, C.comentario, P.nombre_producto, C.calificacion, T.tipo_comentario From comentarios C Join registro R On C.id_registro = R.id_registro LEFT Join productos P ON C.id_producto = P.id_producto Join tipo_comentario T ON C.id_tipo_comentario = T.id_tipo_comentario ORDER BY C.fecha";
	$params = null;
}
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
			<button type='submit' class='btn tooltipped waves-effect #00838f cyan darken-3' data-tooltip='Busca por Registro, Comentario, Producto, Tipo y Clasificacion'>Buscar<i class='material-icons left'>search</i></button> 	
		</div>
	</div>
</form>
	<!--Crea la tabla en donde los datos se mostraran-->
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
			<th>Registros</th>
            <th>Comentarios</th>
            <th>Productos</th>
            <th>Calificaciónes</th>
            <th>Tipos De Comentarios</th>
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
                <td>".$row['tipo_comentario']."</td>
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
master::footer("Comentarios");
?>
