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
    <iframe name="iframe1" style="display:none;"></iframe>
    <form method="POST" target="iframe1">
      <div id="formulario">
        <h3>Datos Personales</h3>
      </div>

      <div id="tabla-formulario-personales">
        <div class="form-group">

        <label for="matricula">Matrícula</label>
          <input type="text" class="form-control" name="matricula" placeholder="Matrícula" maxlength="7" ondrop="return false" onpaste="return false" onkeypress="return event.charCode>=48 && event.charCode<=57" min="1" required>
          <br>

          <label for="nombre">Nombre(s)</label>
          <input type="text" class="form-control" style="text-transform: capitalize;" name="nombre" placeholder="Nombre(s)" required>
          <br>

          <label for="apellidos">Apellidos</label>
          <input type="text" class="form-control" style="text-transform: capitalize;" name="apellidos" placeholder="Apellidos" required>
          <br>

          <label for="fechaNac">Fecha de nacimiento</label>
          <input type="date" class="form-control" name="fechaNac" min="1950-01-01" max="9999-12-31" required>
        </div>
        <br>

        <div class="col text-center">
          <button class="btn btn-success regular-button" name="btnPersonales" type="submit" id="btnPersonales">
            Guardar
          </button>
        </div>
      </div>
    </form>
  </div>

  <div id="Academicos" class="tabcontent">
    <!--Contenido de la pestaña 1-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form action="registro.php" method="POST">
      <div id="formulario">
        <h3>Datos Académicos</h3>
      </div>

      <div id="tabla-formulario">
        <label for="exampleFormControlSelect1">Facultad/Escuela</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>FITEC</option>
          <option>FACSA</option>
          <option>FACEJ</option>
          <option>4</option>
          <option>5</option>
        </select>
        <br>

        <label for="exampleFormControlSelect2">Carrera</label>
        <select class="form-control" id="exampleFormControlSelect2">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
        <br>

        <label for="exampleFormControlSelect3">Semestre</label>
        <select class="form-control" id="exampleFormControlSelect3">
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
    <!--Contenido de la pestaña 1-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form action="registro.php" method="POST">
      <div id="formulario">
        <h3>Datos Demográficos</h3>
      </div>

      <div id="tabla-formulario">

        <label for="exampleFormControlSelect4">Estado civil</label>
        <select class="form-control" id="exampleFormControlSelect4">
          <option>Soltero</option>
          <option>Casado</option>
          <option>Divorciado</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
        </select>

        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Tengo novio/a</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck2">
          <label class="form-check-label" for="exampleCheck2">Tengo amigo/a especial</label>
        </div>
        <br>
        <label>Lugar de nacimiento</label>
        <label for="exampleFormControlSelect5">País</label>
        <select class="form-control" id="exampleFormControlSelect5">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
        </select>

        <label for="exampleFormControlSelect51">Estado</label>
        <select class="form-control" id="exampleFormControlSelect51">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
        </select>

        <label for="exampleFormControlSelect52">Municipio</label>
        <select class="form-control" id="exampleFormControlSelect52">
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

        <label for="exampleFormControlSelect6">Sexo</label>
        <select class="form-control" id="exampleFormControlSelect6">
          <option>Hombre</option>
          <option>Mujer</option>
        </select>

        <br>

        <label for="exampleFormControlSelect7">Preferencia sexual</label>
        <select class="form-control" id="exampleFormControlSelect7">
          <option>Heterosexual</option>
          <option>Homosexual</option>
          <option>Bisexual</option>
          <option>Otro</option>
        </select>

        <br>

        <div class="form-group">
          <label for="exampleInput2">Residencia actual</label>
          <input type="text" class="form-control" id="exampleInput2" placeholder="Residencia Actual">
        </div>

        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>
      </div>
    </form>

  </div>

  <div id="Familiares" class="tabcontent">
    <!--Contenido de la pestaña 1-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form action="registro.php" method="POST">
      <div id="formulario">
        <h3>Datos Familiares</h3>
      </div>

      <div id="tabla-formulario">

        <label for="exampleFormControlSelect8">Estado civil de tus padres</label>
        <select class="form-control" id="exampleFormControlSelect8">
          <option>Casados</option>
          <option>Divorciados</option>
          <option>Separados</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
        </select>

        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck3">
          <label class="form-check-label" for="exampleCheck3">Soy hijo de empleado UM</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck4">
          <label class="form-check-label" for="exampleCheck4">Soy hijo de obrero adventista</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck5">
          <label class="form-check-label" for="exampleCheck5">Tengo hermanos en la UM</label>
        </div>
        <br>
        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>
      </div>
    </form>
  </div>

  <div id="Religiosos" class="tabcontent">
    <!--Contenido de la pestaña 1-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form action="registro.php" method="POST">
      <div id="formulario">
        <h3>Datos Religiosos</h3>
      </div>

      <div id="tabla-formulario">

        <label for="exampleFormControlSelect8">Religión</label>
        <select class="form-control" id="exampleFormControlSelect9">
          <option>ASD</option>
          <option>Catolico</option>
          <option>Testigo de Jehova</option>
          <option>Bautista</option>
          <option>Otro</option>
          <option>7</option>
          <option>8</option>
        </select>

        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck6">
          <label class="form-check-label" for="exampleCheck6">Soy bautizado en la IASD</label>
        </div>

        <br>
        <div class="form-group">
          <label for="exampleInput2">Fecha de bautismo</label>
          <input type="date" class="form-control" id="fechaBautismo">
        </div>

        <div class="form-group">
          <label for="exampleInput3">Feligresia actual</label>
          <input type="text" class="form-control" id="exampleInput3" placeholder="Feligresia Actual">
        </div>
        <br>

        <label for="exampleFormControlSelect81">Iglesia a la que asistes</label>
        <select class="form-control" id="exampleFormControlSelect91">
          <option>Central Universitaria</option>
          <option>Otra</option>
        </select>
        <br>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck7">
          <label class="form-check-label" for="exampleCheck7">Asisto a los cultos</label>
        </div>
        <br>

        <label for="exampleFormControlSelect812">Culto al que asistes</label>
        <select class="form-control" id="exampleFormControlSelect912">
          <option>Primer culto</option>
          <option>Segundo culto</option>
        </select>
        <br>


        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck8">
          <label class="form-check-label" for="exampleCheck8">Asisto a la Escuela Sabática</label>
        </div>
        <br>

        <label for="exampleFormControlSelect812">Escuela Sabática a la que asistes</label>
        <select class="form-control" id="exampleFormControlSelect912">
          <option>Iglesia Universitaria</option>
          <option>Inglés</option>
          <option>Francés</option>
        </select>
        <br>

        <label for="exampleFormControlSelect812">Actividad espiritual que más te gusta</label>
        <select class="form-control" id="exampleFormControlSelect912">
          <option>Sociedad de Jóvenes</option>
          <option>Retiro espiritual</option>
          <option>Vigilia</option>
          <option>Semana de oración</option>
          <option>Otra</option>
        </select>
        <br>

        <div class="form-group">
          <label for="exampleInput3">Tema de la Biblia que te gustaría conocer más</label>
          <input type="text" class="form-control" id="exampleInput3" placeholder="Tema">
        </div>

        <br>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck8">
          <label class="form-check-label" for="exampleCheck8">Me gustaría estudiar más la Biblia</label>
        </div>
        <br>

        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>
      </div>
    </form>
  </div>

  <div id="SBecario" class="tabcontent">
    <!--Contenido de la pestaña 1-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form action="registro.php" method="POST">
      <div id="formulario">
        <h3>Datos de Servicio Becario</h3>
      </div>

      <div id="tabla-formulario">


        <br>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck9">
          <label class="form-check-label" for="exampleCheck9">Soy becado</label>
        </div>
        <br>
        <label for="exampleFormControlSelect8">Tipo de Beca</label>
        <select class="form-control" id="exampleFormControlSelect9">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
        </select>
        <br>

        <label for="exampleFormControlSelect8">Departamento</label>
        <select class="form-control" id="exampleFormControlSelect9">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
        </select>
        <br>

        <div class="form-group">
          <label for="exampleInput3">Horas de trabajo diario</label>
          <input type="number" class="form-control" id="exampleInput3">
        </div>

        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck10">
          <label class="form-check-label" for="exampleCheck10">He colportado</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck11">
          <label class="form-check-label" for="exampleCheck11">He colportado intersemestralmente</label>
        </div>
        <br>

        <div class="form-group">
          <label for="exampleInput3">Veranos colportados</label>
          <input type="number" class="form-control" id="exampleInput3">
        </div>

        <div class="form-group">
          <label for="exampleInput3">Inviernos colportados</label>
          <input type="number" class="form-control" id="exampleInput3">
        </div>
        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>

      </div>
    </form>
  </div>

  <div id="Devocionales" class="tabcontent">
    <!--Contenido de la pestaña 1-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form action="registro.php" method="POST">
      <div id="formulario">
        <h3>Datos sobre Actividades Devocionales</h3>
      </div>

      <div id="tabla-formulario">
        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck12">
          <label class="form-check-label" for="exampleCheck12">Tengo Biblia</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck13">
          <label class="form-check-label" for="exampleCheck13">Tengo Leccion de Escuela Sabática</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck14">
          <label class="form-check-label" for="exampleCheck14">Tengo un plan de estudio devocional</label>
        </div>
        <br>

        <label for="exampleFormControlSelect14">Formato de Biblia que posees</label>
        <select class="form-control" id="exampleFormControlSelect14">
          <option>Fisica</option>
          <option>Digital</option>
          <option>Ambas</option>
        </select>
        <br>

        <label for="exampleFormControlSelect15">Formato de Leccion de Escuela Sabática que posees</label>
        <select class="form-control" id="exampleFormControlSelect15">
          <option>Fisica</option>
          <option>Digital</option>
          <option>Ambas</option>
        </select>
        <br>

        <div class="form-group">
          <label for="exampleInput3">Días a la semana que lees la Biblia</label>
          <input type="number" class="form-control" id="exampleInput3">
        </div>

        <div class="col text-center">
          <button class="btn btn-success regular-button" name="registro" type="submit" id="button"> Guardar </button>
        </div>
      </div>
    </form>
  </div>

  <div id="Salud" class="tabcontent">
    <!--Contenido de la pestaña 1-->
    <!-- ENVIA A LA BASE DE DATOS -->
    <form action="registro.php" method="POST">
      <div id="formulario">
        <h3>Datos de Salud</h3>
      </div>

      <div id="tabla-formulario">

        <div class="form-group">
          <label for="exampleInput3">Cantidad de comidas al día</label>
          <input type="number" class="form-control" id="exampleInput3">
        </div>
        <div class="form-group">
          <label for="exampleInput3">Cantidad de días que comes a la semana</label>
          <input type="number" class="form-control" id="exampleInput3">
        </div>
        <div class="form-group">
          <label for="exampleInput3">Cantidad de días que haces ejercicio a la semana</label>
          <input type="number" class="form-control" id="exampleInput3">
        </div>

        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck12">
          <label class="form-check-label" for="exampleCheck12">Practico algún deporte</label>
        </div>
        <br>

        <label for="exampleFormControlSelect15">Deporte que practicas</label>
        <select class="form-control" id="exampleFormControlSelect15">
          <option>Futbol</option>
          <option>Basquetbol</option>
          <option>Volibol</option>
          <option>Otro</option>
        </select>

        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck12">
          <label class="form-check-label" for="exampleCheck12">Consumo alcohol</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck12">
          <label class="form-check-label" for="exampleCheck12">Consumo tabaco</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck12">
          <label class="form-check-label" for="exampleCheck12">Consumo droga</label>
        </div>
        <br>
        <label for="exampleFormControlSelect15">Sustancia que consumes</label>
        <select class="form-control" id="exampleFormControlSelect15">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>

        <br>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck12">
          <label class="form-check-label" for="exampleCheck12">Padezco alguna enfermedad</label>
        </div>
        <br>
        <div class="form-group">
          <label for="exampleInput3">Enfermedad que pedeces</label>
          <input type="text" class="form-control" id="exampleInput3">
        </div>

        <div class="form-group">
          <label for="exampleInput3">Tratamientos que sigues</label>
          <input type="text" class="form-control" id="exampleInput3">
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