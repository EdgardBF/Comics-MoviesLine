<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<style type="text/css">

		</style>
	</head>
	<body>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="../../code/highcharts.js"></script>
<script src="../../code/modules/exporting.js"></script>
  <?php   require("../../../database.php"); 
    $sql = "SELECT especialidad.id_especialidad, doctores.id_doctores, doctores.nombre, COUNT(referencia.id_referencia) AS refes, especialidad.nombre_especialidad FROM doctores INNER JOIN especialidad_doctor ON especialidad_doctor.id_doctor = doctores.id_doctores INNER JOIN especialidad ON especialidad.id_especialidad = especialidad_doctor.id_especialidad LEFT JOIN referencia ON doctores.id_doctores = referencia.id_doctor AND referencia.id_especialidad =especialidad.id_especialidad WHERE especialidad.nombre_especialidad = ? GROUP by nombre ORDER BY COUNT(referencia.id_referencia)";
    $params = array("Neumolog&iacute;a");
    $datoss = Database::getRows($sql, $params);?>


<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>



		<script type="text/javascript">


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
            text: 'Browser market shares January, 2015 to May, 2015'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
            name: 'Brands',
            colorByPoint: true,
            data: [            <?php 
                foreach($datoss as $row2)
				{
				    print ("{ name: '".$row2['nombre']."', y:".$row2['refes']."},");
			    }
        ?> ]
        }]
    });
});
		</script>
	</body>
</html>
