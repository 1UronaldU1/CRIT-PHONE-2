<?php

ob_start();

include "../../conexion/conexion.php";
require_once "sesion_login.php";

/*=============================================
Seleción de producto por id
=============================================*/

$cod       = $_REQUEST['id'];
$sql       = "select*from producto where IdProducto='$cod'";
$resultado = mysqli_query($con, $sql);
$fila      = mysqli_fetch_assoc($resultado);

?>

<!--=====================================
Cabeza
======================================-->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta del sitio -->

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--<meta name="description" content="" />
    <meta name="author" content="" /> -->

    <title>CRIT PHONE</title>

    <!-- Favicon-->

    <link rel="shortcut icon" href="../images/tienda/logotipo.ico" type="image/x-icon">

    <!-- Bootstrap icons-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Core theme CSS (includes Bootstrap)-->
    
    <link href="../css/detalle/styles.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>

<!--=====================================
Cuerpo
======================================-->

<body>

    <!-- Navegación-->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">

            <a class="navbar-brand" href="../../index.php">CRIT PHONE</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="../../../index.php">Inicio</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" id="navbarDropdown" 
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Celulares</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="celulares.php">Todas</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="celulares.php?marca=1">Huawei</a></li>
                            <li><a class="dropdown-item" href="celulares.php?marca=2">Apple</a></li>
                            <li><a class="dropdown-item" href="celulares.php?marca=3">Samsung</a></li>
                            <li><a class="dropdown-item" href="celulares.php?marca=4">Xiaomi</a></li>
                            <li><a class="dropdown-item" href="celulares.php?marca=5">Philips</a></li>
                            <li><a class="dropdown-item" href="celulares.php?marca=6">Enfundado</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" id="navbarDropdown" 
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Accseorio</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="accesorios.php">Todas</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="accesorios.php?categoria=1">Celular</a></li>
                            <li><a class="dropdown-item" href="accesorios.php?categoria=2">Audifonos</a></li>
                            <li><a class="dropdown-item" href="accesorios.php?categoria=3">Protectores</a></li>
                            <li><a class="dropdown-item" href="accesorios.php?categoria=4">Parlantes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contactos</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <img src="../images/detalle/cart.jpeg" class="nav-link dropdown-toggle img-fluid" height="70px"
                                    width="70px" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"></img>
                                <div id="carrito" class="dropdown-menu" aria-labelledby="navbarCollapse">
                                    <table id="lista-carrito" class="table">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>

                                    <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block">Vaciar Carrito</a>
                                    <a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Procesar
                                        Compra</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <!-- Sección de productos-->

    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5 " id="lista-productos">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img class="card-img-top mb-5 mb-md-0" id="fotoCP" src="../../Frotend/img/productos/<?php echo $fila['imagen']; ?>" alt="Imagen Producto" /></div>
                <div class="col-md-6">
                    <div class="small mb-1" ><?php echo $fila['idProducto'] ?></div>
                    <h1 class="display-5 fw-bolder" id="nombreP"><?php echo $fila['NombreProducto'] ?></h1>
                    <div class="fs-5 mb-5" id="precioP">
                        $<span class="text-decoration-line-through precio" ><?php echo $fila['precio'] ?></span>
                    </div>
                    <p class="lead"><?php echo $fila['descripcion'] ?></p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                        <a class="btn btn-block btn-primary agregar-carrito" id="btncomprar" data-id="<?php echo $fila['idProducto'] ?>">
                            <i class="bi-cart-fill me-1"></i>
                            Agregar Carrito
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

    include "../../conexion/conexion.php";

    /*=============================================
    Seleción de producto por marca
    =============================================*/


    $marca=$fila['idMarca'];
    $sql2  = "select*from producto where idMarca=$marca and idProducto != $cod limit 4";
    $resultado2 = mysqli_query($con, $sql2);

    ?>

    <!-- Sección de artículos relacionados-->

    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Relación del Producto</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php

                /*=============================================
                Llamar los productos
                =============================================*/ 

                    while($fila2=mysqli_fetch_assoc($resultado2)){ 

                ?>
                    <div class="col mb-5">
                        <div class="card h-100">

                            <!-- Imagen del producto-->

                            <img class="card-img-top" src="../../Frotend/img/productos/<?php echo $fila2['imagen']; ?>" 
                            alt="Imagen Producto" />

                            <!-- Detalles de producto-->

                            <div class="card-body p-4">
                                <div class="text-center">

                                    <!-- Nombre del producto-->

                                    <h5 class="fw-bolder"><?php echo $fila2['NombreProducto'] ?></h5>

                                    <!-- Precio del producto-->

                                    $<?php echo $fila2['precio'] ?>

                                </div>
                            </div>

                            <!-- Acciones de productos-->

                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" 
                                    href="detalle_producto.php?id=<?php echo $fila2['idProducto'];?>">Ver Detalles</a></div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </section>

    <!-- Pie de página -->

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white"><a href="https://www.facebook.com/RonaldUvirgo">OnePice.</a>&copy;  Reservados todos los derechos.</p>
        </div>
    </footer>

    <!-- Bootstrap core JS-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS -->
    
    <script src="../js/detalle/jquery-3.4.1.min.js"></script>

    <script src="../js/detalle/bootstrap.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../js/detalle/carrito.js"></script>

    <script src="../js/detalle/pedido.js"></script>
    
</body>
</html>
