<?php
    //HTML-----------------------------------------------------------
    echo "<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8'>

            <title>PROVECTUS</title>
            <link href='css/bootstrap.min.css' rel='stylesheet'>
            <link href='empleado.css' rel='stylesheet'>
        </head>";
    $ci=$_POST['ci'];
    include_once('conexionbdd.php');
    $obj=new conexion('localhost','root','','provectus');
    $res=$obj->buscaremp($ci);
    $linea=mysqli_fetch_array($res);
    if($linea==null)
    {
        $linea[0]=0;
    }
    if($ci==$linea[0])
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
        echo "<div class='backg5'>
                <form action='actemp.php' method='post' id='regform' class='bg-white rounded-5 p-5 ' style='--bs-bg-opacity: .7;'>
                <div class='row'>
                    <div class='col-3'>
                        <p class='fw-bold fs-4 text-black'>Correo Electrónico</p>
                        <input type='email' class='p-1 form-control form-control-sm' name='empcorreo' id='empcorreo' value='$linea[1]'>
                        <p class='fw-bold fs-4 text-black'>Contraseña</p>
                        <input type='text' class='p-1 form-control form-control-sm' name='emppass' id='emppass' value='$linea[2]'>
                        <p class='text-black' id='mensaje' style='font-size: 12px;'>La contraseña debe incluir al menos un caracter especial, número, una letra mayúscula, minúscula y de 8 a 15 caracteres. No use emoticones.</p>
                        <p class='fw-bold fs-4 text-black'>Cédula de Identidad</p>
                        <input type='text' class='p-1 form-control form-control-sm' name='empci' id='empci' value='$linea[0]'>
                        <p class='fw-bold fs-4 text-black'>Primer Apellido</p>
                        <input type='text' class='p-1 form-control form-control-sm' name='empAp1' id='empAp1' value='$linea[3]'>
                        <p class='fw-bold fs-4 text-black'>Primer Nombre</p>
                        <input type='text' class='p-1 form-control form-control-sm' name='empNo1' id='empNo1' value='$linea[5]'>
                        <p class='fw-bold fs-4 text-black'>Segundo Apellido</p>
                        <input type='text' class='p-1 form-control form-control-sm' name='empAp2' id='empAp2' value='$linea[4]'>
                        <p class='fw-bold fs-4 text-black'>Segundo Nombre</p>
                        <input type='text' class='p-1 form-control form-control-sm' name='empNo2' id='empNo2' value='$linea[6]'>
                    </div>

                    <div class='col-3'>
                        <p class='fw-bold fs-4 text-black'>Especialidad<span class='text-black fw-bold ms-2' style='font-size:14px;'>Enfermero/a/e, Doctor/a/e, Admin</span></p>
                        <input type='text' name='esp' id='esp' class='p-1 form-control form-control-sm' value='$linea[7]'>
                        <p class='fw-bold fs-4 text-black'>Inicio de Contrato</p>
                        <input type='date' class='p-1 form-control form-control-sm' name='Fini' id='Fini' value='$linea[8]'>
                        <p class='fw-bold fs-4 text-black'>Fin de Contrato</p>
                        <input type='date' class='p-1 form-control form-control-sm' name='Ffin' id='Ffin' value='$linea[9]'>
                        <p class='fw-bold fs-4 text-black'>Días de actividad</p>
                        <input type='text' class='p-1 form-control form-control-sm' name='dact' id='dact' value='$linea[10]'>
                        <p class='fw-bold fs-4 text-black'>Número de Referencia del Título</p>
                        <input type='text' class='p-1 form-control form-control-sm' name='titref' id='titref' value='$linea[11]'>
                        <p class='fw-bold fs-4 text-black'>Sexo<span class='text-black fw-bold ms-2' style='font-size:14px;'>M(Masculino), F(Femenino), O(Otro)</span></p>
                        <input type='text' name='sex' id='sex' class=' form-control form-control-sm' value='$linea[12]'>
                        <p class='fw-bold fs-4 text-black'>Número Telefónico</p>
                        <input type='text' class='p-1 form-control form-control-sm' name='ntel' id='ntel' value='$linea[13]'>
                    </div>
                </div>
                <button type='submit' class='btn btn-primary mt-5 mb-2 fw-bold'>Actualizar</button>
                <button type='reset' class='btn btn-danger mt-5 mb-2 fw-bold ms-4'>Limpiar</button>
                <p id='respuesta'></p>
            </form>
            <script src='updateemp.js'></script>
            <br>
            <table class='table'>
                <thead>
                <tr>
                    <th scope='col'>Cédula</th>
                    <th scope='col'>Correo</th>
                    <th scope='col'>Clave</th>
                    <th scope='col'>Apellidos</th>
                    <th scope='col'>Nombres</th>
                    <th scope='col'>Especialidad</th>
                    <th scope='col'>Fecha de Inicio</th>
                    <th scope='col'>Fecha de Fin</th>
                    <th scope='col'>Días Activos</th>
                    <th scope='col'>Sexo</th>
                    <th scope='col'>Número Telefónico</th>
                    <th scope='col' class='text-danger fw-bold'>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>$linea[0]</td>
                    <td>$linea[1]</td>
                    <td>$linea[2]</td>
                    <td>$linea[3] $linea[4]</td>
                    <td>$linea[5] $linea[6]</td>
                    <td>$linea[7]</td>
                    <td>$linea[8]</td>
                    <td>$linea[9]</td>
                    <td>$linea[10]</td>
                    <td>$linea[12]</td>
                    <td>$linea[13]</td>
                    <td><form action='eliminaremp.php' method='post' id='formulario'>
                            <input type='hidden' name='ci' id='ci' value='$ci'>
                            <button type='submit' class='btn btn-danger mb-2 fw-bold' onclick='return confirmacion()'>Eliminar</button>
                        </form>
                        <script>
                            function confirmacion()
                            {
                                var respuesta=confirm('¿Desea realmente eliminar el Personal mostrado?');
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
                                                fetch('eliminaremp.php',
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
            <div class='shadow p-3 mb-1 bg-white text-body' >
                <img class='img1' src='logo.jpeg'>
                <h2 class='pro'>P R O V E C T U S</h2>
                <br>
                <h3 class='slg'>Servicio Avanzado Médico</h3>
            </div>
        </div>";
        echo "<div class='backg5'>
                <div class='bg-white rounded-5 p-5' style='--bs-bg-opacity: .7;'>
                    <p class='fs-1 text-center'>Empleado no encontrado, por favor regrese e ingrese una cédula existente</p>
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