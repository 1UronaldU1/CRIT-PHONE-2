<?php

	ob_start();

	include "header.php";
    include "../../conexion/conexion.php";

	$cod=$_REQUEST['id'];
	$sql="select * from banner where id_banner='$cod'";
	$resultado=mysqli_query($con,$sql);
	while($fila=mysqli_fetch_assoc($resultado)){

?>

<div class="container" style="width: 80%">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card" style="width: 25rem">
			<div class="card-body">
				<h2 class="card-title">Actualizar Banner</h2>

				<div class="mb-3">

					<input type="text" name="txtid" value="<?php echo $fila['id_banner'] ?>" class="form-control">
				</div>

				<div class="mb-3">
					<label>Producto</label>
					<input type="text" name="txtpro" value="<?php echo $fila['nombre_producto'] ?>" class="form-control">
				</div>

				<div class="mb-3">
                	<label for="formFileSm" class="form-label">Imagen</label>
                	<input class="form-control form-control-sm" id="formFileSm" value="<?php echo base64_encode( $fila['imagen']) ?>" name="ctfimagen" type="file">
                </div>

				<div class="mb-3">
					<label>Descripcion</label>
					<input type="text" name="txtdes" value="<?php echo $fila['descripcion'] ?>" class="form-control">
				</div>

				<div class="mb-3">
					<label>Producto</label>
					<input type="text" name="txtpro_1" value="<?php echo $fila['nombre_producto_1'] ?>" class="form-control">
				</div>

				<div class="mb-3">
                	<label for="formFileSm" class="form-label">Imagen</label>
                	<input class="form-control form-control-sm" id="formFileSm" value="<?php echo base64_encode( $fila['imagen_1']) ?>" name="ctfimagen_1" type="file">
                </div>

				<div class="mb-3">
					<label>Descripcion</label>
					<input type="text" name="txtdes_1" value="<?php echo $fila['descripcion_1'] ?>" class="form-control">
				</div>

				<div class="mb-3">
					<label>Producto</label>
					<input type="text" name="txtpro_2" value="<?php echo $fila['nombre_producto_2'] ?>" class="form-control">
				</div>

				<div class="mb-3">
                	<label for="formFileSm" class="form-label">Imagen</label>
                	<input class="form-control form-control-sm" id="formFileSm" value="<?php echo base64_encode( $fila['imagen_2']) ?>" name="ctfimagen_2" type="file">
                </div>

				<div class="mb-3">
					<label>Descripcion</label>
					<input type="text" name="txtdes_2" value="<?php echo $fila['descripcion_2'] ?>" class="form-control">
				</div>

				<div class="mb-3">
					<input type="submit" value="Actualizar" class="btn btn-primary">
					<a href="lista_banner.php" class="btn btn-outline-info">Retornar</a>
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

		$producto_1=$_REQUEST['txtpro_1'];
		$descripcion_1=$_REQUEST['txtdes_1'];

		$producto_2=$_REQUEST['txtpro_2'];
		$descripcion_2=$_REQUEST['txtdes_2'];
		
		if($_FILES['ctfimagen']['tmp_name'] != null){
			$imagen_tmp=$_FILES['ctfimagen']['tmp_name'];
	      	$imagen_nombre=$_FILES['ctfimagen']['name'];
	      	move_uploaded_file($imagen_tmp,$_SERVER['DOCUMENT_ROOT'].'/crit-phone-2/Frotend/img/productos/'.$imagen_nombre);

	      	$imagen_tmp_1=$_FILES['ctfimagen_1']['tmp_name'];
	      	$imagen_nombre_1=$_FILES['ctfimagen_1']['name'];
	      	move_uploaded_file($imagen_tmp_1,$_SERVER['DOCUMENT_ROOT'].'/crit-phone-2/Frotend/img/productos/'.$imagen_nombre_1);

	      	$imagen_tmp_2=$_FILES['ctfimagen_2']['tmp_name'];
	      	$imagen_nombre_2=$_FILES['ctfimagen_2']['name'];
	      	move_uploaded_file($imagen_tmp_2,$_SERVER['DOCUMENT_ROOT'].'/crit-phone-2/Frotend/img/productos/'.$imagen_nombre_2);
  
        	$sql="UPDATE banner SET nombre_producto='$producto', imagen='$imagen_nombre' ,descripcion='$descripcion', nombre_producto_1='$producto_1' ,imagen_1='$imagen_nombre_1',descripcion='$descripcion_1',nombre_producto_2='$producto_2',imagen_2='$imagen_nombre_2',descripcion_2='$descripcion_2' WHERE id_banner ='$cod' ";
	    }else{
	        $sql="UPDATE banner SET nombre_producto='$producto' ,descripcion='$descripcion', nombre_producto_1='$producto_1', descripcion='$descripcion_1',nombre_producto_2='$producto_2',descripcion_2='$descripcion_2' WHERE id_banner ='$cod' ";
	    }
		mysqli_query($con,$sql);
		if ($prod=1){
			header("location:lista_banner.php");
		}

	}

?>

<?php 

	include "footer.php";
	
?>