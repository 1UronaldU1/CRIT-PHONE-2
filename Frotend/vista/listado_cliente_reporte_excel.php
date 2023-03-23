<?php 

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=listaProducto_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");

?>

<?php

	include "../../conexion/conexion.php";

	$sql="SELECT * FROM cliente ORDER BY IDCliente asc";
		$resultado=mysqli_query($con,$sql);

?>

<div class="container" style="width: 80%">
	<h3>Listado de Clientes</h3>
	<table class="table table-hover">
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

                <td></td>
                
			</tr>

		<?php } ?>

		</tbody>
	</table>
</div>