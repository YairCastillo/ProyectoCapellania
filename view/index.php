<?php
  include("../controller/conexion.php");
  include('../controller/verificarSesion.php');
  include('../controller/comprobarVerificacion.php');
  include('../controller/validado.php');
  include('../controller/verificarTipoUsuario.php');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
    <script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CapellaníaUM</title>

    <!--links para CDN *copiar desde aqui para poner una navbar-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"><script src="js/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- CSS para la barra de navegacion -->
      <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
      
    <!--loadingstyle.css es para el efecto de cargarndo-->
      <link rel="stylesheet" type="text/css" href="../css/loadingstyle.css">
        

    </head>
    <body>
    <nav class="navbar navbar-expand-md fixed-top sticky-top">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
          <span class="navbar-toggler-icon">
          <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
          </span>
        </button>
                <div class="collapse navbar-collapse" id="collapse_target">
              <label class="logo">CapellaníaUM</label>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="calendar">CITA</a></li>
                    <li><a href="entrevistaInicial">MODIFICAR MIS DATOS</a></li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        NOMBRE
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Configuración</a>
                        <a class="dropdown-item" href="#">Cerrar Sesión</a>
                      </div>
                    </li>
                    </div>
                </ul>
          </div>
      </nav>
        <section></section>
        <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <script>
        $(window).on("load",function(){
          $(".loader-wrapper").fadeOut("slow");
        });
    </script>
    </body>
</html>