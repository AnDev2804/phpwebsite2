<?php
    if(isset($_POST['respaldo']))
    {
        // Datos de conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "provectus";

        // Nombre de archivo de respaldo
        $backup_file = 'respaldo_' . $database . '_' . date("Y-m-d-H-i-s") . '.sql';
        // Comando para crear la copia de seguridad
        $command = 'C:\xampp\mysql\bin\mysqldump -u root provectus > ' . "C:/Users/Usuario/Desktop/$backup_file";
        /*EN CASO DE NO QUERER GUARDARLA EN EL ESCRITORIO SINO EN LA CARPETA RAIZ EN DONDE SE EJECUTA EL SCRIPT
        $command = 'C:\xampp\mysql\bin\mysqldump -u root provectus > ' . "$backup_file";
        if(file_exists($backup_file)){}*/
        exec($command, $output, $return_var);
        // Verificar si la copia de seguridad se completó con éxito
        if (file_exists("C:/Users/Usuario/Desktop/$backup_file")) {
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
            </div>
            <div class='container p-5'>
                <form action='respaldo.php' method='post' id='regform' class='bg-secondary rounded-5 p-5 ' style='--bs-bg-opacity: .7;'>
                <div class='row'>
                    <div class='col-auto'>
                        <p class='fw-bold fs-4 text-black'>RESPALDO DE BDD</p>
                    </div>
                </div>
                <button type='submit' name='respaldo' class='btn btn-primary mt-5 mb-2 fw-bold'>Respaldar</button>
                
            </form>
            <p class='fw-bold fs-4 text-success text-center'>Copia de seguridad creada correctamente en el archivo: <br>" . $backup_file . "</p><br>
            <p class='fw-bold fs-4 text-primary text-center'>Por favor, revise el escritorio. <br></p>
            </div>";
            echo "<div class='pie'>
                <div class='p-3 fs-5 bg-white text-center'>
                    <span>Provectus | Caracas, Av. Urdaneta, Esquina de Candelito a Urapal, Res. Casabera, Nivel Avilanes, Local AS-012, La Candelaria</span>
                </div>
            </div>
        </body>
    </html>";
        } else {
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
            </div>
            <div class='container p-5'>
                <form action='respaldo.php' method='post' id='regform' class='bg-secondary rounded-5 p-5 ' style='--bs-bg-opacity: .7;'>
                <div class='row'>
                    <div class='col-auto'>
                        <p class='fw-bold fs-4 text-black'>RESPALDO DE BDD</p>
                    </div>
                </div>
                <button type='submit' name='respaldo' class='btn btn-primary mt-5 mb-2 fw-bold'>Respaldar</button>
                
            </form>
            <p class='fw-bold fs-4 text-danger text-center'>Error al crear el archivo.</p>
            </div>";
            echo "<div class='pie'>
                <div class='p-3 fs-5 bg-white text-center'>
                    <span>Provectus | Caracas, Av. Urdaneta, Esquina de Candelito a Urapal, Res. Casabera, Nivel Avilanes, Local AS-012, La Candelaria</span>
                </div>
            </div>
        </body>
    </html>";
        }
    }
    else
    {
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
</div>
<div class='container p-5'>
    <form action='respaldo.php' method='post' id='regform' class='bg-secondary rounded-5 p-5 ' style='--bs-bg-opacity: .7;'>
    <div class='row'>
        <div class='col-auto'>
            <p class='fw-bold fs-4 text-black'>RESPALDO DE BDD</p>
        </div>
    </div>
    <button type='submit' name='respaldo' class='btn btn-primary mt-5 mb-2 fw-bold'>Respaldar</button>
    
</form>";
echo "<div class='pie'>
    <div class='p-3 fs-5 bg-white text-center'>
        <span>Provectus | Caracas, Av. Urdaneta, Esquina de Candelito a Urapal, Res. Casabera, Nivel Avilanes, Local AS-012, La Candelaria</span>
    </div>
</div>
</body>
</html>";
    }
    
    
    
    
?>

