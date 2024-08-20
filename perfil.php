<?php
    $ci=$_POST['ci'];
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
                    <nav class='menu'>
                        <ul>
                            <li><a href='index.html' class='fs-5 p-4'>Cerrar Sesión</a></li>
                            <li>
                        </ul>
                    </nav>
                    <br>
                    <h3 class='slg'>Servicio Avanzado Médico</h3>
                </div>
            </div>";
            include_once('conexionbdd.php');
            $obj=new conexion();
            $result=$obj->buscarpacreg($ci);
            $linea=mysqli_fetch_array($result);
            echo"<div class='bg-secondary-subtle p-5'>
                <div class='container p-5 bg-white rounded-5 w-50 border border-3 border-secondary'>
                        <form action='actpac.php' method='post' id='formulario' class='bg-white rounded-5 p-5 ' style='--bs-bg-opacity: .7;'>

                                    <p class='fw-bold fs-4 text-black'>Cédula de Identidad</p>
                                    <input type='hidden' name='cior' value='$ci'>
                                    <input type='text' class='p-1 form-control form-control-sm' name='ci' id='ci' value='$linea[0]'>
                                    <p class='fw-bold fs-4 text-black'>Correo Electrónico</p>
                                    <input type='email' class='p-1 form-control form-control-sm' name='email' id='email' value='$linea[1]'>
                                    <p class='fw-bold fs-4 text-black'>Primer Apellido</p>
                                    <input type='text' class='p-1 form-control form-control-sm' name='ap1' id='ap1' value='$linea[2]'>
                                    <p class='fw-bold fs-4 text-black'>Segundo Apellido</p>
                                    <input type='text' class='p-1 form-control form-control-sm' name='ap2' id='ap2' value='$linea[3]'>
                                    <p class='fw-bold fs-4 text-black'>Primer Nombre</p>
                                    <input type='text' class='p-1 form-control form-control-sm' name='no1' id='no1' value='$linea[4]'>
                                    <p class='fw-bold fs-4 text-black'>Segundo Nombre</p>
                                    <input type='text' class='p-1 form-control form-control-sm' name='no2' id='no2' value='$linea[5]'>
                                    <p class='fw-bold fs-4 text-black'>Fecha de Nacimiento</p>
                                    <input type='date' class='p-1 form-control form-control-sm' name='fnac' id='fnac' value='$linea[6]'>
                                    <p class='fw-bold fs-4 text-black'>Número Telefónico</p>
                                    <input type='text' name='ntel' id='ntel' class='p-1 form-control form-control-sm' value='$linea[7]'>
                                    <p class='fw-bold fs-4 text-black'>Sexo<span class='text-black fw-bold ms-2' style='font-size:14px;'>M(Masculino), F(Femenino), O(Otro)</span></p>
                                    <input type='text' class='p-1 form-control form-control-sm' name='sex' id='sex' value='$linea[8]'>
                                    <p class='fw-bold fs-4 text-black'>Tipo de Sangre<span class='text-black fw-bold ms-2' style='font-size:14px;'>A, B, AB, O</span></p>
                                    <input type='text' class='p-1 form-control form-control-sm' name='tsangre' id='tsangre' value='$linea[9]'>
                                    <p class='fw-bold fs-4 text-black'>Factor de Sangre<span class='text-black fw-bold ms-2' style='font-size:14px;'>RH+, RH-</span></p>
                                    <input type='text' class='p-1 form-control form-control-sm' name='fsangre' id='fsangre' value='$linea[10]'>
                                    <p class='fw-bold fs-4 text-black'>Factor Alérgico</p>
                                    <input type='text' class='p-1 form-control form-control-sm' name='falerg' id='falerg' value='$linea[11]'>
                                    <p class='fw-bold fs-4 text-black'>Factor Congénito</p>
                                    <input type='text' name='fcong' id='fcong' class=' form-control form-control-sm' value='$linea[12]'>
                                    <p class='fw-bold fs-4 text-black'>Factor Motríz</p>
                                    <input type='text' class='p-1 form-control form-control-sm' name='fmot' id='fmot' value='$linea[13]'>
                                    <p class='fw-bold fs-4 text-black'>Estatura</p>
                                    <input type='text' class='p-1 form-control form-control-sm' name='est' id='est' value='$linea[14]'>
                                    <p class='fw-bold fs-4 text-black'>Peso</p>
                                    <input type='text' class='p-1 form-control form-control-sm' name='peso' id='peso' value='$linea[15]'>
                            <button type='submit' class='btn btn-primary mt-5 mb-2 fw-bold'>Actualizar Datos</button>
                            <p id='respuesta'></p>
                        </form>
                        <script src='actpac.js'></script>
            </div>
            </div>";
    //FOOTER--------------------------------------------------------------------------------------
    echo "<div class='pie'>
                <div class='p-3 fs-5 bg-white text-center'>
                    <span>Provectus | Caracas, Av. Urdaneta, Esquina de Candelito a Urapal, Res. Casabera, Nivel Avilanes, Local AS-012, La Candelaria</span>
                </div>
            </div>
        </body>
    </html>";
?>