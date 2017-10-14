<?php
//ARCHIVOS NECESARIOS PARA COMUNICARSE CON LA BASE DE DATOS Y PARA CREAR EL PDF
require('../reporte/fpdf.php');
require("../lib/database.php");
//INICIO DE SESION PARA UTILIZAR LAS VARIABLES
session_name("Cliente");
session_start(); 
//COLOCACION DE LA ZONA HORARIA DE EL SALVADOR
 ini_set("date.timezone", "America/El_Salvador");
class PDF extends FPDF
{
protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

function WriteHTML($html)
{
    // Intérprete de HTML
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Etiqueta
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extraer atributos
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Etiqueta de apertura
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Etiqueta de cierre
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modificar estilo y escoger la fuente correspondiente
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Escribir un hiper-enlace
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}
        // Cabecera de página
        function Header()
        {
            $reco = $_GET['reco'];
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
            $this->Cell(0,0.7,utf8_decode('N° de Factura: '.$reco.''),0,3,'C',true);
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
function LoadData($file)
{
    // Leer las líneas del fichero
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}
// Tabla simple
function BasicTable($header, $data)
{
    // Cabecera
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}
function FancyTable($header, $data)
{
	// Colores, ancho de l�nea y fuente en negrita
	$this->SetFillColor(241, 237, 232);
	$this->SetTextColor(0);
	$this->SetDrawColor(0,0,0);
	$this->SetLineWidth(.03);
	$this->SetFont('','B');
	// Cabecera
	$w = array(4.5, 3, 3, 3);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],0.7,$header[$i],1,0,'C',true);
	$this->Ln();
	// Restauraci�n de colores y fuentes
	$this->SetTextColor(0);
	$this->SetFont('');
	// Datos
	$fill = false;
	foreach($data as $row)
	{
        	$this->SetFillColor(255, 255, 255);
        $this->SetX(4);
		$this->Cell($w[0],0.6,$row[0],'LR',0,'C',$fill);
		$this->Cell($w[1],0.6,"$".$row[1],'LR',0,'C',$fill);
		$this->Cell($w[2],0.6,$row[2],'LR',0,'C',$fill);
		$this->Cell($w[2],0.6,"$".($row[2]*$row[1]),'LR',0,'C',$fill);
		$this->Ln();
		$fill = !$fill;
	}
	// L�nea de cierre
    $this->SetX(4);
	$this->Cell(array_sum($w),0,'','T');
}
}
//FUNCION PARA UTILIZAR EL TIEMPO
$time2 = time();
$fes = date("Y-m-d ", $time2);
//CREAMOS EL PDF DE MANERA VERTICAL CON TIPO DE PAPEL TAMAÑO CARTA
$pdf = new PDF('P','cm','Letter');
$pdf->AliasNbPages();
//UTILIZADO PARA QUE APAREZCA UN TEXTO QUE LLEVE A LA DIRECCIONA ANTERIOR
$html = 'Volver al sitio <a href="../public/">aqui</a>';
$pdf->AliasNbPages();
$pdf->AddPage();
//SENTENCIA SQL
$sql = "SELECT registro.nombre, productos.nombre_producto, productos.precio_producto, compra.cantidad, compra.pagado, compra.fecha, compra.direccion, compra.codigo_postal FROM compra INNER JOIN registro ON registro.id_registro = compra.id_registro INNER JOIN productos ON productos.id_producto = compra.id_producto WHERE registro.id_registro = ? AND compra.fecha = ?";
//RECONOCIMIENTO DE VARIABLES GET QUE SON EL ID DEL COMPRADOR Y EL NUMERO GENERADO DE LA FACTURA
$id = $_GET['id'];
$reco = $_GET['reco'];
//SE COLOCAN LOS PARAMETROS
$params = array($id, $fes);
//SE MANDA A LLAMAR A LA FUNCION DATABASE PARA OBTENER LOS DATOS NECESARIOS
$data = Database::getRows($sql, $params);
$data1 = Database::getRow($sql, $params);
//COLOCAMOS EL LUGAR DONDE VA A ESTAR CON SET X LOS DATOS DEL COMPRADOR
//INICO DE DATOS DEL COMPRADOR
$pdf->SetX(3);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(241, 237, 232);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(4,1,utf8_decode("Nombre del Comprador: "),1,0,'C',true);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',8);
$pdf->Cell(12,1,utf8_decode($data1['nombre']),1,0,'C',true);
$pdf->Ln(1);
$pdf->SetX(3);
$pdf->SetFillColor(241, 237, 232);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(4,1,utf8_decode("Direccion: "),1,0,'C',true);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,1,utf8_decode($data1['direccion']),1,0,'C',true);
$pdf->SetFillColor(241, 237, 232);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(4,1,utf8_decode("Codigo Postal: "),1,0,'C',true);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,1,utf8_decode($data1['codigo_postal']),1,0,'C',true);
$pdf->Ln(1.5);
//FIN DE DATOS DEL COMPRADOR
$pdf->SetFont('Arial','',12);
//ENLISTACION DE PRODUCTOS QUE SE COMPRARON
$pdf->Cell(20,1,"Productos Comprados:",0,1,'C');
//SENTENCIAS SQL DONDE SE AGARRAN LOS DATOS DE LOS PRODUCTOS QUE SE COMPRARON
$sql1 = "SELECT productos.nombre_producto, productos.precio_producto, compra.cantidad FROM compra INNER JOIN registro ON registro.id_registro = compra.id_registro INNER JOIN productos ON productos.id_producto = compra.id_producto WHERE registro.id_registro = ? AND id_reconocimiento = ?";
$id = $_GET['id'];
$params2 = array($id, $reco);
$data2 = Database::getRows($sql1, $params2);
    $tot =0;
     $apagar = 0;
     //SE HACE UNA SUMATORIA DEL TOTAL A PAGAR
foreach ($data2 as $row)
    {
		        $apagar = $row['cantidad']*$row['precio_producto'];
                $tot = $apagar+$tot;
		
	}
    //SE COLOCAN LOS APARTADOS QUE VAN A IR ARRIBA DE LA TABLA
$header = array('Nombre', 'Precio', 'Cantidad', "A Pagar");
$pdf->SetX(4);
//SE CARGA LA FUNCION PARAA QUE SALGA LA TABLA CON EL HEADER Y LOS DATOS OBTENIDOS CON LA CONSULTA SQL
$pdf->FancyTable($header,$data2);
//SE COLOCA EL TOTAL A PAGAR
$pdf->Ln();
$pdf->SetX(4);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(241, 237, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(4.5,1,utf8_decode("TOTAL A PAGAR: "),1,0,'C',true);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',12);
$pdf->Cell(9,1,utf8_decode("$".($tot)),1,0,'C',true);
$pdf->Ln(1);
//FIN DEL TOTAL A PAGAR
$pdf->SetFont('Arial','B',10);
//MENSAJE QUE DIRA: SI QUIERE VOLVER A LA PAGINA HAZ CLICK AQUI
$pdf->WriteHTML($html);
//INICO DE INFORMACION GENERAL DE LA EMPRESA
$pdf->Ln(3);
$pdf->Cell(4,1,utf8_decode("Contactenos en:"),0,0,'L');
$pdf->Ln(0.5);
$pdf->SetFont('Arial','',8);
$pdf->Cell(6,1,utf8_decode("2225-3243"),0,0,'L');
$pdf->Ln(0.5);
$pdf->Cell(6,1,utf8_decode("support@comicsmoviesline.com"),0,0,'L');
$pdf->Ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(4,1,utf8_decode("Datos importantes:"),0,0,'L');
$pdf->Ln(0.5);
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,1,utf8_decode("Este documento te servirá como recibo."),0,0,'L');
$pdf->Ln(0.5);
$pdf->Cell(4,1,utf8_decode("También puedes ver tu historial de compras en cualquier momento."),0,0,'L');
$pdf->Ln(1);
$pdf->Cell(4,1,utf8_decode("Los reembolsos o devoluciones son posibles para muchos productos de C&M Line."),0,0,'L');
$pdf->Ln(0.5);
$pdf->Cell(4,1,utf8_decode("Contacta con nuestro equipo de soporte paa obtener mas detalles"),0,0,'L');
$pdf->Ln(1.5);
$pdf->Cell(4,1,utf8_decode("atte. El equipo de COMICS & MOVIES LINE"),0,0,'L');
$pdf->Ln(0.5);
$pdf->Cell(4,1,utf8_decode("https://www.comicsmoviesline.com/"),0,0,'L');
//FIN DE INFORMACION GENERAL
$pdf->Output();
?>
