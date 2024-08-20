<?php
    $ci=$_POST['ci'];
    include_once('conexionbdd.php');
    $obj=new conexion();
    $result=$obj->buscarcitas($ci);
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
    $null=mysqli_fetch_array($result);
    if($null==null)
    {

    }
    else
    {
        echo "<table class='table'>
            <thead>
            <tr>
                <th scope='col'>Cédula del Paciente</th>
                <th scope='col'>Fecha de Cita</th>
                <th scope='col'>Especialidad</th>
                <th scope='col'>Cédula de Especialista</th>
                <th scope='col'>Observaciones</th>
                <th scope='col'>Diagnóstico(s)</th>
                <th scope='col'>Tratamiento</th>
                <th scope='col'>Requiere Nueva Cita</th>
                <th scope='col'>Costo</th>
            </tr>
            </thead>";
        $obj=new conexion();
        $result=$obj->buscarcitas($ci);
        while($lineas=mysqli_fetch_array($result))
        {
            echo "
            <tbody>
            <tr>
                <td>$lineas[0]</td>
                <td>$lineas[1]</td>
                <td>$lineas[2]</td>
                <td>$lineas[3]</td>
                <td>$lineas[4]</td>
                <td>$lineas[5]</td>
                <td>$lineas[6]</td>";
                if($lineas[7]==0)
                {
                    $lineas[7]='No';
                }
                else
                {
                    $lineas[7]='Si';
                }
            echo "<td>$lineas[7]</td>
                <td>$lineas[8]</td>
            </tr>";
        }
        echo "</tbody>
        </table>";
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