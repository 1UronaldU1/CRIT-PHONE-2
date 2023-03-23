<?php

include "../../conexion/conexion.php";

require_once "login_empleado_2.php";

include "header.php";

$sql = "SELECT * FROM banner";
$resultado = mysqli_query($con, $sql);

?>

<!-- Envoltorio de contenido. Contiene contenido de página -->

<div class="content-wrapper">

  <!-- Encabezado de contenido (encabezado de página) -->

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Banner</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="listado_producto.php">Productos</a></li>
            <li class="breadcrumb-item"><a href="listado_producto_fecha.php">Productos por Fecha</a></li>
            <li class="breadcrumb-item active"><a href="empleado_datos.php">Datos del empleado</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">

      <!-- Cajas pequeñas (caja de estadísticas) -->

      <div class="row">
        <div class="col-lg-12">
            <div class="iq-card-body">
              <div class="tale-responsive">
                <table class="table table-striped nowrap table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NOMBRE</th>
                      <th>IMAGEN</th>
                      <th>DESCRIPCION</th>
                      <th>NOMBRE</th>
                      <th>IMAGEN</th>
                      <th>DESCRIPCION</th>
                      <th>NOMBRE</th>
                      <th>IMAGEN</th>
                      <th>DESCRIPCION</th>
                      <th></th>
                    </tr>
                  </thead>

                   <tbody>

                      <?php 

                        while ($fila = mysqli_fetch_assoc($resultado)) { 

                      ?>


                      <tr>
                        <td> <?php echo $fila['id_banner'] ?> </td>

                        <td><?php echo $fila['nombre_producto'] ?></td>

                        <td>
                          <img width="100" src="../../Backend/images/Banner/<?php echo $fila['imagen']; ?>">
                        </td>

                        <td> <?php echo $fila['descripcion'] ?> </td>

                        <td> <?php echo $fila['nombre_producto_1'] ?> </td>

                        <td>
                          <img width="100" src="../../Backend/images/Banner/<?php echo $fila['imagen_1']; ?>">
                        </td>

                        <td> <?php echo $fila['descripcion_1'] ?> </td>

                        <td> <?php echo $fila['nombre_producto_2'] ?> </td>

                        <td>
                          <img width="100" src="../../Backend/images/Banner/<?php echo $fila['imagen_2']; ?>">
                        </td>

                        <td> <?php echo $fila['descripcion_2'] ?> </td>

                        <td>
                            
                            <a href="editar_banner.php?id=<?php echo $fila['id_banner'] ?>" class="btn btn-warning"><i class="fas fa-edit size:3x"></i></a>

                        </td>
                      </tr>
                                    
                  <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>

          <!-- Contenido - FIN -->

        </div>
      </div>
    </div>
  </section>
</div>

 <?php

  include "footer.php";

?>