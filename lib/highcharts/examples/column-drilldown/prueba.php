<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<style type="text/css">

		</style>
	</head>
	<body>
<?php require("../../../database.php"); 
    $sqls = "SELECT IF(tipo_medicina = 1, 'Donada', 'Comprado') AS Nombre, SUM(cantidad) AS cantidad FROM medicina GROUP BY tipo_medicina";
    $datas = Database::getRows($sqls, null);
?>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script src="../../code/highcharts.js"></script>
<script src="../../code/modules/data.js"></script>
<script src="../../code/modules/drilldown.js"></script>



		<script type="text/javascript">

// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Cantidad de medicinas por tipo'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> en total<br/>'
    },

    series: [{
        name: 'Cantidad de medicinas',
        colorByPoint: true,
        data: [
            <?php 
                foreach($datas as $row2)
				{
				    print ("{ name: '".$row2['Nombre']."', y:".$row2['cantidad']."},");
			    }
        ?>
            ]
    }],
});
		</script>
	</body>
</html>
