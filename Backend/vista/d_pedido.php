<?php 

include "../../conexion/conexion.php";

$sqlid="SELECT MAX(idBoleta) FROM boleta";
$idBol=mysqli_query($con,$sqlid);
$idfinal=mysqli_fetch_assoc($idBol);
$idBoleta = $idfinal['MAX(idBoleta)'];


$id = $_POST["id"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];
$importe = $_POST["importe"];

$sql="INSERT into detalle_boleta(idBoleta,idProducto,precio,cantidad,importe) 
    values ('$idBoleta','$id','$precio','$cantidad','$importe')";

mysqli_query($con,$sql);

echo 1;

 ?>