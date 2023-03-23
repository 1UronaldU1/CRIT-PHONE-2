<?php  
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=listaProducto_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<?php

	include "../../conexion/conexion.php";
	$sql="SELECT p.idProducto,p.NombreProducto,p.descripcion,c.nombreCategoria,m.nombreMarca,p.Cantidad,p.precio,p.F_Emitida FROM producto p INNER join categoria c ON p.idcategoria=c.idCategoria INNER JOIN marca m on p.idMarca =m.idMarca ORDER BY p.idProducto asc";
		$resultado=mysqli_query($con,$sql);

?>

<div class="container" style="width: 80%">
	<h3>Listado de Productos</h3>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
                <th>PRODUCTO</th>
                <!--<th>IMAGEN</th>-->
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
			<?php while ($fila=mysqli_fetch_assoc($resultado)) { ?>



			<tr>
				<td> <?php echo $fila['idProducto'] ?> </td>
                <td><?php echo $fila['NombreProducto'] ?></td>
                <td> <?php echo $fila['descripcion'] ?> </td>
                <td> <?php echo $fila['nombreCategoria'] ?> </td>
                <td> <?php echo $fila['nombreMarca'] ?> </td>
                <td> <?php echo $fila['Cantidad'] ?> </td>
                <td> <?php echo $fila['precio'] ?> </td>
                <td> <?php echo $fila['F_Emitida'] ?> </td>
                <td></td>
			</tr>



			<?php } ?>
		</tbody>
	</table>
</div>