<?php
  include("../controller/conexion.php");
  include('../controller/verificarSesion.php');
  include('../controller/comprobarVerificacion.php');
  include('../controller/validado.php');
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
                        <a class="dropdown-item" href="#">Configuración</a>
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

        <div id="carreraDiv" style="display:none">
          <label for="selectCarrera">Carrera</label>
          <select class="form-control" id="selectCarrera" name="selectCarrera">
            <option value="">Selecciona una carrera</option>
          </select>
          <br>
        </div>

        <label for="semestre">Semestre/Tetramestre</label>
        <select class="form-control" id="semestre" name="semestre">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
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
          <option value="">Selecciona un estado civil</option>
          <option value="Soltero">Soltero</option>
          <option value="Casado">Casado</option>
          <option value="Divorciado">Divorciado</option>
          <option value="Separadro">Separado</option>
          <option value="Viudo">Viudo</option>
          <option value="Libre">En unión libre</option>
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
          <option value="hombre">Hombre</option>
          <option value="mujer">Mujer</option>
        </select>

        <br>

        <label for="prefsexual">Preferencia sexual</label>
        <select class="form-control" id="prefsexual" name="prefsexual">
          <option value="">Selecciona tu preferencia sexual</option>
          <option value="hetero">Heterosexual</option>
          <option value="homo">Homosexual</option>
          <option value="bi">Bisexual</option>
          <option value="a">Asexual</option>
          <option value="otro">Otro</option>
          <option value="nocontesto">Prefiero no contestar</option>
        </select>

        <br>

        <label for="residencia">Residencia actual</label>
        <select class="form-control" id="residencia" name="residencia">
          <option value="">Selecciona tu residencia actual</option>
          <option value="interno">Interno</option>
          <option value="externo">Externo</option>
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
          <option value="">Selecciona el estado civil de tus padres</option>
          <option value="casados">Casados</option>
          <option value="divorciados">Divorciados</option>
          <option value="separados">Separados</option>
          <option value="viudo">Viudo(a)</option>
          <option value="libre">En unión libre</option>
          <option value="ninguno">Ninguno de los anteriores/No aplica</option>
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
    <!--Contenido de la pestaña 4-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST">
      <div id="formulario">
        <h3>Datos Religiosos</h3>
      </div>

      <div id="tabla-formulario">

        <label for="religion">Religión que practicas</label>
        <select class="form-control" id="religion" name="religion">
          <option value="">Selecciona la religión que practicas</option>
          <option value="adventista">Adventista</option>
          <option value="catolica">Católica</option>
          <option value="testigo">Testigo de Jehová</option>
          <option value="bautista">Bautista</option>
          <option value="metodista">Metodista</option>
          <option value="pentecostal">Pentecostal</option>
          <option value="otra">Otra</option>
          <option value="ninguna">Ninguna</option>
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
          <input type="text" class="form-control" id="feligresia" name="feligresia"
            placeholder="Iglesia en la que se encuentra actualmente tu feligresía">
        </div>


        <div id="iglesiaDiv">
          <label for="iglesia">Iglesia a la que asistes</label>
          <select class="form-control" id="iglesia">
            <option value="">Selecciona la iglesia a la que asistes</option>
            <option value="central">Central Universitaria</option>
            <option value="zambrano">Zambrano</option>
            <option value="sabinos">Los Sabinos</option>
            <option value="estacion">La Estación</option>
            <option value="mutualismo">Mutualismo</option>
            <option value="leyva">Gil de Leyva</option>
            <option value="centro">Centro</option>
            <option value="alamedas">Las Alamedas</option>
            <option value="naranjos">Los Naranjos</option>
            <option value="enmedio">Hacienda de Enmedio</option>
            <option value="maestro">Del Maestro</option>
            <option value="zaragoza">Barrio Zaragoza</option>
            <option value="ladrillera">La Ladrillera</option>
            <option value="otra">Otra</option>
            <option value="otranoa">Otra (no Adventista)</option>
            <option value="ninguna">Ninguna</option>
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
            <option value="primero">Primero</option>
            <option value="segundo">Segundo</option>
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
            <option value="uni">Iglesia Universitaria</option>
            <option value="ingles">Inglés</option>
            <option value="frances">Francés</option>
          </select>
          <br>
        </div>

        <label for="ae">Actividad espiritual que más te gusta</label>
        <select class="form-control" id="ae" name="ae">
          <option value="">Selecciona la actividad espiritual que más te gusta</option>
          <option value="sj">Sociedad de Jóvenes</option>
          <option value="retiro">Retiro espiritual</option>
          <option value="vigilia">Vigilia</option>
          <option value="semana">Semana de oración</option>
          <option value="otra">Otra</option>

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



        <div id="tipoBecaDiv" style="display:none">
          <br>
          <label for="tipoBeca">Tipo de beca</label>
          <input type="text" class="form-control" id="tipoBeca" name="tipoBeca" placeholder="Tipo de beca">

          <br>
        </div>

        <div id="departamentoDiv" style="display:none">
          <label for="departamento">Departamento en el que trabajas</label>
          <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Departamento">
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

        <div class="form-check" style="display:none" id="planestudioDiv">
          <input type="checkbox" class="form-check-input" id="planestudio" name="planestudio">
          <label class="form-check-label" for="planestudio">Tengo un plan de estudio devocional</label>
        </div>
        

        <div id="formatoBibliaDiv" style="display:none">
        <br>
          <label for="formatoBiblia">Formato de Biblia que posees</label>
          <select class="form-control" id="formatoBiblia" name="formatoBiblia">
            <option value="">Selecciona el formato en el que posees tu Biblia</option>
            <option value="fisica">Física</option>
            <option value="digital">Digital</option>
            <option value="ambos">Ambos</option>
          </select>
        </div>

        <div id="formatoEsDiv" style="display:none">
        <br>
          <label for="formatoEs">Formato de Lección de Escuela Sabática que posees</label>
          <select class="form-control" id="formatoEs" name="formatoEs">
          <option value="">Selecciona el formato en el que posees tu Lección de Escuela Sabática</option>
            <option value="fisica">Física</option>
            <option value="digital">Digital</option>
            <option value="ambos">Ambos</option>
          </select>
        </div>

          <div class="form-group" style="display:none" id="diasLecturaBibliaDiv">
          <br>
            <label for="diasLecturaBiblia">Días a la semana que lees la Biblia</label>
            <input type="text" class="form-control" name="diasLecturaBiblia" id="diasLecturaBiblia" value="0"
              placeholder="Días a la semana que lees la Biblia" maxlength="1" ondrop="return false"
              onpaste="return false" onkeypress="return event.charCode>=48 && event.charCode<=57" min="1"
              onClick="this.select();" required>
            </div>
            

          <div class="form-group">
            <label for="tema">Tema de la Biblia que te gustaría conocer más</label>
            <input type="text" class="form-control" id="tema" name="tema" placeholder="Escribe un tema">
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
    <!--Contenido de la pestaña 7-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form method="POST">
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
          <option value="futbol">Fútbol</option>
          <option value="basquetbol">Básquetbol</option>
          <option value="voleibol">Vóleibol</option>
          <option value="beisbol">Béisbol</option>
          <option value="otro">Otro</option>
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
        <input type="text" class="form-control" id="sustancia" name="sustancia" placeholder="Sustancia que consumes">
        <br>
      </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="padeceEnfermedad" name="padeceEnfermedad">
          <label class="form-check-label" for="padeceEnfermedad">Padezco alguna enfermedad</label>
        </div>
        <br>
        <div class="form-group" style="display:none" id="enfermedadDiv">
          <label for="enfermedad">Enfermedad(es) que padeces</label>
          <input type="text" class="form-control" id="enfermedad" name="enfermedad"
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
      if (this.value == 'interno') {
        $("#dormitorioDiv").show();
        $("#direccionDiv").hide();
        document.getElementById("direccion").value = '';
      } else if (this.value == 'externo') {
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
      if (this.value == 'adventista') {
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

      if (this.value == 'central') {
        $("#cultosAsistenciaDiv").show();
        $("#cultosDiv").hide();
        $("#esAsistenciaDiv").show();
        $("#esDiv").hide();

      } else if (this.value == 'ninguna' || this.value == '') {

        $("#cultosAsistenciaDiv").hide();
        $("#cultosDiv").hide();
        $("#esAsistenciaDiv").hide();
        $("#esDiv").hide();

      } else if (this.value == 'otranoa') {

        $("#cultosAsistenciaDiv").show();
        $("#cultosDiv").hide();
        $("#esAsistenciaDiv").hide();
        $("#esDiv").hide();

      } else {
        $("#cultosAsistenciaDiv").show();
        $("#cultosDiv").hide();
        $("#esAsistenciaDiv").show();
        $("#esDiv").hide();
      }
    });
  });

  $(document).ready(function () {
    $('#cultosAsistencia').on('change', function () {
      if (document.getElementById("iglesia").value == 'central' && this.checked == true) {
        $("#cultosDiv").show();

      } else if (document.getElementById("iglesia").value == 'central' && this.checked == false) {
        $("#cultosDiv").hide();
        document.getElementById("cultos").value = '';
      }
    });
  });

  $(document).ready(function () {
    $('#esAsistencia').on('change', function () {
      if (document.getElementById("iglesia").value == 'central' && this.checked == true) {
        $("#esDiv").show();

      } else if (document.getElementById("iglesia").value == 'central' && this.checked == false) {
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
        if(document.getElementById("lecciones").checked == false){
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
        if(document.getElementById("biblia").checked == false){
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
</script>