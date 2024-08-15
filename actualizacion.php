<?php
    include_once('conexionbdd.php');
    $obj=new conexion('localhost','root','','provectus');
    $ci=$_POST['ci'];
    $email=$_POST['email'];
    $ape1=$_POST['ape1'];
    $ape2=$_POST['ape2'];
    $nomb1=$_POST['nomb1'];
    $nomb2=$_POST['nomb2'];
    $ntel=$_POST['ntel'];
    $fnac=$_POST['fnac'];
    $sex=$_POST['sex'];
    $res=$obj->actualizarpaciente($ci,$email,$ape1,$ape2,$nomb1,$nomb2,$ntel,$fnac,$sex);
    if($res)
    {
        echo json_encode("Puede regresar a la página anterior o actualizar la página para seguir cambiando algún dato del que no esté segur@.");
    }
    else
    {
        echo json_encode("error");
    }
?>