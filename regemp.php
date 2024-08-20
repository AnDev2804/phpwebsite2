<?php
    $empcorreo=$_POST['empcorreo'];
    $emppass=$_POST['emppass'];
    $empci=$_POST['empci'];
    $empNo1=$_POST['empNo1'];
    $empAp1=$_POST['empAp1'];
    $empNo2=$_POST['empNo2'];
    $empAp2=$_POST['empAp2'];
    $esp=(int)$_POST['esp'];
    $Fini=$_POST['Fini'];
    $Ffin=$_POST['Ffin'];
    $dact=$_POST['dact'];
    $titref=$_POST['titref'];
    $sex=$_POST['sex'];
    $ntel=$_POST['ntel'];
    if($empcorreo!=NULL&&$emppass!=NULL&&$empci!=NULL&&$empNo1!=NULL&&$empAp1!=NULL&&$esp!=NULL&&$Fini!=NULL&&$Ffin!=NULL&&$dact!=NULL&&$titref!=NULL&&$sex!=NULL&&$ntel)
    {
        include_once('conexionbdd.php');
        $obj=new conexion();
        $res=$obj->regemp($empci,$empcorreo,$emppass,$empAp1,$empAp2,$empNo1,$empNo2,$esp,$Fini,$Ffin,$dact,$titref,$sex,$ntel);
        if($res)
        {
            echo json_encode("bien");
        }
    }
    else
    {
        echo json_encode("error");
    }
?>