<?php
    error_reporting(0);
    $email=$_GET['email'];
    $email2=$_POST['email'];
    if(isset($_POST['enviar']))
    {
        //HTML-----------------------------------------------------------
        echo "<!DOCTYPE html>
        <html>
            <head>
                <meta charset='utf-8'>
        
                <title>PROVECTUS</title>
                <link href='css/fontello.css' rel='stylesheet'>
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
        if(isset($_POST['password']))
        {
            $password=$_POST['password'];
            include_once('conexionbdd.php');
            $obj=new conexion('localhost','root','','provectus');
            $res=$obj->actcon($email2,$password);
            if($res)
            {
                echo "<div class='container'><center>
                    <p class='fw-bold fs-4 text-black bg-success mt-5 rounded-2 text-white p-4'>Contraseña actualizada con éxito.</p>
                    <a href='login.html' class='fw-bold fs-4 text-black bg-success mt-5 rounded-2 text-white p-2 text-decoration-none'>Ingresar</a>
                    </center>
                </div>";
            }
        }
        //FOOTER--------------------------------------------------------------------------------------
        echo "<div class='pie'>
                    <div class='p-3 fs-5 bg-white text-center'>
                        <span>Provectus | Caracas, Av. Urdaneta, Esquina de Candelito a Urapal, Res. Casabera, Nivel Avilanes, Local AS-012, La Candelaria</span>
                    </div>
                </div>
            </body>
        </html>";
    }
    else
    {
        //HTML-----------------------------------------------------------
        echo "<!DOCTYPE html>
        <html>
            <head>
                <meta charset='utf-8'>
        
                <title>PROVECTUS</title>
                <link href='css/fontello.css' rel='stylesheet'>
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
        echo "<div class='container'><center>
        <form class='mt-5 p-3' action='contra.php' method='post'>
            <p class='fw-bold fs-4 text-black'>Ingrese su nueva contraseña<p class='text-danger fs-5 fw-bold'>Recuerde que debe incluir al menos un caracter especial, número, una letra mayúscula, minúscula y de 8 a 15 caracteres. No use emoticones.</p></p>
            <input type='hidden' name='email' value='$email'>
            <input type='text' class='p-1 form-control form-control-sm w-25' name='password' id='password' required>
            <button type='submit' name='enviar' class='btn btn-primary mt-2 mb-3 fw-bold'>Recuperar</button>
        </form></center>
        </div>";
        //FOOTER--------------------------------------------------------------------------------------
        echo "<div class='pie'>
                    <div class='p-3 fs-5 bg-white text-center'>
                        <span>Provectus | Caracas, Av. Urdaneta, Esquina de Candelito a Urapal, Res. Casabera, Nivel Avilanes, Local AS-012, La Candelaria</span>
                    </div>
                </div>
            </body>
        </html>";
    }
?>