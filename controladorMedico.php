<?php
    require_once('/conexion/conexion.php');
    $fecha_ini = $_POST['fecha_ini'];
    $fecha_fin = $_POST['fecha_fin'];
    $arreglo=array();
    $cont=1;
    $result = mysqli_query($conexion, "SELECT p.matricula from persona p join medico m on p.id_persona=m.id_persona");
    while($row = mysqli_fetch_assoc($result))
      { 
        //echo $row['nombre'];
        $cant = mysqli_query($conexion, "select p.apaterno, count(*) as cantidad from persona p join medico m on p.id_persona=m.id_persona join horario ho on m.id_medico=ho.id_medico join reserva r on ho.id_horario=r.id_horario join historial_clinico hi on r.id_reserva=hi.reserva_id where p.matricula='". $row['matricula']."' and ho.fecha<='" . $fecha_fin . "' and ho.fecha>='".$fecha_ini."'");
        $row1 = mysqli_fetch_assoc($cant);
        $nombre=$row1['apaterno'];
        $cantidad=$row1['cantidad'];
        //$query="INSERT INTO reporte_especialidad (id,nombre,cantidad) VALUES ('','$nombre', $cantidad)";
        $query="UPDATE reporte_medico SET apaterno='".$nombre."' , cantidad='".$cantidad."'  WHERE id='".$cont."' ";
        $result1 = $conexion->query($query);
        $cont=$cont+1;
      }
                                      
    //header('location: index.php?areglo='.serialize($arreglo));
    header('location: indexMedico.php');
?>