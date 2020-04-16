<?php
  include('../controller/verificarSesion.php');
  include('../controller/comprobarVerificacion.php');
  include('../controller/validado.php');
  include('../view/entrevistaInicialAlerta.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
	<script type="text/javascript" src="../js/cambiarPestanna.js"></script>
    <title></title>
</head>
<body>
    <!-- Tab links -->
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Personales')" id="defaultOpen">Personales</button>
  <button class="tablinks" onclick="openCity(event, 'Academicos')">Académicos</button>
  <button class="tablinks" onclick="openCity(event, 'Demograficos')">Demográficos</button>
  <button class="tablinks" onclick="openCity(event, 'Familiares')">Familiares</button>
  <button class="tablinks" onclick="openCity(event, 'Religiosos')">Religiosos</button>
  <button class="tablinks" onclick="openCity(event, 'SBecario')">Servicio Becario</button>
  <button class="tablinks" onclick="openCity(event, 'Devocionales')">Actividades Devocionales</button>
  <button class="tablinks" onclick="openCity(event, 'Salud')">Salud</button>
</div>
<br><br>
<!-- Tab content -->
<div id="Personales" class="tabcontent">
        <!--Contenido de la pestaña 1-->
                <!-- ENVIA A LA BASE DE DATOS -->
        <form action="registro.php" method="POST">
            <div id="formulario"> 
                <h3>Datos Personales</h3>
            </div>
        
        <div id="tabla-formulario">
			<div class="form-group">
            <label for="name">Nombre</label>
				<input type="text" class="form-control" id="nombre"  placeholder="Nombre" >
			<label for="secondname">Apellidos</label>
				<input type="text" class="form-control" id="apellidos"  placeholder="Apellidos" >
			<!-- <label for="email">Correo electronico</label>
            	<input type="email" class="form-control" id="correo"  placeholder="Correo electronico"> -->
            <label for="exampleInput1">Fecha de Nacimiento</label>
              <input type="date" class="form-control" id="fechaNac">
              <button class="btn btn-success" name="registro" type="submit" id="button"> Guardar </button>
          </div>

          
        <!--<label for="nombre">Nombres</label>
                <input placeholder="Ingrese su nombre" name="fnombre" type="text"     id="tabla">
        
        <label for="apellido">Apellidos</label>
                <input placeholder="Ingrese su apellido" name="fapellido" type="text" id="tabla">

        <label for="correo">Correo electronico (*) </label>
                <input placeholder="Escriba su e-mail" name="femail" type="text" id="tabla">

        <label for="contra">Contraseña</label>
                <input placeholder="Escriba contraseña" name="fpassword" type="password" id="tabla">

        <label for="fecha">Fecha nacimiento (*) </label>
                <input placeholder="DD/MM/AA" name="ffechanacimiento" type="text" id="tabla">

        <label for="genero">Género</label>
                <input placeholder="Escriba genero" name="fgenero" type="text" id="tabla">
            
			  <button name="registro" type="submit" id="button"> ¡Registrarse! </button>-->
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
            <label for="exampleFormControlSelect1">Facultad</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>FITEC</option>
                    <option>FACSA</option>
                    <option>FACEJ</option>
                    <option>4</option>
                    <option>5</option>
                </select>

            <label for="exampleFormControlSelect2">Carrera</label>
            <select class="form-control" id="exampleFormControlSelect2">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>

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
            
        <label for="exampleFormControlSelect4">Estado Civil</label>
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
          <label for="exampleFormControlSelect5">Lugar de Nacimiento</label>
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

          <label for="exampleFormControlSelect6">Sexo</label>
            <select class="form-control" id="exampleFormControlSelect6">
              <option>Hombre</option>
              <option>Mujer</option>
            </select>

            <label for="exampleFormControlSelect7">Preferencia Sexual</label>
            <select class="form-control" id="exampleFormControlSelect7">
              <option>Heterosexual</option>
              <option>Homosexual</option>
              <option>Bisexual</option>
              <option>Otro</option>
            </select>


        <div class="form-group">
          <label for="exampleInput2">Residencia actual</label>
          <input type="text" class="form-control" id="exampleInput2" placeholder="Residencia Actual">
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
                
        <label for="exampleFormControlSelect8">Estado Civil de tus padres</label>
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
                
        <label for="exampleFormControlSelect8">Religion</label>
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
                <label for="exampleInput2">Fecha de Bautismo</label>
                <input type="date" class="form-control" id="fechaBautismo">
              </div>

              <div class="form-group">
                <label for="exampleInput3">Feligresia actual</label>
                <input type="text" class="form-control" id="exampleInput3" placeholder="Feligresia Actual">
              </div>

              <br>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck7">
                <label class="form-check-label" for="exampleCheck7">Asisto a los cultos</label>
              </div>

              <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck8">
                  <label class="form-check-label" for="exampleCheck8">Asisto a la Escuela Sabatica</label>
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

              <div class="form-group">
                <label for="exampleInput3">Horas de trabajo diario</label>
                <input type="number" class="form-control" id="exampleInput3" >
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
                <label for="exampleInput3">Veranos Colportados</label>
                <input type="number" class="form-control" id="exampleInput3" >
              </div>
              <div class="form-group">
                <label for="exampleInput3">Inviernos Colportados</label>
                <input type="number" class="form-control" id="exampleInput3" >
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
                <label class="form-check-label" for="exampleCheck13">Tengo Leccion de Escuela Sabatica</label>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck14">
                <label class="form-check-label" for="exampleCheck14">Tengo un plan de estudio devocional</label>
              </div>
              <br>

              <label for="exampleFormControlSelect14">Formato de Biblia</label>
              <select class="form-control" id="exampleFormControlSelect14">
                <option>Fisica</option>
                <option>Digital</option>
                <option>Ambas</option>
              </select>

              <label for="exampleFormControlSelect15">Formato de Leccion de Escuel Sabatica</label>
              <select class="form-control" id="exampleFormControlSelect15">
                <option>Fisica</option>
                <option>Digital</option>
                <option>Ambas</option>
              </select>

              <div class="form-group">
                <label for="exampleInput3">Frecuencia semanal de Lectura de la Biblia</label>
                <input type="number" class="form-control" id="exampleInput3" >
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
                <label for="exampleInput3">Comidas al dia</label>
                <input type="number" class="form-control" id="exampleInput3" >
              </div>
            <div class="form-group">
                <label for="exampleInput3">Dias que comes a la semana</label>
                <input type="number" class="form-control" id="exampleInput3" >
            </div>
            <div class="form-group">
                <label for="exampleInput3">Dias haces ejercicio a la semana</label>
                <input type="number" class="form-control" id="exampleInput3" >
            </div>

            <br>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck12">
                <label class="form-check-label" for="exampleCheck12">Practico algun deporte</label>
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
                <label class="form-check-label" for="exampleCheck12">Consumo Tabaco</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck12">
                <label class="form-check-label" for="exampleCheck12">Consumo drogas</label>
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
            </div>
        </form>
</div>

</body>
</html>