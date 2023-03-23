<?php  
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Boleta_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<?php

	include "../../conexion/conexion.php";
	
	$sqlid="SELECT MAX(idBoleta) FROM boleta";
	$idBol=mysqli_query($con,$sqlid);
	$idfinal=mysqli_fetch_assoc($idBol);
	$idBoleta = $idfinal['MAX(idBoleta)'];
	$sql="select db.cantidad,db.idProducto,p.NombreProducto,p.precio,db.importe,b.fecha_Emitida,c.NombreCliente,c.Dirreccion,b.subTotal,b.igv,b.total FROM detalle_boleta db INNER JOIN boleta b on db.idBoleta = b.idBoleta INNER JOIN producto p on p.idProducto= db.idProducto INNER JOIN cliente c on c.IDCliente = b.idCliente where b.idBoleta=$idBoleta";
		$resultado=mysqli_query($con,$sql);

	$sql2 = "select db.cantidad,db.idProducto,p.NombreProducto,p.precio,db.importe,b.fecha_Emitida,c.NombreCliente,c.Dirreccion,b.subTotal,b.igv,b.total FROM detalle_boleta db INNER JOIN boleta b on db.idBoleta = b.idBoleta INNER JOIN producto p on p.idProducto= db.idProducto INNER JOIN cliente c on c.IDCliente = b.idCliente where b.idBoleta=$idBoleta";
    $resultado2 = mysqli_query($con, $sql2);
    $fila2 = mysqli_fetch_assoc($resultado2)

  ?>
  <div class="container" style="width: 80%">
	<h3>Boleta</h3>
	<h4 class="d-block">Cliente:<?php echo $fila2['NombreCliente'] ?></h4>
	<h4 class="d-block">Dirección:<?php echo $fila2['Dirreccion'] ?></h4>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Cantidad</th>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Importe</th>
                <th></th>
			</tr>
		</thead>
			
		<tbody>
			<?php while ($fila=mysqli_fetch_assoc($resultado)) { ?>



			<tr>
				<td> <?php echo $fila['cantidad'] ?> </td>
                <td><?php echo $fila['idProducto'] ?></td>
                <td> <?php echo $fila['NombreProducto'] ?> </td>
                <td> <?php echo $fila['precio'] ?> </td>
                <td> <?php echo $fila['importe'] ?> </td>
                <td>
			</tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Subtotal: <?php echo $fila2['subTotal'] ?> </td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>I.G.V (18%): <?php echo $fila2['igv'] ?> </td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Total: <?php echo $fila2['total'] ?> </td>
			</tr>
		</tfoot>
	</table>
</div>