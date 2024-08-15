<?php
    error_reporting(0);
    $id=(int)$_POST['id'];
    include_once('conexionbdd.php');
    $obj=new conexion('localhost','root','','provectus');
    $res=$obj->elimemerg($id);
    if($res)
    {
        echo json_encode("eliminada");
    }
    else
    {
        echo json_encode("error");
    }
?>