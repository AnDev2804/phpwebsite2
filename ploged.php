<?php
    $ci=$_GET['ci'];
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
                            <form action='perfil.php' method='post'>
                            <input type='hidden' name='ci' value=$ci>
                                <li><button id='perfil' type='submit' class='btn btn-white border-0 text-primary fs-5 p-4'>Perfil</button></li>
                            </form>
                            
                        </ul>
                    </nav>
                    <br>
                    <h3 class='slg'>Servicio Avanzado Médico</h3>
                </div>
            </div>

            <div class='bg-secondary-subtle p-5'>
                <div class='container p-5 bg-white rounded-5 w-50 border border-3 border-secondary'>
                    <center><span class='fs-1 p-2'>Agenda tu cita</span><i class='icon-ok' id='check'></i></center>

                    <form action='cita.php' method='post' class='mt-5' id='formulariocita'>
                        <input type='hidden' name='ci' value=$ci>
                        <p class='fw-bold fs-5'>Fecha de la cita.</p>
                        <div class='input'>
                            <input type='date' class='p-1 form-control w-25' name='fcita' id='fcita'>
                        </div>
                        <p class='fw-bold fs-5 mt-4'>Especialidad.</p>
                        <div class='select'>
                            <select name='espec' id='espec' class='form-select w-75'>
                                <option selected disabled>Seleccione la especialidad que requiere.</option>
                                <option value=1>Enfermeria</option>
                                <option value=2>Medicina General</option>
                            </select>
                        </div>
                        <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold'>Registrar</button>
                        <p id='respuesta'></p>
                    </form>
                    <script src='plogin.js'></script>
                </div>
            </div>

            <div class='backg3'>
                <div class='container'>
                <p class='fw-bold fs-2' style='margin:0 auto;'>Compañía de Servicios Avanzados Médicos PROVECTUS</p>
                <p class='fs-3'>Velando por tu salud y bienestar</p>
                    <div class='bg-white rounded-2' style='--bs-bg-opacity:.7;margin:0 auto;'>
                        <div class='p-4 row text-center' style='margin:0 auto;'>
                            <div class='col-4'>
                            <i class='icon-clock'><span class='fs-5 fw-bold ms-3'>Horario 24/7</span></i>
                            </div>
                            <div class='col-3'>
                            <i class='icon-calendar'><span class='fs-5 fw-bold ms-3'>Citas flexibles</span></i>
                            </div>
                            <div class='col-4'>
                            <i class='icon-cc-visa'><span class='fs-5 fw-bold ms-3'>Variedad de métodos de pago</span></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='container'>
                <center><h2 class='text-secondary-emphasis fw-bold mt-5'>Colaboradores</h2><center>
                <center><div class='text-secondary bg-secondary rounded-3 mt-4' style='height:2px;'>.</div></center>
                <div class='row p-5 mt-1'>
                    <div class='col-4'>
                        <img src='fastmed.jpg' class='img-fluid'>
                        <p class='text-secondary text-center fw-bold'>Uno de los mejores proveedores de servicios médicos de calidad.</p>
                        <i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i>
                    </div>
                    <div class='col-4'>
                        <img src='medik.jpg' class='img-fluid'>
                        <p class='text-secondary text-center fw-bold'>El mejor curso de ginecología y primeros auxilios del año.</p>
                        <i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i>
                    </div>
                    <div class='col-4'>
                        <img src='uml.jpg' class='img-fluid'>
                        <p class='text-secondary text-center fw-bold'>Proveedor vital de insumos médicos en general.</p>
                        <i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star-empty'></i>
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