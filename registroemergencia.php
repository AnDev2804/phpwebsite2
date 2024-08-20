<?php
    include_once('conexionbdd.php');
    $obj=new conexion();
    $desc=$_POST['desc'];
    if($desc!=NULL)
    {
        $gett=$obj->numemergencia();
        if(($getid=mysqli_fetch_row($gett)==null))
        {
            $id=1;
            include_once('conexionbdd.php');
            $obj=new conexion();
            $regemer=$obj->regemergencia($id,$desc);
            if($regemer)
            {
                echo json_encode("wowza");
            }
            else
            {
                echo json_encode("error");
            }
        }
        else
        {
            include_once('conexionbdd.php');
            $obj=new conexion();
            $gett=$obj->numemergencia();
            while($getid=mysqli_fetch_array($gett))
            {
                $id=(int)$getid[0];
            }
            $id++;
            include_once('conexionbdd.php');
            $obj=new conexion();
            $regemer=$obj->regemergencia($id,$desc);
            if($regemer)
            {
                echo json_encode("wowza");
            }
            else
            {
                echo json_encode("error");
            }
        }
    }
    else
    {
        echo json_encode("error");
    }
?>