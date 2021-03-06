<?php
include("../controller/conexion.php");
include('../controller/verificarSesion.php');
include('../controller/comprobarVerificacion.php');
include('../controller/validado.php');
include('../controller/verificarCapellan.php');
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
          <a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
            <?php echo $nombreCuenta; ?>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="configCap">Configuración</a>
            <a class="dropdown-item" href="../controller/cerrarSesion">Cerrar Sesión</a>
          </div>
        </li>
    </div>
    </ul>
    </div>
  </nav>


  <div class="container">
    <form method="post">
      <div id="formulario">
        <hr>
        <h3>Cambio de Contraseña</h3>
        <hr>
      </div>
      <div class="form-group">

        <?php if($error != ''){ ?>
            <div style="font-size:20px; color:#cc0000; margin-top:5px"><label id="error"><?php echo $error; ?></label></div>
        <?php } ?>
      
        <?php if($success != ''){ ?>
            <div style="font-size:20px; color:#0BC302; margin-top:5px"><label id="success"><?php echo $success; ?></label></div>
        <?php } ?>

        <label for="conActual">Contraseña actual:</label>
        <input type="password" class="form-control" name="conActual" id="conActual" placeholder="Contraseña actual"
          required>
        <br>

        <label for="conNueva">Contraseña nueva</label>
        <input type="password" class="form-control" name="conNueva" id="conNueva" placeholder="Contraseña nueva"
          required>
        <br>

        <label for="conNueva">Repita contraseña nueva</label>
        <input type="password" class="form-control" name="confNueva" id="confNueva" placeholder="Contraseña nueva"
          required>
      </div>
      <br>
      <div class="col text-center">
        <button class="btn btn-success regular-button" name="btnNewPass" type="submit" id="btnNewPass">
          Guardar
        </button>
      </div>
    </form>

    <form method="post">
      <div id="formulario">
        <hr>
        <h3>Eliminar cuenta</h3>
        <hr>
        <?php if($errorEliminar != ''){ ?>
            <div style="font-size:20px; color:#cc0000; margin-top:5px"><label id="error"><?php echo $errorEliminar; ?></label></div>
        <?php } ?>
        <h6>Esta acción es irreversible</h6>
      </div>

      <div class="col text-center">

        <button class="btn btn-danger regular-button" data-toggle="modal" data-target="#eliminarCuenta" name="btnEliminar" type="button" id="btnEliminar">
          Eliminar cuenta
        </button>

        <div class="modal fade" id="eliminarCuenta" tabindex="-1" role="dialog" aria-labelledby="eliminarCuentaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="eliminarCuentaLabel">Eliminar cuenta</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              ¿Realmente quieres eliminar tu cuenta?
            <br>
              <label for="pass">Si es así, escribe tu contraseña:</label>
              <input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña"
                required>
                <br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-danger" name="borrarCuenta">Borrar cuenta</button>
            </div>
          </div>
        </div>
      </div>

      </div>

    </form>
  </div>

  <section></section>
  <div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
  </div>
  <script>
    $(window).on("load", function () {
      $(".loader-wrapper").fadeOut("slow");
    });
  </script>
</body>

</html>