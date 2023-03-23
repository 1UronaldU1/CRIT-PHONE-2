<?php

	ob_start();

	include "header.php";
  include "../../conexion/conexion.php";

	$busqueda=($_REQUEST['txtbusqueda']);
	if(empty($busqueda)){

		header("location:listado_producto.php");
	}else{
		$sql="SELECT p.idProducto,p.NombreProducto,p.descripcion,p.imagen,c.nombreCategoria,m.nombreMarca,p.Cantidad,p.precio,p.F_Emitida FROM producto p INNER join categoria c ON p.idcategoria=c.idCategoria INNER JOIN marca m on p.idMarca =m.idMarca
			 WHERE (p.idProducto LIKE '%$busqueda%' OR 
        p.NombreProducto LIKE '%$busqueda%' OR 
        c.nombreCategoria LIKE '%$busqueda%'OR 
        m.nombreMarca LIKE '%$busqueda%')";
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

          <a href="añadirProducto.php" class="btn btn-success">Añadir</a>

          <a href="./listado_producto_reporte_excel.php" class="btn btn-info">Exportar a Excel</a>
          <a href="./consulta_reporte_producto.php" class="btn btn-info">Exportar a PDF</a>

          <!--INICIO FORMULARIO DE CONSULTA-->

          <form action="consulta_Lista_Producto.php" method="get" class="float-right" style="display: flex;padding: 10px;">
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
                      <th>PRODUCTO</th>
                      <th>IMAGEN</th>
                      <th>DESCRIPCION</th>
                      <th>CATEGORIA</th>
                      <th>MARCA</th>
                      <th>CANTIDAD</th>
                      <th>PRECIO</th>
                      <th>FECHA EMITIDA</th>
                      <th></th>
                    </tr>
                  </thead>
                                    
                  <tbody>

                  <?php 

                    while ($fila=mysqli_fetch_assoc($resultado)) { 

                  ?>

                    <tr>
                      <td> <?php echo $fila['idProducto'] ?> </td>

                      <td><?php echo $fila['NombreProducto'] ?></td>

                      <td> 
                        <img width="100" src="data:image/png;base64,<?php echo base64_encode( $fila['imagen']); ?>">
                      </td>
                      
                      <td> <?php echo $fila['descripcion'] ?> </td>

                      <td> <?php echo $fila['nombreCategoria'] ?> </td>

                      <td> <?php echo $fila['nombreMarca'] ?> </td>

                      <td> <?php echo $fila['Cantidad'] ?> </td>

                      <td> <?php echo $fila['precio'] ?> </td>

                      <td> <?php echo $fila['F_Emitida'] ?> </td>

                      <td>
                        <a href="editar_producto.php?id=<?php echo $fila['idProducto'] ?>" class="btn btn-warning"><i class="fas fa-edit size:3x"></i></a>
                        <a href="eliminar_producto.php?id=<?php echo $fila['idProducto'] ?>" class="btn btn-danger"><i class="far fa-trash-alt size:3x"></i></a>

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