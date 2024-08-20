<?php
    date_default_timezone_set("America/Caracas");
    $dia=date("d");$mes=date("m");$anio=date("Y");
    $fechaactual="$anio-$mes-$dia";
    $ci=$_GET['ci'];
    $codesp=$_GET['codesp'];
    //HTML-----------------------------------------------------------
    echo "<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8'>
    
            <title>PROVECTUS</title>
            <link href='css/bootstrap.min.css' rel='stylesheet'>
            <link href='empleado.css' rel='stylesheet'>
        </head>";
            if($codesp==1)
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
                include_once('conexionbdd.php');
                $obj=new conexion();
                $cantcitas=$obj->cantcitas($codesp);
                $citas=mysqli_fetch_array($cantcitas);
                if($citas)
                {
                    $cont=$citas[0];
                }
                echo "<div class='backg1'>
                        <div class='container row mt-2' style='margin:0 auto;'>
                            <div class='col-6 bg-secondary bg-gradient rounded-5 p-5' style='--bs-bg-opacity: .7;'>
                                <p class='fw-bold fs-2 text-white'>Bienvenid@ Enfermer@.</p>
                                <p class='fw-bold fs-3 text-white'>Usted tiene $cont cita/s pendiente/s por aprobar.</p>
                                <form action='citaspend.php' method='post'>
                                    <div class='input'>
                                        <input type='hidden' value='$codesp' name='codesp' id='codesp'>
                                        <input type='hidden' value='$ci' name='ciesp' id='ciesp'>
                                    </div>
                                    <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold fs-5'>Consultar Citas</button>
                                </form>

                                <center><div class='text-secondary bg-black rounded-3 mt-4 mb-4' style='height:2px;'>.</div></center>
                                <p class='fw-bold fs-3 text-white'>Registro de Pacientes</p>
                                <a class='btn btn-primary p-2 fs-5 fw-bold' href='registropaciente.html'>Registrar</a>
                                <center><div class='text-secondary bg-black rounded-3 mt-4 mb-4' style='height:2px;'>.</div></center>

                                <form action='actualizarpac.php' method='post' id='formulario1'>
                                    <p class='fw-bold fs-4 text-white'>Actualizacion de Datos de Paciente</p>
                                    <p class='fw-bold fs-5 text-white'>Cédula de Identidad del Paciente</p>
                                    <div class='input'>
                                        <input type='text' class='p-1 form-control form-control-sm w-25' name='ci' id='ci'>
                                    </div>
                                    <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold'>Editar</button>
                                    <p id='respuesta1'></p>
                                </form>

                                <center><div class='text-secondary bg-black rounded-3 mt-4 mb-4' style='height:2px;'>.</div></center>

                                <form action='registroemergencia.php' method='post' id='formulario2'>
                                    <p class='fw-bold fs-4 text-white'>Registro de Emergencia</p>
                                    <p class='fw-bold fs-5 text-white'>Descripción del paciente</p>
                                    <div class='input'>
                                        <textarea type='text' class='p-1 form-control form-control-sm w-75' rows='4' name='desc' id='desc' style='resize:none;'></textarea>
                                    </div>
                                    <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold'>Registrar</button>
                                    <p id='respuesta2'></p>
                                    <script src='regemergencia.js'></script>
                                </form>

                                <center><div class='text-secondary bg-black rounded-3 mt-4 mb-4' style='height:2px;'>.</div></center>
                                <form action='constancia.php' method='post' id='formulario3'>
                                    <p class='fw-bold fs-4 text-white'>Emision de Constancia para Paciente</p>
                                    <p class='fw-bold fs-5 text-white'>Cédula de Identidad del Paciente</p>
                                    <div class='input'>
                                        <input type='hidden' value='$codesp' name='codesp' id='codesp'>
                                        <input type='hidden' name='factual' value='$fechaactual'>
                                        <input type='text' class='p-1 form-control form-control-sm w-25' name='ci2' id='ci2'>
                                    </div>
                                    <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold'>Generar</button>
                                    <p id='respuesta3'></p>
                                </form>
                                <script src='enfermero.js'></script>
                                </div>";
                                $obj=new conexion();
                                $res=$obj->conemerg();
                                $linea=mysqli_fetch_array($res);
                                if($linea==null)
                                {
                                    echo "<div class='col-5 bg-secondary bg-gradient rounded-5 p-5 ms-4' style='--bs-bg-opacity: .7;'>
                                    <p class='fw-bold fs-2 text-white'>Emergencias Registradas</p>
                                    <p class='fw-bold fs-3 text-white'>Usted tiene $cont cita/s pendiente/s por aprobar.</p>
                                    <form id='formulario' action='eliminaremergencia.php' method='post'>
                                        <div class='input'>
                                            
                                        </div>
                                        <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold fs-5'>Consultar Citas</button>
                                    </form>
                                    </div>";
                                }
                                else
                                {
                                    echo "<div class='col-5 bg-secondary bg-gradient rounded-5 p-5 ms-4' style='--bs-bg-opacity: .7;'>
                                    <table class='table table-striped'>
                                <thead>
                                <tr>
                                    <th scope='col'>ID de Emergencia</th>
                                    <th scope='col'>Descripción</th>
                                    <th scope='col' class='text-danger fw-bold'>Eliminar</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>";
                                echo "<p class='fw-bold fs-4 text-white'>Siniestros activos<br>(Solo se mostraran 10)</p>
                                <p id='elim'></p>";
                                $obj=new conexion();
                                $res=$obj->conemerg();
                                while($linea=mysqli_fetch_array($res))
                                {
                                    echo"<td>$linea[0]</td>
                                    <td>$linea[1]</td>
                                    <td><form action='delemerg.php' method='post' id='formulario'>
                                            <input type='hidden' name='id' id='id' value='$linea[0]'>
                                            <button type='submit' id='submit' class='btn btn-danger mb-2 fw-bold' onclick='return confirmacion()'>Eliminar</button>
                                            <script>
                                            function confirmacion()
                                            {
                                                var respuesta=confirm('¿Desea realmente eliminar el siniestro seleccionado?');
                                                if(respuesta==true)
                                                {
                                                    const formulario = document.getElementById('formulario');
                                                    var elimr=document.getElementById('elim');
                                                    const campos=
                                                    {
                                                        id:true
                                                    }
                                                    formulario.addEventListener('submit',
                                                    (e)=>
                                                        {
                                                            e.preventDefault();
                                                            if(campos.id)
                                                            {
                                                                var datos=new FormData(formulario);
                                                                fetch('delemerg.php',
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
                                                                            elimr.innerHTML=`
                                                                            <div class='alert alert-success rounded-4 fs-6 fw-bold text-center w-75' role='alert'>
                                                                                Siniestro eliminado correctamente. Actualice la pagina para ver los restantes.
                                                                            </div>`
                                                                            setTimeout(()=>
                                                                            {
                                                                                elimr.innerHTML=``
                                                                            }, 4000);
                                                                            return true
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
                                        </form>
                                        </td>
                                        </tr>";
                                }
                                
                                echo"
                                </tbody>
                                </table>
                                </div>";
                                }
                            
                echo "</div>
            </div>";
            }
            if($codesp==2)
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
                include_once('conexionbdd.php');
                $obj=new conexion();
                $cantcitas=$obj->cantcitas($codesp);
                $citas=mysqli_fetch_array($cantcitas);
                if($citas)
                {
                    $cont=$citas[0];
                }
                echo "<div class='backg2'>
                        <div class='container mt-3'>
                            <div class='bg-secondary bg-gradient rounded-5 p-5' style='--bs-bg-opacity: .7;'>
                                <p class='fw-bold fs-2 text-white' novalidate>Bienvenid@ Doctor/@.</p>
                                <p class='fw-bold fs-3 text-white' novalidate>Usted tiene $cont cita/s pendiente/s por aprobar.</p>
                                <form action='citaspend.php' method='post'>
                                    <div class='input'>
                                        <input type='hidden' value='$codesp' name='codesp' id='codesp'>
                                        <input type='hidden' value='$ci' name='ciesp' id='ciesp'>
                                    </div>
                                    <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold fs-5'>Consultar Citas</button>
                                </form>

                                <center><div class='text-secondary bg-black rounded-3 mt-4 mb-4' style='height:2px;'>.</div></center>
                                
                                <p class='fw-bold fs-4 text-white'>Registro de nuevo Tratamiento.</p>
                                <a class='btn btn-primary p-2 fs-5 fw-bold' href='regtrat.php'>Registrar</a>

                                <center><div class='text-secondary bg-black rounded-3 mt-4 mb-4' style='height:2px;'>.</div></center>

                                <form action='historia.php' method='post' id='formulario1'>
                                    <p class='fw-bold fs-4 text-white'>Historia Médica de paciente</p>
                                    <p class='fw-bold fs-5 text-white'>Cédula de Identidad del Paciente</p>
                                    <div class='input'>
                                        <input type='text' class='p-1 form-control form-control-sm w-25' name='ci' id='ci'>
                                    </div>
                                    <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold'>Consultar</button>
                                    <p id='respuesta1'></p>
                                </form>

                                <center><div class='text-secondary bg-black rounded-3 mt-4 mb-4' style='height:2px;'>.</div></center>
                                <form action='constancia.php' method='post' id='formulario3'>
                                    <p class='fw-bold fs-4 text-white'>Emision de Constancia para Paciente</p>
                                    <p class='fw-bold fs-5 text-white'>Cédula de Identidad del Paciente</p>
                                    <div class='input'>
                                        <input type='hidden' value='$codesp' name='codesp' id='codesp'>
                                        <input type='hidden' name='factual' value='$fechaactual'>
                                        <input type='text' class='p-1 form-control form-control-sm w-25' name='ci2' id='ci2'>
                                    </div>
                                    <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold'>Generar</button>
                                    <p id='respuesta3'></p>
                                </form>
                                <script src='enfermero.js'></script>
                            </div>
                        </div>
                </div>";
            }
            if($codesp==3)
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
                echo "<div class='backg3'>
                        <div class='container mt-3'>
                            <div class='bg-secondary bg-gradient rounded-5 p-5' style='--bs-bg-opacity: .7;'>
                                <p class='fw-bold fs-2 text-white' novalidate>Bienvenid@ Admin.</p>
                
                                <p class='fw-bold fs-4 text-white'>Registro de Personal Médico.</p>
                                <a class='btn btn-primary p-2 fs-5 fw-bold' href='registpers.php'>Registrar</a>

                                <center><div class='text-secondary bg-black rounded-3 mt-4 mb-4' style='height:2px;'>.</div></center>
                                
                                <form action='actualizaremp.php' method='post' id='formulario1'>
                                    <p class='fw-bold fs-4 text-white'>Actualizar datos de Personal Médico</p>
                                    <p class='fw-bold fs-5 text-white'>Cédula de Identidad del Personal</p>
                                    <div class='input'>
                                        <input type='text' class='p-1 form-control form-control-sm w-25' name='ci' id='ci'>
                                    </div>
                                    <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold'>Consultar</button>
                                    <p id='respuesta1'></p>
                                </form>
                                <script src='actualizaremp.js'></script>
                                <center><div class='text-secondary bg-black rounded-3 mt-4 mb-4' style='height:2px;'>.</div></center>
                                <p class='fw-bold fs-4 text-white'>Respaldo de BDD</p>
                                <a class='btn btn-primary p-2 fs-5 fw-bold' href='respaldo.php'>Respaldar</a>
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