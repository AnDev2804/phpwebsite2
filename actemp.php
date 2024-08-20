<?php
    $empcorreo=$_POST['empcorreo'];
    $emppass=$_POST['emppass'];
    $empci=$_POST['empci'];
    $empNo1=$_POST['empNo1'];
    $empAp1=$_POST['empAp1'];
    $empNo2=$_POST['empNo2'];
    $empAp2=$_POST['empAp2'];
    $esp=$_POST['esp'];
    if($esp=='Enfermero'||$esp=='Enfermera'||$esp=='Enfermere')
    {
        $esp=1;
    }
    else if($esp=='Doctor'||$esp=='Doctora'||$esp=='Doctore')
    {
        $esp=2;
    }
    else if($esp=='Admin')
    {
        $esp=3;
    }
    $Fini=$_POST['Fini'];
    $Ffin=$_POST['Ffin'];
    $dact=$_POST['dact'];
    $titref=$_POST['titref'];
    $sex=$_POST['sex'];
    $ntel=$_POST['ntel'];
    //var_dump($empci,$empcorreo,$emppass,$empAp1,$empAp2,$empNo1,$empNo2,$esp,$Fini,$Ffin,$dact,$titref,$sex,$ntel);
    include_once('conexionbdd.php');
    $obj=new conexion();
    $result=$obj->actualizaremp($empci,$empcorreo,$emppass,$empAp1,$empAp2,$empNo1,$empNo2,$esp,$Fini,$Ffin,$dact,$titref,$sex,$ntel);
    if($result)
    {
        echo json_encode("actualizado");
    }
    else
    {
        echo json_encode("error");
    }
?>