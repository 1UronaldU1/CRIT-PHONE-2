<?php

ob_start();

include "../../conexion/conexion.php";

require_once "login_empleado_2.php";

include "header.php";

$sql       = "select * from empleado where idEmpleado = $id ";
$resultado = mysqli_query($con, $sql);
$fila      = mysqli_fetch_assoc($resultado)

?>

<?php

include "../../conexion/conexion.php";

//<!--Inicio de PAGINACION -->

$sql_registro       = mysqli_query($con, "SELECT count(*) as total_registro FROM empleado");
$resultado_regsitro = mysqli_fetch_array($sql_registro);
$total_registro     = $resultado_regsitro['total_registro'];
$por_pagina         = 5;

if (empty($_GET['pagina'])) {
    $pagina = 1;
} else {
    $pagina = $_GET['pagina'];
}

$desde         = ($pagina - 1) * $por_pagina;
$total_paginas = ceil($total_registro / $por_pagina);

//<!--Fin de PAGINACION -->

$sql1       = "select * from empleado ORDER BY idEmpleado asc LIMIT $desde,$por_pagina";
$resultado1 = mysqli_query($con, $sql1);

?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
  <div class="content">
    <div class="container-fluid">
		<br>
			<div class="row mb-2">
				<div class="col-md-5">
						<form action="" method="post" style="width: 600px"  >
							<div class="card" style="width: 500px">
								<div class="card-body" >
									<h2 class="" style="text-align: center;">Datos del empleado</h2>

										<div class="mb-3">
											<br>
											<label>ID</label>
											<input type="text" name="txtid" value="<?php echo $fila['idEmpleado'] ?>" class="form-control" disabled >
										</div>

										<div class="mb-3">
											<label>Nombre y Apellido del Empleado</label>
											<input type="text" name="txtnom" value="<?php echo $fila['NombreEmpleado'] ?>" class="form-control" >
										</div>

										<div class="mb-3">
											<label>Telefono</label>
											<input type="text" name="txttel" value="<?php echo $fila['Telefono'] ?>" class="form-control" >
										</div>

										<div class="mb-3">
											<label>Dirección</label>
											<input type="text" name="txtdir" value="<?php echo $fila['Dirreccion'] ?>" class="form-control">
										</div>

										<div class="mb-3">
											<label>Correo</label>
											<input type="email" name="txtcor" value="<?php echo $fila['Correo'] ?>" class="form-control" >
										</div>

										<div class="mb-3">
											<label>Usuario del Empleado</label>
											<input type="text" name="txtusu" 
											value="<?php echo $fila['UsuarioEmpleado'] ?>" class="form-control">
										</div>

										<div class="mb-3">
											<label>DNI</label>
											<input type="text" name="txtdni" value="<?php echo $fila['Dni'] ?>" class="form-control" >
										</div>

										<div class="mb-3">
											<input type="submit" value="Actualizar" class="btn btn-primary">
											<a href="listado_producto.php" class="btn btn-outline-info">Productos</a>
										</div>

									</div>
								</div>
							</form>
						</div>
					<div class="col-md-6 " >
						<table>
							<tr>
								<td>
									<a href="añadir_empleado.php" class="btn btn-success"  >Añadir</a>
								</td>

		          	<td>
		          		<a href="./listado_empleado_reporte_excel.php" class="btn btn-info">Exportar a Excel</a>
		          	</td>

		          	<td>
		          		<a href="./pdf_reporte_empleado.php" class="btn btn-info">Exportar a PDF</a>
		          	</td>

		          	<td>
		          		<form action="consulta_lista_empleado.php" method="get" class="float-right" style="display: flex;padding: 10px;">
		                <input type="text" name="txtbusqueda" placeholder="Buscar" class="form-control">
		                <input type="submit" name="Buscar" class="btn btn-primary" style="margin-left: 10px; ">
		              </form>
		            </td>
		          </tr>
	          </table>

		      	<br>

						<form action="" method="post" class="float-right" style="display: flex;width: auto;">
							<table class="table table-striped nowrap table-bordered" style="width: auto;">
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

	              	while ($fila1 = mysqli_fetch_assoc($resultado1)) {

	              ?>

	                <tr>

	                  <td> <?php echo $fila1['idEmpleado'] ?> </td>

	                  <td><?php echo $fila1['NombreEmpleado'] ?></td>

	                  <td> <?php echo $fila1['Telefono'] ?> </td>

	                  <td> <?php echo $fila1['Dirreccion'] ?> </td>

	                  <td> <?php echo $fila1['Correo'] ?> </td>

	                  <td> <?php echo $fila1['UsuarioEmpleado'] ?> </td>

	                  <td> <?php echo $fila1['Dni'] ?> </td>

	                  <td>

	                    <?php if ($fila1['Activo'] != 0 ) { ?>
	                      
	                      <a href="eliminar_empleado.php?id=<?php echo $fila1['idEmpleado'] ?>" class="btn btn-danger">
	                      	<i class="far fa-trash-alt size:3x"></i>
	                      </a>

	                    <?php  }else{ ?>

	                      <a href="activar_empleado.php?id=<?php echo $fila1['idEmpleado'] ?>" class="btn btn-primary">Activar</a>

	                   <?php   } ?>

	                  </td>
	                </tr>

								<?php

								}

								?>
	              </tbody>

							</table>
						</form>
					</div>
				</div>
	  		<nav aria-label="Page navigation example">
	    		<ul class="pagination justify-content-center">
	      	<li class="page-item ">
	        	<a class="page-link" href="?pagina=<?php echo 1; ?>">Primero</a></li>
	      	<li class="page-item">
	        	<a class="page-link" href="?pagina=<?php echo $pagina - 1; ?>">Anterior</a></li>

						<?php

						for ($i = 1; $i <= $total_paginas; $i++) {
						    if ($i == $pagina) {
						        echo '<li class="page-item active"><a class="page-link" href="?pagina=' . $i . '">' . $i . '</a></li>';
						    } else {
						        echo '<li class="page-item">
						              <a class="page-link" href="?pagina=' . $i . '">' . $i . ' </a> </li>';
						    }
						}

						?>
	        <li class="page-item">
	          <a class="page-link" href="?pagina=<?php echo $pagina + 1; ?>">Siguente</a></li>
	        <li class="page-item">
	          <a class="page-link" href="?pagina=<?php echo $total_paginas; ?>">ULTIMO</a></li>
	    	</ul>
	  	</nav>
	    <!--PAGINA NACION FIN-->
		</div>
	</div>
</div>

<?php

include "../../conexion/conexion.php";

if (!empty($_REQUEST['txtid']) || !empty($_REQUEST['txtnom']) || !empty($_REQUEST['txtusu'])) {
    $cod = $_REQUEST['txtid'];
    $nom = $_REQUEST['txtnom'];
    $tel = $_REQUEST['txttel'];
    $dir = $_REQUEST['txtdir'];
    $cor = $_REQUEST['txtcor'];
    $usu = $_REQUEST['txtusu'];
    $dni = $_REQUEST['txtdni'];

    $sql = "UPDATE empleado SET NombreEmpleado='$nom',Telefono='$tel',Dirreccion='$dir',Correo='$cor',UsurioEmpleado='$usu',Dni='$dni' WHERE idEmpleado ='$cod' ";
    mysqli_query($con, $sql);
    if ($nom = 1) {
        header("location:empleado_datos.php");
    }
}

include "footer.php";

?>