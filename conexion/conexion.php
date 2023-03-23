<?php
//variables
 $servidor="localhost";
 $usuario="root";
 $clave="";
 $bd="crit-phone";

 //crear la cadena de conexion
 $con=mysqli_connect($servidor,$usuario,$clave,$bd);
 //verificar la conexion
 if (!$con) {
    die("Error al conectarse..".mysql_connect_error());
 }
 //echo "Conexion realiza con exito...";
  ?>