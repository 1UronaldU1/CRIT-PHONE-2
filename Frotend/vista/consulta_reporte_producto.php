<?php

  include "../../conexion/conexion.php";
	$sql="SELECT idCategoria,nombreCategoria FROM categoria";
	$resultado=mysqli_query($con,$sql);

?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Reportes</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	</head>

	<body>

		<center>

			<h2>Generar Reporte de Producto</h2>

				<form action="pdf_Reporte_Producto_Categoria.php" method="post" autocomplete="off">

					<select id="cboCategoria" name="cboCategoria" class="form-control" style="width:250px;">

						<option value="">Seleccione la Categoria </option>

							<?php while ($fila=$resultado->fetch_assoc()) { ?>

						<option value="<?php echo $fila['idCategoria']; ?>">

							<?php echo $fila['nombreCategoria']; ?> </option>

							<?php 

								}

							?>

					</select>

					<br>
					<button type="submit" class="btn btn-success">Generar Reporte </button>
					<a href="./reporte_producto_general.php" class="btn btn-info">Generar Reporte General</a>
				</form>
		</center>
	</body>
</html>