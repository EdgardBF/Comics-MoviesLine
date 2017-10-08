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
    if(	$_SESSION['estado'] == 1)
    {
      master::showMessage(3, "ingresar otra contraseña en vez de la enviada al correo", "cambio_contra.php");
    }
      $sql = "SELECT fecha_cambio_contra FROM administradores  WHERE id_admin =?";
      $params = array($_SESSION['id_admin']);
      $data = Database::getRow($sql, $params);
      if($data != null){
      $time = time();
      $fehca = $data['fecha_cambio_contra'];
      $fes = date("Y-m-d ", $time);
      $datetime1 = date_create($fehca);
      $datetime2 = date_create($fes);
      $interval = $datetime1->diff($datetime2);
      $dias = $interval->format('%a');
      if($dias >= 2)
      {
        master::showMessage(3, "Por cuestiones de seguridad debe ingresar otra contraseña", "cambio_contra.php");
      }
      else
      {
      }
      }
      else
      {
        
      }
?>
    <!--Se manda a llamar un archivo maestro del Slider-->
    <section>
      <?php
        include ('../../archivosmaestros/slider.php');
    $sql = "SELECT distribucion.distribucion as nombre, SUM(cantidad) as cantida FROM productos RIGHT JOIN distribucion ON productos.id_distribucion = distribucion.id_distribucion GROUP BY distribucion.distribucion";
    $params = null;
    $datoss = Database::getRows($sql, $params);
    //instrucciones para crear un grafico utilizando el googlechart
    print("
    <div id='container' style='min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto'></div>
    <script src='../../js/jquery-3.1.1.min.js'></script>
    <script src='../../lib/highcharts/code/highcharts.js'></script>
    <script src='../../lib/highcharts/code/modules/exporting.js'></script>
    <script type='text/javascript'>
$(document).ready(function () {

    // Build the chart
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Cantidad de productos por distribuidor'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:.1f}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Cantidad',
            colorByPoint: true,
            data: [
                ");
                            
                foreach($datoss as $row2)
				{
          if($row2['cantida']=="")
          {
				    print ("{ name: '".$row2['nombre']."', y: 0},");
          }
          else
          {
            print ("{ name: '".$row2['nombre']."', y:".$row2['cantida']."},");
          }
			    }
                print("
        ]
        }]
    });
});
</script>");
$sql = "SELECT tipo_producto.tipo_producto as nombre, SUM(cantidad) as cantida FROM productos RIGHT JOIN tipo_producto ON productos.id_tipo_producto = tipo_producto.id_tipo_producto GROUP BY tipo_producto.tipo_producto";
    $params = null;
    $datoss = Database::getRows($sql, $params);
    //instrucciones para crear un grafico utilizando el googlechart
    print("
    <div id='container1' style='min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto'></div>
    <script src='../../js/jquery-3.1.1.min.js'></script>
    <script src='../../lib/highcharts/code/highcharts.js'></script>
    <script src='../../lib/highcharts/code/modules/exporting.js'></script>
    <script type='text/javascript'>
$(document).ready(function () {

    // Build the chart
    Highcharts.chart('container1', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Cantidad de productos por tipo'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:.1f}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Cantidad',
            colorByPoint: true,
            data: [
                ");
                            
                foreach($datoss as $row2)
				{
          if($row2['cantida']=="")
          {
				    print ("{ name: '".$row2['nombre']."', y: 0},");
          }
          else
          {
            print ("{ name: '".$row2['nombre']."', y:".$row2['cantida']."},");
          }
			    }
                print("
        ]
        }]
    });
});
</script>");
      ?>
    </section>
    <section>
<?php
master::footer("main");
?>