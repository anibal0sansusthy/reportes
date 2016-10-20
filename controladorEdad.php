<?php
    require_once('/conexion/conexion.php');
    $fecha_ini = $_POST['fecha_ini'];
    $fecha_fin = $_POST['fecha_fin'];
    $res1 = mysqli_query($conexion, "select count(*) as cantidadn from edades1 p join asegurado a on p.id_persona=a.id_persona join reserva r on a.id_asegurado=r.id_asegurado join historial_clinico h on r.id_reserva=h.reserva_id join reserva re on h.reserva_id=re.id_reserva join horario ho on re.id_horario=ho.id_horario where p.anos<='18'and p.anos>='1'and ho.fecha<='".$fecha_fin."' and ho.fecha>='".$fecha_ini."'");
    $resultEjto = mysqli_fetch_assoc($res1);
    $res2 = mysqli_query($conexion, "select count(*) as cantidada from edades1 p join asegurado a on p.id_persona=a.id_persona join reserva r on a.id_asegurado=r.id_asegurado join historial_clinico h on r.id_reserva=h.reserva_id join reserva re on h.reserva_id=re.id_reserva join horario ho on re.id_horario=ho.id_horario where p.anos<='40'and p.anos>='19'and ho.fecha<='".$fecha_fin."' and ho.fecha>='".$fecha_ini."'");
    $resultArm = mysqli_fetch_assoc($res2);
    $res3 = mysqli_query($conexion, "select count(*) as cantidadm from edades1 p join asegurado a on p.id_persona=a.id_persona join reserva r on a.id_asegurado=r.id_asegurado join historial_clinico h on r.id_reserva=h.reserva_id join reserva re on h.reserva_id=re.id_reserva join horario ho on re.id_horario=ho.id_horario where p.anos<='100'and p.anos>='41'and ho.fecha<='".$fecha_fin."' and ho.fecha>='".$fecha_ini."'");
    $resultMayor = mysqli_fetch_assoc($res3);
    $ejto=$resultEjto['cantidadn'];
    $arm=$resultArm['cantidada'];
    $mayor=$resultMayor['cantidadm'];
    $query1="UPDATE reporte_edad SET cantidad='".$ejto."' WHERE nombre='NIÑO' ";
    $result1 = $conexion->query($query1);
    $query2="UPDATE reporte_edad SET cantidad='".$arm."' WHERE nombre='ADULTO' ";
    $result2 = $conexion->query($query2);
    $query3="UPDATE reporte_edad SET cantidad='".$mayor."' WHERE nombre='ADULTO MAYOR' ";
    $result3 = $conexion->query($query3);
    header('location: indexEdad.php');
?>