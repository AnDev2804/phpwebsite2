<?php
    $codesp=$_POST['codesp'];
    $ciesp=$_POST['ciesp'];
    //HTML-----------------------------------------------------------
    echo "<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8'>
    
            <title>PROVECTUS</title>
            <link href='css/bootstrap.min.css' rel='stylesheet'>
            <link href='empleado.css' rel='stylesheet'>
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
            if($codesp==1)
            {
                echo "<div class='mt-5 mb-5'>
                            <div class='bg-secondary bg-gradient rounded-5 p-5' style='--bs-bg-opacity: .7;'>
                                <p class='fw-bold fs-3 text-white'>Citas Pendientes</p>";
                include_once('conexionbdd.php');
                $obj=new conexion('localhost','root','','provectus');
                $citas=$obj->citaspend($codesp);
                $null=mysqli_fetch_array($citas);
                if($null==null)
                {
                    echo "<p class='fw-bold fs-4 text-white'>Actualmente no tiene ninguna cita. Para ver si hay nuevas citas en la lista actualice la página.</p>";
                }
                else
                {
                    $obj=new conexion('localhost','root','','provectus');
                    $citas=$obj->citaspend($codesp);
                    while($info=mysqli_fetch_array($citas))
                    {
                        $idcita[]=$info[0];
                        $ci[]=$info[1];
                        $fcita[]=$info[2];
                        $descesp[]=$info[3];
                        $apepac1[]=$info[4];
                        $nombpac1[]=$info[5];
                        $emailpac[]=$info[6];
                        $telpac[]=$info[7];
                        $sex[]=$info[8];
                    }
                    for($i=0;$i<count($idcita);$i++)
                    {
                        echo "<form action='registrarcita.php' method='post'>
                                <span class='fw-bold fs-5 text-white'>$idcita[$i];$ci[$i];$fcita[$i];$descesp[$i];$apepac1[$i];$nombpac1[$i];$emailpac[$i];$telpac[$i];$sex[$i]</span>
                                <input type='hidden' name='codesp' value='$codesp'>
                                <input type='hidden' name='ciesp' value='$ciesp'>
                                <input type='hidden' name='datos' value='$idcita[$i];$ci[$i];$fcita[$i];$descesp[$i];$apepac1[$i];$nombpac1[$i];$emailpac[$i];$telpac[$i];$sex[$i]'>
                                <span><button type='submit' name='aceptar' class='btn btn-primary mt-2 mb-3 fw-bold fs-5'>Aceptar</button><span><button type='submit' name='eliminar' class='btn btn-danger mt-2 mb-3 fw-bold fs-5' onclick='return confirmacion()'>Eliminar</button></span></span>
                                <script>
                                function confirmacion()
                                {
                                    var respuesta=confirm('¿Desea realmente eliminar la cita seleccionada?');
                                    if(respuesta==true)
                                    {
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                                }
                            </script>
                            </form>";
                            
                    }
                    
                }
                echo "  </div>
                        </div>";
            }
            if($codesp==2)
            {
                echo "<div class='mt-5 mb-5'>
                            <div class='bg-secondary bg-gradient rounded-5 p-5' style='--bs-bg-opacity: .7;'>
                                <p class='fw-bold fs-3 text-white'>Citas Pendientes</p>";
                include_once('conexionbdd.php');
                $obj=new conexion('localhost','root','','provectus');
                $citas=$obj->citaspend($codesp);
                $null=mysqli_fetch_array($citas);
                if($null==null)
                {
                    echo "<p class='fw-bold fs-4 text-white'>Actualmente no tiene ninguna cita. Para actualizar la lista actualice la página.</p>";
                }
                else
                {
                    $obj=new conexion('localhost','root','','provectus');
                    $citas=$obj->citaspend($codesp);
                    while($info=mysqli_fetch_array($citas))
                    {
                        $idcita[]=$info[0];
                        $ci[]=$info[1];
                        $fcita[]=$info[2];
                        $descesp[]=$info[3];
                        $apepac1[]=$info[4];
                        $nombpac1[]=$info[5];
                        $emailpac[]=$info[6];
                        $telpac[]=$info[7];
                        $sex[]=$info[8];
                    }
                    for($i=0;$i<count($idcita);$i++)
                    {
                        echo "<form action='registrarcita.php' method='post'>
                                <span class='fw-bold fs-5 text-white'>$idcita[$i];$ci[$i];$fcita[$i];$descesp[$i];$apepac1[$i];$nombpac1[$i];$emailpac[$i];$telpac[$i];$sex[$i]</span>
                                <input type='hidden' name='codesp' value='$codesp'>
                                <input type='hidden' name='ciesp' value='$ciesp'>
                                <input type='hidden' name='datos' value='$idcita[$i];$ci[$i];$fcita[$i];$descesp[$i];$apepac1[$i];$nombpac1[$i];$emailpac[$i];$telpac[$i];$sex[$i]'>
                                <span><button type='submit' name='aceptar' class='btn btn-primary mt-2 mb-3 fw-bold fs-5'>Aceptar</button><span><button type='submit' name='eliminar' class='btn btn-danger mt-2 mb-3 fw-bold fs-5' onclick='return confirmacion()'>Eliminar</button></span></span>
                                <script>
                            function confirmacion()
                            {
                                var respuesta=confirm('¿Desea realmente eliminar la cita seleccionada?');
                                if(respuesta==true)
                                {
                                    return true;
                                }
                                else
                                {
                                    return false;
                                }
                            }
                        </script>
                            </form>";
                    }
                }
                
                echo "  </div>
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