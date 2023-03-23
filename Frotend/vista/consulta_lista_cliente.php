<?php
  ob_start();
    include "header.php";
    include "../../conexion/conexion.php";

    $busqueda=($_REQUEST['txtbusqueda']);
    if(empty($busqueda)){

      header("location:listado_producto.php");
    }else{
      $sql="SELECT * FROM cliente WHERE (IDCliente LIKE '%$busqueda%' OR 
          NombreCliente LIKE '%$busqueda%' OR 
          UsuarioCliente LIKE '%$busqueda%'OR 
          Dirreccion LIKE '%$busqueda%' OR 
          Dni LIKE '%$busqueda%' )";
        $resultado=mysqli_query($con,$sql);

    }
    
?>

<br>

<div class="content-wrapper">
  <section class="content" >
    <div class="container-fluid">

      <!-- Cajas pequeñas (caja de estadísticas) -->

      <div class="row">
        <div class="col-lg-12">

          <!-- Contenido - INICIO -->
          <a href="añadir_cliente.php" class="btn btn-success">Añadir</a>

          <a href="./listado_cliente_reporte_excel.php" class="btn btn-info">Exportar a Excel</a>
          <a href="./consulta_reporte_cliente_pdf.php" class="btn btn-info">Exportar a PDF</a>

          <!--INICIO FORMULARIO DE CONSULTA-->

          <form action="consulta_lista_cliente.php" method="get" class="float-right" style="display: flex;padding: 10px;">
            <input type="text" name="txtbusqueda" placeholder="Buscar" class="form-control">
            <input type="submit" name="Buscar" class="btn btn-primary" style="margin-left: 10px; ">
          </form>

          <!--FINAL DEL FORMULARIO DE CONSULTA-->
          <div class="iq-card-body">
            <div class="tale-responsive">
              <table class="table table-striped nowrap table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>NOMBRE CLIENTE</th>
                    <th>USUARIO</th>
                    <th>TELEFONO</th>
                    <th>DIRRECIÓN</th>
                    <th>CORREO</th>
                    <th>DNI</th>
                    <th>FECHA EMITIDA</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>

                <?php

                  while ($fila=mysqli_fetch_assoc($resultado)) { 

                ?>

                  <tr>
                     <td> <?php echo $fila['IDCliente'] ?> </td>

                    <td><?php echo $fila['NombreCliente'] ?></td>

                    <td><?php echo $fila['UsuarioCliente'] ?></td>

                    <td> <?php echo $fila['Telefono'] ?> </td>

                    <td> <?php echo $fila['Dirreccion'] ?> </td>

                    <td> <?php echo $fila['Correo'] ?> </td>

                    <td> <?php echo $fila['Dni'] ?> </td>

                    <td> <?php echo $fila['fecha_Emitida'] ?> </td>

                    <td>

                      <a href="editar_cliente.php?id=<?php echo $fila['IDCliente'] ?>" class="btn btn-warning">
                        <i class="fas fa-edit size:3x"></i>
                      </a>

                      <a href="eliminar_cliente.php?id=<?php echo $fila['IDCliente'] ?>" class="btn btn-danger">
                        <i class="far fa-trash-alt size:3x"></i>
                      </a>

                    </td>

                  </tr>

                <?php

                  } 

                ?>

                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php

  include "footer.php";
  
?>