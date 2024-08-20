<?php
    $cior=$_POST['cior'];
    $ci=$_POST['ci'];$email=$_POST['email'];$ap1=$_POST['ap1'];$ap2=$_POST['ap2'];$no1=$_POST['no1'];$no2=$_POST['no2'];$fnac=$_POST['fnac'];
    $ntel=$_POST['ntel'];$sex=$_POST['sex'];$tsangre=$_POST['tsangre'];$fsangre=$_POST['fsangre'];$falerg=$_POST['falerg'];$fcong=$_POST['fcong'];
    $fmot=$_POST['fmot'];$est=$_POST['est'];$peso=$_POST['peso'];
    //var_dump($cior,$ci,$email,$ap1,$ap2,$no1,$no2,$fnac,$ntel,$sex,$tsangre,$fsangre,$falerg,$fcong,$fmot,$est,$peso);
    include_once('conexionbdd.php');
    $obj=new conexion();
    $res=$obj->actpac($cior,$ci,$email,$ap1,$ap2,$no1,$no2,$fnac,$ntel,$sex);
    //var_dump($res);
    if($res)
    {
        $obj=new conexion();
        $res=$obj->actperf($cior,$ci,$tsangre,$fsangre,$falerg,$fcong,$fmot,(float)$est,(float)$peso);
        //var_dump($res);
        if($res)
        {
            echo json_encode("exitoso");
        }
    }
    else
    {
        echo json_encode("error");
    }
?>