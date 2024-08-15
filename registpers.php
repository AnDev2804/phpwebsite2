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

    echo "<div class='backg4'>
        <form action='regemp.php' method='post' id='regform' class='bg-white rounded-5 p-5 ' style='--bs-bg-opacity: .7;'>
            <div class='row'>
                <div class='col-3'>
                    <p class='fw-bold fs-4 text-black'>Correo Electrónico<span class='text-danger'>*</span></p>
                    <input type='email' class='p-1 form-control form-control-sm' name='empcorreo' id='empcorreo' placeholder='ejemplo123@gmail.com'>
                    <p class='fw-bold fs-4 text-black'>Contraseña<span class='text-danger'>*</span></p>
                    <input type='password' class='p-1 form-control form-control-sm' name='emppass' id='emppass' placeholder='Ejemplo*123'>
                    <p class='text-black' id='mensaje' style='font-size: 12px;'>La contraseña debe incluir al menos un caracter especial, número, una letra mayúscula, minúscula y de 8 a 15 caracteres. No use emoticones.</p>
                    <p class='fw-bold fs-4 text-black'>Cédula de Identidad<span class='text-danger'>*</span></p>
                    <input type='text' class='p-1 form-control form-control-sm' name='empci' id='empci'>
                </div>

                <div class='col-3'>
                    <p class='fw-bold fs-4 text-black'>Primer Apellido<span class='text-danger'>*</span></p>
                    <input type='text' class='p-1 form-control form-control-sm' name='empAp1' id='empAp1'>
                    <p class='fw-bold fs-4 text-black'>Primer Nombre<span class='text-danger'>*</span></p>
                    <input type='text' class='p-1 form-control form-control-sm' name='empNo1' id='empNo1'>
                    <p class='fw-bold fs-4 text-black'>Segundo Apellido</p>
                    <input type='text' class='p-1 form-control form-control-sm' name='empAp2' id='empAp2'>
                    <p class='fw-bold fs-4 text-black'>Segundo Nombre</p>
                    <input type='text' class='p-1 form-control form-control-sm' name='empNo2' id='empNo2'>
                </div>

                <div class='col-2'>
                    <p class='fw-bold fs-4 text-black'>Especialidad<span class='text-danger'>*</span></p>
                    <select name='esp' id='esp' class='select form-select form-select-sm'>
                        <option selected disabled value=''>Seleccione la opcion.</option>
                        <option value=1>Enfermero/a/e</option>
                        <option value=2>Doctor/a/e</option>
                    </select>
                    <p class='fw-bold fs-4 text-black'>Inicio de Contrato<span class='text-danger'>*</span></p>
                    <input type='date' class='p-1 form-control form-control-sm' name='Fini' id='Fini'>
                    <p class='fw-bold fs-4 text-black'>Fin de Contrato<span class='text-danger'>*</span></p>
                    <input type='date' class='p-1 form-control form-control-sm' name='Ffin' id='Ffin'>
                    <p class='fw-bold fs-4 text-black'>Días de actividad<span class='text-danger'>*</span></p>
                    <textarea type='text' class='p-1 form-control form-control-sm' rows='2' name='dact' id='dact' placeholder='Lunes, Martes, etc.' style='resize:none;'></textarea>
                </div>

                <div class='col-3'>
                    <p class='fw-bold fs-4 text-black'>Número de Referencia del Título<span class='text-danger'>*</span></p>
                    <input type='text' class='p-1 form-control form-control-sm' name='titref' id='titref'>
                    <p class='fw-bold fs-4 text-black'>Sexo<span class='text-danger'>*</span></p>
                    <select name='sex' id='sex' class='select form-select form-select-sm'>
                        <option selected disabled value=''>Seleccione la opcion.</option>
                        <option value='M'>Masculino</option>
                        <option value='F'>Femenino</option>
                        <option value='O'>Otro</option>
                    </select>
                    <p class='fw-bold fs-4 text-black'>Número Telefónico<span class='text-danger'>*</span></p>
                    <input type='text' class='p-1 form-control form-control-sm' name='ntel' id='ntel' placeholder='4248976589'>
                </div>
            </div>
            <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold'>Registrar</button>
            <button type='reset' class='btn btn-danger mt-2 mb-3 fw-bold ms-4'>Limpiar</button>
            <p id='respuesta'></p>
        </form>
        <script src='regemp.js'></script>
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