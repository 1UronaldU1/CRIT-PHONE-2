<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=listaEmpleado_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");

?>

<?php

	include "../../conexion/conexion.php";

	$sql="SELECT * FROM empleado ORDER BY idEmpleado asc";
		$resultado=mysqli_query($con,$sql);

?>

<div class="container" style="width: 80%">
	<h3>Listado de Empleado</h3>
	<table class="table table-hover">
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

                <td> <?php echo $fila['usuarioEmpleado'] ?> </td>

                <td> <?php echo $fila['Dni'] ?> </td>
                

			</tr>

		<?php } ?>

		</tbody>
	</table>
</div>