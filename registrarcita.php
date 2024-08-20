<?php
    $codesp=$_POST['codesp'];
    $ciesp=$_POST['ciesp'];
    $datos=explode(";",$_POST['datos']);
    $idcita=(int)$datos[0];
    $ci=$datos[1];
    $fcita=$datos[2];

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
        include_once('conexionbdd.php');
        $obj=new conexion();
        if(isset($_POST['aceptar']))
        {
            
            $aceptar=$obj->aceptarcita($idcita);
            if($aceptar)
            {
                include_once('conexionbdd.php');
                $obj=new conexion();
                $method=$obj->contratmto();
                $cont=0;
                while($result=mysqli_fetch_array($method))
                {
                    $cont++;
                    $descripcion[]=$result[1];
                }
                echo "<div class='backg2'>
                <div class='container mt-3'>
                    <div class='bg-secondary bg-gradient rounded-5 p-5' style='--bs-bg-opacity: .7;'>
                        <p class='fw-bold fs-2 text-white'>Ingrese los datos de la Cita.</p>
                        <form action='regcita.php' method='post' id='formulario'>
                                <input type='hidden' value='$idcita' name='idcita' id='idcita'>
                                <input type='hidden' value='$ci' name='ci' id='ci'>
                                <input type='hidden' value='$fcita' name='fcita' id='fcita'>
                                <input type='hidden' value='$codesp' name='codesp' id='codesp'>
                                <input type='hidden' value='$ciesp' name='ciesp' id='ciesp'>
                                <p class='fw-bold fs-4 text-white'>Observación General.</p>
                                <div class='input'>
                                    <textarea type='text' class='p-1 form-control form-control-sm w-50' rows='4' name='observ' id='observ' style='resize:none;'></textarea>
                                </div>
                                <p class='fw-bold fs-4 text-white'>Diagnóstico.</p>
                                <div class='input'>
                                    <textarea type='text' class='p-1 form-control form-control-sm w-50' rows='2' name='diag' id='diag' style='resize:none;'></textarea>
                                </div>
                                <p class='fw-bold fs-4 text-white'>Tratamiento.</p>
                                <div class='select'>
                                        <select name='trat' id='trat' class='select form-select form-select-sm w-50'>
                                            <option selected disabled value=''>Seleccione el tratamiento.</option>";
                                            for($i=0;$i<$cont;$i++)
                                            {
                                                echo "<option value=$i>$descripcion[$i]</option>";
                                            }
                                            
                                        echo"</select>
                                </div>
                                <p class='fw-bold fs-4 text-white'>¿El paciente requiere nueva cita?</p>
                                <div class='select'>
                                        <select name='ncita' id='ncita' class='select form-select form-select-sm w-50'>
                                            <option selected disabled value=''>Seleccione la opcion.</option>
                                            <option value=1>Si</option>
                                            <option value=0>No</option>
                                        </select>
                                </div>
                                <p class='fw-bold fs-4 text-white'>Si escogió que Sí, ingrese la nueva fecha de la cita, sino, dejar vacio.</p>
                                <input type='date' class='p-1 form-control form-control-sm w-25' name='nfecha' id='nfecha'>
                                <p class='fw-bold fs-4 text-white'>Costo de la cita actual.</p>
                                <div class='input'>
                                    <input class='p-1 form-control form-control-sm w-25' type='number' name='costo' id='costo' step='0.01'>
                                </div>
                            <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold fs-5'>Registrar</button>
                            <p id='respuesta'></p>
                        </form>
                        <script src='regcita.js'></script>
                    </div>
                </div>
            </div>";
            }
        }
        else if(isset($_POST['eliminar']))
        {
            include_once('conexionbdd.php');
            $obj=new conexion();
            $eliminar=$obj->eliminarcita($idcita);
            if($eliminar)
            {
                echo "<div class='backg3'>
                <div class='container mt-3'>
                    <div class='bg-secondary bg-gradient rounded-5 p-5' style='--bs-bg-opacity: .7;'>
                        <center>
                            <p class='fw-bold fs-2 text-white'>Cita eliminada correctamente.</p>
                        </center>
                    </div>
                </div>
            </div>";
            }
        }
    }
    if($codesp==2)
    {
        include_once('conexionbdd.php');
        $obj=new conexion();
        if(isset($_POST['aceptar']))
        {
            
            $aceptar=$obj->aceptarcita($idcita);
            if($aceptar)
            {
                include_once('conexionbdd.php');
                $obj=new conexion();
                $method=$obj->contratmto();
                $cont=0;
                while($result=mysqli_fetch_array($method))
                {
                    $cont++;
                    $descripcion[]=$result[1];
                }
                echo "<div class='backg2'>
                <div class='container mt-3'>
                    <div class='bg-secondary bg-gradient rounded-5 p-5' style='--bs-bg-opacity: .7;'>
                        <p class='fw-bold fs-2 text-white'>Ingrese los datos de la Cita.</p>
                        <form action='regcita.php' method='post' id='formulario'>
                                <input type='hidden' value='$idcita' name='idcita' id='idcita'>
                                <input type='hidden' value='$ci' name='ci' id='ci'>
                                <input type='hidden' value='$fcita' name='fcita' id='fcita'>
                                <input type='hidden' value='$codesp' name='codesp' id='codesp'>
                                <input type='hidden' value='$ciesp' name='ciesp' id='ciesp'>
                                <p class='fw-bold fs-4 text-white'>Observación General.</p>
                                <div class='input'>
                                    <textarea type='text' class='p-1 form-control form-control-sm w-50' rows='4' name='observ' id='observ' style='resize:none;'></textarea>
                                </div>
                                <p class='fw-bold fs-4 text-white'>Diagnóstico.</p>
                                <div class='input'>
                                    <textarea type='text' class='p-1 form-control form-control-sm w-50' rows='2' name='diag' id='diag' style='resize:none;'></textarea>
                                </div>
                                <p class='fw-bold fs-4 text-white'>Tratamiento.</p>
                                <div class='select'>
                                        <select name='trat' id='trat' class='select form-select form-select-sm w-50'>
                                            <option selected disabled value=''>Seleccione el tratamiento.</option>";
                                            for($i=0;$i<$cont;$i++)
                                            {
                                                echo "<option value=$i>$descripcion[$i]</option>";
                                            }
                                        echo "</select>
                                </div>
                                <p class='fw-bold fs-4 text-white'>¿El paciente requiere nueva cita?</p>
                                <div class='select'>
                                        <select name='ncita' id='ncita' class='select form-select form-select-sm w-50'>
                                            <option selected disabled value=''>Seleccione la opcion.</option>
                                            <option value=1>Si</option>
                                            <option value=0>No</option>
                                        </select>
                                </div>
                                <p class='fw-bold fs-4 text-white'>Si escogió que Sí, ingrese la nueva fecha de la cita, sino, dejar vacio.</p>
                                <input type='date' class='p-1 form-control form-control-sm w-25' name='nfecha' id='nfecha'>
                                <p class='fw-bold fs-4 text-white'>Costo de la cita actual.</p>
                                <div class='input'>
                                    <input class='p-1 form-control form-control-sm w-25' type='number' name='costo' id='costo' step='0.01'>
                                </div>
                            <button type='submit' class='btn btn-primary mt-2 mb-3 fw-bold fs-5'>Registrar</button>
                            <p id='respuesta'></p>
                        </form>
                        <script src='regcita.js'></script>
                    </div>
                </div>
            </div>";
            }
        }
        else if(isset($_POST['eliminar']))
        {
            include_once('conexionbdd.php');
            $obj=new conexion();
            $eliminar=$obj->eliminarcita($idcita);
            if($eliminar)
            {
                echo "<div class='backg3'>
                <div class='container mt-3'>
                    <div class='bg-secondary bg-gradient rounded-5 p-5' style='--bs-bg-opacity: .7;'>
                        <center>
                            <p class='fw-bold fs-2 text-white'>Cita eliminada correctamente.</p>
                        </center>
                    </div>
                </div>
            </div>";
            }
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