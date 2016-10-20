<?php
    require_once('/conexion/conexion.php');
    $fecha_ini = $_POST['fecha_ini'];
    $fecha_fin = $_POST['fecha_fin'];
    $res1 = mysqli_query($conexion, "select count(*) as cantidadA from persona p join asegurado a on p.id_persona=a.id_persona join reserva r on a.id_asegurado=r.id_asegurado join historial_clinico h on r.id_reserva=h.reserva_id left outer join horario ho on r.id_horario=ho.id_horario join medico m on ho.id_medico=m.id_medico join especialidad e on m.id_especialidad=e.id_especialidad where a.tipo_asegurado='ACTIVO' and ho.fecha<='".$fecha_fin."' and ho.fecha>='".$fecha_ini."'");
    $resultEjto = mysqli_fetch_assoc($res1);
    $res2 = mysqli_query($conexion, "select count(*) as cantidadP from persona p join asegurado a on p.id_persona=a.id_persona join reserva r on a.id_asegurado=r.id_asegurado join historial_clinico h on r.id_reserva=h.reserva_id left outer join horario ho on r.id_horario=ho.id_horario join medico m on ho.id_medico=m.id_medico join especialidad e on m.id_especialidad=e.id_especialidad where a.tipo_asegurado='PASIVO' and ho.fecha<='".$fecha_fin."' and ho.fecha>='".$fecha_ini."'");
    $resultArm = mysqli_fetch_assoc($res2);
    
    $ejto=$resultEjto['cantidadA'];
    $arm=$resultArm['cantidadP'];
    
    $query1="UPDATE reporte_tipo SET cantidad='".$ejto."' WHERE nombre='ACTIVO' ";
    $result1 = $conexion->query($query1);
    $query2="UPDATE reporte_tipo SET cantidad='".$arm."' WHERE nombre='PASIVO' ";
    $result2 = $conexion->query($query2);
    
    header('location: indexTipo.php');
?>