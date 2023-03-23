<?php
include "../public/fpdf/fpdf.php";

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../public/fpdf/LLOGO.jpg',10,8,15);
    // Arial bold 15
    $this->SetFont('Arial','B',8);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(80,10,'LISTADO DE PRODUCTO',0,0,'C');
    // Salto de línea
    $this->Cell(25, 5, "Fecha: ". date("d/m/Y"), 0, 1, "L");
    $this->Ln(20);


    //aqui los emcabezado
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    $this->Cell(10,10,'ID',1,0,'C',1);
	$this->Cell(60,10,'PRODUCTO',1,0,'C',1);
	$this->Cell(50,10,'DESCRIPCION',1,0,'C',1);
    $this->Cell(30,10,'CATEGORIA',1,0,'C',1);
    $this->Cell(40,10,'MARCA',1,0,'C',1);
    $this->Cell(30,10,'CANTIDAD',1,0,'C',1);
    $this->Cell(20,10,'PRECIO',1,0,'C',1);
    $this->Cell(40,10,'FECHA DE EMISION',1,1,'C',1);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',10);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
//consulta--

	include "../conexion/conexion.php";
	$consulta="SELECT p.idProducto,p.NombreProducto,p.descripcion,c.nombreCategoria,m.nombreMarca,p.Cantidad,p.precio,p.F_Emitida FROM producto p INNER join categoria c ON p.idcategoria=c.idCategoria 
INNER JOIN marca m on p.idMarca =m.idMarca  ";
	$resultado=mysqli_query($con,$consulta);

//fin de la consulta

$pdf=new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');

while ($row= $resultado->fetch_assoc()) {
	$pdf->Cell(10,10,utf8_decode($row['idProducto']),1,0,'C',1);
	$pdf->Cell(60,10,utf8_decode($row['NombreProducto']),1,0,'C',0);
	$pdf->Cell(50,10,utf8_decode($row['descripcion']),1,0,'C',1);
    $pdf->Cell(30,10,utf8_decode($row['nombreCategoria']),1,0,'C',1);
    $pdf->Cell(40,10,utf8_decode($row['nombreMarca']),1,0,'C',1);
    $pdf->Cell(30,10,utf8_decode($row['Cantidad']),1,0,'C',1);
    $pdf->Cell(20,10,utf8_decode($row['precio']),1,0,'C',1);
    $pdf->Cell(40,10,utf8_decode($row['F_Emitida']),1,1,'C',1);

}
$pdf->Output();
?>