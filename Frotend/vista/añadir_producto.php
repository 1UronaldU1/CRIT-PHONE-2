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

      <!-- Cajas pequeñas (caja de estadísticas) -->

      <div class="row">
        <div class="col-lg-12">

          <!-- Contenido - INICIO -->

          <div class="container" style="width: 80%">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card" style="width: 25rem;">
                  <div class="card-body">
                    <h4 class="card-title text-success">Registrar Productos</h4>
                    <br>

                    <div class="mb-3" style="align-self: 10%">
                      <input type="text" name="txtid" class="form-control" readonly="true" placeholder="ID">
                    </div>

                    <div class="mb-3">
                      <label>Producto</label>
                      <input type="text" name="txtpro" class="form-control" required="" placeholder="Nombre del producto">
                    </div>

                    <div class="mb-3">
                      <label>Descripcion</label>
                      <input type="text" name="txtdes" class="form-control" required="" placeholder="Ingres Descripción">
                    </div>

                    <div class="mb-3">
                      <label for="formFileSm" class="form-label">Imagen</label>
                      <input class="form-control form-control-sm" id="formFileSm" name="ctfimagen" type="file">
                    </div>

                    <div class="mb-3">
                      <label>Categoría - <a href="#" data-toggle="modal" data-target="#myModal">Nuevo Categoría</a></label>
                        <select name="cbocategoria" class="form-control">
                          <?php
                            $consulta="SELECT idCategoria,nombreCategoria FROM categoria";
                            $ejecutar=mysqli_query($con,$consulta)or die($xx);
                          ?>
                          <?php foreach ($ejecutar as $opciones):?>
                            <option value="<?php echo $opciones['idCategoria']?>"><?php echo $opciones['nombreCategoria']?> </option>
                          <?php endforeach ?>
                        </select>
                    </div>
     
                    <div class="mb-3">
                      <label>Marca - <a href="#" data-toggle="modal" data-target="#myModal1">Nuevo Marca</a></label>
                        <select name="cbomarca" class="form-control">
                          <?php
                            $consulta="SELECT idMarca,nombreMarca FROM marca";
                            $ejecutar=mysqli_query($con,$consulta)or die($xx);
                          ?>
                          <?php foreach ($ejecutar as $opciones):?>
                            <option value="<?php echo $opciones['idMarca']?>"><?php echo $opciones['nombreMarca']?> </option>
                          <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-3">
                      <label>Cantidad</label>
                      <input type="number" name="txtcant" class="form-control" required="" placeholder="Ingres Cantidad">
                    </div>

                    <div class="mb-3">
                      <label>Precio</label>
                      <input type="text" name="txtprec" class="form-control" required="" placeholder="Ingres Precio">
                    </div>

                    <div class="mb-3">
                      <label>Fecha de Emitenté</label>
                      <input type="date" name="dtFecha" class="form-control" required="" placeholder="Ingres Frecha">
                    </div>

                    <input type="submit" name="" value="Agregar" class="btn btn-primary">
                    <a href="listado_Producto.php" class="btn btn-info">Retornar</a>

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

  if (!empty($_REQUEST['txtpro'])|| !empty($_REQUEST['textpro'])){
      $producto=$_REQUEST['txtpro'];
      $descripcion=$_REQUEST['txtdes'];

      $imagen_tmp=$_FILES['ctfimagen']['tmp_name'];
      $imagen_nombre=$_FILES['ctfimagen']['name'];
      move_uploaded_file($imagen_tmp,$_SERVER['DOCUMENT_ROOT'].'/crit-phone-2/Frotend/img/productos/'.$imagen_nombre);

      $categoria=$_REQUEST['cbocategoria'];
      $marca=$_REQUEST['cbomarca'];
      $cantidad=$_REQUEST['txtcant'];
      $precio=$_REQUEST['txtprec'];
      $fecha=$_REQUEST['dtFecha'];
    $sql="Insert into producto(NombreProducto,descripcion,imagen,idCategoria,idMarca,Cantidad,precio,F_Emitida)
                values('$producto','$descripcion','$imagen_nombre','$categoria','$marca','$cantidad','$precio','$fecha')";
    mysqli_query($con,$sql);
    if($producto=1){
      header("location:listado_producto.php");
    }

  }

?>
<?php include "../../conexion/conexion.php"; ?>
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