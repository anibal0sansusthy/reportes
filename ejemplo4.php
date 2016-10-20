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
#container {
	height: 400px; 
	min-width: 310px; 
	max-width: 800px;
	margin: 0 auto;
}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column',
            margin: 95,
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'REPORTES GRAFICOS POR ESPECIALIDADES'
        },
        subtitle: {
            text: ''
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        xAxis: {
            categories: [
			<?php
$sql=mysql_query("select * from reporte_especialidad order by cantidad desc");
while($res=mysql_fetch_array($sql)){			
?>					
			
			['<?php echo $res['nombre']; ?>'],
<?php
}
?>
			]
        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [{
            name: '',
            data: [
			
			<?php
$sql=mysql_query("select * from reporte_especialidad order by cantidad desc");
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
<script src="Highcharts-4.1.5/js/highcharts-3d.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="height: 400px"></div>
<center><a href="http://localhost:3000/indexreportegrafico" class="item">Inicio Grafico</a></center>
	</body>
</html>
