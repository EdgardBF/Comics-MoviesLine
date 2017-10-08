<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<style type="text/css">

		</style>
	</head>
	<body>

<script src="../../code/highcharts.js"></script>
<script src="../../code/highcharts-3d.js"></script>
<script src="../../code/modules/exporting.js"></script>

<div id="container" style="height: 400px"></div>
<?php 
require("../../../database.php");
$fech = date('d-m-Y');
						$my_date = new DateTime(); 
						$datetime1 = date_create($fech);
		//instruccion para poner datos
						$sql = "SELECT COUNT(citas.id_cita) AS cita, citas.id_doctor, MONTH(fecha), citas.estado FROM citas INNER JOIN doctores ON citas.id_doctor = doctores.id_doctores WHERE id_doctor = ?  AND (citas.estado = ? OR ?) AND YEAR(fecha)=? GROUP BY MONTH(fecha)";
						$params = array(3, 1,2, $datetime1->format('Y'));
						$data = Database::getRows($sql, $params);
		//se hizo un arreglo para colocar el nombre del mes
						$numes = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
						$mes= array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
?>

<script type="text/javascript">

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
        <?php print("text: 'Cantidad de Citas del ".$datetime1->format('Y')." por Mes'"); ?>
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
            <?php
                foreach($data as $row2)
                {
                //se ponen lo que son los datos en el arreglo
                    for($i=1; $i<13; $i++)
                    {
                        if($row2['MONTH(fecha)'] == $numes[$i])
                        {
                            $mese = $mes[$i];	
                            $i=13;
                        }
                    }
                    print ("['".$mese."', ".$row2['cita']."],");

                }
                ?>
        ]
    }]
});
		</script>
	</body>
</html>
