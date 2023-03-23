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
            <form action="" method="POST">
              <div class="card" style="width: 25rem;">
                <div class="card-body">
                  <h4 class="card-title text-success">Registrar Empleado</h4>

                  <div class="mb-3">
                    <br>
                    <label>ID</label>
                    <input type="text" name="txtid" class="form-control" readonly="true">
                  </div>

                  <div class="mb-3">
                    <label>Nombre y Apellido del Empleado</label>
                    <input type="text" name="txtnom" class="form-control"  required="" placeholder="Nombre y Apellido del Cliente">
                  </div>

                  <div class="mb-3">
                    <label>Usuario del Empleado</label>
                    <input type="text" name="txtusu" class="form-control"  required="" placeholder="Usuario del Empleado">
                  </div>

                  <div class="mb-3">
                    <label>Telefono</label>
                    <input type="text" name="txttel" class="form-control" required="" placeholder="Telefono">
                  </div>

                  <div class="mb-3">
                    <label>Dirección</label>
                    <input type="text" name="txtdir" class="form-control" required="" placeholder="Dirección">
                  </div>

                  <div class="mb-3">
                    <label>Correo</label>
                    <input type="email" name="txtcor" class="form-control" required="" placeholder="Correo">
                  </div>

                  <div class="mb-3">
                    <label>DNI</label>
                    <input type="text" name="txtdni" class="form-control" required="" placeholder="DNI">
                  </div>

                  <div class="mb-3">
                    <input type="submit" name="" value="Agregar" class="btn btn-primary">
                    <a href="empleado_datos.php" class="btn btn-info">Retornar</a>
                  </div>

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

if (!empty($_REQUEST['txtpro']) || !empty($_REQUEST['textpro'])) {
    $producto    = $_REQUEST['txtpro'];
    $descripcion = $_REQUEST['txtdes'];
    $imagen      = addslashes(file_get_contents($_FILES['ctfimagen']['tmp_name']));

    $categoria = $_REQUEST['cbocategoria'];
    $marca     = $_REQUEST['cbomarca'];
    $cantidad  = $_REQUEST['txtcant'];
    $precio    = $_REQUEST['txtprec'];
    $fecha     = $_REQUEST['dtFecha'];
    $sql       = "Insert into producto(NombreProducto,descripcion,imagen,idCategoria,idMarca,Cantidad,precio,F_Emitida)
                values('$producto','$descripcion','$imagen','$categoria','$marca','$cantidad','$precio','$fecha')";
    mysqli_query($con, $sql);
    if ($producto = 1) {
        header("location:listado_producto.php");
    }

}

?>