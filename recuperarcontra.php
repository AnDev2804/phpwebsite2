<?php
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
        if(!empty($_POST['email']))
        {
            $email=$_POST['email'];
            include_once('conexionbdd.php');
            $obj=new conexion('localhost','root','','provectus');
            $result=$obj->buscaremail($email);
            $linea=mysqli_fetch_array($result);
            if($linea==null)
            {
                echo "<center><div class='container p-4'>
                        <div class='p-4 bg-danger rounded-4'>
                            <h2 class='text-white fw-bold'>Correo no encontrado.</h2>
                        </div>
                        <div class='bg-danger rounded-4 mt-4 w-25'>
                            <a id='volver' class='text-decoration-none text-white fw-bold' href='recuperarcontra.php'><h3>Volver</h3></a>
                        </div>
                </div></center>";
            }
            else
            {
                $email=$linea[0];
                header("Location:contra.php?email=" . urlencode($email));
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
        <form class='mt-5 p-3' action='recuperarcontra.php' method='post'>
            <p class='fw-bold fs-4 text-black'>Correo Electrónico<span class='text-danger'>*</span></p>
            <input type='email' class='p-1 form-control form-control-sm w-25' name='email' id='email' required>
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