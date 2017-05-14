<?php
require("../../lib/master.php");
master::header("Noticias");
//Busca los registros en la Base de Datos
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT id_noticia, imagen, titulo_imagen, descripcion_imagen FROM noticia WHERE titulo_imagen LIKE ? OR descripcion_imagen LIKE ? ORDER BY fecha";
	$params = array("%$search%", "%$search%");
}
else
{
	$sql = "SELECT id_noticia, imagen, titulo_imagen, descripcion_imagen FROM noticia ORDER BY fecha";
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
			<button type='submit' class='btn waves-effect #00838f cyan darken-3'><i class='material-icons'>check_circle</i></button> 	
		</div>
		<div class='input-field col s12 m4'>
			<a href='save_noticias.php' class='btn waves-effect #00838f cyan darken-3'><i class='material-icons'>note_add</i></a>
		</div>
	</div>
</form>
<!--Crea la tabla en donde se meteran los registros-->
<table class='striped'>
	<thead>
		<tr>
			<th>IMAGENES</th>
			<th>TITULOS ($)</th>
            <th>DESCRIPCIONES</th>
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
				<td>
					<a href='save_noticias.php?id=".$row['id_noticia']."' class='waves-effect waves-light'><i class='material-icons cyan-text text-darken-3'>update</i></a>
					<a class='waves-effect waves-light' href='#modal1-".$row['id_noticia']."'><i class='material-icons red-text text-darken-4'>highlight_off</i></a>
					<div id='modal1-".$row['id_noticia']."' class='modal'>
						<div class='modal-content'>
							<h4>¡CUIDADO!</h4>
							<p>ESTA A PUNTO DE ELIMINAR UNA NOTICIA, ¿ESTA SEGURO?</p>
						</div>
						<div class='modal-footer'>
							<a href='#!' onclick='eliminarN(".$row['id_noticia'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
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
	");
} //Fin de if que comprueba la existencia de registros. 
else
{
	master::showMessage(4, "No hay registros disponibles", "save_noticias.php");
}
master::footer("Noticias");
?>
