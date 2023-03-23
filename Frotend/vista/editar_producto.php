<?php

	ob_start();

	include "header.php";
    include "../../conexion/conexion.php";

	$cod=$_REQUEST['id'];
	$sql="select * from producto where IdProducto='$cod'";
	$resultado=mysqli_query($con,$sql);
	while($fila=mysqli_fetch_assoc($resultado)){

?>

<div class="container" style="width: 80%">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card" style="width: 25rem">
			<div class="card-body">
				<h2 class="card-title">Actualizar Productos</h2>

				<div class="mb-3">

					<input type="text" name="txtid" value="<?php echo $fila['idProducto'] ?>" class="form-control">
				</div>

				<div class="mb-3">
					<label>Producto</label>
					<input type="text" name="txtpro" value="<?php echo $fila['NombreProducto'] ?>" class="form-control">
				</div>

				<div class="mb-3">
					<label>Descripcion</label>
					<input type="text" name="txtdes" value="<?php echo $fila['descripcion'] ?>" class="form-control">
				</div>

                <div class="mb-3">
                	<label for="formFileSm" class="form-label">Imagen</label>
                	<input class="form-control form-control-sm" id="formFileSm" value="<?php echo base64_encode( $fila['imagen']) ?>" name="ctfimagen" type="file">
                </div>

      			
				<div class="mb-3">
					<label>Categoría</label>

					<select name="cbocategoria" class="form-control">

						<?php

							$consulta="SELECT idCategoria,nombreCategoria FROM categoria";
							$ejecutar=mysqli_query($con,$consulta)or die($xx);
							$seleccionado=$fila['idCategoria']

						?>

						<?php foreach ($ejecutar as $opciones):?>

							<option value="<?php echo $opciones['idCategoria']?>" <?php if($seleccionado == $opciones['idCategoria']):?>selected <?php endif; ?>><?php echo $opciones['nombreCategoria']?> </option>

						<?php endforeach ?>

					</select>

				</div>

				<div class="mb-3">
					<label>Marca</label>

					<select name="cbomarca" class="form-control">

						<?php

							$consulta="SELECT idMarca,nombreMarca FROM marca";
							$ejecutar=mysqli_query($con,$consulta)or die($xx);
							$seleccionado=$fila['idMarca']

						?>

						<?php foreach ($ejecutar as $opciones):?>

							<option value="<?php echo $opciones['idMarca']?>" <?php if($seleccionado == $opciones['idMarca']):?>selected <?php endif; ?>><?php echo $opciones['nombreMarca']?> </option>

						<?php endforeach ?>

					</select>

				</div>

				<div class="mb-3">
					<label>Cantidad</label>
					<input type="number" name="txtcant" class="form-control" value="<?php echo $fila['Cantidad'] ?>" >
				</div>

				<div class="mb-3">
					<label>Precio</label>
					<input type="text" name="txtprec" class="form-control" value="<?php echo $fila['precio'] ?>">
				</div>

				<div class="mb-3">
					<label>Fecha de Emitenté</label>
					<input type="date" name="dtFecha" class="form-control" value="<?php echo $fila['F_Emitida'] ?>">
				</div>

				<div class="mb-3">
					<input type="submit" value="Actualizar" class="btn btn-primary">
					<a href="listado_producto.php" class="btn btn-outline-info">Retornar</a>
				</div>

			</div>
		</div>
	</form>

<?php

	}

?>

</div>

<?php

	if (!empty($_REQUEST['txtid'])|| !empty($_REQUEST['txtpro'])){
		$cod=$_REQUEST['txtid'];
		$producto=$_REQUEST['txtpro'];
		$descripcion=$_REQUEST['txtdes'];
		$categoria=$_REQUEST['cbocategoria'];
		$marca=$_REQUEST['cbomarca'];
		$cantidad=$_REQUEST['txtcant'];
		$precio=$_REQUEST['txtprec'];
		$fecha=$_REQUEST['dtFecha'];
		if($_FILES['ctfimagen']['tmp_name'] != null){

			$imagen_tmp=$_FILES['ctfimagen']['tmp_name'];
		    $imagen_nombre=$_FILES['ctfimagen']['name'];
		    move_uploaded_file($imagen_tmp,$_SERVER['DOCUMENT_ROOT'].'/crit-phone-2/Frotend/img/productos/'.$imagen_nombre);

        $sql="UPDATE producto SET NombreProducto='$producto',descripcion='$descripcion',imagen='$imagen_nombre',idCategoria='$categoria',idMarca='$marca',Cantidad='$cantidad',precio='$precio',F_Emitida='$fecha' WHERE IdProducto ='$cod' ";
	    }else{
	        $sql="UPDATE producto SET NombreProducto='$producto',descripcion='$descripcion',idCategoria='$categoria',idMarca='$marca',Cantidad='$cantidad',precio='$precio',F_Emitida='$fecha' WHERE IdProducto ='$cod' ";
	    }
		mysqli_query($con,$sql);
		if ($prod=1){
			header("location:listado_producto.php");
		}

	}

?>

<?php 

	include "footer.php";
	
?>