<?php
    $ci=$_POST['ci'];
    include_once('conexionbdd.php');
    $obj=new conexion();
    $result=$obj->eliminarpac($ci);
    if($result)
    {
        echo json_encode("eliminado");
    }
    else
    {
        echo json_encode("error");
    }
?>