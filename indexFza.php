<?php

				require_once("conexion/conexion1.php");
        
        /*
        $arreglo1 = unserialize($_GET['areglo']);
        $max = sizeof($arreglo1);
        $n=0;
        //echo $max;
        /*
        for ($i=0; $i<$max; $i++) {
          echo $arreglo1[$i];
        
        while($n<$max){
          echo $arreglo1[$n];
          $n=$n+1;
        }
         }*/ 
        
        

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
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'PEROSNAS ATENDIDOS POR FUERZA'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Fuerza',
            data: [
			
			<?php
			$sql=mysql_query("select * from reporte_fuerza");
			while($res=mysql_fetch_array($sql)){
			?>
			
                ['<?php echo $res['nombre']; ?>', <?php echo $res['cantidad'] ?>],
			
			<?php
			}
			?>	
      /*
      <?php
      $sql=mysql_query("select * from reporte_especialidad");
      $num=0;
      
			while($res=mysql_fetch_array($sql)&&$num<$max){
			?>
			
                ['<?php echo $res['nombre']; ?>', <?php echo $arreglo1[$num] ?>],
			
			<?php
        $num=$num+1;
			}
			?>	*/
            ]
        }]
    });
});


		</script>
	</head>
	<body>
<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>
<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<br><br>
<center><a href="ejemplo3Fza.php">Ver ejemplo 3</a></center>
<center><a href="http://localhost:3000/indexreportegrafico" class="item">Inicio Grafico</a></center>
	</body>
</html>
