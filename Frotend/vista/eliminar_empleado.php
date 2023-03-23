<?php

ob_start();

include "header.php";
include "../../conexion/conexion.php";

$cod = $_REQUEST['id'];
$sql = "UPDATE empleado set Activo = 0 where idEmpleado ='$cod'";
mysqli_query($con, $sql);
header("location:empleado_datos.php");
