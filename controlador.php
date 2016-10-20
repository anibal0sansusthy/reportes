<?php
    require_once('/conexion/conexion.php');
    $fecha_ini = $_POST['fecha_ini'];
    $fecha_fin = $_POST['fecha_fin'];
    $arreglo=array();
    $cont=1;
    $result = mysqli_query($conexion, "SELECT nombre FROM especialidad");
    while($row = mysqli_fetch_assoc($result))
      { 
        //echo $row['nombre'];
        $cant = mysqli_query($conexion, "select count(*) as cantidadA from persona p join asegurado a on p.id_persona=a.id_persona join reserva r on a.id_asegurado=r.id_asegurado join historial_clinico h on r.id_reserva=h.reserva_id left outer join horario ho on r.id_horario=ho.id_horario join medico m on ho.id_medico=m.id_medico join especialidad e on m.id_especialidad=e.id_especialidad where e.nombre='".$row['nombre']."' and ho.fecha<='".$fecha_fin."' and ho.fecha>='".$fecha_ini."'");
        $row1 = mysqli_fetch_assoc($cant);
        $nombre=$row['nombre'];
        $cantidad=$row1['cantidadA'];
        //$query="INSERT INTO reporte_especialidad (id,nombre,cantidad) VALUES ('','$nombre', $cantidad)";
        $query="UPDATE reporte_especialidad SET cantidad='".$cantidad."' WHERE nombre='".$nombre."' ";
        $result1 = $conexion->query($query);
        $arreglo[$cont] =$row1['cantidadA']; 
        
        $cont=$cont+1;
      }
                                      
    //header('location: index.php?areglo='.serialize($arreglo));
    header('location: index.php');
?>