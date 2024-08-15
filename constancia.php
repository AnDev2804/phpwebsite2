<?php
    date_default_timezone_set("America/Caracas");
    $ci=$_POST['ci2'];
    $fechaactual=$_POST['factual'];
    include_once('conexionbdd.php');
    $codesp=$_POST['codesp'];
    $obj=new conexion('localhost','root','','provectus');
    $res=$obj->constancia($fechaactual,$codesp,$ci);
    $null=mysqli_fetch_array($res);
    if($null==null)
    {
        $obj=new conexion('localhost','root','','provectus');
        $res=$obj->constancia2($codesp,$ci);
        $null=mysqli_fetch_array($res);
        if($null==null)
        {
            $errorlevel=error_reporting(0);
            //HTML-----------------------------------------------------------
            echo "<!DOCTYPE html>
            <html>
                <head>
                    <meta charset='utf-8'>
            
                    <title>PROVECTUS</title>
                    <link href='css/bootstrap.min.css' rel='stylesheet'>
                    <link href='empleado.css' rel='stylesheet'>
                </head>";
            echo "<body>
            <div class='cabecera'>
                <div class='shadow p-3 mb-1 bg-white text-body'>
                    <img class='img1' src='logo.jpeg'>
                    <h2 class='pro'>P R O V E C T U S</h2>
                    <br>
                    <h3 class='slg'>Servicio Avanzado Médico</h3>
                </div>
            </div>";
            echo "<div class='backgerr'>
            <div class='w-50 border border-3 bg-danger rounded-5 p-3' style='margin:2% auto;'>
                <p class='fs-2 text-white fw-bold text-center'>ERROR<br>Cédula de Identidad no encontrada.<br>Por favor regrese e ingrese una cédula válida.</p>
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
        }
        $obj=new conexion('localhost','root','','provectus');
        $res=$obj->constancia2($codesp,$ci);
        while($linea=mysqli_fetch_array($res))
        {
            $apepac1=$linea[0];
            $nombpac1=$linea[1];
            $descesp=$linea[2];
        }
        $dia=date("d");$mes=date("m");$anio=date("Y");
        switch($mes)
        {
            case "01":
                $mes="Enero";
            break;
            case "02":
                $mes="Febrero";
            break;
            case "03":
                $mes="Marzo";
            break;
            case "04":
                $mes="Abril";
            break;
            case "05":
                $mes="Mayo";
            break;
            case "06":
                $mes="Junio";
            break;
            case "07":
                $mes="Julio";
            break;
            case "08":
                $mes="Agosto";
            break;
            case "09":
                $mes="Septiembre";
            break;
            case "10":
                $mes="Octubre";
            break;
            case "11":
                $mes="Noviembre";
            break;
            case "12":
                $mes="Diciembre";
            break;
        }
        require('fpdf/fpdf.php');
        class PDF extends FPDF
        {
            function Header()
            {
                $this->AddLink();
                $this->Image('logo.jpeg',0,0,50,50);
                $this->Cell(0,5,"",'',0,'C');
                $this->Ln(15);
            }
        }
        $pdf=new PDF();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);
        $pdf->Cell(0,5,utf8_decode("El servicio médico avanzado PROVECTUS emite la constancia del paciente:"),'',1,'C');
        $pdf->Ln(15);
        $pdf->Cell(0,5,utf8_decode("$apepac1 $nombpac1"),'',1,'C');
        $pdf->Ln(10);
        $pdf->Cell(0,5,utf8_decode("Portador de la Cédula de Identidad: $ci."),'',1,'C');
        $pdf->Ln(10);
        $pdf->Cell(0,5,utf8_decode("Acudiendo a la instalación de PROVECTUS ubicada en el Distrito Capital, Av. Urdaneta,"),'',1,'C');
        $pdf->Cell(0,5,utf8_decode("Esquina de Candelito a Urapal,Res. Casabera, Nivel Avilanes, Local AS-012."),'',1,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,5,utf8_decode("Asistiendo el día de hoy: $dia de $mes del año $anio."),'',1,'C');
        $pdf->Cell(0,5,utf8_decode("Para la especialidad de: $descesp."),'',1,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,5,utf8_decode("Por lo cual se le fue dado su debido diagnóstico y tratamiento."),'',1,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,5,utf8_decode("Por ley nos hacemos cargo de hacerle llegar ésta constancia a través de la entrega personal de ésta al paciente."),'',1,'C');
        $pdf->Ln(5);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(0,5,utf8_decode("Atentamente"),'',1,'C');
        $pdf->Cell(0,5,utf8_decode("El equipo administrativo de PROVECTUS."),'',1,'C');
        $pdf->Ln(30);
        $pdf->Cell(0,5,utf8_decode("________________________       ________________________"),'',1,'C');
        $pdf->Cell(0,5,utf8_decode("      Firma del Paciente.                Firma del Enfermero/Dr."),'',1,'C');
        $pdf->Ln(50);
        $pdf->Cell(0,5,utf8_decode("_____________________________"),'',1,'C');
        $pdf->Cell(0,5,utf8_decode("      Sello de la compañía."),'',1,'C');
        $pdf->Ln(30);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(0,5,utf8_decode("Ante cualquier inconveniente llamar al (0212)-572.0566."),'',1,'C');
        $pdf->Output();
    }
    else
    {
        $obj=new conexion('localhost','root','','provectus');
        $res=$obj->constancia($fechaactual,$codesp,$ci);
        while($linea=mysqli_fetch_array($res))
        {
            $apepac1=$linea[0];
            $nombpac1=$linea[1];
            $descesp=$linea[3];
        }
        $dia=date("d");$mes=date("m");$anio=date("Y");
        switch($mes)
        {
            case "01":
                $mes="Enero";
            break;
            case "02":
                $mes="Febrero";
            break;
            case "03":
                $mes="Marzo";
            break;
            case "04":
                $mes="Abril";
            break;
            case "05":
                $mes="Mayo";
            break;
            case "06":
                $mes="Junio";
            break;
            case "07":
                $mes="Julio";
            break;
            case "08":
                $mes="Agosto";
            break;
            case "09":
                $mes="Septiembre";
            break;
            case "10":
                $mes="Octubre";
            break;
            case "11":
                $mes="Noviembre";
            break;
            case "12":
                $mes="Diciembre";
            break;
        }
        
        require('fpdf/fpdf.php');
        class PDF extends FPDF
        {
            function Header()
            {
                $this->AddLink();
                $this->Image('logo.jpeg',0,0,50,50);
                $this->Cell(0,5,"",'',0,'C');
                $this->Ln(15);
            }
        }
        $pdf=new PDF();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);
        $pdf->Cell(0,5,utf8_decode("El servicio médico avanzado PROVECTUS emite la constancia del paciente:"),'',1,'C');
        $pdf->Ln(15);
        $pdf->Cell(0,5,utf8_decode("$apepac1 $nombpac1"),'',1,'C');
        $pdf->Ln(10);
        $pdf->Cell(0,5,utf8_decode("Portador de la Cédula de Identidad: $ci."),'',1,'C');
        $pdf->Ln(10);
        $pdf->Cell(0,5,utf8_decode("Acudiendo a la instalación de PROVECTUS ubicada en el Distrito Capital, Av. Urdaneta,"),'',1,'C');
        $pdf->Cell(0,5,utf8_decode("Esquina de Candelito a Urapal,Res. Casabera, Nivel Avilanes, Local AS-012."),'',1,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,5,utf8_decode("Para la cita según la fecha estimada para el día de hoy: $dia de $mes del año $anio."),'',1,'C');
        $pdf->Cell(0,5,utf8_decode("En la especialidad de: $descesp."),'',1,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,5,utf8_decode("Por lo cual se le fue dado su debido diagnóstico y tratamiento."),'',1,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,5,utf8_decode("Por ley nos hacemos cargo de hacerle llegar ésta constancia a través de la entrega personal de ésta al paciente."),'',1,'C');
        $pdf->Ln(5);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(0,5,utf8_decode("Atentamente"),'',1,'C');
        $pdf->Cell(0,5,utf8_decode("El equipo administrativo de PROVECTUS."),'',1,'C');
        $pdf->Ln(30);
        $pdf->Cell(0,5,utf8_decode("________________________       ________________________"),'',1,'C');
        $pdf->Cell(0,5,utf8_decode("      Firma del Paciente.                Firma del Enfermero/Dr."),'',1,'C');
        $pdf->Ln(50);
        $pdf->Cell(0,5,utf8_decode("_____________________________"),'',1,'C');
        $pdf->Cell(0,5,utf8_decode("      Sello de la compañía."),'',1,'C');
        $pdf->Ln(30);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(0,5,utf8_decode("Ante cualquier inconveniente llamar al (0212)-572.0566."),'',1,'C');
        $pdf->Output();
    }
    
?>