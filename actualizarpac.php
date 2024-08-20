<?php
    error_reporting(0);
    $ci=$_POST['ci'];
    include_once('conexionbdd.php');
    $obj=new conexion();
    $result=$obj->buscarpac($ci);
    $linea=mysqli_fetch_array($result);
    //HTML-----------------------------------------------------------
    echo "<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8'>
    
            <title>PROVECTUS</title>
            <link href='css/bootstrap.min.css' rel='stylesheet'>
            <link href='empleado.css' rel='stylesheet'>
        </head>";
    if($linea[0]==$ci)
    {
        //BODY---------------------------------------------------------------------------------------
        echo "<body>
        <div class='cabecera'>
            <div class='shadow p-3 mb-1 bg-white text-body'>
                <img class='img1' src='logo.jpeg'>
                <h2 class='pro'>P R O V E C T U S</h2>
                <nav class='menu3'>
                            <ul>
                                <li><a href='login.html' class='fs-5'>Cerrar Sesión</a></li>
                            </ul>
                        </nav>
                <br>
                <h3 class='slg'>Servicio Avanzado Médico</h3>
            </div>
        </div>";
        echo "<div class='mt-5 mb-5'>
        <div class='bg-secondary bg-gradient rounded-5 p-5' style='--bs-bg-opacity: .7;'>
            <p class='fw-bold fs-3 text-white'>Datos del Paciente</p>
            
            <form action='actualizacion.php' method='post' id='formulario'>
                <p class='fw-bold fs-4 text-white'>Correo Electrónico.</p>
                <div class='input'>
                    <input type='email' id='email' name='email' class='p-1 form-control form-control-sm w-25' value='$linea[1]'>
                </div>
                <p class='fw-bold fs-4 text-white'>Cédula de Identidad</p>
                <div class='input'>
                    <input type='text' id='ci' name='ci' class='p-1 form-control form-control-sm w-25' value='$linea[0]'>
                </div>
                <p class='fw-bold fs-4 text-white'>Primer Apellido.</p>
                <div class='input'>
                    <input type='text' id='ape1' name='ape1' class='p-1 form-control form-control-sm w-25' value='$linea[2]'>
                </div>
                <p class='fw-bold fs-4 text-white'>Segundo Apellido.</p>
                <div class='input'>
                    <input type='text' id='ape2' name='ape2' class='p-1 form-control form-control-sm w-25' value='$linea[3]'>
                </div>
                <p class='fw-bold fs-4 text-white'>Primer Nombre.</p>
                <div class='input'>
                    <input type='text' id='nomb1' name='nomb1' class='p-1 form-control form-control-sm w-25' value='$linea[4]'>
                </div>
                <p class='fw-bold fs-4 text-white'>Segundo Nombre.</p>
                <div class='input'>
                    <input type='text' id='nomb2' name='nomb2' class='p-1 form-control form-control-sm w-25' value='$linea[5]'>
                </div>
                <p class='fw-bold fs-4 text-white'>Fecha de Nacimiento.</p>
                <div class='input'>
                    <input type='date' id='fnac' name='fnac' class='p-1 form-control form-control-sm w-25' value='$linea[6]'>
                </div>
                <p class='fw-bold fs-4 text-white'>Numero de teléfono.</p>
                <div class='input'>
                    <input type='text' id='ntel' name='ntel' class='p-1 form-control form-control-sm w-25' value='$linea[7]'>
                </div>
                <p class='fw-bold fs-4 text-white'>Sexo. M(Masculino), F(Femenino), O(Otro)</p>
                <div class='input'>
                    <input type='text' id='sex' name='sex' class='p-1 form-control form-control-sm w-25' value='$linea[8]'>
                </div>
                <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold fs-5'>Actualizar</button>
                <p id='respuesta'></p>
            </form>
            <script src='actualizacion.js'></script>
            
        </div>
        <br>
            <table class='table'>
                <thead>
                <tr>
                    <th scope='col'>Cédula</th>
                    <th scope='col'>Correo</th>
                    <th scope='col'>Apellidos</th>
                    <th scope='col'>Nombres</th>
                    <th scope='col'>Fecha de Nacimiento</th>
                    <th scope='col'>Numero Telefónico</th>
                    <th scope='col'>Sexo</th>
                    <th scope='col' class='text-danger fw-bold'>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>$linea[0]</td>
                    <td>$linea[1]</td>
                    <td>$linea[2] $linea[3]</td>
                    <td>$linea[4] $linea[5]</td>
                    <td>$linea[6]</td>
                    <td>$linea[7]</td>
                    <td>$linea[8]</td>
                    <td><form action='eliminarpac.php' method='post' id='formulario'>
                            <input type='hidden' name='ci' id='ci' value='$ci'>
                            <button type='submit' class='btn btn-danger mb-2 fw-bold' onclick='return confirmacion()'>Eliminar</button>
                            <span id='respuesta'></span>
                        </form>
                        <script>
                            function confirmacion()
                            {
                                var respuesta=confirm('¿Desea realmente eliminar el paciente mostrado?');
                                if(respuesta==true)
                                {
                                    const formulario = document.getElementById('formulario');
                                    const campos=
                                    {
                                        ci:true
                                    }
                                    formulario.addEventListener('submit',
                                    (e)=>
                                        {
                                            e.preventDefault();
                                            if(campos.ci)
                                            {
                                                var datos=new FormData(formulario);
                                                fetch('eliminarpac.php',
                                                {
                                                    method:'POST',
                                                    body:datos
                                                })
                                                .then(res => res.json())
                                                .then(data =>
                                                    {
                                                        console.log(data)
                                                        if(data!='error')
                                                        {
                                                            return true;
                                                        }
                                                    })
                                            }
                                        })
                                }
                                else
                                {
                                    
                                    return false;
                                }
                            }
                        </script>
                        </td>
                </tr>
                </tbody>
                </table>
        </div>";
    }
    else
    {
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
        echo "<div class='mt-5 mb-5'>
        <div class='bg-danger bg-gradient rounded-5 p-5' style='--bs-bg-opacity: .7;'>
            <p class='fw-bold text-center fs-2 text-white'>Paciente no encontrado, por favor regrese e ingrese una cédula válida.</p>
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