<?php
require("../..//lib/master.php");
master::header("main");
//Revisa si hay comentarios a verificar
$sql = "SELECT comentarios.id_comentario, registro.usuario, comentarios.comentario, productos.nombre_producto, comentarios.calificacion, comentarios.id_tipo_comentario FROM comentarios, registro, productos WHERE registro.id_registro = comentarios.id_registro AND productos.id_producto = comentarios.id_producto AND comentarios.id_tipo_comentario = 3 ORDER BY comentarios.fecha desc";
  
	$params = null;

$data = Database::getRows($sql, $params);
if($data != null){
 master::showMessage(3, "Hay comentarios esperando tu aprobacion", "index_compag.php");
}
else
{
      $sql = "SELECT id_comentario, comentarios.id_registro, registro.usuario, comentario, fecha, id_tipo_comentario FROM comentarios, registro  WHERE registro.id_registro = comentarios.id_registro AND id_tipo_comentario = 3 ORDER BY fecha desc";
      $params = null;
      $data = Database::getRows($sql, $params);
      if($data != null){
        master::showMessage(3, "Hay comentarios esperando tu aprobacion", "index_comen.php");
      }
      else
      {}
}
?>
    <!--Se manda a llamar un archivo maestro del Slider-->
    <section>
      <?php
        include ('../../archivosmaestros/slider.php')
      ?>
    </section>
    <section>
<?php
master::footer("main");
?>