<?php  

  ob_start();

    include "../../conexion/conexion.php";
    require_once "sesion_login.php";

    $fila['NombreCliente'] = "";
    $fila['Correo'] = "";
    if($idCliente != ""){

    $sql       = "select * from cliente where IDCliente = $idCliente ";
    $resultado = mysqli_query($con, $sql);
    $fila      = mysqli_fetch_assoc($resultado);
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/detalle/carrito/bootstrap.min.css">
    <link rel="stylesheet" href="../css/detalle/carrito/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/detalle/carrito/sweetalert2.min.css">

    <title>Carrito Compras</title>

</head>

<body>
    <header>
        <div class="container">
            <div class="row justify-content-between mb-5">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <a class="navbar-brand" href="../../index.php">CRIT PHONE</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </header>

    <br>

    <main>
        <div class="container">
            <div class="row mt-3">
                <div class="col">
                    <h2 class="d-flex justify-content-center mb-3">Realizar Compra</h2>
                    <form id="procesar-pago" action="" method="POST">
                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Cliente :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cliente"
                                    name="destinatario" value="<?php echo $fila['NombreCliente']?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-12 col-md-2 col-form-label h2">Correo :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="correo" name="cc_to"
                                value="<?php echo $fila['Correo'] ?>" readonly>
                            </div>
                        </div>

                        <div id="carrito-tabla" class="form-group table-responsive" >
                            <table class="table" id="lista-compra" >
                                <thead>
                                    <tr>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>

                                </thead>
                                <tbody >

                                </tbody>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">SUB TOTAL :</th>
                                    <th scope="col">
                                        <input id="subtotal" name="subtotal" class="font-weight-bold border-0" readonly style="background-color: white;"></input>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">IGV :</th>
                                    <th scope="col">
                                        <input id="igv" name="igv" class="font-weight-bold border-0" readonly style="background-color: white;"></input>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">TOTAL :</th>
                                    <th scope="col">
                                        <input id="total" name="total" class="font-weight-bold border-0" readonly style="background-color: white;"></input>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>

                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <a href="../../index.php" class="btn btn-info btn-block">Seguir comprando</a>
                            </div>
                            <div id="ocultar1" class="col-xs-12 col-md-4">
                                <button type="button" class="btn btn-success btn-block" id="procesar-compra" onclick="detalle()">Realizar compra</button>
                            </div>
                            <div id="ocultar" class="col-md-4 mb-2">
                                <a href="boleta.php" class="btn btn-info btn-block" target = "_BLANK">Detalle Boleta</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    </div>

    <script src="../js/detalle/jquery-3.4.1.min.js"></script>
    <script src="../js/detalle/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.3.2/dist/email.min.js"></script>

    <script src="../js/detalle/carrito.js"></script>
    <script src="../js/detalle/compra.js"></script>


</body>

</html>