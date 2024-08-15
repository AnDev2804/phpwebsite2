<?php
    $conn = new mysqli("localhost","root","","provectus");
    $email=$_POST['email'];$password=$_POST['password'];$ci=$_POST['ci'];
    $nomb1=$_POST['nomb1'];$ape1=$_POST['ape1'];$fnac=$_POST['fnac'];
    $nomb2=$_POST['nomb2'];$ape2=$_POST['ape2'];$ntel=$_POST['ntel'];
    $sex=$_POST['sex'];$codestado=1;
    // VALIDACION PARA PERSONAS QUE TIENEN 2 NOMBRES Y 2 APELLIDOS
    if($email!=''&&$password!=''&&$ci!=''&&
    $nomb1!=''&&$ape1!=''&&$fnac!=''&&
    $nomb2!=''&&$ape2!=''&&$ntel!=''&&
    $sex!='' && !$conn->connect_error)
    {
        $sql="INSERT INTO PACIENTE VALUES('$ci','$email','$password','$ape1','$ape2','$nomb1','$nomb2','$fnac','$ntel','$sex','$codestado');";
        if($result = $conn->query($sql))
        {
          echo json_encode("Ahora usted debe dirigirse a la siguiente página para <a href='login.html'>Iniciar Sesión.</a>");
        }
    } // VALIDACION PARA PERSONAS QUE TIENEN 1 SOLO NOMBRE Y 1 SOLO APELLIDO
    else if($email!=''&&$password!=''&&$ci!=''&&
    $nomb1!=''&&$ape1!=''&&$fnac!=''&&
    $nomb2==''&&$ape2==''&&$ntel!=''&&
    $sex!='' && !$conn->connect_error)
    {
        $sql="INSERT INTO PACIENTE VALUES('$ci','$email','$password','$ape1','$ape2','$nomb1','$nomb2','$fnac','$ntel','$sex','$codestado');";
        if($result = $conn->query($sql))
        {
            echo json_encode("Ahora usted debe dirigirse a la siguiente página para <a href='login.html'>Iniciar Sesión.</a>");
        }
    } //VALIDACION PARA PERSONAS QUE NO TIENEN SEGUNDO NOMBRE PERO SI SEGUNDO APELLIDO
    else if($email!=''&&$password!=''&&$ci!=''&&
    $nomb1!=''&&$ape1!=''&&$fnac!=''&&
    $nomb2!=''&&$ape2==''&&$ntel!=''&&
    $sex!='' && !$conn->connect_error)
    {
        $sql="INSERT INTO PACIENTE VALUES('$ci','$email','$password','$ape1','$ape2','$nomb1','$nomb2','$fnac','$ntel','$sex','$codestado');";
        if($result = $conn->query($sql))
        {
            echo json_encode("Ahora usted debe dirigirse a la siguiente página para <a href='login.html'>Iniciar Sesión.</a>");
        }
    }//VALIDACION PARA PERSONAS QUE TIENEN SEGUNDO NOMBRE PERO NO SEGUNDO APELLIDO
    else if($email!=''&&$password!=''&&$ci!=''&&
    $nomb1!=''&&$ape1!=''&&$fnac!=''&&
    $nomb2==''&&$ape2!=''&&$ntel!=''&&
    $sex!='' && !$conn->connect_error)
    {
        $sql="INSERT INTO PACIENTE VALUES('$ci','$email','$password','$ape1','$ape2','$nomb1','$nomb2','$fnac','$ntel','$sex','$codestado');";
        if($result = $conn->query($sql))
        {
            echo json_encode("Ahora usted debe dirigirse a la siguiente página para <a href='login.html'>Iniciar Sesión.</a>");
        }
    }
    else
    {
        echo json_encode('error');
    }
?>