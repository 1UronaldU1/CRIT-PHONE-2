<?php
	ob_start();
	include "header.php";
    include "../../conexion/conexion.php";
	$cod=$_REQUEST['id'];
	$sql="UPDATE producto set estado = 1 where idProducto ='$cod'";
	mysqli_query($con,$sql);
	header("location:listado_producto.php");
?>