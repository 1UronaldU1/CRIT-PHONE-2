var productoA = document.getElementById("productoA");
var productoF = document.getElementById("productoF");
var datosE = document.getElementById("datosE");
var clienteS = document.getElementById("clienteS");
var banneR = document.getElementById("banneR");
if (window.location.href == "http://localhost:8080/CRIT-PHONE-2/Frotend/vista/listado_producto.php" ) {
            productoA.classList.add("active");
            productoF.classList.remove("active");
            datosE.classList.remove("active");
            clienteS.classList.remove("active");
            banneR.classList.remove("active");
        } else if (window.location.href == "http://localhost:8080/CRIT-PHONE-2/Frotend/vista/listado_producto_fecha.php") {
            productoF.classList.add("active");
            productoA.classList.remove("active");
            datosE.classList.remove("active");
            clienteS.classList.remove("active");
            banneR.classList.remove("active");
        }else if (window.location.href == "http://localhost:8080/CRIT-PHONE-2/Frotend/vista/empleado_datos.php" || 
            window.location.href == "http://localhost:8080/CRIT-PHONE-2/Frotend/vista/a%C3%B1adir_empleado.php") {
            datosE.classList.add("active");
            productoA.classList.remove("active");
            productoF.classList.remove("active");
            clienteS.classList.remove("active");
            banneR.classList.remove("active");
        }
        else if (window.location.href == "http://localhost:8080/CRIT-PHONE-2/Frotend/vista/lista_cliente.php" || 
            window.location.href == "http://localhost:8080/CRIT-PHONE-2/Frotend/vista/a%C3%B1adir_cliente.php") {
            clienteS.classList.add("active");
            productoA.classList.remove("active");
            productoF.classList.remove("active");
            datosE.classList.remove("active");
            banneR.classList.remove("active");
        }
        else if (window.location.href == "http://localhost:8080/CRIT-PHONE-2/Frotend/vista/lista_banner.php" || 
            window.location.href == "http://localhost:8080/CRIT-PHONE-2/Frotend/vista/editar_banner.php?id=1") {
            banneR.classList.add("active");
            productoA.classList.remove("active");
            productoF.classList.remove("active");
            datosE.classList.remove("active");
            clienteS.classList.remove("active");
        }