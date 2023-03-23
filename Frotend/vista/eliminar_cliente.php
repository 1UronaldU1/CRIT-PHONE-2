<?php

	ob_start();

	include "header.php";
	include "../../conexion/conexion.php";

	$cod = $_GET['id'];
	$sql = "UPDATE cliente SET estado = 0 where IDCliente ='$cod'";
	mysqli_query($con, $sql);
	header("location:lista_cliente.php");
