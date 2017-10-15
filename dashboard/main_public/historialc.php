<?php
require("../../lib/master_c.php");
master::header("Editar perfil");
$data = null;
$fecha1 = date("Y-m-d");
if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
  	$fecha = $_POST['fecha'];
    $fecha2 = $_POST['fecha1'];
    try 
    {
            //Selecciona el Historial de Compras de un usuario
            $sql = "SELECT productos.nombre_producto, productos.precio_producto, compra.cantidad, compra.fecha, compra.id_reconocimiento FROM productos, registro, compra WHERE compra.fecha BETWEEN ? AND ? AND productos.id_producto = compra.id_producto AND registro.id_registro = compra.id_registro AND registro.id_registro = ?";
            $params = array($fecha, $fecha2, $_SESSION['id_registro']);
            $data = Database::getRows($sql, $params);
    }
    catch (Exception $error)
    {
        master::showMessage(2, $error->getMessage(), null);
    }
}
else
{
}
?>
<br>

<form method='post'>
    <div class='row'>
        <div class='input-field col s12 m6'>
            <label>Fecha Inicio</label>
            <br>
          <input type="date" name='fecha' max='<?php print($fecha1); ?>' class="validate">
        </div>
        <div class="input-field col s12 m6" >
            <label>Fecha Fin</label>
            <br>
          <input type="date" name='fecha1' min='<?php print($fecha1); ?>' class="validate">
        </div>
            <div class='row center-align'>
                <a href='../../public/index.php' class='btn waves-effect red'>Cancelar<i class='material-icons left'>highlight_off</i></a>
                <button type='submit' class='btn waves-effect blue'>Guardar<i class='material-icons left'>add_circle_outline</i></button>
            </div>
</form>
<div class='row'>
<div class="center-align">
<?php
     if($data != null)
                            {
             foreach ($data as $row) 
                                {
                    print("
                        <div class='col s12 m4 '>
                            <div class='card card-panel teal darken-2 white-text'>
                                <div class='card-content'>
                                    <p class='grey-text text-darken-4'><h5>$row[nombre_producto] $ $row[precio_producto]</h5></p>
                                    <p class='grey-text text-darken-4'><h5>Cantidad: $row[cantidad]</h5></p>
                                    <p class='grey-text text-darken-4'><h5>Pagado: $ ".$row['cantidad']*$row['precio_producto']."</h5></p>
                                    <p class='grey-text text-darken-4'><h5>Fecha de compra:".$row['fecha']."</h5></p>
                                    <a href='../../lib/reporte.php?id=".$_SESSION['id_registro']."&reco=".$row['id_reconocimiento']."' class='waves-effect waves-light tooltipped' data-position='bottom' data-delay='50' data-tooltip='ver factura'><i class='material-icons white-text text-darken-3'>description</i></a>
                                </div>
                            </div>
                        </div>
                        

                        ");
                        }
                    	$fech = date('d-m-Y');
						$my_date = new DateTime(); 
						$datetime1 = date_create($fech);
		//instruccion para poner datos
						$sql = "SELECT COUNT(compra.id_compra) AS compra, compra.id_registro, MONTH(fecha) FROM compra INNER JOIN registro ON compra.id_registro = registro.id_registro WHERE compra.id_registro = ?   AND YEAR(fecha)=? GROUP BY MONTH(fecha)";
						$params = array($_SESSION['id_registro'], $datetime1->format('Y'));
						$data = Database::getRows($sql, $params);
		//se hizo un arreglo para colocar el nombre del mes
						$numes = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
						$mes= array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
						?>
							<div id="container" style="height: 400px"></div>
<?php						
			//instrucciones para crear un grafico utilizando el googlechart
						print("
<script src='../../lib/highcharts/code/highcharts.js'></script>
<script src='../../lib/highcharts/code/highcharts-3d.js'></script>
<script src='../../lib/highcharts/code/modules/exporting.js'></script>
<script type='text/javascript'>

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
         text: 'Procentaje de Compras del ".$datetime1->format('Y')." por Mes'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>, Cantidad: <b>{point.y:.1f}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Porcentaje',

        data: [
			");
                foreach($data as $row2)
                {
                //se ponen lo que son los datos en el arreglo
                    for($i=0; $i<12; $i++)
                    {
                        if($row2['MONTH(fecha)'] == $numes[$i])
                        {
                            $mese = $mes[$i];	
                            $i=13;
                        }
                    }
                    print ("['".$mese."', ".$row2['compra']."],");

                }
print("
        ]
    }]
});
		</script>
						</div>
						</li>
						</ul>
						</main>");
                            }
                            else
                            {
                                 print("<div class='card-panel cyan darken-3'><i class='material-icons left'>warning</i>No hay registros disponibles en este momento.</div>");
                            }
?>
</div>
</div>
<?php
master::footer("Editar perfil");
?>