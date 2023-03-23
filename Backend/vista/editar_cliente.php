<?php  

/*=============================================
Conexión
=============================================*/

ob_start();

include "../../conexion/conexion.php";

include "sesion_login.php";

$sql       = "select * from cliente where IDCliente = $idCliente ";
$resultado = mysqli_query($con, $sql);
$fila      = mysqli_fetch_assoc($resultado)
?>
<?php  

if (!empty($_REQUEST['txtNom'])){
      $nombreCliente=$_REQUEST['txtNom'];
      $usuarioCliente=$_REQUEST['txtusu'];
      $telefono=$_REQUEST['txtTel'];
      $dirrecion=$_REQUEST['txtDir'];
      $correo=$_REQUEST['txtEmail'];
      $dni=$_REQUEST['txtDni'];
    $sql = "UPDATE cliente SET NombreCliente='$nombreCliente',UsuarioCliente='$usuarioCliente',Telefono='$telefono',Dirreccion='$dirrecion',Correo='$correo',Dni='$dni' WHERE IDCliente ='$idCliente' ";
    mysqli_query($con,$sql);
      header("Location:../../index.php");

  }

?>

<!--=====================================
Cabeza
======================================-->

<head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="../css/login/login.css">

</head>

<!--=====================================
Cuerpo
======================================-->

  <div class="form-bg">
    <div class="">
        <div class="row">
            <div class="col-md-offset-2 col-md-6">
                <form class="form-horizontal">
                    <div class="header">Edentificación</div>
                    <div class="form-content">
                        <h4 class="heading">Mis Datos</h4>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label" for="exampleInputName2"><i class="fa fa-user"></i></label>
                                <input class="form-control" id="exampleInputName2" placeholder="Nombre del Cliente" type="text" name="txtNom" value="<?php echo $fila['NombreCliente'] ?>">
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label" for="exampleInputName2"><i class="fa fa-user"></i></label>
                                <input class="form-control" id="exampleInputName2" placeholder="Usuario del Cliente" type="text" name="txtusu" value="<?php echo $fila['UsuarioCliente'] ?>" >
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label" for="exampleInputName2"><i class="fa fa-envelope-o"></i></label>
                                <input class="form-control" id="exampleInputName2" placeholder="usuario@gmail.com" type="email" name="txtEmail" value="<?php echo $fila['Correo'] ?>">
                            </div>
                            <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label" for="exampleInputName2"><i class="fa fa-lock"></i></label>
                                <input class="form-control" id="exampleInputName2" placeholder="999-999-999" type="text" name="txtTel" value="<?php echo $fila['Telefono'] ?>">
                            </div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        
                       
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label" for="exampleInputName2"><i class="fa fa-user"></i></label>
                                <input class="form-control" id="exampleInputName2" placeholder="Dirrección" type="text" name="txtDir" value="<?php echo $fila['Dirreccion'] ?>">
                            </div>
 
                            <div class="col-sm-6">
                                <label class="control-label" for="exampleInputName2"><i class="fa fa-user"></i></label>
                                <input class="form-control" id="exampleInputName2" placeholder="DNI" type="text" name="txtDni" value="<?php echo $fila['Dni'] ?>">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                          <div class="d-flex justify-content-center">
                            <div class="clearfix">
                                <button type="submit" class="btn btn-default btnmk m-2"> Actualizar</button>
                                <a type="button" class="btn btn-default btnmk m-2" href="../../index.php"> Retornar</a>
                            </div>
                          </div>
                          <div class="d-flex justify-content-center p-3">
                            <img src="../images/login/person.jpg" style="width: 70%;height: 70%;object-fit: cover;">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
