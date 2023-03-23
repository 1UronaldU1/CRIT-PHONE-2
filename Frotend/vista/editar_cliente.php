<?php

  ob_start();

  include "header.php";
  include "../../conexion/conexion.php";

  $cod=$_REQUEST['id'];
  $sql="select * from cliente where IDCliente='$cod'";
  $resultado=mysqli_query($con,$sql);
  while($fila=mysqli_fetch_assoc($resultado)){

?>
<div class="container" style="width: 80%">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="card" style="width: 25rem">
      <div class="card-body">
        <h2 class="card-title">Actualizar Cliente</h2>

          <div class="mb-3">
            <input type="text" name="txtid" value="<?php echo $fila['IDCliente'] ?>" class="form-control">
          </div>

          <div class="mb-3">
            <label>Cliente</label>
            <input type="text" name="txtcli" value="<?php echo $fila['NombreCliente'] ?>" class="form-control">
          </div>

          <div class="mb-3">
            <label>Usuario</label>
            <input type="text" name="txtusu" value="<?php echo $fila['UsuarioCliente'] ?>" class="form-control">
          </div>

          <div class="mb-3">
            <label>Telefono</label>
            <input type="text" name="txttel" value="<?php echo $fila['Telefono'] ?>" class="form-control">
          </div>

          <div class="mb-3">
            <label>Dirreción</label>
            <input type="text" name="txtdir" class="form-control" value="<?php echo $fila['Dirreccion'] ?>" >
          </div>

          <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="txtcor" class="form-control" value="<?php echo $fila['Correo'] ?>">
          </div>

          <div class="mb-3">
            <label>DNI</label>
            <input type="dni" name="txtdni" class="form-control" value="<?php echo $fila['Dni'] ?>">
          </div>

          <div class="mb-3">
            <input type="submit" value="Actualizar" class="btn btn-primary">
            <a href="listado_producto.php" class="btn btn-outline-info">Retornar</a>
          </div>

      </div>
    </div>
  </form>

<?php

  }

?>

</div>

<?php

  if (!empty($_REQUEST['txtid'])|| !empty($_REQUEST['txtcli'])){
    $cod=$_REQUEST['txtid'];
    $cliente=$_REQUEST['txtcli'];
      $usuario=$_REQUEST['txtusu'];
      $telefono=$_REQUEST['txttel'];
      $dirrecion=$_REQUEST['txtdir'];
      $correo=$_REQUEST['txtcor'];
      $dni=$_REQUEST['txtdni'];
      $sql="UPDATE cliente SET NombreCliente='$cliente',UsuarioCliente='$usuario',Telefono='$telefono',Dirreccion='$dirrecion',Correo='$correo',Dni='$dni' WHERE IDCliente = '$cod'";
    mysqli_query($con,$sql);
    if ($cliente=1){
      header("location:lista_cliente.php");
    }

  }

?>

<?php

  include "footer.php";
  
?>