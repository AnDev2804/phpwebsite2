<?php
    $ci=$_POST['ci'];$tsangre=$_POST['tsangre'];$fsangre=$_POST['fsangre'];
    $est=$_POST['est'];$pes=$_POST['pes'];$faler=$_POST['faler'];
    $fcon=$_POST['fcong'];$fmot=$_POST['fmot'];
    //HTML-----------------------------------------------------------
    echo "<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8'>
    
            <title>PROVECTUS</title>
            <link href='css/bootstrap.min.css' rel='stylesheet'>
            <link href='page.css' rel='stylesheet'>
        </head>";
    //BODY---------------------------------------------------------------------------------------
    echo "<body>
    <div class='cabecera'>
        <div class='shadow p-3 mb-1 bg-white text-body'>
            <img class='img1' src='logo.jpeg'>
            <h2 class='pro'>P R O V E C T U S</h2>
            <br>
            <h3 class='slg'>Servicio Avanzado Médico</h3>
        </div>
    </div>";
    include_once('conexionbdd.php');
    $obj=new conexion();
    $registro=$obj->regperfil($ci,$tsangre,$fsangre,$est,$pes,$faler,$fcon,$fmot);
    if($registro)
    {
        $obj= new conexion();
        $update=$obj->updateestado($ci);
        if($update)
        {
            echo "
            <div class='backg2'>
                <div class='container bg-primary rounded-5'>
                    <div class='fw-bold fs-3 text-center text-white p-5'>
                        <p>Registro completo</p>
                        <p>De click en el siguiente boton para ingresar de nuevo.</p>
                        <a href='login.html' style='text-decoration:none;'><button type='button' class='btn fs-3 text-white fw-bold btn-secondary'>Ingresar</button></a>
                    </div>
                </div>
            </div>";
        }
    }
    else
    {
        echo "
            <div class='backg3'>
                <div class='container bg-danger rounded-5'>
                    <div class='fw-bold fs-3 text-center text-white p-5'>
                        <p>Registro fallido</p>
                        <p>De click en el siguiente boton para intentar de nuevo.</p>
                        <a href='login.html' style='text-decoration:none;'><button type='button' class='btn fs-3 text-white fw-bold btn-secondary'>Ingresar</button></a>
                    </div>
                </div>
            </div>";
    }
    //FOOTER--------------------------------------------------------------------------------------
    echo "<div class='pie'>
                <div class='p-3 fs-5 bg-white text-center'>
                    <span>Provectus | Caracas, Av. Urdaneta, Esquina de Candelito a Urapal, Res. Casabera, Nivel Avilanes, Local AS-012, La Candelaria</span>
                </div>
            </div>
        </body>
    </html>";
?>