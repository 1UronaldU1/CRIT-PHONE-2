<?php

include "../../conexion/conexion.php";
require_once ("login_empleado_2.php");
include ("header.php");

$sql = "SELECT MONTH(fecha_Emitida) as mes,COUNT(*) as Boleta FROM boleta WHERE YEAR(fecha_Emitida)='2021' GROUP BY MONTH(fecha_Emitida) ORDER BY MONTH(fecha_Emitida) asc";
$resultado = mysqli_query($con, $sql);
$num_boleta=[];
while ($filas = mysqli_fetch_assoc($resultado)) {
          //$num_boleta[] = $fila["mes"];
        $sql1="UPDATE mes SET num_boleta={$filas["Boleta"]} WHERE id_mes={$filas["mes"]}"; 
          $resultado1 = mysqli_query($con, $sql1);
        }
?>

  <!-- Envoltorio de contenido. Contiene contenido de página -->

  <div class="content-wrapper">

    <!-- Encabezado de contenido (encabezado de página) -->

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Productos</a></li>
              <li class="breadcrumb-item active">Datos del empleado</li>
            </ol>
          </div>
        </div>
      </div><!-- /.contenedor-líquido -->
    </div>

    <!-- /.encabezado de contenido -->


    <!--=====================================
    =            Estadositicas         =
    ======================================-->
    

    <?php

        include "../../conexion/conexion.php";

        $sql2="SELECT * FROM mes";
        $resultado2 = mysqli_query($con, $sql2);
        $dataMes=[];
        while ($filas1 = mysqli_fetch_assoc($resultado2)){

        $dataMes["label"][] = $filas1["nombre_mes"];

        $dataMes["data"][] = $filas1["num_boleta"];
          
        }
        $data["data"] = $dataMes;

    ?>

    <?php 

      // GANANCIAS MENSUALES
      
        $sqlM="SELECT Month(fecha_Emitida) as Mes,SUM(total) as Total FROM boleta WHERE Month(fecha_Emitida)=Month(NOW()) GROUP BY Month(fecha_Emitida)";
        $resultadoM=mysqli_query($con,$sqlM);
        $filaM=mysqli_fetch_assoc($resultadoM);

    ?>

    <div class="container">

      <!-- Contenido aquí -->

      <div class="card">
          <div class="estadisticas-generate text-center">
            <canvas id="myChart" width="300" height="100"></canvas>
          </div>
      </div>
      <div class="row mt-5">
        <div class="col-lg-4">
          <div class="small-box bg-info">
              <div class="inner">
                <h3>Ganancia Mensuales</h3>

                <p><?php echo $filaM["Total"]; ?></p>

              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
          </div>
        </div>

        <?php 

        // Boletas del mes
        
        $sqlB="SELECT Month(fecha_Emitida) as Mes,COUNT(idBoleta) as Boleta FROM boleta WHERE Month(fecha_Emitida)=Month(NOW()) GROUP BY Month(fecha_Emitida)";
        $resultadoB=mysqli_query($con,$sqlB);
        $filaB=mysqli_fetch_assoc($resultadoB);

        ?>

        <div class="col-lg-4">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Boleta del Mes</h3>

                <p><?php echo $filaB["Boleta"]; ?></p>

              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
        </div>

        <?php 

        // GANANCIAS ANUALES
        
        $sqlA="SELECT YEAR(fecha_Emitida) as Año,SUM(total) as Total FROM boleta WHERE YEAR(fecha_Emitida)=YEAR(NOW()) GROUP BY YEAR(fecha_Emitida)";
        $resultadoA=mysqli_query($con,$sqlA);
        $filaA=mysqli_fetch_assoc($resultadoA);

        ?>

        <div class="col-lg-4">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>Ganacia Anual</h3>

              <p><?php echo $filaA["Total"]; ?></p>

            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!--====  Fin Estadisticas   ====-->
    
    <!-- Contenido principal -->

    <section class="content">
      <div class="container-fluid">

        <!-- Cajas pequeñas (caja de estadísticas) -->

        <div class="row">
          <div class="col-lg-3 col-6">

            <!-- Cajas pequeñas (caja de estadísticas) -->

          </div>

          <!-- ./col -->

          <div class="col-lg-3 col-6">

            <!-- Cajas pequeñas (caja de estadísticas) -->

          </div>

          <!-- ./col -->

          <div class="col-lg-3 col-6">

            <!-- Cajas pequeñas (caja de estadísticas) -->

          </div>

          <!-- ./col -->

          <div class="col-lg-3 col-6">

            <!-- Cajas pequeñas (caja de estadísticas) -->

          </div>

          <!-- ./col -->

        </div>

        <!-- /.row -->

        <!-- Fila principal -->

        <!-- /.fila (fila principal) -->

      </div><!-- /.contenedor-líquido -->

    </section>

    <!-- /.contenido -->

  </div>

  <!-- /.contenedor de contenido -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="#">OnePice</a>.</strong>
    Reservados todos los derechos.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

  </aside>

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->

<!-- jQuery -->

<script src="../public/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->

<script src="../public/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->

<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->

<script src="../public/plugins/chart.js/Chart.min.js"></script>

<!-- Sparkline -->

<script src="../public/plugins/sparklines/sparkline.js"></script>

<!-- JQVMap -->

<script src="../public/plugins/jqvmap/jquery.vmap.min.js"></script>

<script src="../public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<!-- jQuery Knob Chart -->

<script src="../public/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- daterangepicker -->

<script src="../public/plugins/moment/moment.min.js"></script>

<script src="../public/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->

<script src="../public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Summernote -->

<script src="../public/plugins/summernote/summernote-bs4.min.js"></script>

<!-- overlayScrollbars -->

<script src="../public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->

<script src="../public/dist/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="../public/dist/js/demo.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="../public/dist/js/pages/dashboard.js"></script>

<!--=====================================
=            barras           =
======================================-->

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>

<script>
    const cData = JSON.parse(`<?php echo json_encode($data); ?>`);
     const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: cData.data.label,
                    datasets: [{
                        label: 'Boletas',
                        data: cData.data.data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
</script>

<!--====  End of Section comment  ====-->

  </body>
</html>
