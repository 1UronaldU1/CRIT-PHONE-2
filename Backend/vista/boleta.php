<!-- Modal -->

<?php 

include "../../conexion/conexion.php";

$sqlid="SELECT MAX(idBoleta) FROM boleta";
$idBol=mysqli_query($con,$sqlid);
$idfinal=mysqli_fetch_assoc($idBol);
$idBoleta = $idfinal['MAX(idBoleta)'];

$sql       = "SELECT db.cantidad,db.idProducto,p.NombreProducto,p.precio,db.importe FROM detalle_boleta db INNER JOIN producto p on p.idProducto= db.idProducto where db.idBoleta=$idBoleta";
$resultado = mysqli_query($con, $sql);

$sql2       = "SELECT b.fecha_Emitida, b.subTotal, b.igv, b.total, c.NombreCliente, c.Dirreccion from boleta b Inner Join cliente c on c.IDCliente = b.idCliente  WHERE b.idBoleta=$idBoleta";
$resultado2 = mysqli_query($con, $sql2);
$fila2 = mysqli_fetch_assoc($resultado2);

?>

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
    <div class="container">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detalle venta</h5>
          </div>
          <div class="modal-body">
           <div class="row">
               <div class="col-lg-12 text-center">
                   <p  style="font-size: 13px;">CRIT PHONE</p>
                   <span style="font-size: 13px;" class="d-block">Mz Q lt 17 Sector Nazreno,San Juan de Miraflores</span>
                   <span style="font-size: 13px;" class="d-block">LIMA-LIMA-LIMA</span>
                   <span style="font-size: 13px;" class="d-block">RUC:  74054715</span>
                   <span style="font-size: 13px;" class="d-block">TEL:  951783881</span>
                   <span style="font-size: 13px;" class="d-block">EMAIL:  ronald_M_Q_2015@outlook.es</span>
                   <span style="font-size: 13px;" class="d-block">BOLETA ELECTRÓNICA</span>
                   <span style="font-size: 13px;" class="d-block">=============================================</span>
                   <span style="font-size: 13px;" class="d-block">FECHA: <?php echo $fila2['fecha_Emitida'] ?>  </span>
                   <span style="font-size: 13px;" class="d-block">=============================================</span>
                   <span style="font-size: 13px;" class="d-block">CLIENTE: <?php echo $fila2['NombreCliente'] ?></span>
                   <span style="font-size: 13px;" class="d-block">DIRRECIÓN: <?php echo $fila2['Dirreccion'] ?>  </span>
                   <span style="font-size: 13px;" class="d-block">MONEDA: SOLES</span>
                   <span style="font-size: 13px;" class="d-block">=============================================</span>
                <div>
                   <table class="table table-borderless" style="font-size: 13px;">
                        <thead>
                            <tr style="border-bottom: 1px solid black;">
                                <th class="text-center p-0">CANT</th>
                                <th class="p-0">DESCRIPCIÓN</th>
                                <th class=" p-0 text-center">PRECIO</th>
                                <th class="text-center p-0">IMPORTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td align="center" class="p-0"><?php echo $fila['cantidad'] ?></td>
                                <td class="p-0"><?php echo $fila['idProducto'] ?><?php echo $fila['NombreProducto'] ?></td>
                                <td align="center" class="p-0"><?php echo $fila['precio'] ?></td>
                                <td align="center" class="p-0"><?php echo $fila['importe'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot >
                            <tr style="border-top: 1px solid black;">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="font-size: 13px;" class="text-right d-block p-0">Subotal:<?php echo $fila2['subTotal'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="font-size: 13px;" class="text-right d-block p-0">I.G.V (18%): <?php echo $fila2['igv'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="font-size: 13px;" class="text-right d-block p-0">Total: <?php echo $fila2['total'] ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    <span style="font-size: 13px;" class="d-block">GRACIAS POR SU COMPRA</span>
                    <span style="font-size: 13px;" class="d-block">NO SE ACEPTAN CAMBIOS NI DEVOLUCIONES</span>
                </div>
               </div>
           </div>
          </div>
          <div class="modal-footer">
            <a href="compra.php"><button type="button" class="btn btn-secondary">Regresar</button></a>
            <a href="listado_boleta_Reporte_Excel.php"><button type="button" class="btn btn-success"><i class="far fa-file-excel"></i> Excel</button></a>
            <a href="pdf_Reporte_Boleta.php" target = "_BLANK"><button type="button" class="btn btn-danger"><i class="far fa-file-pdf"></i> PDF</button></a>
            <a href="javascript:window.print()"><button type="button" class="btn btn-warning"><i class="fas fa-print"></i> Imprimir</button></a>
          </div>
        </div>
      </div>
    </div>
</body>