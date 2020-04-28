<?php
include("../controller/conexion.php");
include('../controller/verificarSesion.php');
include('../controller/comprobarVerificacion.php');
include('../controller/validado.php');
include('../controller/verificarPerfilInicial.php');
include('../model/listaAlumnosModel.php');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CapellaníaUM | Alumnos</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="../js/jquery-3.4.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!--para la tabla-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!--para tabla-->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <!--loadingstyle.css es para el efecto de cargarndo-->
  <link rel="stylesheet" type="text/css" href="../css/loadingstyle.css">

  <!-- CSS para la barra de navegacion -->
  <link rel="stylesheet" type="text/css" href="../css/navStyle.css" />
  <link rel="stylesheet" type="text/css" href="../css/calendar.css">
  <link href="../datatables/datatables.min.css" rel="stylesheet">
  <script src="../datatables/datatables.min.js"></script>






</head>

<body style="font-family: 'Montserrat', sans-serif;">
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

        <li class="nav-item"><a class="nav-link active" href="listaAlumnos">ALUMNOS</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            <?php echo $nombreCuenta; ?>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="configCap">Configuración</a>
            <a class="dropdown-item" href="../controller/cerrarSesion.php">Cerrar Sesión</a>
          </div>
        </li>
    </div>
    </ul>
    </div>
  </nav>
  <br>
  <br>

  <div class="container">
    <h2 style="text-align:center">Lista de Alumnos</h2>

    <!-- Search form -->
    <div class="row">
      <div class="col col-md-9">
      </div>
      <br>
      <div class="table-responsive" id = "table-container">
        <table class="table table-bordered" id="tblListaAlumnos">
          <thead>
            <tr>
              <th>Matrícula</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Edad</th>
              <th>Correo Electrónico</th>
              <th>Carrera</th>
              <th>Entrevista Inicial</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($row3 as $datosAlumno){
                foreach($datosAlumno as $dato){
                  $matriculaAlumno = $dato['matricula'];
                  $nombreAlumno = $dato['nombre'];
                  $apellidosAlumno = $dato['apellidos'];
                  $correoAlumno = $dato['email'];
                  $edadAlumno = $dato['edad'];
                  $nombreCarreraAlumno = $dato['nombreCarrera'];


                  echo "<tr>
                  <td>$matriculaAlumno</td>
                  <td>$nombreAlumno</td>
                  <td>$apellidosAlumno</td>
                  <td>$edadAlumno</td>
                  <td>$correoAlumno</td>
                  <td>$nombreCarreraAlumno</td>
                  <td><a class='fas fa-eye' href='verEntrevista?matricula=$matriculaAlumno'></a></td>
                  </tr>";
                }
                
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {

        let tblListaAlumnos = $('#tblListaAlumnos').DataTable({
          "language": {
            "url": "../datatables/spanish.json",
          }
        });

      });
    </script>





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