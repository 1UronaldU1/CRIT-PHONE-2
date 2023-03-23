<?php
  include "../../conexion/conexion.php";

  require_once ("login_empleado_2.php");

  include "header.php";

    //<!--Inicio de PAGINACION -->
    
    $sql_registro=mysqli_query($con,"SELECT count(*) as total_registro FROM producto");
    $resultado_regsitro=mysqli_fetch_array($sql_registro);
    $total_registro=$resultado_regsitro['total_registro'];
    $por_pagina=6;

    if(empty($_GET['pagina'])){
      $pagina=1;
    }else{
      $pagina=$_GET['pagina'];
    }

  if(empty($_GET['fecha_inicio'])){
    $fecha_inicio=1;
  }else{
    $fecha_inicio=$_GET['fecha_inicio'];
  }

  if(empty($_GET['fecha_fin'])){
    $fecha_fin=1;
  }else{
    $fecha_fin=$_GET['fecha_fin'];
  }

  $desde=($pagina-1)*$por_pagina;
  $total_paginas=ceil($total_registro/$por_pagina);

  //<!--Fin de PAGINACION -->
    
  $sql="SELECT p.idProducto,p.NombreProducto,p.descripcion,p.imagen,c.nombreCategoria,m.nombreMarca,p.Cantidad,p.precio,p.F_Emitida FROM producto p INNER join categoria c ON p.idcategoria=c.idCategoria INNER JOIN marca m on p.idMarca =m.idMarca WHERE p.estado = 1 and 
  DATE (p.F_emitida)>='$fecha_inicio' AND DATE(p.F_emitida)<='$fecha_fin' ORDER BY p.idProducto asc LIMIT $desde,$por_pagina";
  $resultado=mysqli_query($con,$sql);

?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Productos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="listado_producto.php">Productos</a></li>
            <li class="breadcrumb-item active"><a href="empleado_datos.php">Datos del empleado</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12">

          <!-- Contenido - INICIO -->
                        
          <a href="añadir_producto.php" class="btn btn-success">Añadir</a>

          <table class="table table-hover">
            <tr>
              <td><label for="validationCustom01">Fecha Inicio</label></td>
              <td><label for="validationCustom01">Fecha Fín</label></td>
              <td></td>
            </tr>
            <tr>
              <td> <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo date("Y-m-d"); ?>"></td>
              <td> <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php echo date("Y-m-d"); ?>"></td>
              <td><a href="javascript:prueba();" class="btn btn-primary">Mostrar</a></td>
            </tr>
          </table>
                            
          <script type="text/javascript">

            function prueba(pagina){

              var fecha_inicio=document.getElementById('fecha_inicio').value;
                                        var fecha_fin=document.getElementById('fecha_fin').value;

                                        window.location.href = window.location.href + "?pagina=1&fecha_inicio=" + fecha_inicio + "&fecha_fin=" + fecha_fin;

            }
                                      
                
          </script>                 
        </div>
                            
      </div>
      <br>
      <div class="iq-card-body">
        <div class="tale-responsive">
          <table class="table table-striped nowrap table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>PRODUCTO</th>
                <th>IMAGEN</th>
                <th>DESCRIPCION</th>
                <th>CATEGORIA</th>
                <th>MARCA</th>
                <th>CANTIDAD</th>
                <th>PRECIO</th>
                <th>FECHA EMITIDA</th>
                <th></th>
              </tr>
            </thead>
                                      
            <tbody>
              <?php while ($fila=mysqli_fetch_assoc($resultado)) { ?>



              <tr>
                <td> <?php echo $fila['idProducto'] ?> </td>
                <td><?php echo $fila['NombreProducto'] ?></td>
                <td> 
                  <img width="100" src="../img/productos/<?php echo $fila['imagen']; ?>">
                </td>
                
                <td> <?php echo $fila['descripcion'] ?> </td>
                <td> <?php echo $fila['nombreCategoria'] ?> </td>
                <td> <?php echo $fila['nombreMarca'] ?> </td>
                <td> <?php echo $fila['Cantidad'] ?> </td>
                <td> <?php echo $fila['precio'] ?> </td>
                <td> <?php echo $fila['F_Emitida'] ?> </td>
                <td>
                  <a href="editar_producto.php?id=<?php echo $fila['idProducto'] ?>" class="btn btn-warning"><i class="fas fa-edit size:3x"></i></a>
                  <a href="eliminar_producto.php?id=<?php echo $fila['idProducto'] ?>" class="btn btn-danger"><i class="far fa-trash-alt size:3x"></i></a>

                </td>
              </tr>
              <?php 
                } 
              ?>
            </tbody>
          </table>
        <!--PAGINA NACION INICIO-->

        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li class="page-item ">
              <a class="page-link" href="?pagina=<?php echo 1;?>">Primero</a></li>
            <li class="page-item">
              <a class="page-link" href="?pagina=<?php echo $pagina-1;?>">Anterior</a></li>

              <?php  

              for ($i=1; $i<= $total_paginas ; $i++) {
                if($i== $pagina){
                echo '<li class="page-item active"><a class="page-link" href="?pagina='.$i.'">'.$i.'</a></li>';
              }else{
                  echo '<li class="page-item">
                  <a class="page-link" href="?pagina='.$i.'">'.$i.' </a> </li>';
                }
              }

              ?>
              <li class="page-item">
                <a class="page-link" href="?pagina=<?php echo +1;?>">Siguente</a></li>
              <li class="page-item">
                <a class="page-link" href="?pagina=<?php echo $total_paginas;?>">ULTIMO</a></li>
          </ul>
        </nav>

        <!--PAGINA NACION FIN-->

        </div>
      </div>

    <!-- Contenido - FIN -->

    </div>               
  </section>
</div>


<?php

    include "footer.php";
    
?>