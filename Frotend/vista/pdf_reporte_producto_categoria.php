<?php
	include "../../conexion/conexion.php";
	include "../vistas/plantilla_consulta.php";
	if(!empty($_POST)){
		$categoria=mysqli_escape_string($con,$_POST['cboCategoria']);
	
		$sql="SELECT p.idProducto,p.NombreProducto,p.descripcion,c.nombreCategoria,m.nombreMarca,p.Cantidad,p.precio,p.F_Emitida FROM producto p INNER join categoria c ON p.idcategoria=c.idCategoria INNER JOIN marca m on p.idMarca =m.idMarca  WHERE c.idCategoria=$categoria";
		$resultado=mysqli_query($con,$sql);

		$pdf = new PDF('L','mm','A4'); //"L","mm","a4" hoja horizontal
		$pdf->AliasNbPages();
		$pdf->SetMargins(10,10,10);
		$pdf->AddPage();
		$pdf->SetFillColor(255,0,0);
    	$pdf->SetTextColor(255);
    	$pdf->SetDrawColor(128,0,0);
    	$pdf->SetLineWidth(.3);
    	$pdf->SetFont('','B');
		$pdf->SetFont('Arial','B',12); //poner B para negrita

	$pdf->Cell(10,10,'ID',1,0,'C',1);
	$pdf->Cell(30,10,'PRODUCTO',1,0,'C',1);
	$pdf->Cell(45,10,'DESCRIPCION',1,0,'C',1);
    $pdf->Cell(30,10,'CATEGORIA',1,0,'C',1);
    $pdf->Cell(40,10,'MARCA',1,0,'C',1);
    $pdf->Cell(30,10,'CANTIDAD',1,0,'C',1);
    $pdf->Cell(20,10,'PRECIO',1,0,'C',1);
    $pdf->Cell(50,10,'FECHA DE EMISION',1,1,'C',1);

	$pdf->SetFont('Arial','B',9); //poner B para negrita
	$pdf->SetFillColor(224,235,255);
	$pdf->SetTextColor(0);
	$pdf->SetFont('');
}

while ($row= $resultado->fetch_assoc()) {
	$pdf->Cell(10,10,utf8_decode($row['idProducto']),1,0,'C',1);
	$pdf->Cell(30,10,utf8_decode($row['NombreProducto']),1,0,'C',0);
	$pdf->Cell(45,10,utf8_decode($row['descripcion']),1,0,'C',1);
    $pdf->Cell(30,10,utf8_decode($row['nombreCategoria']),1,0,'C',1);
    $pdf->Cell(40,10,utf8_decode($row['nombreMarca']),1,0,'C',1);
    $pdf->Cell(30,10,utf8_decode($row['Cantidad']),1,0,'C',1);
    $pdf->Cell(20,10,utf8_decode($row['precio']),1,0,'C',1);
    $pdf->Cell(50,10,utf8_decode($row['F_Emitida']),1,1,'C',1);

}
$pdf->Output();

?>