<?php

//primer cambio

include "conexion/conexion.php";
require_once "Backend/vista/sesion_login.php";

/*=============================================
Modelo y Controlador
=============================================*/

$sql       = "SELECT * FROM producto limit 4";
$resultado = mysqli_query($con, $sql);

/*=============================================
Banner
=============================================*/

$sql_1       = "SELECT * FROM banner limit 3";
$resultado_1 = mysqli_query($con, $sql_1);
$fila_1 = mysqli_fetch_assoc($resultado_1);

?>

<!--=====================================
Cabeza
======================================-->

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Basico -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!--Metas para moviles -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Metas necesiarios para la busqueda de la página-->
  <!--<meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />-->
  <link rel="shortcut icon" href="Backend/images/tienda/logotipo.ico" type="image/x-icon">

  <title>CRIT PHONE</title>

  <!-- bootstrap css -->

  <link rel="stylesheet" type="text/css" href="Backend/css/tienda/bootstrap.css" />

  <!--hoja de estilo del control deslizante de búho -->

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- estilo de fuente impresionante -->

  <link href="Backend/css/tienda/font-awesome.min.css" rel="stylesheet" />

  <!-- Estilos personalizados para esta plantilla -->

  <link href="Backend/css/tienda/style.css" rel="stylesheet" />

  <!-- estilo receptivo -->

  <link href="Backend/css/tienda/responsive.css" rel="stylesheet" />

</head>

<!--=====================================
Cuerpo
======================================-->

<body>

  <div class="hero_area">
    <div class="hero_social">
      <a href="https://www.facebook.com/RonaldUvirgo">
        <i class="fa fa-facebook" aria-hidden="true"></i>
      </a>
      <a href="https://www.instagram.com/ronald.virg0/?hl=es-la">
        <i class="fa fa-instagram" aria-hidden="true"></i>
      </a>
    </div>

    <!-- estrategias de sección de cabecera -->

    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">

          <!-- Logo de la página -->

          <a class="navbar-brand" href="index.php">
            <span>
              CRIT PHONE
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" id="navbarDropdown" 
                  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Celulares</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="Backend/vista/celulares.php">Todas</a></li>
                      <li><hr class="dropdown-divider" /></li>
                      <li><a class="dropdown-item" href="Backend/vista/celulares.php?marca=1">Huawei</a></li>
                      <li><a class="dropdown-item" href="Backend/vista/celulares.php?marca=2">Apple</a></li>
                      <li><a class="dropdown-item" href="Backend/vista/celulares.php?marca=3">Samsung</a></li>
                      <li><a class="dropdown-item" href="Backend/vista/celulares.php?marca=4">Xiaomi</a></li>
                      <li><a class="dropdown-item" href="Backend/vista/celulares.php?marca=5">Philips</a></li>
                      <li><a class="dropdown-item" href="Backend/vista/celulares.php?marca=6">Enfundado</a></li>
                  </ul>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" id="navbarDropdown" 
                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Accseorio</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="Backend/vista/accesorios.php">Todas</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="Backend/vista/accesorios.php?categoria=1">Celular</a></li>
                    <li><a class="dropdown-item" href="Backend/vista/accesorios.php?categoria=2">Audifonos</a></li>
                    <li><a class="dropdown-item" href="Backend/vista/accesorios.php?categoria=3">Protectores</a></li>
                    <li><a class="dropdown-item" href="Backend/vista/accesorios.php?categoria=4">Parlantes</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Backend/vista/contacto.php">Contactos</a>
              </li>
            </ul>
            <div class="user_option-box">
              <a href="Backend/vista/login.php">

              <?php

              /*=============================================
              Comienzo de verificación de login
              =============================================*/         

                if($estado){

              ?>

                <a href="Backend/vista/editar_cliente.php" class="d-block"><?php echo $usuario ?>
                <a href="Backend/vista/logout_cliente.php" class="btn btn-danger" style="margin-left: 15px;" ><i class="fa fa-sign-out"></i></a>
                </a></a>

              <?php } else{

                ?>

                <i class="fa fa-user" aria-hidden="true"></i>

              </a>

              <?php } ?>

            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- sección del encabezado final -->

    <!-- sección deslizante -->

    <section class="slider_section">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">

                    <h1><?php echo $fila_1['nombre_producto'] ?></h1>

                    <p><?php echo $fila_1['descripcion'] ?></p>

                    <div class="btn-box">

                      <a href="Backend/vista/contacto.php" class="btn1">Contactanos</a>

                    </div>

                  </div>
                </div>
                <div class="col-md-6">

                  <div class="img-box w-75">

                    <img src="Backend/images/Banner/<?php echo $fila_1['imagen']; ?>" alt="Celular 1">

                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">

                    <h1><?php echo $fila_1['nombre_producto_1'] ?></h1>

                    <p><?php echo $fila_1['descripcion_1'] ?></p>

                    <div class="btn-box">

                      <a href="Backend/vista/contacto.php" class="btn1">Contactanos</a>

                    </div>

                  </div>
                </div>
                <div class="col-md-6">

                  <div class="img-box w-50">

                    <img src="Backend/images/Banner/<?php echo $fila_1['imagen_1']; ?>" alt="Celular 2">

                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">

                    <h1><?php echo $fila_1['nombre_producto_2'] ?></h1>

                    <p><?php echo $fila_1['descripcion_2'] ?></p>

                    <div class="btn-box">

                      <a href="Backend/vista/contacto.php" class="btn1">Contactanos</a>

                    </div>

                  </div>
                </div>

                <div class="col-md-6">
                  <div class="img-box w-75">

                    <img src="Backend/images/Banner/<?php echo $fila_1['imagen_2']; ?>" alt="Celular">

                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>

    </section>
    <!-- sección final del control deslizante -->
  </div>

  <!-- sección de la tienda -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">

        <h2>Ultimos Celulares</h2>

      </div>
      <div class="row">

        <?php

        /*=============================================
         Llamar los productos
         =============================================*/
                 
          while ($fila = mysqli_fetch_assoc($resultado)) {

        ?>

        <div class="col-md-6 ">

          <div class="box">

            <a href="Backend/vista/detalle_producto.php?id=<?php echo $fila['idProducto']; ?>">

              <div class="img-box">

                <img src="Frotend/img/productos/<?php echo $fila['imagen']; ?>" alt="Imagen Producto">

              </div>

              <div class="detail-box">

                <h6><?php echo $fila['NombreProducto'] ?></h6>

                <h6>Precio:<span>$<?php echo $fila['precio'] ?></span></h6>

              </div>

              <div class="new"><span>Destacados</span></div>

            </a>

          </div>

        </div>

        <?php }?>

    </div>

    <div class="btn-box d-block text-center">

      <a href="Backend/vista/celulares.php">Ver todo</a>

    </div>

  </section>

  <!-- sección de la tienda final -->

  <!-- sección de características -->

  <section class="feature_section layout_padding">
    <div class="container">

      <div class="heading_container">

        <h2>Características de nuestros celulares</h2>

        <p>Mejores celulares,mejores precios,ultima versiones de tecnología.</p>

        <a href="index.php"><span></span>

          <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
          
        </a>

      </div>

      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="box">

            <div class="img-box">

              <img src="Backend/images/tienda/f1.png" alt="Icono de negocio">

            </div>

            <div class="detail-box">

              <h5>Mejor Precio & Estavilidad</h5>

              <p>Celulares a la venta al contado y con seguridad</p>

              <a href="index.php"><span></span>

                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>

              </a>

            </div>

          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">

            <div class="img-box">

              <img src="Backend/images/tienda/f2.png" alt="Celular Notificaciones">

            </div>

            <div class="detail-box">

              <h5>Alertas & Notificationes</h5>

              <p>Notificaciones y alertas al instante</p>

              <a href="index.php"><span></span>

                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>

              </a>

            </div>

          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">

            <div class="img-box">

              <img src="Backend/images/tienda/f3.png" alt="Mensaje de Chat">

            </div>

            <div class="detail-box">

              <h5>Mensajes</h5>

              <p>Redes Sociales de mensajes al instante con visualización del usuario</p>

              <a href="index.php"><span></span>

                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>

              </a>

            </div>

          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">

            <div class="img-box">

              <img src="Backend/images/tienda/f4.png" alt="Bluetooth">

            </div>

            <div class="detail-box">

              <h5>Bluetooth Ultima Versión</h5>

              <p>Con la distancia que no puedes imaginar</p>

              <a href="index.php"><span></span>

                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>

              </a>

            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Caracteristicas finalizadas -->

  <!-- sección de clientes -->

  <section class="client_section layout_padding">
    <div class="container">

      <div class="heading_container heading_center">

        <h2>Testimonio</h2>

      </div>

      <div class="carousel-wrap ">
        <div class="owl-carousel client_owl-carousel">
          <div class="item">
            <div class="box">

              <div class="img-box">

                <img src="Backend/images/tienda/c1.jpg" alt="Persona 1">

              </div>

              <div class="detail-box">
                <div class="client_info">

                  <div class="client_name">

                    <h5>Mark Thomas</h5>

                    <h6>Cliente</h6>

                  </div>

                  <i class="fa fa-quote-left" aria-hidden="true"></i>

                </div>

                <p>
                  La tienda  te brinda confianza para obtener sus productos como al momento de adquirir un celular de esta tienda ya que son  de muy buena calidad  , sobre todo la atención al cliente es muy buena y efectiva , no tendrás ningún problema con la tienda ,ya que siempre están pendientes de que tengas un buena compra sin problemas.
                </p>

              </div>

            </div>
          </div>
          <div class="item">
            <div class="box">

              <div class="img-box">

                <img src="Backend/images/tienda/c2.jpg" alt="Persona 2">

              </div>

              <div class="detail-box">
                <div class="client_info">

                  <div class="client_name">

                    <h5>Alina Hans</h5>

                    <h6>Cliente</h6>

                  </div>

                  <i class="fa fa-quote-left" aria-hidden="true"></i>

                </div>

                <p>
                  La tienda  te brinda confianza para obtener sus productos como al momento de adquirir un celular de esta tienda ya que son  de muy buena calidad  , sobre todo la atención al cliente es muy buena y efectiva , no tendrás ningún problema con la tienda ,ya que siempre están pendientes de que tengas un buena compra sin problemas.
                </p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- sección de cliente final -->

<!-- sección de pie de página -->

  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer-col">

          <div class="footer_detail">

            <h4>Sobre la tienda:</h4>

            <p>
              Una tienda de confianza con estabilidad de red,con funcionalidades adecuadas para el uso del comprador,funda en 2018 con el plan de renobar las plataforma de tiendas online.
            </p>

            <div class="footer_social">

              <a href="https://www.facebook.com/N-artific-100195442415978">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>

              <a href="https://api.whatsapp.com/send?phone=51970592509&text=Hola%20necesito%20Soporte%20t%C3%A9cnico">
                <i class="fa fa-whatsapp" aria-hidden="true"></i>
              </a>

              <a href="https://www.instagram.com/ronald.virg0/">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>

            </div>

          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">

          <div class="footer_contact">

            <h4>Llegar a la tienda</h4>

            <div class="contact_link_box">

              <a href="https://www.google.com/maps/place/SENATI+Surquillo/@-12.1143853,-76.9998794,16.42z/data=!4m14!1m8!3m7!1s0x9105c7efebc5a383:0x4f71fb1c5cd4ae12!2sSENATI+Surquillo!8m2!3d-12.1163729!4d-76.9976411!9m1!1b1!3m4!1s0x9105c7efebc5a383:0x4f71fb1c5cd4ae12!8m2!3d-12.1163729!4d-76.9976411"><i class="fa fa-map-marker" aria-hidden="true"></i>

                <span>Localización</span>

              </a>

              <a href="tel:970592509"><i class="fa fa-phone" aria-hidden="true"></i>

                <span>Llamar +51 970 592 509</span>

              </a>

              <a href="mailto:n.artific@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i>

                <span>n.artific@gmail.com</span>

              </a>

            </div>

          </div>

        </div>
        <div class="col-md-6 col-lg-3 footer-col">

          <div class="footer_contact">

            <h4>Volver al inicio</h4>

            <form action="#">

              <button type="submit">Volver al inicio</button>

            </form>

          </div>

        </div>

        <div class="col-md-6 col-lg-3 footer-col">
          <div class="map_container">

            <div class="map">

              <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.93839548958!2d-76.99982978464828!3d-12.116367646499361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c7efebc5a383%3A0x4f71fb1c5cd4ae12!2sSENATI%20Surquillo!5e0!3m2!1ses-419!2spe!4v1633986490387!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>

            </div>

          </div>
        </div>

      </div>

      <div class="footer-info">

        <p>
          &copy; <span id="displayYear"></span> Reservados todos los derechos.
          <a href="https://www.facebook.com/RonaldUvirgo" target="_blank">OnePice.</a>
        </p>

      </div>

    </div>
  </footer>

  <!-- sección de pie de página -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- jQery -->

  <script src="Backend/js/tienda/jquery-3.4.1.min.js"></script>

  <!-- popper js -->

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>

  <!-- bootstrap js -->

  <script src="Backend/js/tienda/bootstrap.js"></script>

  <!-- owl slider -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <!-- custom js -->

  <script src="Backend/js/tienda/custom.js"></script>

  <!-- Google Map -->

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>

  <!-- Finalizar mapa de Google -->

</body>

</html>
  