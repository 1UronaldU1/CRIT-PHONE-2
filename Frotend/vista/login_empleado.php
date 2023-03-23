<?php
$alert="";
if(!empty($_POST)){

  if(empty($_POST['txtusuario']) || empty($_POST['txtclave'])){

    $alert="No olvide ingresar el Usuario y la Clave";

  }else{

    require_once"../../conexion/conexion.php";

    $user=$_POST['txtusuario'];
    $pass=$_POST['txtclave'];

    $query=mysqli_query($con,"SELECT * FROM usuarioempleado u INNER JOIN empleado e ON u.idEmpleado = e.idEmpleado WHERE u.usuarioEmpleado='$user' AND u.claveEmpleado ='$pass'");
    $result=mysqli_num_rows($query);
    if ($result>0) {
      $data=mysqli_fetch_array($query);
      session_start();
      $_SESSION['user']=$data['idEmpleado'];
      $_SESSION['nombre']=$data['NombreEmpleado'];
      header('location:index_admin.php');
      }else{
      $alert="EL usuario y/o la clave son incorrectos..";
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="../public/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../public/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../public/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="../public/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../public/vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../css/util.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="../public/images/img-01.png" alt="IMG">
        </div>

        <form class="login100-form validate-form" method="post">
          <span class="login100-form-title">
            Bienvenido
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="txtusuario" placeholder="Usuario">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="txtclave" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
          </div>

          <div class="alert">
                <span class="badge bg-warning">
                  
                  <?php echo isset($alert)?$alert:'';?>

                </span>
              </div>

        </form>
      </div>
    </div>
  </div>
  
  

  
<!--===============================================================================================-->  
  <script src="../public/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../public/vendor/bootstrap/js/popper.js"></script>
  <script src="../public/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../public/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="../public/vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="../public/js/main_empleado.js"></script>

</body>
</html>