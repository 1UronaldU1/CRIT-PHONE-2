<?php

	ob_start();

	include "header.php";
  include "../../conexion/conexion.php";

	$busqueda=($_REQUEST['txtbusqueda']);
	if(empty($busqueda)){

		header("location:empleado_datos.php");
	}else{
		$sql="SELECT * FROM empleado
			 WHERE (idEmpleado  LIKE '%$busqueda%' OR 
        NombreEmpleado LIKE '%$busqueda%' OR 
        UsuarioEmpleado LIKE '%$busqueda%'OR 
        Dni LIKE '%$busqueda%')";
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

          <a href="añadir_producto.php" class="btn btn-success">Añadir</a>

          <a href="./listado_empleado_reporte_excel.php" class="btn btn-info">Exportar a Excel</a>
          <a href="./pdf_reporte_empleado.php" class="btn btn-info">Exportar a PDF</a>

          <!--INICIO FORMULARIO DE CONSULTA-->

          <form action="consulta_Lista_Empleado.php" method="get" class="float-right" style="display: flex;padding: 10px;">
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
                    <th>Nombre y Apellido</th>
                    <th>Telefono</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                    <th>Usuario</th>
                    <th>DNI</th>
                    <th></th>
                  </tr>
                </thead>
                                    
                <tbody>

                  <?php

                    while ($fila=mysqli_fetch_assoc($resultado)) { 

                  ?>

                  <tr>
                    <td> <?php echo $fila['idEmpleado'] ?> </td>

                    <td><?php echo $fila['NombreEmpleado'] ?></td>

                    <td> <?php echo $fila['Telefono'] ?> </td>

                    <td> <?php echo $fila['Dirreccion'] ?> </td>

                    <td> <?php echo $fila['Correo'] ?> </td>

                    <td> <?php echo $fila['UsuarioEmpleado'] ?> </td>

                    <td> <?php echo $fila['Dni'] ?> </td>

                    <td>

                      <a href="eliminar_empleado.php?id=<?php echo $fila['idEmpleado'] ?>" class="btn btn-danger">
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