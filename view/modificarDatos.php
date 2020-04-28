<?php
  include("../controller/conexion.php");
  include('../controller/verificarSesion.php');
  include('../controller/comprobarVerificacion.php');
  include('../controller/validado.php');
  include('../controller/verificarAlumno.php');
  include('../model/modificarDatosModel.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <title>CapellaníaUM | Modificar mis datos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="../js/jquery-3.4.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>


  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
  <link rel="stylesheet" type="text/css" href="../css/navStyle.css" />
  <link rel="stylesheet" type="text/css" href="../css/placeholders.css" />

  <script type="text/javascript">
    function postPersonales() {
      var usuario = "<?php echo $nombre ?>";
      var matricula = document.getElementById("matricula").value;
      var nombre = document.getElementById("nombres").value;
      var apellidos = document.getElementById("apellidos").value;
      var fechaNac = document.getElementById("fechaNac").value;

      if (matricula && nombre && apellidos && fechaNac) {
        $.ajax({
          type: 'post',
          url: '../model/postPersonales.php',
          data: {
            Usuario: usuario,
            Matricula: matricula,
            Nombre: nombre,
            Apellidos: apellidos,
            FechaNac: fechaNac
          },
          success: function (data) {
            if (data == 'error' || data != '') {
              alert('¡Oops! Ocurrió un error. Los datos no se guardaron. Inténtalo de nuevo más tarde.');
            } else if (data == 'Error. Matricula ya existente') {
              alert('La matrícula introducida ya está asociada a una cuenta');
            } else {
              alert('¡Datos guardados!');
              document.getElementById("academicos").click();
            }
          }
        });
      }
      return false;
    }

    function postAcademicos() {
      var usuario = "<?php echo $nombre ?>";
      var facultad = document.getElementById("selectFacultad").value;
      var carrera = document.getElementById("selectCarrera").value;
      var semestre = document.getElementById("semestre").value;
      var situacion = document.getElementById("selectSituacion").value;

      if (facultad == '' || semestre == '' || situacion == '') {
        alert('Completa todos los campos');
      } else if ((facultad != 'ESMUS' && facultad != 'ESPRE' && facultad != 'FATEO') && carrera == '') {
        alert('Completa todos los campos');
      } else if (facultad && semestre && situacion) {
        $.ajax({
          type: 'post',
          url: '../model/postAcademicos.php',
          data: {
            Usuario: usuario,
            Facultad: facultad,
            Carrera: carrera,
            Semestre: semestre,
            Situacion: situacion
          },
          success: function (data) {
            if (data == 'error' || data != '') {
              alert('¡Oops! Ocurrió un error. Los datos no se guardaron. Inténtalo de nuevo más tarde.');
            } else if (data == 'Error. Contestar seccion anterior.') {
              alert('Contesta la sección anterior');
            } else {
              alert('¡Datos guardados!');
              document.getElementById("demograficos").click();
            }
          }
        });
      }
      return false;
    }

    function postDemograficos() {
      var usuario = "<?php echo $nombre ?>";
      var edoCivil = document.getElementById("estadoCivil").value;
      var novio = document.getElementById("novio").checked;
      var amigo = document.getElementById("amigoesp").checked;
      var pais = document.getElementById("selectPais").value;
      var estado = document.getElementById("selectEstado").value;
      var municipio = document.getElementById("selectMunicipio").value;
      var sexo = document.getElementById("sexo").value;
      var prefSexual = document.getElementById("prefsexual").value;
      var residencia = document.getElementById("residencia").value;
      var dormitorio = document.getElementById("dormitorio").value;
      var direccion = document.getElementById("direccion").value;

      if (novio == false) {
        novio = 0;
      } else if (novio == true) {
        novio = 1;
      }

      if (amigo == false) {
        amigo = 0;
      } else if (amigo == true) {
        amigo = 1;
      }


      if (edoCivil == '' || pais == '' || estado == '' || sexo == '' || prefSexual == '' || residencia == '') {
        alert('Completa todos los campos');
      } else if ((pais == '42' && municipio == '') || (residencia == 'Interno' && dormitorio == '') || (residencia ==
          'Externo' && direccion == '')) {
        alert('Completa todos los campos');
      } else {
        $.ajax({
          type: 'post',
          url: '../model/postDemograficos.php',
          data: {
            Usuario: usuario,
            EdoCivil: edoCivil,
            Novio: novio,
            Amigo: amigo,
            Pais: pais,
            Estado: estado,
            Municipio: municipio,
            Sexo: sexo,
            PrefSexual: prefSexual,
            Residencia: residencia,
            Dormitorio: dormitorio,
            Direccion: direccion
          },
          success: function (data) {
            if (data == 'error' || data != '') {
              alert('¡Oops! Ocurrió un error. Los datos no se guardaron. Inténtalo de nuevo más tarde.');
            } else if (data == 'Error. Contestar seccion anterior.') {
              alert('Contesta la sección anterior');
            } else {
              alert('¡Datos guardados!');
              document.getElementById("familiares").click();
            }
          }
        });
      }
      return false;
    }

    function postFamiliares() {
      var usuario = "<?php echo $nombre ?>";
      var ecPadres = document.getElementById("ecpadres").value;
      var hijoEmpleado = document.getElementById("hijoEmpleado").checked;
      var hijoObrero = document.getElementById("hijoObrero").checked;
      var hermanos = document.getElementById("hermanos").checked;

      if (hijoEmpleado == false) {
        hijoEmpleado = 0;
      } else if (hijoEmpleado == true) {
        hijoEmpleado = 1;
      }

      if (hijoObrero == false) {
        hijoObrero = 0;
      } else if (hijoObrero == true) {
        hijoObrero = 1;
      }

      if (hermanos == false) {
        hermanos = 0;
      } else if (hermanos == true) {
        hermanos = 1;
      }

      if (ecPadres == '') {
        alert('Completa todos los campos');
      } else {
        $.ajax({
          type: 'post',
          url: '../model/postFamiliares.php',
          data: {
            Usuario: usuario,
            EcPadres: ecPadres,
            HijoEmpleado: hijoEmpleado,
            HijoObrero: hijoObrero,
            Hermanos: hermanos
          },
          success: function (data) {
            if (data == 'error' || data != '') {
              alert('¡Oops! Ocurrió un error. Los datos no se guardaron. Inténtalo de nuevo más tarde.');
            } else if (data == 'Error. Contestar seccion anterior.') {
              alert('Contesta la sección anterior');
            } else {
              alert('¡Datos guardados!');
              document.getElementById("religiosos").click();
            }
          }
        });
      }
      return false;
    }

    function postReligiosos() {
      var usuario = "<?php echo $nombre ?>";
      var religion = document.getElementById("religion").value;
      var bautizado = document.getElementById("bautizado").checked;
      var fechaBautismo = document.getElementById("fechaBautismo").value;
      var feligresia = document.getElementById("feligresia").value;
      var iglesia = document.getElementById("iglesia").value;
      var cultosAsistencia = document.getElementById("cultosAsistencia").checked;
      var cultos = document.getElementById("cultos").value;
      var esAsistencia = document.getElementById("esAsistencia").checked;
      var es = document.getElementById("es").value;
      var ae = document.getElementById("ae").value;

      if (bautizado == false) {
        bautizado = 0;
      } else if (bautizado == true) {
        bautizado = 1;
      }

      if (cultosAsistencia == false) {
        cultosAsistencia = 0;
      } else if (cultosAsistencia == true) {
        cultosAsistencia = 1;
      }

      if (esAsistencia == false) {
        esAsistencia = 0;
      } else if (esAsistencia == true) {
        esAsistencia = 1;
      }

      if (religion == '' || iglesia == '' || ae == '') {
        alert('Completa todos los campos');
      } else if (bautizado == 1 && (fechaBautismo == '' || feligresia == '')) {
        alert('Completa todos los campos');
      } else if ((cultosAsistencia == 1 && cultos == '') || (esAsistencia == 1 && es == '')) {
        alert('Completa todos los campos');
      } else {
        $.ajax({
          type: 'post',
          url: '../model/postReligiosos.php',
          data: {
            Usuario: usuario,
            Religion: religion,
            Bautizado: bautizado,
            FechaBautismo: fechaBautismo,
            Feligresia: feligresia,
            Iglesia: iglesia,
            CultosAsistencia: cultosAsistencia,
            Cultos: cultos,
            EsAsistencia: esAsistencia,
            Es: es,
            Ae: ae
          },
          success: function (data) {
            if (data == 'error' || data != '') {
              alert('¡Oops! Ocurrió un error. Los datos no se guardaron. Inténtalo de nuevo más tarde.');
            } else if (data == 'Error. Contestar seccion anterior.') {
              alert('Contesta la sección anterior');
            } else {
              alert('¡Datos guardados!');
              document.getElementById("sb").click();
            }
          }
        });
      }
      return false;
    }

    function postSB() {
      var usuario = "<?php echo $nombre ?>";
      var becado = document.getElementById("becado").checked;
      var tipoBeca = document.getElementById("tipoBeca").value;
      var departamento = document.getElementById("departamento").value;
      var horasTrabajo = document.getElementById("horasTrabajo").value;
      var colportado = document.getElementById("colportado").checked;
      var colportadoInter = document.getElementById("colportadoInter").checked;
      var veranos = document.getElementById("veranos").value;
      var inviernos = document.getElementById("inviernos").value;

      if (becado == false) {
        becado = 0;
      } else if (becado == true) {
        becado = 1;
      }

      if (colportado == false) {
        colportado = 0;
      } else if (colportado == true) {
        colportado = 1;
      }

      if (colportadoInter == false) {
        colportadoInter = 0;
      } else if (colportadoInter == true) {
        colportadoInter = 1;
      }

      if (becado == 1 && (tipoBeca == '' || departamento == '')) {
        alert('Completa todos los campos');
      } else if (colportado == 1 && (veranos == '' || inviernos == '')) {
        alert('Completa todos los campos');
      } else {
        $.ajax({
          type: 'post',
          url: '../model/postSB.php',
          data: {
            Usuario: usuario,
            Becado: becado,
            TipoBeca: tipoBeca,
            Departamento: departamento,
            HorasTrabajo: horasTrabajo,
            Colportado: colportado,
            ColportadoInter: colportadoInter,
            Veranos: veranos,
            Inviernos: inviernos
          },
          success: function (data) {
            if (data == 'error' || data != '') {
              alert('¡Oops! Ocurrió un error. Los datos no se guardaron. Inténtalo de nuevo más tarde.');
            } else if (data == 'Error. Contestar seccion anterior.') {
              alert('Contesta la sección anterior');
            } else {
              alert('¡Datos guardados!');
              document.getElementById("actDev").click();
            }
          }
        });
      }
      return false;
    }

    function postDevocionales() {
      var usuario = "<?php echo $nombre ?>";
      var biblia = document.getElementById("biblia").checked;
      var lecciones = document.getElementById("lecciones").checked;
      var planestudio = document.getElementById("planestudio").checked;
      var formatoBiblia = document.getElementById("formatoBiblia").value;
      var formatoEs = document.getElementById("formatoEs").value;
      var diasLecturaBiblia = document.getElementById("diasLecturaBiblia").value;
      var tema = document.getElementById("tema").value;
      var estudiarMas = document.getElementById("estudiarMas").checked;

      if (biblia == false) {
        biblia = 0;
      } else if (biblia == true) {
        biblia = 1;
      }

      if (lecciones == false) {
        lecciones = 0;
      } else if (lecciones == true) {
        lecciones = 1;
      }

      if (planestudio == false) {
        planestudio = 0;
      } else if (planestudio == true) {
        planestudio = 1;
      }

      if (estudiarMas == false) {
        estudiarMas = 0;
      } else if (estudiarMas == true) {
        estudiarMas = 1;
      }

      if (tema == '') {
        alert('Completa todos los campos');
      } else if ((biblia == 1 && (formatoBiblia == '' || diasLecturaBiblia == '')) || (lecciones == 1 && formatoEs ==
          '')) {
        alert('Completa todos los campos');
      } else {
        $.ajax({
          type: 'post',
          url: '../model/postDevocionales.php',
          data: {
            Usuario: usuario,
            Biblia: biblia,
            Lecciones: lecciones,
            Planestudio: planestudio,
            FormatoBiblia: formatoBiblia,
            FormatoEs: formatoEs,
            DiasLecturaBiblia: diasLecturaBiblia,
            Tema: tema,
            EstudiarMas: estudiarMas
          },
          success: function (data) {
            if (data == 'error' || data != '') {
              alert('¡Oops! Ocurrió un error. Los datos no se guardaron. Inténtalo de nuevo más tarde.');
            } else if (data == 'Error. Contestar seccion anterior.') {
              alert('Contesta la sección anterior');
            } else {
              alert('¡Datos guardados!');
              document.getElementById("actJA").click();
            }
          }
        });
      }
      return false;
    }

    function postJA() {
      var usuario = "<?php echo $nombre ?>";
      var perteneceClub = document.getElementById("perteneceClub").checked;
      var tipoClub = document.getElementById("tipoClub").value;
      var lider = document.getElementById("lider").checked;
      var aspirante = document.getElementById("aspirante").checked;
      var planMisionero = document.getElementById("planMisionero").checked;
      var lugarPlan = document.getElementById("lugarPlan").value;

      if (perteneceClub == false) {
        perteneceClub = 0;
      } else if (perteneceClub == true) {
        perteneceClub = 1;
      }

      if (lider == false) {
        lider = 0;
      } else if (lider == true) {
        lider = 1;
      }

      if (aspirante == false) {
        aspirante = 0;
      } else if (aspirante == true) {
        aspirante = 1;
      }

      if (planMisionero == false) {
        planMisionero = 0;
      } else if (planMisionero == true) {
        planMisionero = 1;
      }

      if (perteneceClub == 1 && tipoClub == ''){
        alert('Completa todos los campos');
      }else if(planMisionero == 1 && lugarPlan == ''){
        alert('Completa todos los campos');
        }else{
        $.ajax({
          type: 'post',
          url: '../model/postJA.php',
          data: {
            Usuario: usuario,
            PerteneceClub: perteneceClub,
            TipoClub: tipoClub,
            Lider: lider,
            Aspirante: aspirante,
            PlanMisionero: planMisionero,
            LugarPlan: lugarPlan
          },
          success: function (data) {
            if (data == 'error' || data != '') {
              alert('¡Oops! Ocurrió un error. Los datos no se guardaron. Inténtalo de nuevo más tarde.');
            } else if (data == 'Error. Contestar seccion anterior.') {
              alert('Contesta la sección anterior');
            } else {
              alert('¡Datos guardados!');
              document.getElementById("salud").click();
            }
          }
        });
      }
      return false;
    }

    function postSalud() {
      var usuario = "<?php echo $nombre ?>";
      var comidasalDia = document.getElementById("comidasalDia").value;
      var diasComidaSemana = document.getElementById("diasComidaSemana").value;
      var diasEjercicioSemana = document.getElementById("diasEjercicioSemana").value;
      var practicaDeporte = document.getElementById("practicaDeporte").checked;
      var deporte = document.getElementById("deporte").value;
      var alcohol = document.getElementById("alcohol").checked;
      var tabaco = document.getElementById("tabaco").checked;
      var droga = document.getElementById("droga").checked;
      var sustancia = document.getElementById("sustancia").value;
      var padeceEnfermedad = document.getElementById("padeceEnfermedad").checked;
      var enfermedad = document.getElementById("enfermedad").value;
      var tratamientos = document.getElementById("tratamientos").value;

      if (practicaDeporte == false) {
        practicaDeporte = 0;
      } else if (practicaDeporte == true) {
        practicaDeporte = 1;
      }

      if (alcohol == false) {
        alcohol = 0;
      } else if (alcohol == true) {
        alcohol = 1;
      }

      if (tabaco == false) {
        tabaco = 0;
      } else if (tabaco == true) {
        tabaco = 1;
      }

      if (droga == false) {
        droga = 0;
      } else if (droga == true) {
        droga = 1;
      }

      if (padeceEnfermedad == false) {
        padeceEnfermedad = 0;
      } else if (padeceEnfermedad == true) {
        padeceEnfermedad = 1;
      }

      if (practicaDeporte == 1 && deporte == ''){
        alert('Completa todos los campos');
      }else if(droga == 1 && sustancia == ''){
        alert('Completa todos los campos');
      }else if(padeceEnfermedad == 1 && (enfermedad == '' || tratamientos == '')){
        alert('Completa todos los campos');
      }else if(comidasalDia == ''|| diasComidaSemana == '' || diasEjercicioSemana == ''){
        alert('Completa todos los campos');
      }else{
        $.ajax({
          type: 'post',
          url: '../model/postSalud.php',
          data: {
            Usuario: usuario,
            ComidasalDia: comidasalDia,
            DiasComidaSemana: diasComidaSemana,
            DiasEjercicioSemana:diasEjercicioSemana,
            PracticaDeporte: practicaDeporte,
            Deporte: deporte,
            Alcohol: alcohol,
            Tabaco: tabaco,
            Droga:droga,
            Sustancia:sustancia,
            PadeceEnfermedad:padeceEnfermedad,
            Enfermedad:enfermedad,
            Tratamientos:tratamientos
          },
          success: function (data) {
            if (data == 'error' || data != '') {
              alert('¡Oops! Ocurrió un error. Los datos no se guardaron. Inténtalo de nuevo más tarde.');
            } else if (data == 'Error. Contestar seccion anterior.') {
              alert('Contesta la sección anterior');
            } else {
              alert('¡Datos guardados!');
              window.location.replace("servicioCapellania");
            }
          }
        });
      }
      return false;
    }
  </script>



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
                    <li class="nav-item"><a class="nav-link" href="servicioCapellania">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="calendarioAlumnos">CITAS</a></li>
                    <li class="nav-item"><a class="nav-link active" href="modificarDatos">MODIFICAR MIS DATOS</a></li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                      <?php echo $nombreCuenta; ?>
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="configEst">Configuración</a>
                        <a class="dropdown-item" href="../controller/cerrarSesion">Cerrar Sesión</a>
                      </div>
                    </li>
                    </div>
                </ul>
          </div>
      </nav>

  <!-- Tab links -->
  <div class="tab">
    <button class="tablinks" onclick="openTab(event, 'Personales')" id="defaultOpen">Personales</button>
    <button class="tablinks" onclick="openTab(event, 'Academicos')" id="academicos">Académicos</button>
    <button class="tablinks" onclick="openTab(event, 'Demograficos')" id="demograficos">Demográficos</button>
    <button class="tablinks" onclick="openTab(event, 'Familiares')" id="familiares">Familiares</button>
    <button class="tablinks" onclick="openTab(event, 'Religiosos')" id="religiosos">Religiosos</button>
    <button class="tablinks" onclick="openTab(event, 'SBecario')" id="sb">Servicio Becario</button>
    <button class="tablinks" onclick="openTab(event, 'Devocionales')" id="actDev">Actividades Devocionales</button>
    <button class="tablinks" onclick="openTab(event, 'ActividadesJA')" id="actJA">Actividades JA</button>
    <button class="tablinks" onclick="openTab(event, 'Salud')" id="salud">Salud</button>
  </div>
  <br><br>


  <!-- Tab content -->
  <div id="Personales" class="tabcontent">
    <!------------------------Contenido de la pestaña 1  (PERSONALES)----------------------------------------->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST" onsubmit="return postPersonales();">
      <div id="formulario">
        <h3>Datos Personales</h3>
      </div>
      <div id="tabla-formulario-personales">
        <div class="form-group">
          <form method="POST" action="entrevistaInicialModel.php">
            <label for="matricula">Matrícula</label>
            <input type="text" class="form-control" name="matricula" id="matricula" placeholder="Matrícula"
              maxlength="7" ondrop="return false" onpaste="return false"
              onkeypress="return event.charCode>=48 && event.charCode<=57" min="1" value="<?php echo $matricula ?>"
              required>
            <br>

            <label for="nombre">Nombre(s)</label>
            <input type="text" class="form-control" style="text-transform: capitalize;" id="nombres" name="nombres"
              placeholder="Nombre(s)" value="<?php echo $nombres ?>" required>
            <br>

            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" style="text-transform: capitalize;" id="apellidos" name="apellidos"
              placeholder="Apellidos" value="<?php echo $apellidos ?>" required>
            <br>

            <label for="fechaNac">Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fechaNac" id="fechaNac" min="1950-01-01" max="9999-12-31"
              value="<?php echo $fechaNac ?>" required>

          </form>
        </div>
        <br>

        <div class="col text-center">
          <button class="btn btn-success regular-button" name="btnPersonales" type="submit" id="btnPersonales"> Guardar
          </button>
        </div>


      </div>
    </form>
  </div>

  <div id="Academicos" class="tabcontent">
    <!------------------------Contenido de la pestaña 2  (ACADEMICOS)----------------------------------------->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST" onsubmit="return postAcademicos();">
      <div id="formulario">
        <h3>Datos Académicos</h3>
      </div>

      <div id="tabla-formulario-academicos">
        <label for="selectFacultad">Facultad/Escuela</label>

        <select class="form-control" id="selectFacultad" name="selectFacultad">

          <option value="">Selecciona tu facultad/escuela</option>
          <?php echo $output; ?>
        </select>
        <br>

        <div id="carreraDiv" style="display:none">
          <label for="selectCarrera">Carrera</label>
          <select class="form-control" id="selectCarrera" name="selectCarrera">
            <option value="">Selecciona tu carrera</option>
          </select>
          <br>
        </div>

        <label for="semestre">Semestre/Tetramestre</label>
        <select class="form-control" id="semestre" name="semestre">
          <option value="">Selecciona el semestre/tetramestre que estás cursando</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
        <br>

        <div>
          <label for="selectSituacion">Situación académica</label>
          <select class="form-control" id="selectSituacion" name="selectSituacion">
            <option value="">Selecciona tu situación académica</option>
            <option value="Regular">Regular</option>
            <option value="Irregular">Irregular</option>
          </select>
          <br>
        </div>

        <div class="col text-center">
          <button class="btn btn-success regular-button" type="submit" id="guardarAcademicos"> Guardar </button>
        </div>

      </div>
    </form>
  </div>

  <div id="Demograficos" class="tabcontent">
    <!------------------------Contenido de la pestaña 3  (DEMOGRAFICOS)----------------------------------------->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST" onsubmit="return postDemograficos();">
      <div id="formulario">
        <h3>Datos Demográficos</h3>
      </div>

      <div id="tabla-formulario">

        <label for="estadoCivil">Estado civil</label>
        <select class="form-control" id="estadoCivil" name="estadoCivil">
          <option value="">Selecciona un estado civil</option>
          <option value="Soltero">Soltero(a)</option>
          <option value="Casado">Casado(a)</option>
          <option value="Divorciado">Divorciado(a)</option>
          <option value="Separado">Separado(a)</option>
          <option value="Viudo">Viudo(a)</option>
          <option value="En unión libre">En unión libre</option>
        </select>

        <br>
        <div id="novioDiv" class="form-check" style="display:none">
          <input type="checkbox" class="form-check-input" id="novio" name="novio">
          <label class="form-check-label" for="novio">Tengo novio(a)</label>
        </div>

        <div id="amigoEspDiv" class="form-check" style="display:none">
          <input type="checkbox" class="form-check-input" id="amigoesp" name="amigoesp">
          <label class="form-check-label" for="amigoesp">Tengo amigo(a) especial</label>
        </div>

        <br>

        <label>Lugar de nacimiento</label>
        <br>

        <label for="selectPais">País</label>
        <select class="form-control" id="selectPais" name="selectPais">
          <option value="">Selecciona un país</option>
          <?php echo $paises; ?>
        </select>

        <div id="estadoDiv" style="display:none">
          <label for="selectEstado">Estado</label>
          <select class="form-control" id="selectEstado" name="selectEstado">
            <option value="">Selecciona un estado</option>
          </select>
        </div>

        <div id="municipioDiv" style="display:none">
          <label for="selectMunicipio">Municipio</label>
          <select class="form-control" id="selectMunicipio" name="selectMunicipio">
            <option value="">Selecciona un municipio</option>
          </select>
        </div>

        <br>

        <label for="sexo">Sexo</label>
        <select class="form-control" id="sexo" name="sexo">
          <option value="">Selecciona tu sexo</option>
          <option value="Hombre">Hombre</option>
          <option value="Mujer">Mujer</option>
        </select>

        <br>

        <label for="prefsexual">Preferencia sexual</label>
        <select class="form-control" id="prefsexual" name="prefsexual">
          <option value="">Selecciona tu preferencia sexual</option>
          <option value="Heterosexual">Heterosexual</option>
          <option value="Homosexual">Homosexual</option>
          <option value="Bisexual">Bisexual</option>
          <option value="Asexual">Asexual</option>
          <option value="Otro">Otro</option>
          <option value="Prefiero no contestar">Prefiero no contestar</option>
        </select>

        <br>

        <label for="residencia">Residencia actual</label>
        <select class="form-control" id="residencia" name="residencia">
          <option value="">Selecciona tu residencia actual</option>
          <option value="Interno">Interno</option>
          <option value="Externo">Externo</option>
        </select>

        <br>

        <div id="dormitorioDiv" style="display:none">
          <label for="dormitorio">Dormitorio</label>
          <select class="form-control" id="dormitorio" name="dormitorio">
            <option value="">Selecciona tu dormitorio</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
          <br>
        </div>



        <div class="form-group" id="direccionDiv" style="display:none">
          <label for="direccion">Dirección</label>
          <input type="text" style="text-transform: none;" class="form-control" id="direccion" name="direccion"
            placeholder="Escribe la dirección de tu residencia actual">
        </div>

        <br>

        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>
      </div>
    </form>

  </div>

  <div id="Familiares" class="tabcontent">
    <!------------------------Contenido de la pestaña 4  (FAMILIRES)----------------------------------------->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST" onsubmit="return postFamiliares();">
      <div id="formulario">
        <h3>Datos Familiares</h3>
      </div>

      <div id="tabla-formulario">

        <label for="ecpadres">Estado civil de tus padres</label>
        <select class="form-control" id="ecpadres" name="ecpadres">
          <option value="">Selecciona el estado civil de tus padres</option>
          <option value="Casados">Casados</option>
          <option value="Divorciados">Divorciados</option>
          <option value="Separados">Separados</option>
          <option value="Viudo(a)">Viudo(a)</option>
          <option value="En unión libre">En unión libre</option>
          <option value="Ninguno/No aplica">Ninguno de los anteriores/No aplica</option>
        </select>

        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hijoEmpleado" name="hijoEmpleado">
          <label class="form-check-label" for="hijoEmpleado">Soy hijo(a) de empleado UM</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hijoObrero" name="hijoObrero">
          <label class="form-check-label" for="hijoObrero">Soy hijo(a) de obrero adventista</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hermanos" name="hermanos">
          <label class="form-check-label" for="hermanos">Tengo hermanos en la UM</label>
        </div>
        <br>

        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>
      </div>
    </form>
  </div>

  <div id="Religiosos" class="tabcontent">
    <!------------------------Contenido de la pestaña 5  (RELIGIOSOS)----------------------------------------->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST" onsubmit="return postReligiosos();">
      <div id="formulario">
        <h3>Datos Religiosos</h3>
      </div>

      <div id="tabla-formulario">

        <label for="religion">Religión que practicas</label>
        <select class="form-control" id="religion" name="religion">
          <option value="">Selecciona la religión que practicas</option>
          <option value="Adventista">Adventista</option>
          <option value="Católica">Católica</option>
          <option value="Testigo de Jehová">Testigo de Jehová</option>
          <option value="Bautista">Bautista</option>
          <option value="Metodista">Metodista</option>
          <option value="Pentecostal">Pentecostal</option>
          <option value="Otra">Otra</option>
          <option value="Ninguna">Ninguna</option>
        </select>
        <br>


        <div class="form-check" style="display:none" id="bautizadoDiv">
          <input type="checkbox" class="form-check-input" id="bautizado">
          <label class="form-check-label" for="bautizado">Soy bautizado</label>
          <br>
        </div>


        <div class="form-group" style="display:none" id="fechaBautismoDiv">
          <label for="fechaBautismo">Fecha de tu bautismo</label>
          <input type="date" class="form-control" id="fechaBautismo" name="fechaBautismo" min="1950-01-01"
            max="9999-12-31">
        </div>

        <div class="form-group" style="display:none" id="feligresiaDiv">
          <label for="feligresia">Feligresía actual</label>
          <input type="text" style="text-transform: none;" class="form-control" id="feligresia" name="feligresia"
            placeholder="Iglesia en la que se encuentra actualmente tu feligresía">
        </div>


        <div id="iglesiaDiv">
          <label for="iglesia">Iglesia a la que asistes</label>
          <select class="form-control" id="iglesia">
            <option value="">Selecciona la iglesia a la que asistes</option>
            <option value="Central">Central Universitaria</option>
            <option value="Zambrano">Zambrano</option>
            <option value="Los Sabinos">Los Sabinos</option>
            <option value="La Estación">La Estación</option>
            <option value="Mutualismo">Mutualismo</option>
            <option value="Gil de Leyva">Gil de Leyva</option>
            <option value="Centro">Centro</option>
            <option value="Las Alamedas">Las Alamedas</option>
            <option value="Los Naranjos">Los Naranjos</option>
            <option value="Hacienda de Enmedio">Hacienda de Enmedio</option>
            <option value="Del Maestro">Del Maestro</option>
            <option value="Barrio Zaragoza">Barrio Zaragoza</option>
            <option value="La Ladrillera">La Ladrillera</option>
            <option value="Otra">Otra</option>
            <option value="Otra no Adventista">Otra (no Adventista)</option>
            <option value="Ninguna">Ninguna</option>
          </select>
          <br>
        </div>

        <div class="form-check" style="display:none" id="cultosAsistenciaDiv">
          <input type="checkbox" class="form-check-input" id="cultosAsistencia" name="cultosAsistencia">
          <label class="form-check-label" for="cultosAsistencia">Asisto a los cultos</label>
          <br>
        </div>


        <div id="cultosDiv" style="display:none">
          <label for="cultos">Culto al que asistes</label>
          <select class="form-control" id="cultos" name="cultos">
            <option value="">Selecciona el culto al que asistes</option>
            <option value="Primero">Primero</option>
            <option value="Segundo">Segundo</option>
          </select>
          <br>
        </div>

        <div class="form-check" style="display:none" id="esAsistenciaDiv">
          <input type="checkbox" class="form-check-input" id="esAsistencia" name="esAsistencia">
          <label class="form-check-label" for="esAsistencia">Asisto a la Escuela Sabática</label>
          <br>
        </div>


        <div id="esDiv" style="display:none">
          <label for="es">Escuela Sabática a la que asistes</label>
          <select class="form-control" id="es">
            <option value="">Selecciona la Escuela Sabática a la que asistes</option>
            <option value="Iglesia Universitaria">Iglesia Universitaria</option>
            <option value="Inglés">Inglés</option>
            <option value="Francés">Francés</option>
          </select>
          <br>
        </div>

        <label for="ae">Actividad espiritual que más te gusta</label>
        <select class="form-control" id="ae" name="ae">
          <option value="">Selecciona la actividad espiritual que más te gusta</option>
          <option value="Sociedad de Jóvenes">Sociedad de Jóvenes</option>
          <option value="Retiro espiritual">Retiro espiritual</option>
          <option value="Vigilia">Vigilia</option>
          <option value="Semana de oración">Semana de oración</option>
          <option value="Otra">Otra</option>

        </select>
        <br>

        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>
      </div>
    </form>
  </div>

  <div id="SBecario" class="tabcontent">
    <!------------------------Contenido de la pestaña 6  (SERVICIO BECARIO)----------------------------------------->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST" onsubmit="return postSB();">
      <div id="formulario">
        <h3>Datos de Servicio Becario</h3>
      </div>

      <div id="tabla-formulario">


        <br>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="becado" name="becado">
          <label class="form-check-label" for="becado">Soy becado</label>
        </div>



        <div id="tipoBecaDiv" style="display:none">
          <br>
          <label for="tipoBeca">Tipo de beca</label>
          <input type="text" style="text-transform: none;" class="form-control" id="tipoBeca" name="tipoBeca" placeholder="Tipo de beca">

          <br>
        </div>

        <div id="departamentoDiv" style="display:none">
          <label for="departamento">Departamento en el que trabajas</label>
          <input type="text" style="text-transform: none;" class="form-control" id="departamento" name="departamento" placeholder="Departamento">
          <br>
        </div>

        <div class="form-group" style="display:none" id="horasTrabajoDiv">
          <label for="horasTrabajo">Horas de trabajo diario</label>
          <input type="text" class="form-control" name="horasTrabajo" id="horasTrabajo" value="0"
            placeholder="Horas de trabajo diario" maxlength="2" ondrop="return false" onpaste="return false"
            onkeypress="return event.charCode>=48 && event.charCode<=57" min="1" onClick="this.select();" required>
          <br>
        </div>


        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="colportado" name="colportado">
          <label class="form-check-label" for="colportado">He colportado</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="colportadoInter" name="colportadoInter">
          <label class="form-check-label" for="colportadoInter">He colportado intersemestralmente</label>
          <br>
        </div>


        <div class="form-group" style="display:none" id="veranosDiv">
          <label for="veranos">Veranos colportados</label>
          <input type="text" class="form-control" name="veranos" id="veranos" value="0"
            placeholder="Veranos colportados" maxlength="2" ondrop="return false" onpaste="return false"
            onkeypress="return event.charCode>=48 && event.charCode<=57" min="1" onClick="this.select();" required>
        </div>

        <div class="form-group" style="display:none" id="inviernosDiv">
          <label for="inviernos">Inviernos colportados</label>
          <input type="text" class="form-control" name="inviernos" id="inviernos" value="0"
            placeholder="Inviernos colportados" maxlength="2" ondrop="return false" onpaste="return false"
            onkeypress="return event.charCode>=48 && event.charCode<=57" min="1" onClick="this.select();" required>
        </div>

        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>

      </div>
    </form>
  </div>

  <div id="ActividadesJA" class="tabcontent">
    <!------------------------Contenido de la pestaña 7  (ACTIVIDADES JA)----------------------------------------->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST" onsubmit="return postJA();">
      <div id="formulario">
        <h3>Datos sobre Actividades JA</h3>
      </div>

      <div id="tabla-formulario">
        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="perteneceClub" name="perteneceClub">
          <label class="form-check-label" for="perteneceClub">Pertenezco o apoyo a algún club o ministerio</label>
        </div>

        <div id="tipoClubDiv" style="display:none">
          <br>
          <label for="tipoClub">Club o ministerio al que perteneces o apoyas</label>
          <select class="form-control" id="tipoClub" name="tipoClub">
          <option value="">Selecciona el club o ministerio al que perteneces o apoyas</option>
            <option value="Directiva MJ">Directiva MJ</option>
            <option value="Aventureros">Aventureros</option>
            <option value="Conquistadores">Conquistadores</option>
            <option value="Guías Mayores Junio">Guías Mayores Junior</option>
            <option value="Guías Mayores Universitarios">Guías Mayores Universitarios</option>
            <option value="Guías Mayores Avanzados">Guías Mayores Avanzados</option>
            <option value="Guías Mayores Instructores">Guías Mayores Instructores</option>
            <option value="Medallones">Medallones</option>
            <option value="Líderes Juveniles">Líderes Juveniles</option>
            <option value="AALMMA">AALMMA</option>
            <option value="ABDA">ABDA</option>
            <option value="CRAH">CRAH</option>
            <option value="Drama mudo">Drama mudo</option>
            <option value="Expresión celestial">Expresión Celestial</option>
            <option value="Handmine">Handmine</option>
            <option value="JAM">JAM</option>
            <option value="Kerusso">Kerusso</option>
            <option value="MOASAM">MOASAM</option>
            <option value="Santuario">Santuario</option>
            <option value="SensUM">SensUM</option>
            <option value="Otro">Otro</option>
          </select>
          <br>
        </div>

        <div class="form-check" style="display:none" id="liderDiv">
          <input type="checkbox" class="form-check-input" id="lider" name="lider">
          <label class="form-check-label" for="lider">Soy líder</label>
        </div>

        <div class="form-check" style="display:none" id="aspiranteDiv">
          <input type="checkbox" class="form-check-input" id="aspirante" name="aspirante">
          <label class="form-check-label" for="aspirante">Soy aspirante</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="planMisionero" name="planMisionero">
          <label class="form-check-label" for="planMisionero">Me gustaría participar en un plan misionero</label>
          <br>
        </div>

        <div class="form-group" style="display:none" id="lugarPlanDiv">
          <label for="lugarPlan">Lugar donde te gustaría participar</label>
          <input type="text" style="text-transform: none;" class="form-control" id="lugarPlan" name="lugarPlan"
            placeholder="Escribe el lugar donde te gustaría participar">
        </div>

        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>
      </div>
    </form>
  </div>


  <div id="Devocionales" class="tabcontent">
    <!------------------------Contenido de la pestaña 7  (ACTIVIDADES DEVOCIONALES)----------------------------------------->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST" onsubmit="return postDevocionales();">
      <div id="formulario">
        <h3>Datos sobre Actividades Devocionales</h3>
      </div>

      <div id="tabla-formulario">
        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="biblia" name="biblia">
          <label class="form-check-label" for="biblia">Tengo Biblia</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="lecciones" name="lecciones">
          <label class="form-check-label" for="lecciones">Tengo Lección de Escuela Sabática</label>
        </div>

        <div class="form-check" style="display:none" id="planestudioDiv">
          <input type="checkbox" class="form-check-input" id="planestudio" name="planestudio">
          <label class="form-check-label" for="planestudio">Tengo un plan de estudio devocional</label>
        </div>


        <div id="formatoBibliaDiv" style="display:none">
          <br>
          <label for="formatoBiblia">Formato de Biblia que posees</label>
          <select class="form-control" id="formatoBiblia" name="formatoBiblia">
          <option value="">Selecciona el formato en el que posees tu Biblia</option>
            <option value="Físico">Físico</option>
            <option value="Digital">Digital</option>
            <option value="Ambos, físico y digital">Ambos</option>
          </select>
        </div>

        <div id="formatoEsDiv" style="display:none">
          <br>
          <label for="formatoEs">Formato de Lección de Escuela Sabática que posees</label>
          <select class="form-control" id="formatoEs" name="formatoEs">
          <option value="">Selecciona el formato en el que posees tu Lección de Escuela Sabática</option>
            <option value="Físico">Físico</option>
            <option value="Digital">Digital</option>
            <option value="Ambos, físico y digital">Ambos</option>
          </select>
        </div>

        <div class="form-group" style="display:none" id="diasLecturaBibliaDiv">
          <br>
          <label for="diasLecturaBiblia">Días a la semana que lees la Biblia</label>
          <input type="text" class="form-control" name="diasLecturaBiblia" id="diasLecturaBiblia" value="0"
            placeholder="Días a la semana que lees la Biblia" maxlength="1" ondrop="return false" onpaste="return false"
            onkeypress="return event.charCode>=48 && event.charCode<=57" min="1" onClick="this.select();" required>
        </div>


        <div class="form-group">
          <br>
          <label for="tema">Tema de la Biblia que te gustaría conocer más</label>
          <input type="text" style="text-transform: none;" class="form-control" id="tema" name="tema" placeholder="Escribe un tema">
        </div>


        <div class="form-check">
          <br>
          <input type="checkbox" class="form-check-input" id="estudiarMas" name="estudiarMas">
          <label class="form-check-label" for="estudiarMas">Me gustaría estudiar más la Biblia</label>
        </div>
        <br>


        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>
      </div>
    </form>
  </div>



  <div id="Salud" class="tabcontent">
    <!------------------------Contenido de la pestaña 8  (SALUD)----------------------------------------->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST" onsubmit="return postSalud();">
      <div id="formulario">
        <h3>Datos de Salud</h3>
      </div>

      <div id="tabla-formulario">

        <div class="form-group">
          <label for="comidasalDia">Cantidad de comidas que tienes al día</label>
          <input type="text" class="form-control" name="comidasalDia" id="comidasalDia" value="0"
            placeholder="Cantidad de comidas que tienes al día" maxlength="1" ondrop="return false"
            onpaste="return false" onkeypress="return event.charCode>=48 && event.charCode<=57" min="1"
            onClick="this.select();" required>
        </div>

        <div class="form-group">
          <label for="diasComidaSemana">Cantidad de días que comes a la semana</label>
          <input type="text" class="form-control" name="diasComidaSemana" id="diasComidaSemana" value="0"
            placeholder="Cantidad de días que comes a la semana" maxlength="1" ondrop="return false"
            onpaste="return false" onkeypress="return event.charCode>=48 && event.charCode<=57" min="1"
            onClick="this.select();" required>
        </div>

        <div class="form-group">
          <label for="diasEjercicioSemana">Cantidad de días que haces ejercicio a la semana</label>
          <input type="text" class="form-control" name="diasEjercicioSemana" id="diasEjercicioSemana" value="0"
            placeholder="Cantidad de días que comes a la semana" maxlength="1" ondrop="return false"
            onpaste="return false" onkeypress="return event.charCode>=48 && event.charCode<=57" min="1"
            onClick="this.select();" required>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="practicaDeporte" name="practicaDeporte">
          <label class="form-check-label" for="practicaDeporte">Practico algún deporte</label>
        </div>

        <div id="deporteDiv" style="display:none"><br>
          <label for="deporte">Deporte que practicas</label>
          <select class="form-control" id="deporte">
            <option value="">Selecciona el deporte que practicas</option>
            <option value="Futbol">Fútbol</option>
            <option value="Basquetbol">Básquetbol</option>
            <option value="Voleibol">Vóleibol</option>
            <option value="Beisbol">Béisbol</option>
            <option value="Otro">Otro</option>
          </select>
          <br>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="alcohol" name="alcohol">
          <label class="form-check-label" for="alcohol">Consumo alcohol</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="tabaco" name="tabaco">
          <label class="form-check-label" for="tabaco">Consumo tabaco</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="droga" name="droga">
          <label class="form-check-label" for="droga">Consumo droga(s)</label>
        </div>

        <div id="sustanciaDiv" style="display:none">
          <br>
          <label for="sustancia">Sustancia(s) que consumes</label>
          <input type="text" style="text-transform: none;" class="form-control" id="sustancia" name="sustancia" placeholder="Sustancia que consumes">
          <br>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="padeceEnfermedad" name="padeceEnfermedad">
          <label class="form-check-label" for="padeceEnfermedad">Padezco alguna enfermedad</label>
        </div>
        <br>
        <div class="form-group" style="display:none" id="enfermedadDiv">
          <label for="enfermedad">Enfermedad(es) que padeces</label>
          <input type="text" style="text-transform: none;" class="form-control" id="enfermedad" name="enfermedad"
            placeholder="Enfermedad(es) que padeces">
        </div>

        <div class="form-group" style="display:none" id="tratamientosDiv">
          <label for="tratamientos">Tratamiento(s) que sigues</label>
          <textarea class="form-control" id="tratamientos" placeholder="Describe el(los) tratamiento(s) que sigues"
            style="min-height: 65px;"></textarea>
        </div>

        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>
      </div>
    </form>
  </div>

  <script type="text/javascript" src="../js/cambiarPestanna.js"></script>
</body>

</html>

<script>
  $(document).ready(function () {
    $('#selectFacultad').change(function () {
      var idFacultad = $(this).val();
      $.ajax({
        url: "../model/buscarCarreras.php",
        method: "POST",
        data: {
          idFacultad: idFacultad
        },
        dataType: "text",
        success: function (data) {
          $('#selectCarrera').html(data);
        }
      });
    })
  });

  $(document).ready(function () {
    $('#selectPais').change(function () {
      var id = $(this).val();
      $.ajax({
        url: "../model/buscarEstados.php",
        method: "POST",
        data: {
          idPais: id
        },
        dataType: "text",
        success: function (data) {
          $('#selectEstado').html(data);
        }
      });
    })
  });

  $(document).ready(function () {
    $('#selectEstado').change(function () {
      var id = $(this).val();
      $.ajax({
        url: "../model/buscarMunicipios.php",
        method: "POST",
        data: {
          idEstado: id
        },
        dataType: "text",
        success: function (data) {
          $('#selectMunicipio').html(data);
        }
      });
    })
  });

  $(document).ready(function () {
    $('#selectFacultad').on('change', function () {
      if (this.value == 'ESMUS' || this.value == 'ESPRE' || this.value == 'FATEO' || this.value == '') {
        $("#carreraDiv").hide();
      } else {
        $("#carreraDiv").show();
      }
    });
  });

  $(document).ready(function () {
    $('#estadoCivil').on('change', function () {
      if (this.value == 'Soltero') {
        $("#novioDiv").show();
        $("#amigoEspDiv").show();
      } else {
        $("#novioDiv").hide();
        document.getElementById("novio").checked = false;
        $("#amigoEspDiv").hide();
        document.getElementById("amigoesp").checked = false;
      }
    });
  });

  $(document).ready(function () {
    $('#novio').on('change', function () {
      if (this.checked == true) {
        $("#amigoEspDiv").hide();
      } else {
        $("#amigoEspDiv").show();
      }
    });
  });

  $(document).ready(function () {
    $('#amigoesp').on('change', function () {
      if (this.checked == true) {
        $("#novioDiv").hide();
      } else {
        $("#novioDiv").show();
      }
    });
  });

  $(document).ready(function () {
    $('#selectPais').on('change', function () {
      if (this.value != '') {
        $("#estadoDiv").show();
        $("#municipioDiv").hide();
        document.getElementById("selectMunicipio").value = '';
      } else {
        $("#estadoDiv").hide();
        $("#municipioDiv").hide();
        document.getElementById("selectMunicipio").value = '';
      }
    });
  });

  $(document).ready(function () {
    $('#selectEstado').on('change', function () {
      if (document.getElementById("selectPais").value == '42') {
        $("#municipioDiv").show();
      } else {
        $("#municipioDiv").hide();
      }
    });
  });

  $(document).ready(function () {
    $('#residencia').on('change', function () {
      if (this.value == 'Interno') {
        $("#dormitorioDiv").show();
        $("#direccionDiv").hide();
        document.getElementById("direccion").value = '';
      } else if (this.value == 'Externo') {
        $("#dormitorioDiv").hide();
        document.getElementById("dormitorio").value = '';
        $("#direccionDiv").show();
      } else {
        $("#dormitorioDiv").hide();
        document.getElementById("dormitorio").value = '';
        $("#direccionDiv").hide();
        document.getElementById("direccion").value = '';
      }
    });
  });

  $(document).ready(function () {
    $('#religion').on('change', function () {
      if (this.value == 'Adventista') {
        $("#bautizadoDiv").show();
      } else {
        $("#bautizadoDiv").hide();
        document.getElementById("bautizado").checked = false;

        $("#fechaBautismoDiv").hide();
        document.getElementById("fechaBautismo").value = '';

        $("#feligresiaDiv").hide();
        document.getElementById("feligresia").value = '';
      }
    });
  });

  $(document).ready(function () {
    $('#bautizado').on('change', function () {
      if (this.checked == true) {
        $("#fechaBautismoDiv").show();
        $("#feligresiaDiv").show();

      } else if (this.checked == false) {
        $("#fechaBautismoDiv").hide();
        document.getElementById("fechaBautismo").value = '';

        $("#feligresiaDiv").hide();
        document.getElementById("feligresia").value = '';
      }
    });
  });

  $(document).ready(function () {
    $('#iglesia').on('change', function () {

      document.getElementById("cultosAsistencia").checked = false;
      document.getElementById("esAsistencia").checked = false;
      document.getElementById("cultos").value = '';
      document.getElementById("es").value = '';

      if (this.value == 'Central') {
        $("#cultosAsistenciaDiv").show();
        $("#cultosDiv").hide();
        $("#esAsistenciaDiv").show();
        $("#esDiv").hide();

      } else if (this.value != 'central') {

        $("#cultosAsistenciaDiv").hide();
        $("#cultosDiv").hide();
        $("#esAsistenciaDiv").hide();
        $("#esDiv").hide();

      }
    });
  });

  $(document).ready(function () {
    $('#cultosAsistencia').on('change', function () {
      if (document.getElementById("iglesia").value == 'Central' && this.checked == true) {
        $("#cultosDiv").show();

      } else if (document.getElementById("iglesia").value == 'Central' && this.checked == false) {
        $("#cultosDiv").hide();
        document.getElementById("cultos").value = '';
      }
    });
  });

  $(document).ready(function () {
    $('#esAsistencia').on('change', function () {
      if (document.getElementById("iglesia").value == 'Central' && this.checked == true) {
        $("#esDiv").show();

      } else if (document.getElementById("iglesia").value == 'Central' && this.checked == false) {
        $("#esDiv").hide();
        document.getElementById("es").value = '';
      }
    });
  });

  $(document).ready(function () {
    $('#becado').on('change', function () {
      if (this.checked == true) {
        $("#tipoBecaDiv").show();
        $("#departamentoDiv").show();
        $("#horasTrabajoDiv").show();
      } else if (this.checked == false) {

        document.getElementById("tipoBeca").value = '';
        document.getElementById("departamento").value = '';
        document.getElementById("horasTrabajo").value = '0';
        $("#tipoBecaDiv").hide();
        $("#departamentoDiv").hide();
        $("#horasTrabajoDiv").hide();

      }
    });
  });

  $(document).ready(function () {
    $('#colportado').on('change', function () {
      if (this.checked == true) {
        $("#veranosDiv").show();
        $("#inviernosDiv").show();
      } else if (this.checked == false) {

        document.getElementById("veranos").value = '0';
        document.getElementById("inviernos").value = '0';
        $("#veranosDiv").hide();
        $("#inviernosDiv").hide();

      }
    });
  });

  $(document).ready(function () {
    $('#biblia').on('change', function () {
      if (this.checked == true) {
        $("#formatoBibliaDiv").show();
        $("#diasLecturaBibliaDiv").show();
        $("#planestudioDiv").show();

      } else if (this.checked == false) {
        if (document.getElementById("lecciones").checked == false) {
          $("#planestudioDiv").hide();
          document.getElementById("planestudio").checked = false;
        }
        $("#formatoBibliaDiv").hide();
        $("#diasLecturaBibliaDiv").hide();
        document.getElementById("formatoBiblia").value = '';
        document.getElementById("diasLecturaBiblia").value = '0';
      }
    });
  });

  $(document).ready(function () {
    $('#lecciones').on('change', function () {
      if (this.checked == true) {
        $("#formatoEsDiv").show();
        $("#planestudioDiv").show();
      } else if (this.checked == false) {
        if (document.getElementById("biblia").checked == false) {
          $("#planestudioDiv").hide();
          document.getElementById("planestudio").checked = false;
        }

        $("#formatoEsDiv").hide();
        document.getElementById("formatoEs").value = '';
      }
    });
  });

  $(document).ready(function () {
    $('#practicaDeporte').on('change', function () {
      if (this.checked == true) {
        $("#deporteDiv").show();
      } else if (this.checked == false) {
        $("#deporteDiv").hide();
        document.getElementById("deporte").value = '';
      }
    });
  });

  $(document).ready(function () {
    $('#droga').on('change', function () {
      if (this.checked == true) {
        $("#sustanciaDiv").show();
      } else if (this.checked == false) {
        $("#sustanciaDiv").hide();
        document.getElementById("sustancia").value = '';
      }
    });
  });

  $(document).ready(function () {
    $('#padeceEnfermedad').on('change', function () {
      if (this.checked == true) {
        $("#enfermedadDiv").show();
        $("#tratamientosDiv").show();
      } else if (this.checked == false) {
        $("#enfermedadDiv").hide();
        $("#tratamientosDiv").hide();
        document.getElementById("enfermedad").value = '';
        document.getElementById("tratamientos").value = '';
      }
    });
  });

  $(document).ready(function () {
    $('#perteneceClub').on('change', function () {
      if (this.checked == true) {
        $("#tipoClubDiv").show();
        $("#liderDiv").show();
        $("#aspiranteDiv").show();
      } else if (this.checked == false) {
        $("#tipoClubDiv").hide();
        $("#liderDiv").hide();
        $("#aspiranteDiv").hide();

        document.getElementById("tipoClub").value = '';
        document.getElementById("lider").checked = false;
        document.getElementById("aspirante").checked = false;
      }
    });
  });

  $(document).ready(function () {
    $('#lider').on('change', function () {
      if (this.checked == true) {
        $("#aspiranteDiv").hide();
        document.getElementById("aspirante").checked = false;
      } else if (this.checked == false) {
        $("#aspiranteDiv").show();
      }
    });
  });

  $(document).ready(function () {
    $('#aspirante').on('change', function () {
      if (this.checked == true) {
        $("#liderDiv").hide();
        document.getElementById("lider").checked = false;
      } else if (this.checked == false) {
        $("#liderDiv").show();
      }
    });
  });

  $(document).ready(function () {
    $('#planMisionero').on('change', function () {
      if (this.checked == true) {
        $("#lugarPlanDiv").show();
      } else if (this.checked == false) {
        $("#lugarPlanDiv").hide();
        document.getElementById("lugarPlan").value = '';
      }
    });
  });
</script>