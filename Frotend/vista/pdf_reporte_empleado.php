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
    $this->Cell(80,10,'LISTADO DE EMPLEADO',0,0,'C');
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
	$this->Cell(35,10,'NOMBRE Y APELLIDO',1,0,'C',1);
	$this->Cell(50,10,'TELEFONO',1,0,'C',1);
    $this->Cell(30,10,'DIRRECCION',1,0,'C',1);
    $this->Cell(40,10,'CORREO',1,0,'C',1);
    $this->Cell(40,10,'USUARIO DEL EMPLEADO',1,0,'C',1);
    $this->Cell(50,10,'DNI',1,1,'C',1);

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
	$consulta="SELECT * FROM empleado  ";
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
	$pdf->Cell(10,10,utf8_decode($row['idEmpleado']),1,0,'C',1);
	$pdf->Cell(35,10,utf8_decode($row['NombreEmpleado']),1,0,'C',0);
	$pdf->Cell(50,10,utf8_decode($row['Telefono']),1,0,'C',1);
    $pdf->Cell(30,10,utf8_decode($row['Dirreccion']),1,0,'C',1);
    $pdf->Cell(40,10,utf8_decode($row['Correo']),1,0,'C',1);
    $pdf->Cell(40,10,utf8_decode($row['usuarioEmpleado']),1,0,'C',1);
    $pdf->Cell(50,10,utf8_decode($row['Dni']),1,1,'C',1);

}
$pdf->Output();
?>