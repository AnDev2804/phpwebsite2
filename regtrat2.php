<?php
    $codigo=$_POST['codigo'];
    $nombre=$_POST['nombre'];
    include_once('conexionbdd.php');
    $obj=new conexion();
    $method=$obj->regtrat($codigo,$nombre);
    if($method)
    {
        echo json_encode("Hola");
    }
    else
    {
        echo json_encode("error");
    }
?>