<?php
    require_once('/conexion/conexion.php');
    $fecha_ini = $_POST['fecha_ini'];
    $fecha_fin = $_POST['fecha_fin'];
    $res1 = mysqli_query($conexion, "select count(*) as cantidadE from persona p join asegurado a on p.id_persona=a.id_persona join reserva r on a.id_asegurado=r.id_asegurado join historial_clinico h on r.id_reserva=h.reserva_id left outer join horario ho on r.id_horario=ho.id_horario join medico m on ho.id_medico=m.id_medico join especialidad e on m.id_especialidad=e.id_especialidad where a.fuerza='EJERCITO' and ho.fecha<='".$fecha_fin."' and ho.fecha>='".$fecha_ini."'");
    $resultEjto = mysqli_fetch_assoc($res1);
    $res2 = mysqli_query($conexion, "select count(*) as cantidadA from persona p join asegurado a on p.id_persona=a.id_persona join reserva r on a.id_asegurado=r.id_asegurado join historial_clinico h on r.id_reserva=h.reserva_id left outer join horario ho on r.id_horario=ho.id_horario join medico m on ho.id_medico=m.id_medico join especialidad e on m.id_especialidad=e.id_especialidad where a.fuerza='ARMADA' and ho.fecha<='".$fecha_fin."' and ho.fecha>='".$fecha_ini."'");
    $resultArm = mysqli_fetch_assoc($res2);
    $res3 = mysqli_query($conexion, "select count(*) as cantidadF from persona p join asegurado a on p.id_persona=a.id_persona join reserva r on a.id_asegurado=r.id_asegurado join historial_clinico h on r.id_reserva=h.reserva_id left outer join horario ho on r.id_horario=ho.id_horario join medico m on ho.id_medico=m.id_medico join especialidad e on m.id_especialidad=e.id_especialidad where a.fuerza='FAB' and ho.fecha<='".$fecha_fin."' and ho.fecha>='".$fecha_ini."'");
    $resultFAB = mysqli_fetch_assoc($res3);
    $ejto=$resultEjto['cantidadE'];
    $arm=$resultArm['cantidadA'];
    $fab=$resultFAB['cantidadF'];
    $query1="UPDATE reporte_fuerza SET cantidad='".$ejto."' WHERE nombre='EJERCITO' ";
    $result1 = $conexion->query($query1);
    $query2="UPDATE reporte_fuerza SET cantidad='".$arm."' WHERE nombre='ARMADA' ";
    $result2 = $conexion->query($query2);
    $query3="UPDATE reporte_fuerza SET cantidad='".$fab."' WHERE nombre='FAB' ";
    $result3 = $conexion->query($query3);
    header('location: indexFza.php');
?>