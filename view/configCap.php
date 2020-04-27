<?php
include("../controller/conexion.php");
include('../controller/verificarSesion.php');
include('../controller/comprobarVerificacion.php');
include('../controller/validado.php');
include('../controller/verificarPerfilInicial.php');
include('../model/configCapModel.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapellaníaUM | Configuración</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="../js/jquery-3.4.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <!-- CSS para la barra de navegacion -->
  <link rel="stylesheet" type="text/css" href="../css/navstyle.css" />

  <!--loadingstyle.css es para el efecto de cargarndo-->
  <link rel="stylesheet" type="text/css" href="../css/loadingstyle.css">

  <!--para abajo es lo que estaba en la pagina inicialmente-->
  <script src="https://code.jquery.com/jquery-2.1.4.js" integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
    crossorigin="anonymous"></script>
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
                    <li class="nav-item"><a class="nav-link" href="capellanes">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="calendar">CALENDARIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="listaAlumnos">ALUMNOS</a></li>
                    <li class="nav-item dropdown">
                      <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <?php echo $nombreCuenta; ?>
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="modificarCap">Configuración</a>
                        <a class="dropdown-item" href="../controller/cerrarSesion">Cerrar Sesión</a>
                      </div>
                    </li>
                    </div>
                </ul>
          </div>
      </nav>
<div class="container">
            <form action="" method="post">
                    <div id="formulario">
                      <hr>
                        <h3>Cambio de Contraseña</h3>
                      <hr>
                    </div>
                <div class="form-group">
                   
                            <label for="conActual">Contraseña actual:</label>
                            <input type="password" class="form-control" name="conActual"
                                id="conActual" placeholder="Contraseña actual" required>
                            <br>

                            <label for="conNueva">Contraseña nueva</label>
                            <input type="password" class="form-control" name="conNueva" 
                            id="conNueva" placeholder="Contraseña nueva" required>
                            <br>

                            <label for="conNueva">Repita contraseña nueva</label>
                            <input type="password" class="form-control" name="conNueva" 
                            id="conNueva" placeholder="Contraseña nueva" required>
                </div>
                <br>
                        <div class="col text-center">
                            <button class="btn btn-success regular-button" name="btnNewPass" type="submit"
                                id="btnNewPass">
                                Cambiar contraseña
                            </button>
                        </div>

                        <div id="formulario">
                          <hr>
                          <h3>Eliminar cuenta</h3>
                          <hr>
                          <h6>Esta acción es irreversible</h6>
                        </div>
                        <div class="col text-center">
                            <button class="btn btn-danger regular-button" name="btnEliminar" type="submit"
                                id="btnEliminar">
                                Eliminar cuenta
                            </button>
                        </div>
            </form>
</div>
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