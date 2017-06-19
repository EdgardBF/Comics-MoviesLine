<?php
require("../../lib/master.php");
master::header("Comentarios");
//Busca registros en la Base de datos
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT id_comentario, registro.usuario, comentario, productos.nombre_producto, calificacion, tipo_comentario.tipo_comentario FROM comentarios, registro, productos, tipo_comentario  WHERE comentarios.id_registro = registro.id_registro AND comentarios.id_producto = productos.id_producto AND comentarios.id_tipo_comentario = tipo_comentario.id_tipo_comentario AND (registro.usuario LIKE ? OR comentarios.comentario LIKE ? OR productos.nombre_producto LIKE ? OR tipo_comentario.tipo_comentario LIKE ?) ORDER BY comentarios.fecha";
	$params = array("%$search%", "%$search%", "%$search%", "%$search%");
}
else
{
    $sql = "SELECT id_comentario, comentarios.id_registro, registro.usuario, comentario, fecha, id_tipo_comentario FROM comentarios, registro  WHERE registro.id_registro = comentarios.id_registro AND id_tipo_comentario = 3 ORDER BY fecha asc";
	$params = null;
}
$data = Database::getRows($sql, $params);
if($data != null)
{
?>
<form method='post'>
<!--Crea un buscador-->
	<div class='row'>
		<div class='input-field col s6 m4'>
			<i class='material-icons prefix'>search</i>
			<input id='buscar' type='text' name='buscar'/>
			<label for='buscar'>Buscar</label>
		</div>
		<div class='input-field col s6 m4'>
			<button type='submit' class='btn waves-effect green'><i class='material-icons'>check_circle</i></button> 	
		</div>
	</div>
</form>
	<!--Crea la tabla en donde los datos se mostraran-->
<table class='striped'>
	<thead>
		<tr>
			<th>REGISTROS</th>
            <th>COMENTARIOS</th>
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
                <td>
                    <a class='waves-effect waves-light ' href='#modal2-".$row['id_comentario']."'><i class='material-icons red-text text-darken-4'>update</i></a>
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
                    <a class='waves-effect waves-light ' href='#modal1-".$row['id_comentario']."'><i class='material-icons red-text text-darken-4'>highlight_off</i></a>
					<div id='modal1-".$row['id_comentario']."' class='modal'>
					<div class='modal-content'>
					<h4>¡CUIDADO!</h4>
					<p>ESTA A PUNTO DE ELIMINAR UN USUARIO, ¿ESTA SEGURO?</p>
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
	");
} //Fin de if que comprueba la existencia de registros. 
else
{
	master::showMessage(4, "No hay registros disponibles", null);
}
master::footer("Comentarios");
?>
