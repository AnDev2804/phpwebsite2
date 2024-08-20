<?php
    include_once('conexionbdd.php');
    $obj=new conexion();
    $method=$obj->contratmto();
    while($result=mysqli_fetch_array($method))
    {
        $codigo[]=$result[0];
        $descripcion[]=$result[1];
    }
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
    echo "<div class='backg3'>
                        <div class='container mt-3'>
                            <div class='bg-secondary bg-gradient rounded-5 p-5' style='--bs-bg-opacity: .7;'>
                
                                <p class='fw-bold fs-4 text-white'>Tratamientos Registrados</p>
                                <center><div class='text-secondary bg-black rounded-3 mt-4 mb-4' style='height:2px;'>.</div></center>
                                <table class='table table-dark w-50'>
                                    <thead>
                                        <tr>
                                        <th scope='col'>Codigo</th>
                                        <th scope='col'>Tratamiento</th>
                                        </tr>
                                    </thead>";
                                for($i=0;$i<count($codigo);$i++)
                                {
                                    echo "<tbody>
                                    <tr>
                                      <td>$codigo[$i]</td>
                                      <td>$descripcion[$i]</td>
                                    </tr>";
                                }
                                echo "</tbody></table>";
                                echo "<form action='regtrat2.php' method='post' id='formulario1'>
                                    <p class='fw-bold fs-5 text-white'>Código del Tratamiento.</p>
                                    <div class='input'>
                                        <input type='text' class='p-1 form-control form-control-sm w-25' name='codigo' id='codigo'>
                                    </div>
                                    <p class='fw-bold fs-5 text-white'>Nombre del Tratamiento</p>
                                    <div class='input'>
                                        <input type='text' class='p-1 form-control form-control-sm w-25' name='nombre' id='nombre'>
                                    </div>
                                    <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold'>Registrar</button>
                                    <p id='respuesta1'></p>
                                </form>
                                <script src='regtrat.js'></script>
                            </div>
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