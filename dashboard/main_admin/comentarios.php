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
	$sql = "SELECT id_comentario, registro.usuario, comentario, productos.nombre_producto, calificacion, tipo_comentario.tipo_comentario  FROM comentarios, registro, productos, tipo_comentario  WHERE comentarios.id_registro = registro.id_registro AND comentarios.id_producto = productos.id_producto AND comentarios.id_tipo_comentario = tipo_comentario.id_tipo_comentario ORDER BY comentarios.fecha";
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
            <th>PRODUCTOS</th>
            <th>CALIFICACIÓNES</th>
            <th>TIPOS DE COMENTARIOS</th>
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
                <td>");
                 if ($row['calificacion'] == 0){
                    print("<i class='material-icons'>star_border</i>");
                    } else {
                        if ($row['calificacion']==1)  {
                            print("<i class='material-icons'>star</i>");
                        } else {
                            if ($row['calificacion']==2)  {
                                print("<i class='material-icons'>star</i><i class='material-icons'>star</i>");
                            } else {
                                if ($row['calificacion']==3)  {
                                    print("<i class='material-icons'>star</i><i class='material-icons'>star</i><i class='material-icons'>star</i>");
                                } else {
                                    if ($row['calificacion']==4)  {
                                        print("<i class='material-icons'>star</i><i class='material-icons'>star</i><i class='material-icons'>star</i><i class='material-icons'>star</i>");
                                    } else {
                                        if ($row['calificacion']==5)  {
                                        print("<i class='material-icons'>star</i><i class='material-icons'>star</i><i class='material-icons'>star</i><i class='material-icons'>star</i><i class='material-icons'>star</i>");
                                    }
                                    }
                                }
                            }
                        }
                    }              
                print("</td>
                <td>".$row['tipo_comentario']."</td>
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
