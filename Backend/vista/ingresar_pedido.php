<?php  

  ob_start();

    include "../../conexion/conexion.php";
    require_once "sesion_login.php";
    
    $subtotal=$_POST['subtotal'];
    $igv=$_POST['igv'];
    $total=$_POST['total'];

    $sql="INSERT into boleta(idCliente,subTotal,igv,total)
                values('$idCliente','$subtotal','$igv','$total')";

    mysqli_query($con,$sql);

    echo 1;
?>