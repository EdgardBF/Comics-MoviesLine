<?php
require("../../lib/master.php");
master::header("ProductosAdmin");
require_once '../../lib/Zebra_Pagination.php';
?>
<h3 class="center-align">Productos</h3>
<?php
//Busca los registros en la Base de datos
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT productos.id_producto, productos.nombre_producto, productos.precio_producto, tipo_producto.tipo_producto, distribucion.distribucion, productos.descripcion, productos.imagen, productos.cantidad, productos.clasificacion FROM productos, distribucion, tipo_producto WHERE productos.id_tipo_producto = tipo_producto.id_tipo_producto AND productos.id_distribucion = distribucion.id_distribucion AND (productos.nombre_producto LIKE ? OR productos.precio_producto LIKE ? OR tipo_producto.tipo_producto LIKE ? OR  distribucion.distribucion LIKE ?) ORDER BY productos.fecha";
	$params = array("%$search%", "%$search%", "%$search%", "%$search%");
}
else
{
	$sql = "SELECT productos.id_producto, productos.nombre_producto, productos.precio_producto, tipo_producto.tipo_producto, distribucion.distribucion, productos.descripcion, productos.imagen, productos.cantidad, productos.clasificacion FROM productos, distribucion, tipo_producto WHERE productos.id_tipo_producto = tipo_producto.id_tipo_producto AND productos.id_distribucion = distribucion.id_distribucion ORDER BY productos.fecha";
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
                <button type='submit' class='btn waves-effect #00838f cyan darken-3'>Buscar<i class='material-icons left'>search</i></button> 	
            </div>
            <div class='input-field col s12 m4'>
                <a href='save_products.php' class='btn waves-effect #00838f cyan darken-3'>Agregar<i class='material-icons left'>add_circle_outline</i></a>
            </div>
	</div>
</form>
<!--Se crea la tabla en donde estaran los registros-->
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
			<th>Nombres</th>
			<th>Precios ($)</th>
			<th>Tipos De Productos</th>
			<th>Distribución</th>
            <th>Descripción</th>
			<th>Cantidad</th>
            <th>Imagenes</th>
			<th>Clasificaciones</th>
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
				<td>".$row['nombre_producto']."</td>
				<td>".$row['precio_producto']."</td>
				<td>".$row['tipo_producto']."</td>
                <td>".$row['distribucion']."</td>
                <td>".$row['descripcion']."</td>
				<td>".$row['cantidad']."</td>
                <td><img src='data:image/*;base64,".$row['imagen']."' class='materialboxed' width='300' height='100'></td>
				<td>".$row['clasificacion']."</td>
				<td>
					<a href='save_products.php?id=".$row['id_producto']."' class='waves-effect waves-light'><i class='material-icons cyan-text text-darken-3'>update</i></a>
					<a class='waves-effect waves-light' href='#modal1-".$row['id_producto']."'><i class='material-icons red-text text-darken-4'>highlight_off</i></a>
					<div id='modal1-".$row['id_producto']."' class='modal'>
						<div class='modal-content'>
							<h4>¡CUIDADO!</h4>
							<p>ESTA A PUNTO DE ELIMINAR UN PRODUCTO, ¿ESTA SEGURO?</p>
						</div>
						<div class='modal-footer'>
							<a href='#!' onclick='eliminarPro(".$row['id_producto'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
							<a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>No</a>
						</div>
					</div>
				</td>
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
master::footer("ProductosAdmin");
?>
