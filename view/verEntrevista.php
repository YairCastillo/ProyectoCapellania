<?php
include("../controller/conexion.php");
include('../controller/verificarSesion.php');
include('../controller/comprobarVerificacion.php');
include('../controller/validado.php');
include('../controller/verificarPerfilInicial.php');
include('../model/verEntrevistaModel.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CapellaníaUM | Ver Encuesta</title>

  <!--links para CDN *copiar desde aqui para poner una navbar-->
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

  <!--estilo para el perfil-->
  <link rel="stylesheet" type="text/css" href="../css/capStyle.css">
</head>

<body>
  <nav class="navbar navbar-expand-md fixed-top sticky-top" style="
    font-family: 'Montserrat', sans-serif;">
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
          <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
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

  <div class="container pt-3">
    <div class="row justify-content-md-center">
      <div class="col col-md-6">
        <h2 style="text-align:center">Datos Personales</h2>
      </div>
    </div>
    <div class="row">
      <div class="col table-responsive">
        <table class="table" style="width:100%">
          <tr>
            <th style="width:15%">Matrícula:</th>
            <td style="width:35%; text-align:left"><?php echo $matricula;?></td>
            <th style="width:15%">Fecha de nacimiento:</th>
            <td style="width:35%; text-align:left"><?php echo $fechaNac;?></td>
          </tr>

          <tr>
            <th style="width:15%">Nombre:</th>
            <td style="width:35%; text-align:left"><?php echo $nombres." ".$apellidos;?></td>
            <th style="width:15%">Correo electrónico:</th>
            <td style="width:35%; text-align:left"><?php echo $email;?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="container pt-3">
    <div class="row justify-content-md-center">
      <div class="col col-md-6">
        <h2 style="text-align:center">Datos Académicos</h2>
      </div>
    </div>
    <div class="row">
      <div class="col table-responsive">
        <table class="table" style="width:100%">
          <tr>
            <th style="width:15%">Carrera:</th>
            <td style="width:35%; text-align:left"><?php echo $nombreCarrera;?></td>
            <th style="width:15%">Semestre:</th>
            <td style="width:35%; text-align:left"><?php echo $semestre;?></td>
          </tr>

          <tr>
            <th style="width:15%">Situación académica:</th>
            <td style="width:35%; text-align:left"><?php echo $situacionAcademica;?></td>
            <th style="width:15%"></th>
            <td style="width:15%; text-align:left"></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="container pt-3">
    <div class="row justify-content-md-center">
      <div class="col col-md-6">
        <h2 style="text-align:center">Datos Demográficos</h2>
      </div>
    </div>
    <div class="row">
      <div class="col table-responsive">
        <table class="table" style="width:100%">
          <tr>
            <th style="width:15%">Estado civil:</th>
            <td style="width:18%; text-align:left"><?php echo $estadoCivil;?></td>
            <th style="width:15%">Tengo novio(a):</th>
            <td style="width:18%; text-align:left"><?php echo $novio;?></td>
            <th style="width:15%">Tengo amigo(a) especial:</th>
            <td style="width:19%; text-align:left"><?php echo $amigo;?></td>
          </tr>

          <tr>
            <th style="width:15%">Lugar de nacimiento:</th>
            <td style="width:18%; text-align:left"><?php echo $municipio.$estado . ", ".$pais;?></td>
            <th style="width:15%">Sexo:</th>
            <td style="width:18%; text-align:left"><?php echo $sexo;?></td>
            <th style="width:15%">Preferencia sexual:</th>
            <td style="width:19%; text-align:left"><?php echo $prefSexual;?></td>
          </tr>
          <tr>
            <th>Residencia actual:</th>
            <td><?php echo $residencia;?></td>
            <th>Dormitorio:</th>
            <td><?php echo $dormitorio;?></td>
            <th>Dirección:</th>
            <td><?php echo $direccion;?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="container pt-3">
    <div class="row justify-content-md-center">
      <div class="col col-md-6">
        <h2 style="text-align:center">Datos Familiares</h2>
      </div>
    </div>
    <div class="row">
      <div class="col table-responsive">
        <table class="table" style="width:100%">
          <tr>
            <th style="width:30%">Estado civil de tus padres:</th>
            <td style="width:20%; text-align:left"><?php echo $ecPadres;?></td>
            <th style="width:30%">Soy hijo(a) de empleado UM:</th>
            <td style="width:20%; text-align:left"><?php echo $hijoEmpleado;?></td>
          </tr>

          <tr>
            <th style="width:30%">Soy hijo(a) de obrero adventista:</th>
            <td style="width:20%; text-align:left"><?php echo $hijoObrero;?></td>
            <th style="width:30%">Tengo hermanos en la UM:</th>
            <td style="width:20%; text-align:left"><?php echo $hermanos;?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="container pt-3">
    <div class="row justify-content-md-center">
      <div class="col col-md-6">
        <h2 style="text-align:center">Datos Religiosos</h2>
      </div>
    </div>
    <div class="row">
      <div class="col table-responsive">
        <table class="table" style="width:100%">
          <tr>
            <th style="width:30%">Religión que practicas:</th>
            <td style="width:20%; text-align:left"><?php echo $religion;?></td>
            <th style="width:30%">Soy bautizado:</th>
            <td style="width:20%; text-align:left"><?php echo $bautizado;?></td>
          </tr>

          <tr>
            <th style="width:30%">Fecha de tu bautismo:</th>
            <td style="width:20%; text-align:left"><?php echo $fechaBautismo;?></td>
            <th style="width:30%">Feligresía actual:</th>
            <td style="width:20%; text-align:left"><?php echo $feligresia;?></td>
          </tr>
          <tr>
            <th style="width:30%">Iglesia a la que asistes:</th>
            <td style="width:20%; text-align:left"><?php echo $iglesia;?></td>
            <th style="width:30%"></th>
            <td style="width:20%; text-align:left"></td>
          </tr>
          <tr>
            <th>Asisto a los cultos:</th>
            <td><?php echo $asistenciaCulto;?></td>
            <th>Culto al que asistes:</th>
            <td><?php echo $culto;?></td>
          </tr>
          <tr>
            <th>Asisto a la Escuela Sabática:</th>
            <td><?php echo $asistenciaEs;?></td>
            <th>Escuela Sabática a la que asistes:</th>
            <td><?php echo $es;?></td>
          </tr>
          <tr>
            <th>Actividad espiritual que más te gusta:</th>
            <td><?php echo $ae;?></td>
            <th></th>
            <td></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="container pt-3">
    <div class="row justify-content-md-center">
      <div class="col col-md-6">
        <h2 style="text-align:center">Datos de Servicio Becario</h2>
      </div>
    </div>
    <div class="row">
      <div class="col table-responsive">
        <table class="table" style="width:100%">
          <tr>
            <th style="width:30%">Soy becado:</th>
            <td style="width:20%; text-align:left"><?php echo $becado;?></td>
            <th style="width:30%">Tipo de beca:</th>
            <td style="width:20%; text-align:left"><?php echo $tipoBeca;?></td>
          </tr>
          <tr>
            <th>Departamento en el que trabajas:</th>
            <td><?php echo $departamento;?></td>
            <th>Horas de trabajo diario:</th>
            <td><?php echo $horasTrabajo;?></td>
          </tr>
          <tr>
            <th>He colportado:</th>
            <td><?php echo $colportado;?></td>
            <th>He colportado intersemestralmente:</th>
            <td><?php echo $colportajeInter;?></td>
          </tr>
          <tr>
            <th>Veranos colportados:</th>
            <td><?php echo $veranos;?></td>
            <th>Inviernos colportados:</th>
            <td><?php echo $inviernos;?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="container pt-3">
    <div class="row justify-content-md-center">
      <div class="col col-md-6">
        <h2 style="text-align:center">Actividades Devocionales</h2>
      </div>
    </div>
    <div class="row">
      <div class="col table-responsive">
        <table class="table" style="width:100%">
          <tr>
            <th style="width:30%">Tengo Biblia:</th>
            <td style="width:20%; text-align:left"><?php echo $biblia;?></td>
            <th style="width:30%">Formato de Biblia que posees:</th>
            <td style="width:20%; text-align:left"><?php echo $formatoBiblia;?></td>
          </tr>
          <tr>
            <th>Tengo Lección de Escuela Sabática:</th>
            <td><?php echo $leccion;?></td>
            <th>Formato de Lección de Escuela Sabática que posees:</th>
            <td><?php echo $formatoEs;?></td>
          </tr>
          <tr>
            <th>Tengo un plan de estudio devocional:</th>
            <td><?php echo $planEstudio;?></td>
            <th>Días a la semana que lees la Biblia:</th>
            <td><?php echo $frecLectura;?></td>
          </tr>
          <tr>
            <th>Tema de la Biblia que te gustaría conocer más:</th>
            <td><?php echo $tema;?></td>
            <th>Me gustaría estudiar más la Biblia:</th>
            <td><?php echo $estudiarMas;?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="container pt-3">
    <div class="row justify-content-md-center">
      <div class="col col-md-6">
        <h2 style="text-align:center">Actividades JA</h2>
      </div>
    </div>
    <div class="row">
      <div class="col table-responsive">
        <table class="table" style="width:100%">
          <tr>
            <th style="width:30%">Pertenezco o apoyo a algún club o ministerio:</th>
            <td style="width:20%; text-align:left"><?php echo $perteneceClub;?></td>
            <th style="width:30%">Club o ministerio al que perteneces o apoyas:</th>
            <td style="width:20%; text-align:left"><?php echo $club;?></td>
          </tr>
          <tr>
            <th>Soy líder:</th>
            <td><?php echo $lider;?></td>
            <th>Soy aspirante:</th>
            <td><?php echo $aspirante;?></td>
          </tr>
          <tr>
            <th>Me gustaría participar en un plan misionero:</th>
            <td><?php echo $planMisionero;?></td>
            <th>Lugar donde te gustaría participar:</th>
            <td><?php echo $dondePlan;?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="container pt-3">
    <div class="row justify-content-md-center">
      <div class="col col-md-6">
        <h2 style="text-align:center">Datos de Salud</h2>
      </div>
    </div>
    <div class="row">
      <div class="col table-responsive">
        <table class="table" style="width:100%">
          <tr>
            <th style="width:30%">Cantidad de comidas que tienes al día:</th>
            <td style="width:20%; text-align:left"><?php echo $comidasDia;?></td>
            <th style="width:30%">Cantidad de días que comes a la semana:</th>
            <td style="width:20%; text-align:left"><?php echo $diasSemanaCome;?></td>
          </tr>
          <tr>
            <th>Cantidad de días que haces ejercicio a la semana:</th>
            <td><?php echo $ejercicioSemana;?></td>
            <th></th>
            <td></td>
          </tr>
          <tr>
            <th>Practico algún deporte:</th>
            <td><?php echo $practicaDeporte;?></td>
            <th>Deporte que practicas:</th>
            <td><?php echo $deporte;?></td>
          </tr>
          <tr>
            <th>Consumo alcohol:</th>
            <td><?php echo $alcohol;?></td>
            <th>Consumo tabaco:</th>
            <td><?php echo $tabaco;?></td>
          </tr>
          <tr>
            <th>Consumo droga(s):</th>
            <td><?php echo $drogas;?></td>
            <th>Sustancia(s) que consumes:</th>
            <td><?php echo $sustancia;?></td>
          </tr>
          <tr>
            <th>Padezco alguna enfermedad:</th>
            <td><?php echo $padeceEnfermedad;?></td>
            <th>Enfermedad(es) que padeces:</th>
            <td><?php echo $enfermedad;?></td>
          </tr>
          <tr>
            <th>Tratamiento(s) que sigues:</th>
            <td><?php echo $tratamientos;?></td>
            <th></th>
            <td></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</body>

</html>