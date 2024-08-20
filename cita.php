<?php
    error_reporting(0);
    $ci=(int)$_POST['ci'];
    $fcita=$_POST['fcita'];
    $espec=$_POST['espec'];
    include_once('conexionbdd.php');
    $obj=new conexion();
    $res=$obj->numcita();
    while($num=mysqli_fetch_array($res))
    {
        $numero=(int)$num[0];
    }
    $numero++;
    if($ci==null && $fcita==null && $espec==null)
    {
        echo json_encode("error");
    }
    else
    {
        include_once('conexionbdd.php');
        $obj=new conexion();
        $cita=$obj->citapendiente($numero,$ci,$fcita,$espec);
        if($cita)
        {
            echo json_encode($fcita);
        }
        else
        {
            echo json_encode("error");
        }
    }
?>
