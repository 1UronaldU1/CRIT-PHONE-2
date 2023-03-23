<?php 

    ob_start();

    include "../../conexion/conexion.php";

    $sqlid="SELECT MAX(idBoleta) FROM boleta";
    $idBol=mysqli_query($con,$sqlid);
    $idfinal=mysqli_fetch_assoc($idBol);
    $idBoleta = $idfinal['MAX(idBoleta)'];

    $sql       = "select db.cantidad,db.idProducto,p.NombreProducto,p.precio,db.importe,b.fecha_Emitida,c.NombreCliente,c.Dirreccion,b.subTotal,b.igv,b.total FROM detalle_boleta db INNER JOIN boleta b on db.idBoleta = b.idBoleta INNER JOIN producto p on p.idProducto= db.idProducto INNER JOIN cliente c on c.IDCliente = b.idCliente where b.idBoleta=$idBoleta";
    $resultado = mysqli_query($con, $sql);

    $sql2       = "select db.cantidad,db.idProducto,p.NombreProducto,p.precio,db.importe,b.fecha_Emitida,c.NombreCliente,c.Dirreccion,b.subTotal,b.igv,b.total FROM detalle_boleta db INNER JOIN boleta b on db.idBoleta = b.idBoleta INNER JOIN producto p on p.idProducto= db.idProducto INNER JOIN cliente c on c.IDCliente = b.idCliente where b.idBoleta=$idBoleta";
    $resultado2 = mysqli_query($con, $sql2);
    $fila2 = mysqli_fetch_assoc($resultado2);
    ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <title>PDF</title>
</head>

<style>
    body{
        font-family: 'Roboto Mono', monospace;
        font-size: 10px;
    }
</style>

<body>
    <section id="Cabecera">
        <h1 class="text-center" style="color: #8E44AD;" style="font-size: 10px;"><b>CRIT PHONE</b></h1>
        <div class="card float-right mr-3 d-block" style="width:200px;margin-top: -40px;border: 5px solid #7B7D7D;">
            <div class="card-header text-center">RUC:74054715</div>
            <div class="card-body bg-warning text-center" style="font-size: 10px;">BOLETA ELECTRÓNICA</div>
            <div class="card-footer text-center" style="font-size: 10px;">FECHA:<?php echo $fila2['fecha_Emitida'] ?></div>
        </div>
    </section>

    <section id="body">
        <br>
        <br>
        <h4  class="d-block " style="color: #8E44AD;">Mz Q lt 17 Sector Nazreno,San Juan de Miraflores</h4>
        <h4  class="d-block " style="color: #8E44AD;">LIMA-LIMA-LIMA</h4>
        <h4  class="d-block" style="color: #8E44AD;"><b>TEL:</b>  951783881</h4>
        <h4  class="d-block" style="color: #8E44AD;"><b>EMAIL:</b>  ronald_M_Q_2015@outlook.es</h4>

       <div class="card d-block" style="width: 600px;">
            <div class="card-header">
                <b>DATOS DEL CLIENTE</b></p>
            </div>
            <div class="card-body">
                <span  class="d-block"><b>CLIENTE:</b> <?php echo $fila2['NombreCliente'] ?></span>
                <span class="d-block"><b>DIRRECIÓN:</b> <?php echo $fila2['Dirreccion'] ?></span>
                <span  class="d-block"><b>MONEDA:</b> SOLES</p></span>
            </div>
       </div>
       <br>
            <table class="table table-striped " >
                <thead style="background-color: #8E44AD;color: white;">
                    <tr >
                        <th class="text-center p-0" style="font-size: 25px;">CANT</th>
                        <th class="p-0" style="font-size: 25px;">DESCRIPCIÓN</th>
                        <th class=" p-0 text-center" style="font-size: 25px;">PRECIO</th>
                        <th class="text-center p-0" style="font-size: 25px;">IMPORTE</th>
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
                </tbody>
                        <tfoot >
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td  class="text-right d-block p-0">Subotal:<?php echo $fila2['subTotal'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td  class="text-right d-block p-0">I.G.V (18%): <?php echo $fila2['igv'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td  class="text-right d-block p-0">Total: <?php echo $fila2['total'] ?></td>
                            </tr>
                        </tfoot>

    </section>
        </table>
        <span  class="d-block" style="color: #8E44AD;">GRACIAS POR SU COMPRA</span>
        <span  class="d-block" style="color: #8E44AD;">NO SE ACEPTAN CAMBIOS NI DEVOLUCIONES</span><br>
    </div>
</div>
</body>
</html>

<?php 

    $html=ob_get_clean();
    //echo $html;

    require_once '../extensiones/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $options= $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);

    $dompdf->setPaper('letter');
    //$dompdf->setPaper('A4', 'landscape');

    $dompdf->render();

    $dompdf->stream("boleta_.pdf",array("Attachment" => false));
?>

