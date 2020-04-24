<?php
  include("../controller/conexion.php");
  include('../controller/verificarSesion.php');
  include('../controller/comprobarVerificacion.php');
  include('../controller/validado.php');
  include('../view/entrevistaInicialAlerta.php');
  include('../model/entrevistaInicialModel.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <title>CapellaníaUM | Entrevista Inicial</title>
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
  <link rel="stylesheet" type="text/css" href="../css/placeholders.css" />
</head>


<body>
  <!-- Tab links -->
  <div class="tab">
    <button class="tablinks" onclick="openTab(event, 'Personales')" id="defaultOpen">Personales</button>
    <button class="tablinks" onclick="openTab(event, 'Academicos')" id="academicos">Académicos</button>
    <button class="tablinks" onclick="openTab(event, 'Demograficos')" id="demograficos">Demográficos</button>
    <button class="tablinks" onclick="openTab(event, 'Familiares')" id="familiares">Familiares</button>
    <button class="tablinks" onclick="openTab(event, 'Religiosos')" id="religiosos">Religiosos</button>
    <button class="tablinks" onclick="openTab(event, 'SBecario')" id="sb">Servicio Becario</button>
    <button class="tablinks" onclick="openTab(event, 'Devocionales')" id="ad">Actividades Devocionales</button>
    <button class="tablinks" onclick="openTab(event, 'Salud')" id="salud">Salud</button>
  </div>
  <br><br>


  <!-- Tab content -->
  <div id="Personales" class="tabcontent">
    <!--Contenido de la pestaña 1-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST">
      <div id="formulario">
        <h3>Datos Personales</h3>
      </div>
      <div id="tabla-formulario-personales">
        <div class="form-group">

          <label for="matricula">Matrícula</label>
          <input type="text" class="form-control" name="matricula" id="matricula" placeholder="Matrícula" maxlength="7"
            ondrop="return false" onpaste="return false" onkeypress="return event.charCode>=48 && event.charCode<=57"
            min="1" required>
          <br>

          <label for="nombre">Nombre(s)</label>
          <input type="text" class="form-control" style="text-transform: capitalize;" id="nombre" name="nombre"
            placeholder="Nombre(s)" required>
          <br>

          <label for="apellidos">Apellidos</label>
          <input type="text" class="form-control" style="text-transform: capitalize;" id="apellidos" name="apellidos"
            placeholder="Apellidos" required>
          <br>

          <label for="fechaNac">Fecha de nacimiento</label>
          <input type="date" class="form-control" name="fechaNac" id="fechaNac" min="1950-01-01" max="9999-12-31"
            required>
        </div>
        <br>



        <!-- 
        <div class="col text-center">
          <button class="btn btn-success regular-button" name="btnPersonales" type="submit" id="btnPersonales">
            Guardar
          </button>
        </div>
         -->
      </div>
    </form>
  </div>

  <div id="Academicos" class="tabcontent">
    <!--Contenido de la pestaña 1-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST">
      <div id="formulario">
        <h3>Datos Académicos</h3>
      </div>

      <div id="tabla-formulario-academicos">
        <label for="selectFacultad">Facultad/Escuela</label>

        <select class="form-control" id="selectFacultad" name="selectFacultad">

          <option value="">Selecciona una facultad/escuela</option>
          <?php echo $output; ?>
        </select>
        <br>

        <label for="selectCarrera">Carrera</label>
        <select class="form-control" id="selectCarrera" name="selectCarrera">
          <option value="">Selecciona una carrera</option>
        </select>
        <br>

        <label for="semestre">Semestre/Tetramestre</label>
        <select class="form-control" id="semestre" name="semestre">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
        </select>
        <br>
        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>
      </div>
    </form>
  </div>

  <div id="Demograficos" class="tabcontent">
    <!--Contenido de la pestaña 2-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST">
      <div id="formulario">
        <h3>Datos Demográficos</h3>
      </div>

      <div id="tabla-formulario">

        <label for="estadoCivil">Estado civil</label>
        <select class="form-control" id="estadoCivil" name="estadoCivil">
          <option>Soltero</option>
          <option>Casado</option>
          <option>Divorciado</option>
          <option>Separado</option>
          <option>Viudo</option>
          <option>En unión libre</option>
        </select>

        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="novio">
          <label class="form-check-label" for="novio" name="novio">Tengo novio/a</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="amigoesp" name="amigoesp">
          <label class="form-check-label" for="amigoesp">Tengo amigo/a especial</label>
        </div>
        <br>
        <label>Lugar de nacimiento</label>
        <br>
        <label for="selectPais">País</label>
        <select class="form-control" id="selectPais" name="selectPais">
          <option value="">Selecciona un país</option>
          <?php echo $paises; ?>
        </select>
        </select>

        <label for="selectEstado">Estado</label>
        <select class="form-control" id="selectEstado" name="selectEstado">
          <option value="">Selecciona un estado</option>
        </select>

        <label for="selectMunicipio">Municipio</label>
        <select class="form-control" id="selectMunicipio" name="selectMunicipio">
          <option value="">Selecciona un municipio</option>
        </select>

        <br>

        <label for="sexo">Sexo</label>
        <select class="form-control" id="sexo" name="sexo">
          <option>Hombre</option>
          <option>Mujer</option>
        </select>

        <br>

        <label for="prefsexual">Preferencia sexual</label>
        <select class="form-control" id="prefsexual" name="prefsexual">
          <option>Heterosexual</option>
          <option>Homosexual</option>
          <option>Bisexual</option>
          <option>Asexual</option>
          <option>Otro</option>
          <option>Prefiero no contestar</option>
        </select>

        <br>

        <label for="residencia">Residencia actual</label>
        <select class="form-control" id="residencia" name="residencia">
          <option>Interno</option>
          <option>Externo</option>
        </select>

        <br>

        <label for="dormitorio">Dormitorio</label>
        <select class="form-control" id="dormitorio" name="dormitorio">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>

        <br>

        <div class="form-group">
          <label for="direccion">Dirección</label>
          <input type="text" class="form-control" id="direccion" name="direccion"
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
    <!--Contenido de la pestaña 3-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST">
      <div id="formulario">
        <h3>Datos Familiares</h3>
      </div>

      <div id="tabla-formulario">

        <label for="ecpadres">Estado civil de tus padres</label>
        <select class="form-control" id="ecpadres" name="ecpadres">
          <option>Casados</option>
          <option>Divorciados</option>
          <option>Separados</option>
          <option>Viudo/a</option>
          <option>En unión libre</option>
          <option>Ninguno de los anteriores/No aplica</option>
        </select>

        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hijoEmpleado" name="hijoEmpleado">
          <label class="form-check-label" for="hijoEmpleado">Soy hijo/a de empleado UM</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hijoObrero" name="hijoObrero">
          <label class="form-check-label" for="hijoObrero">Soy hijo/a de obrero adventista</label>
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
    <!--Contenido de la pestaña 4-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST">
      <div id="formulario">
        <h3>Datos Religiosos</h3>
      </div>

      <div id="tabla-formulario">

        <label for="religion">Religión que practicas</label>
        <select class="form-control" id="religion" name="religion">
          <option>Adventista</option>
          <option>Católica</option>
          <option>Testigo de Jehová</option>
          <option>Bautista</option>
          <option>Metodista</option>
          <option>Pentecostal</option>
          <option>Otra</option>
          <option>Ninguna</option>
        </select>

        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="bautizado">
          <label class="form-check-label" for="bautizado">Soy bautizado</label>
        </div>

        <br>
        <div class="form-group">
          <label for="fechaBautismo">Fecha de tu bautismo</label>
          <input type="date" class="form-control" id="fechaBautismo" name="fechaBautismo" min="1950-01-01"
            max="9999-12-31">
        </div>

        <div class="form-group">
          <label for="feligresia">Feligresía actual</label>
          <input type="text" class="form-control" id="feligresia" name="feligresia"
            placeholder="Iglesia en la que se encuentra actualmente tu feligresía">
        </div>
        <br>

        <label for="iglesia">Iglesia a la que asistes</label>
        <select class="form-control" id="iglesia">
          <option>Central Universitaria</option>
          <option>Zambrano</option>
          <option>Los Sabinos</option>
          <option>La Estación</option>
          <option>Mutualismo</option>
          <option>Gil de Leyva</option>
          <option>Centro</option>
          <option>Las Alamedas</option>
          <option>Los Naranjos</option>
          <option>Hacienda de Enmedio</option>
          <option>Del Maestro</option>
          <option>Barrio Zaragoza</option>
          <option>La Ladrillera</option>
          <option>Otra</option>
        </select>
        <br>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="cultosAsistencia" name="cultosAsistencia">
          <label class="form-check-label" for="cultosAsistencia">Asisto a los cultos</label>
        </div>
        <br>

        <label for="cultos">Culto al que asistes</label>
        <select class="form-control" id="cultos" name="cultos">
          <option>Primero</option>
          <option>Segundo</option>
        </select>
        <br>


        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="esAsistencia" name="esAsistencia">
          <label class="form-check-label" for="esAsistencia">Asisto a la Escuela Sabática</label>
        </div>
        <br>

        <label for="es">Escuela Sabática a la que asistes</label>
        <select class="form-control" id="es">
          <option>Iglesia Universitaria</option>
          <option>Inglés</option>
          <option>Francés</option>
        </select>
        <br>

        <label for="ae">Actividad espiritual que más te gusta</label>
        <select class="form-control" id="ae" name="ae">
          <option>Sociedad de Jóvenes</option>
          <option>Retiro espiritual</option>
          <option>Vigilia</option>
          <option>Semana de oración</option>
          <option>Otra</option>
        </select>
        <br>

        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>
      </div>
    </form>
  </div>

  <div id="SBecario" class="tabcontent">
    <!--Contenido de la pestaña 5-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST">
      <div id="formulario">
        <h3>Datos de Servicio Becario</h3>
      </div>

      <div id="tabla-formulario">


        <br>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="becado" name="becado">
          <label class="form-check-label" for="becado">Soy becado</label>
        </div>

        <br>

        <label for="tipoBeca">Tipo de beca</label>
        <input type="text" class="form-control" id="tipoBeca" name="tipoBeca" placeholder="Tipo de beca">

        <br>

        <label for="departamento">Departamento en el que trabajas</label>
        <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Departamento">
        <br>

        <div class="form-group">
          <label for="horasTrabajo">Horas de trabajo diario</label>
          <input type="text" class="form-control" name="horasTrabajo" id="horasTrabajo" value="0"
            placeholder="Horas de trabajo diario" maxlength="2" ondrop="return false" onpaste="return false"
            onkeypress="return event.charCode>=48 && event.charCode<=57" min="1" onClick="this.select();" required>
        </div>

        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="colportado" name="colportado">
          <label class="form-check-label" for="colportado">He colportado</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="colportadoInter" name="colportadoInter">
          <label class="form-check-label" for="colportadoInter">He colportado intersemestralmente</label>
        </div>
        <br>

        <div class="form-group">
          <label for="veranos">Veranos colportados</label>
          <input type="text" class="form-control" name="veranos" id="veranos" value="0" placeholder="Veranos colportados"
            maxlength="2" ondrop="return false" onpaste="return false"
            onkeypress="return event.charCode>=48 && event.charCode<=57" min="1" onClick="this.select();" required>
        </div>

        <div class="form-group">
          <label for="inviernos">Inviernos colportados</label>
          <input type="text" class="form-control" name="inviernos" id="inviernos" value="0" placeholder="Inviernos colportados"
            maxlength="2" ondrop="return false" onpaste="return false"
            onkeypress="return event.charCode>=48 && event.charCode<=57" min="1" onClick="this.select();" required>
        </div>

        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>

      </div>
    </form>
  </div>

  <div id="Devocionales" class="tabcontent">
    <!--Contenido de la pestaña 6-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST">
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
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="planestudio" name="planestudio">
          <label class="form-check-label" for="planestudio">Tengo un plan de estudio devocional</label>
        </div>
        <br>

        <label for="formatoBiblia">Formato de Biblia que posees</label>
        <select class="form-control" id="formatoBiblia" name="formatoBiblia">
          <option>Física</option>
          <option>Digital</option>
          <option>Ambos</option>
        </select>
        <br>

        <label for="formatoEs">Formato de Lección de Escuela Sabática que posees</label>
        <select class="form-control" id="formatoEs" name="formatoEs">
          <option>Físico</option>
          <option>Digital</option>
          <option>Ambos</option>
        </select>
        <br>

        <div class="form-group">
          <label for="diasLecturaBiblia">Días a la semana que lees la Biblia</label>
          <input type="text" class="form-control" name="diasLecturaBiblia" id="diasLecturaBiblia" value="0" placeholder="Días a la semana que lees la Biblia"
            maxlength="1" ondrop="return false" onpaste="return false"
            onkeypress="return event.charCode>=48 && event.charCode<=57" min="1" onClick="this.select();" required>
        </div>
        <br>

        <div class="form-group">
          <label for="tema">Tema de la Biblia que te gustaría conocer más</label>
          <input type="text" class="form-control" id="tema" name="tema" placeholder="Escribe un tema">
        </div>

        <br>

        <div class="form-check">
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
    <!--Contenido de la pestaña 7-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST">
      <div id="formulario">
        <h3>Datos de Salud</h3>
      </div>

      <div id="tabla-formulario">

        <div class="form-group">
          <label for="comidasalDia">Cantidad de comidas que tienes al día</label>
          <input type="text" class="form-control" name="comidasalDia" id="comidasalDia" value="0" placeholder="Cantidad de comidas que tienes al día"
            maxlength="1" ondrop="return false" onpaste="return false"
            onkeypress="return event.charCode>=48 && event.charCode<=57" min="1" onClick="this.select();" required>
        </div>

        <div class="form-group">
          <label for="diasComidaSemana">Cantidad de días que comes a la semana</label>
          <input type="text" class="form-control" name="diasComidaSemana" id="diasComidaSemana" value="0" placeholder="Cantidad de días que comes a la semana"
            maxlength="1" ondrop="return false" onpaste="return false"
            onkeypress="return event.charCode>=48 && event.charCode<=57" min="1" onClick="this.select();" required>
        </div>

        <div class="form-group">
          <label for="diasEjercicioSemana">Cantidad de días que haces ejercicio a la semana</label>
          <input type="text" class="form-control" name="diasEjercicioSemana" id="diasEjercicioSemana" value="0" placeholder="Cantidad de días que comes a la semana"
            maxlength="1" ondrop="return false" onpaste="return false"
            onkeypress="return event.charCode>=48 && event.charCode<=57" min="1" onClick="this.select();" required>
        </div>

        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="practicaDeporte" name="practicaDeporte">
          <label class="form-check-label" for="practicaDeporte">Practico algún deporte</label>
        </div>
        <br>

        <label for="deporte">Deporte que practicas</label>
        <select class="form-control" id="deporte">
          <option>Fútbol</option>
          <option>Básquetbol</option>
          <option>Vóleibol</option>
          <option>Béisbol</option>
          <option>Otro</option>
        </select>

        <br>
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
          <label class="form-check-label" for="droga">Consumo droga</label>
        </div>
        <br>
        <label for="sustancia">Sustancia que consumes</label>
        <input type="text" class="form-control" id="sustancia" name="sustancia" placeholder="Sustancia que consumes">

        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="pedeceEnfermedad" name="pedeceEnfermedad">
          <label class="form-check-label" for="pedeceEnfermedad">Padezco alguna enfermedad</label>
        </div>
        <br>
        <div class="form-group">
          <label for="enfermedad">Enfermedad/es que padeces</label>
          <input type="text" class="form-control" id="enfermedad" name="enfermedad" placeholder="Enfermedad/es que padeces">
        </div>

        <div class="form-group">
          <label for="tratamientos">Tratamientos que sigues</label>
          <textarea class="form-control" id="tratamientos" placeholder="Describe los tratamientos que sigues" style="min-height: 65px;"></textarea>
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
</script>