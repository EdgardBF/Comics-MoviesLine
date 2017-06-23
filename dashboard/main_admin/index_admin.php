<?php
//mandamos a llamar a nuestro archivo maestro
require("../../lib/master.php");
//colocamos el metodo de header
master::header("Administradores");
require_once '../../lib/Zebra_Pagination.php';
?>
<h3 class="center-align">Administradores</h3>
<?php
//hacemos una condicional diciendo que si el post esta vacio muestre los registros normales sino que los muestre solo los que se han pedido en el parametro
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = $sql = "SELECT id_admin, nombre, correo, usuario, clave, tipo_usuario.tipo FROM administradores, tipo_usuario WHERE administradores.id_tipo_usuario=tipo_usuario.id_tipo_usuario AND nombre LIKE ? ORDER BY id_admin desc";
	$params = array("%$search%");
}
else
{
	$sql = $sql = "SELECT id_admin, nombre, correo, usuario, clave, tipo_usuario.tipo FROM administradores, tipo_usuario WHERE administradores.id_tipo_usuario=tipo_usuario.id_tipo_usuario ORDER BY id_admin desc";
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
                <button type='submit' class='btn tooltipped waves-effect #00838f cyan darken-3' data-tooltip='Busca por Nombre'>Buscar<i class='material-icons left'>search</i></button> 	
            </div>
            <div class='input-field col s12 m4'>
                <a href='registro_admin.php' class='btn waves-effect #00838f cyan darken-3'>Agregar<i class='material-icons left'>add_circle_outline</i></a>
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
<!--la calse striped hace que se intercale el color de la tabla-->
<table class='striped responsive-table centered'>
	<thead>
		<tr>
			<th>Nombres</th>
			<th>Correos</th>
			<th>Usuarios</th>
            <th>Tipos de Usuarios</th>
			<th>ACCIONES</th>
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
					<a href='save_distribuciones.php?id=".$row['id_admin']."' class='waves-effect waves-light tooltipped' data-position='bottom' data-delay='50' data-tooltip='Modificar'><i class='material-icons cyan-text text-darken-3'>edit</i></a>
					<a class='waves-effect waves-light tooltipped' data-position='bottom' data-delay='50' data-tooltip='Eliminar' href='#modal1-".$row['id_admin']."'><i class='material-icons red-text text-darken-4'>delete_forever</i></a>
					<div id='modal1-".$row['id_admin']."' class='modal'>
						<div class='modal-content'>
							<h4>¡CUIDADO!</h4>
							<p>ESTA A PUNTO DE ELIMINAR UN REGISTRO, ¿ESTA SEGURO?</p>
						</div>
						<div class='modal-footer'>
							<a href='#!' onclick='eliminarD(".$row['id_admin'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
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
master::footer("Usuarios");
?>