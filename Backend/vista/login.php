<?php

/*=============================================
Login
=============================================*/

$alert = "";

if (!empty($_POST)) {

	if (empty($_POST['txtusuario']) || empty($_POST['txtclave'])) {
		$alert = "No olvide ingresar el Usuario y la Clave";

	}else {

		include "../../conexion/conexion.php";

		$user = $_POST['txtusuario'];
		$pass = $_POST['txtclave'];

		$query  = mysqli_query($con, "SELECT * FROM usuariocliente u INNER JOIN cliente e ON u.idCliente = e.IDCliente WHERE e.UsuarioCliente='$user' AND u.claveCliente ='$pass'");

		$result = mysqli_num_rows($query);

		if ($result > 0) {

			$data = mysqli_fetch_array($query);

			session_start();

			$_SESSION['user']   = $data['idCliente'];
			$_SESSION['nombre'] = $data['NombreCliente'];

			header('location:../../index.php');

		}else {

			$alert = "EL usuario y/o la clave son incorrectos..";
		}

	}

}

?>

<!--=====================================
Cabeza
======================================-->

<!DOCTYPE html>
<html>
<head>

	 <link rel="shortcut icon" href="../images/tienda/logotipo.ico" type="image/x-icon">

	<title>Login</title>

	<!-- Bootsrap 4 -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<!-- Fontawesome -->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->

	<link rel="stylesheet" type="text/css" href="../css/login/style.css">

	<link rel="stylesheet" type="text/css" href="../css/login/estilo.css">

	<link rel="stylesheet" type="text/css" href="../css/login/login.css">

</head>

<!--=====================================
Cuerpo
======================================-->

<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card contenido">
				<div class="card-header">
					<h3>Iniciar sesión</h3>
					<div class="d-flex justify-content-end social_icon">
						<span>
							<a href="https://www.facebook.com/RonaldUvirgo/" target="_blank"><i class="fab fa-facebook-square"></a></i>
						</span>
					</div>
				</div>
				<div class="card-body">
					<form action="" method="post">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control" name="txtusuario" placeholder="nombre de usuario">

						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" name="txtclave" placeholder="contreseña">
						</div>

						<div class="input-group form-group">
							<input type="submit" value="Acceso" class="btn btn-warning float-right">
						</div>

						<div class="alert">
							<span class="badge bg-warning">

								<?php echo $alert; ?>

							</span>
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links enlaces">
						<a href="crear_cliente.php">Crear Cuenta</a>
						<a href="../../index.php">Tienda Online</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>