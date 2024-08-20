<?php
    //HTML-----------------------------------------------------------
    echo "<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8'>
    
            <title>PROVECTUS</title>
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
    include_once('conexionbdd.php');
    $obj=new conexion();
    $email=$_POST['email'];
    $password=$_POST['password'];
    $login=$obj->validaringresopaciente($email,$password);
    $linea=mysqli_fetch_array($login);
    if($linea==NULL)
    {
        $obj=new conexion();
        $login=$obj->validaringresoempleado($email,$password);
        $linea=mysqli_fetch_array($login);
        if($linea==NULL)
        {
            echo "<div class='backgerr'>
            <div class='w-50 border border-3 bg-danger rounded-5 p-3' style='margin:2% auto;'>
                <p class='fs-2 text-white fw-bold text-center'>Correo o Contraseña incorrectos.</p>
            </div>
            <div class='border border-3 bg-danger rounded-5 p-3' style='margin:2% auto;width:10%;'>
                <center><a class='fs-4 text-white fw-bold text-center' href='login.html' style='text-decoration:none;'>Volver</a></center>
            </div>
            </div>";
        }
        else
        {
            $ci=$linea[2];
            $codesp=$linea[3];
            header("Location:empleado.php?ci=".urlencode($ci)."&codesp=".urlencode($codesp));
        }
    }
    else
    {
        $ci = $linea[2];
        $obj=new conexion();
        $estado=$obj->estado($ci);
        $estado=mysqli_fetch_array($estado);
        if($estado[0]==1)
        {
            echo "<div class='backg1'>
            <div class='container bg-white rounded-5 p-3'>
                <p class='fw-bold fs-6'>Para completar su registro debe proporcionar los siguientes datos:</p>
                    <form action='regperfilpac.php' id='formulario' method='post' class='needs-validation' novalidate>
                        <div class='row justify-content-start'>

                            <div class='col-4'>
                            <input type='hidden' name='ci' value=$ci>
                                <div class='text-black form-label fs-6 fw-bold'>
                                    <label class=''>Tipo de Sangre</label><span class='text-danger'>*</span>
                                    <div class='select'>
                                        <select name='tsangre' id='tsangre' class='select form-select form-select-sm' required>
                                            <option selected disabled value=''>Seleccione su tipo de sangre.</option>
                                            <option value='A'>A</option>
                                            <option value='B'>B</option>
                                            <option value='AB'>AB</option>
                                            <option value='O'>O</option>
                                        </select>
                                    </div>
                                </div>

                                <div class='text-black form-label fs-6 fw-bold'>
                                    <label class=''>Factor de Sangre</label><span class='text-danger'>*</span>
                                    <div class='select'>
                                        <select name='fsangre' id='fsangre' class='select form-select form-select-sm' required>
                                            <option selected disabled value=''>Seleccione su factor sanguíneo.</option>
                                            <option value='RH+'>RH+</option>
                                            <option value='RH-'>RH-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='col-3'>
                                    <div class='text-black form-label fs-6 fw-bold'>
                                        <label class=''>Estatura</label><span class='text-danger'>*</span>
                                        <div class='input'>
                                            <input type='number' class='p-1 form-control form-control-sm' name='est' id='est' step='0.01' required placeholder='Ej: 1.82'>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-3'>
                                    <div class='text-black form-label fs-6 fw-bold'>
                                        <label class=''>Peso</label><span class='text-danger'>*</span>
                                        <div class='input'>
                                            <input type='number' class='p-1 form-control form-control-sm' name='pes' id='pes' step='0.1' required placeholder='Ej: 78.2'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-5'>
                                <div class='text-black form-label fs-6 fw-bold'>
                                    <label class=''>Factor Alérgico</label><span class='text-secondary p-2'>Dejar vacío si no posee.</span>
                                    <div class='input'>
                                        <input type='text' class='p-1 form-control form-control-sm' name='faler' id='faler' placeholder='Látex, maní, moho, etc.'>
                                    </div>
                                </div>

                                <div class='text-black form-label fs-6 fw-bold'>
                                    <label class=''>Factor Congénito</label><span class='text-secondary p-2'>Dejar vacío si no posee.</span>
                                    <div class='input'>
                                        <input type='text' class='p-1 form-control form-control-sm' name='fcong' id='fcong' placeholder='Síndrome de Down, Anomalía Cardíaca, Rasgos de comportamiento, etc.'>
                                    </div>
                                </div>

                                <div class='text-black form-label fs-6 fw-bold'>
                                    <label class=''>Factor Motríz</label><span class='text-secondary p-2'>Dejar vacío si no posee.</span>
                                    <div class='input'>
                                        <input type='text' class='p-1 form-control form-control-sm' name='fmot' id='fmot' placeholder='Postura, cognición motora, coordinación, etc.'>
                                    </div>
                                </div>
                            </div>

                            <div class='form-text'>
                                <button type='submit' class='btn btn-primary mt-3'>Completar</button>
                                <button type='reset' class='btn btn-danger mt-3' style='margin-left: 10px;'>Limpiar</button>
                            </div>
                        </div>
                    </form>
                    <script>
                    (() => {
                        'use strict'
                      
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        const forms = document.querySelectorAll('.needs-validation')
                      
                        // Loop over them and prevent submission
                        Array.from(forms).forEach(form => {
                          form.addEventListener('submit', event => {
                            if (!form.checkValidity()) {
                              event.preventDefault()
                              event.stopPropagation()
                            }
                      
                            form.classList.add('was-validated')
                          }, false)
                        })
                      })()
                    </script>
            </div>
        </div>";
        }
        else
        {
            header("Location:ploged.php?ci=".urlencode($ci));
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
?>