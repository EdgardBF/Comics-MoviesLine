<?php
    //Llamamos las Librerias
    require('database.php');
    require('fpdf/fpdf.php');
    session_name("admin");
    session_start();  
    ini_set("date.timezone", "America/El_Salvador");
    //validamos que si la variable de sesion no esta colocada entonces nos envie al login
   if(isset($_SESSION['usuario']))
    {}
    else
    {
       header("location: ../dashboard/index.php");
    }
    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Arial bold 15
            $this->SetFont('Arial','B',12);
            // Colores de los fondo y texto
            $this->SetFillColor(0, 96,100);
            $this->SetTextColor(255,255,255);
            // Movernos a la derecha
            $this->Cell(1);
            // Título
            $this->Cell(0,1,utf8_decode('COMICS & MOVIES LINE'),0,3,'C',true);
            $this->SetFont('Arial','B',10);
            $this->Cell(0,0.7,'Reporte de los administradores por permisos',0,3,'C',true);
            // Logo
            $this->Image('../img/logo.png',0.5,0.90,4,2);
            $this->Ln(1);
        }
        // Pie de página
        function Footer()
        {
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Colores de los fondo y texto
            $this->SetFillColor(0, 96,100);
            $this->SetTextColor(255,255,255);
            //Usuario Centrado
            // Posición: a 1,5 cm del final Vertical y 1 cm Horizontal
            $this->SetY(-1.5);
            $this->SetX(1);
            $this->Cell(0,1,"Hecho por: ".$_SESSION['usuario'],0,0,'C',true);
            //Fecha y Hora a la Izquierda
            $this->SetY(-1.5);
            $this->SetX(1);
            $time = time();
            $this->Cell(0,1,date("Y-m-d H:i", $time),0,0,'L');
            //Número de Pagina, a la Derecha
            $this->SetY(-1.5);
            $this->SetX(-2);
            // Número de página
            $this->Cell(0,1,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'R');
        }
    }
    
    // Creación del objeto de la clase heredada
    $pdf = new PDF('P','cm','Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $i = 5;
    if(empty($_GET['id']) ) 
    {
        //sentencia sql
    $sql = "SELECT *FROM tipo_usuario";
    //se llama a la funcion para obtener los datos que sean necesarios en este caso el tipo de usuario
    $data = Database::getRows($sql, null);
    foreach($data as $row2)
            {
            //sentencia sql para la obtencio de datos
            $sql1 = "SELECT nombre, correo, usuario FROM administradores INNER JOIN tipo_usuario ON administradores.id_tipo_usuario = tipo_usuario.id_tipo_usuario WHERE tipo_usuario.id_tipo_usuario = ?";
            $params1 = array($row2['id_tipo_usuario']);
            $data1 = Database::getRows($sql1, $params1);
            //Colocación de los Headers, de los atributos
            if($data1 != null){
            $pdf->SetX(3);
            $pdf->SetFont('Arial','',16);
            $pdf->SetFillColor(0,131,143);
            $pdf->SetTextColor(255,255,255);
            $pdf->Cell(16,1,utf8_decode($row2['tipo']),1,0,'C',true);
            $pdf->Ln(1);
            //carga de los datos a mostrar en el pdf
            foreach($data1 as $row3)
            {
            //informacion utilizada obtenida que sera mostrada como talbal aqui abajo
            $pdf->SetX(3);
            $pdf->SetTextColor(0,0,0);
            $pdf->SetFillColor(241, 237, 232);
            $pdf->SetFont('Arial','B',8);
            $pdf->Cell(4,1,utf8_decode("Nombre: "),1,0,'C',true);
            $pdf->SetFillColor(255,255,255);
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(12,1,utf8_decode($row3['nombre']),1,0,'C',true);
            $pdf->Ln(1);
            $pdf->SetX(3);
            $pdf->SetFillColor(241, 237, 232);
            $pdf->SetFont('Arial','B',8);
            $pdf->Cell(4,1,utf8_decode("Correo: "),1,0,'C',true);
            $pdf->SetFillColor(255,255,255);
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(4,1,utf8_decode($row3['correo']),1,0,'C',true);
            $pdf->SetFont('Arial','B',8);
            $pdf->Cell(4,1,utf8_decode("Nombre de Usuario: "),1,0,'C',true);
            $pdf->SetFillColor(255,255,255);
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(4,1,utf8_decode($row3['usuario']),1,0,'C',true);
            $pdf->Ln(1);

            }
            $pdf->Ln(1.5);
            }
            

            }

    }
    $pdf->Output();
    ?>
