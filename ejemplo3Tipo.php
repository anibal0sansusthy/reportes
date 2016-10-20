<?php

				require_once("conexion/conexion1.php");
        
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="jquery-3.0.0.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'CANTIDAD DE ATENDIDOS POR TIPO DE ASEGURADO'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
<?php
$sql=mysql_query("select * from reporte_tipo order by cantidad desc");
while($res=mysql_fetch_array($sql)){			
?>
			
			['<?php echo $res['nombre'] ?>'],
			
<?php
}
?>
			
			],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Population (millions)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' millions'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Tipo',
            data: [
			<?php
$sql=mysql_query("select * from reporte_tipo order by cantidad desc");
while($res=mysql_fetch_array($sql)){			
?>			
			[<?php echo $res['cantidad'] ?>],
		
<?php
}
?>			
			]
        }]
    });
});
		</script>
	</head>
	<body>
<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
<br><br>
<center><a href="ejemplo4Tipo.php">Ver grafico 4</a></center>
<center><a href="http://localhost:3000/indexreportegrafico" class="item">Inicio Grafico</a></center>
	</body>
</html>
