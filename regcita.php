<?php
    error_reporting(0);
    include_once('conexionbdd.php');
    $obj=new conexion('localhost','root','','provectus');
    $idcita=(int)$_POST['idcita'];$ci=$_POST['ci'];$nfecha=$_POST['nfecha'];$fcita=$_POST['fcita'];$codesp=$_POST['codesp'];$ciesp=$_POST['ciesp'];$observ=$_POST['observ'];$diag=$_POST['diag'];$trat=$_POST['trat'];$ncita=$_POST['ncita'];$costo=(float)$_POST['costo'];
    if($ncita==0)
    {
        $registro=$obj->registrarcita($ci,$fcita,$codesp,$ciesp,$observ,$diag,$trat,$ncita,$costo);
        echo json_encode("Cita atendida y registrada exitosamente.");
    }
    else
    {
        $obj=new conexion('localhost','root','','provectus');
        $registro=$obj->registrarcita($ci,$fcita,$codesp,$ciesp,$observ,$diag,$trat,$ncita,$costo);
        include_once('conexionbdd.php');
        $obj=new conexion('localhost','root','','provectus');
        $res=$obj->numcita();
        while($num=mysqli_fetch_array($res))
        {
            $numcitanueva=(int)$num[0] + 1;
        }
        include_once('conexionbdd.php');
        $obj=new conexion('localhost','root','','provectus');
        $ncpendiente=$obj->ncita($numcitanueva,$ci,$nfecha,$codesp);
        include_once('conexionbdd.php');
        echo json_encode("Cita atendida y nueva cita registrada correctamente.");
    }
?>