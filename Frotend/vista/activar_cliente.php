<?php
	ob_start();
	include "header.php";
    include "../../conexion/conexion.php";
	$cod=$_REQUEST['id'];
	$sql="UPDATE cliente set estado = 1 where IDCliente ='$cod'";
	mysqli_query($con,$sql);
	header("location:lista_cliente.php");
?>