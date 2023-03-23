<?php
	ob_start();
	
    include "../../conexion/conexion.php";
    require_once ("login_empleado_2.php");
    include "header.php";

?>

<br>

<div class="content-wrapper">
  <section class="content" >
    <div class="container-fluid">

    <!--Cajas pequeñas (caja de estadísticas) -->

      <div class="row">
        <div class="col-lg-12">

      <!-- Contenido - INICIO -->

          <div class="container" style="width: 80%">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="card" style="width: 25rem;">
                <div class="card-body">
                  <h4 class="card-title text-success">Registrar Cliente</h4>
                  <br>

                  <div class="mb-3" style="align-self: 10%">
                    <input type="text" name="txtid" class="form-control" readonly="true" placeholder="ID">
                  </div>

                  <div class="mb-3">
                    <label>Cliente</label>
                    <input type="text" name="txtcli" class="form-control" required="" placeholder="Nombre del cliente">
                  </div>

                  <div class="mb-3">
                    <label>Usuario</label>
                    <input type="text" name="txtusu" class="form-control" required="" placeholder="Ingresa usuario">
                  </div>

                  <div class="mb-3">
                    <label>Telefono</label>
                    <input type="text" name="txttel" class="form-control" required="" placeholder="Ingresa Telefono">
                  </div>

                  <div class="mb-3">
                    <label>Dirreción</label>
                    <input type="text" name="txtdir" class="form-control" required="" placeholder="Ingresa Dirreción">
                  </div>

                            
                  <div class="mb-3">
                    <label>Correo</label>
                    <input type="email" name="txtcor" class="form-control" required="" placeholder="Ingresa Correo">
                  </div>

                  <div class="mb-3">
                    <label>DNI</label>
                    <input type="text" name="txtdni" class="form-control" required="" placeholder="Ingresa Correo">
                  </div>

                  <input type="submit" name="" value="Agregar" class="btn btn-primary">
                  <a href="lista_cliente.php" class="btn btn-info">Retornar</a>

                </div>
              </div>
            </form>
          </div>                       
        </div>
      </div>
    </div>
  </section>
</div>

<?php
  include "footer.php";

  if (!empty($_REQUEST['txtcli'])|| !empty($_REQUEST['txtcli'])){
      $cliente=$_REQUEST['txtcli'];
      $usuario=$_REQUEST['txtusu'];
      $telefono=$_REQUEST['txttel'];
      $dirrecion=$_REQUEST['txtdir'];
      $correo=$_REQUEST['txtcor'];
      $dni=$_REQUEST['txtdni'];
    $sql="INSERT INTO cliente(NombreCliente, UsuarioCliente, Telefono, Dirreccion, Correo, Dni) VALUES ('$cliente','$usuario','$telefono','$dirrecion','$correo','$dni')";
    mysqli_query($con,$sql);
    if($producto=1){
      header("location:lista_cliente.php");
    }

  }

?>

<?php

  include "../../conexion/conexion.php"; 

?>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Nueva Categoría</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="mb-3">
          <label>Id</label>
          <input type="text" class="form-control" required="" placeholder="ID" disabled>
        </div>
        <div class="mb-3">
          <label>Nombre de la Categoría</label>
          <input type="text" name="txtcat" class="form-control" required="" placeholder="Nombre de la Categoría">
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" name="" value="Agregar" class="btn btn-primary">
      </div>
    </form>
    </div>
  </div>
</div>
<?php
  if (isset($_POST['txtcat'])){
      $categoria=$_POST['txtcat'];
    $sql="Insert into categoria(nombreCategoria) values ('$categoria')";
    mysqli_query($con,$sql);
    if($categoria=1){
      header("location:añadir_producto.php");
    }

  }

?>
<?php include "../../conexion/conexion.php"; ?>
<!-- The Modal -->
<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Nueva Marca</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="mb-3">
          <label>Id</label>
          <input type="text" class="form-control" required="" placeholder="ID" disabled>
        </div>
        <div class="mb-3">
          <label>Nombre de la Marca</label>
          <input type="text" name="txtmar" class="form-control" required="" placeholder="Nombre de la Marca">
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" name="" value="Agregar" class="btn btn-primary">
      </div>
    </form>
    </div>
  </div>
</div>
<?php
  if (isset($_POST['txtmar'])){
      $marca=$_POST['txtmar'];
    $sql="Insert into marca(nombreMarca) values ('$marca')";
    mysqli_query($con,$sql);
    if($marca=1){
      header("location:añadir_producto.php");
    }

  }

?>