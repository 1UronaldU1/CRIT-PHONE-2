<?php  

/*=============================================
Coneción
=============================================*/
ob_start();

include "../../conexion/conexion.php";

?>
<?php  

if (!empty($_REQUEST['cbocliente'])){

  $idCliente=$_REQUEST['cbocliente'];
  $clave=$_REQUEST['txtcontra'];

    $sql="Insert into usuariocliente(idCliente,claveCliente)
                values('$idCliente','$clave')";
    mysqli_query($con,$sql);

    header("Location:../../index.php");

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../images/tienda/logotipo.ico" type="image/x-icon">

    <title>Crear Usuario</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/login/login.css">
     <link rel="stylesheet" type="text/css" href="../css/login/estilo.css">
</head>
<div class="form-bg">
    <div class="">
        <div class="row">
            <div class="col-md-offset-2 col-md-6">
                <form class="form-horizontal">
                    <div class="header">Registro de Usuario</div>
                    <div class="form-content">
                        <h4 class="heading">Tus Datos</h4>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label" for="exampleInputName2"><i class="fa fa-user"></i></label>
                                <select name="cbocliente" class="form-control">

                                    <?php
                                    $consulta="SELECT iDCliente,NombreCliente FROM cliente";
                                    $ejecutar=mysqli_query($con,$consulta)or die($xx);
                                    ?>
                                    <?php foreach ($ejecutar as $opciones):?>
                                        <option value="<?php echo $opciones['iDCliente']?>"><?php echo $opciones['NombreCliente']?> </option>
                                    <?php endforeach ?>

                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label" for="exampleInputName2"><i class="fa fa-user"></i></label>
                                <input class="form-control" id="exampleInputName2" placeholder="Clave" type="password" name="txtcontra">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                          <div class="d-flex justify-content-center">
                            <div class="clearfix">
                                <button type="submit" class="btn btn-default btnmk"> Registrarme</button>
                            </div>
                          </div>
                          <div class="d-flex justify-content-center">
                            <img src="../images/login/user.jpg" style="width: 70%;height: 70%;object-fit: cover;">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
