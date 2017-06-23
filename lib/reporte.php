<?php
require('../reporte/fpdf.php');
require("../lib/database.php");
	
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
    // Logo
    $this->Image('../img/logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'FACTURA');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
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
	$this->SetFillColor(255,255,255);
	$this->SetTextColor(0);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	// Cabecera
	$w = array(45, 30, 30, 30);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	// Restauraci�n de colores y fuentes
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Datos
	$fill = false;
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
		$this->Cell($w[2],6,($row[2]*$row[1]),'LR',0,'R',$fill);
		$this->Ln();
		$fill = !$fill;
	}
	// L�nea de cierre
	$this->Cell(array_sum($w),0,'','T');
}
}
$time2 = time();
$fes = date("Y-m-d ", $time2);
$pdf = new PDF();
$html = 'Volver al sitio <a href="../public/">aqui</a>';
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$sql = "SELECT registro.nombre, productos.nombre_producto, productos.precio_producto, compra.cantidad, compra.pagado, compra.fecha FROM productos, registro, compra WHERE productos.id_producto = compra.id_producto AND registro.id_registro = compra.id_registro AND registro.id_registro = ? AND compra.fecha = ?";
$id = $_GET['id'];
$params = array($id, $fes);
$data = Database::getRows($sql, $params);
$data1 = Database::getRow($sql, $params);
$pdf->Cell(40,10,"Comprador:",0,1);
$pdf->Cell(40,10,$data1['nombre'],0,1);
$pdf->Cell(40,30,"Productos:",0,1);
$sql1 = "SELECT productos.nombre_producto, productos.precio_producto, compra.cantidad FROM productos, registro, compra WHERE productos.id_producto = compra.id_producto AND registro.id_registro = compra.id_registro AND registro.id_registro = ? AND compra.fecha = ?";
$id = $_GET['id'];
$params2 = array($id, $fes);
$data2 = Database::getRows($sql1, $params);
    $tot =0;
     $apagar = 0;
foreach ($data2 as $row)
    {
		        $apagar = $row['cantidad']*$row['precio_producto'];
                $tot = $apagar+$tot;
		
	}
$header = array('Nombre', 'Precio', 'Cantidad', "A Pagar");
$pdf->FancyTable($header,$data2);
$pdf->Ln();
$pdf->SetFont('Arial','B',15);
$pdf->Cell(40,10,"TOTAL A PAGAR: $".($tot),0,1);
$pdf->WriteHTML($html);
$pdf->Output();
/*
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$sql = "SELECT registro.nombre, productos.nombre_producto, productos.precio_producto, compra.cantidad, compra.pagado, compra.fecha FROM productos, registro, compra WHERE productos.id_producto = compra.id_producto AND registro.id_registro = compra.id_registro AND registro.id_registro = ?";
$id = $_GET['id'];
$params = array($id);
$data = Database::getRows($sql, $params);
$data1 = Database::getRow($sql, $params);
$pdf->Cell(40,10,"Comprador:");
$pdf->Cell(40,10,$data1['nombre']);
$pdf->Cell(40,30,"Productos:");
foreach ($data as $row)
    {
		
		$pdf->Cell(0,40,$row['nombre_producto']);
	}
$pdf->Output();
*/

?>
