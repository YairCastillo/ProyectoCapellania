<?php
include("../controller/conexion.php");
include('../controller/verificarSesion.php');
include('../controller/comprobarVerificacion.php');
include('../controller/validado.php');
include('../controller/verificarPerfilInicial.php');
include('../model/calendarModel.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CapellaníaUM | Calendario</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="../js/jquery-3.4.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!--Links para el calendario- Abajo -->
  <link href="../bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="../datatables/datatables.min.css" rel="stylesheet">
  <link href="../clockpicker/bootstrap-clockpicker.css" rel="stylesheet">
  <link href="../fullcalendar-4.3.1/packages/core/main.css" rel="stylesheet">
  <link href="../fullcalendar-4.3.1/packages/daygrid/main.css" rel="stylesheet">
  <link href="../fullcalendar-4.3.1/packages/timegrid/main.css" rel="stylesheet">
  <link href="../fullcalendar-4.3.1/packages/list/main.css" rel="stylesheet">
  <link href="../fullcalendar-4.3.1/packages/bootstrap/main.css" rel="stylesheet">


  <script src="../js/jquery-3.4.1.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../bootstrap-4.3.1/js/bootstrap.min.js"></script>
  <script src="../datatables/datatables.min.js"></script>
  <script src="../clockpicker/bootstrap-clockpicker.js"></script>
  <script src='../js/moment-with-locales.js'></script>
  <script src='../fullcalendar-4.3.1/packages/core/main.js'></script>
  <script src='../fullcalendar-4.3.1/packages/daygrid/main.js'></script>
  <script src='../fullcalendar-4.3.1/packages/timegrid/main.js'></script>
  <script src='../fullcalendar-4.3.1/packages/interaction/main.js'></script>
  <script src='../fullcalendar-4.3.1/packages/list/main.js'></script>
  <script src='../fullcalendar-4.3.1/packages/core/locales/es.js'></script>
  <script src='../fullcalendar-4.3.1/packages/bootstrap/main.js'></script>
  <!--Para calendario - Arriba-->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <!-- CSS para la barra de navegacion -->
  <link rel="stylesheet" type="text/css" href="../css/navstyle.css" />

  <!--loadingstyle.css es para el efecto de cargarndo-->
  <link rel="stylesheet" type="text/css" href="../css/loadingstyle.css">

  <!--loadingstyle.css es para el efecto de cargarndo-->
  <link rel="stylesheet" type="text/css" href="../css/calendar.css">



  
</head>

<body style="font-family: 'Montserrat', sans-serif;">

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
        <li class="nav-item"><a class="nav-link active" href="calendar">CALENDARIO</a></li>
        <li class="nav-item"><a class="nav-link" href="listaAlumnos">ALUMNOS</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
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

  <div class="container-fluid">
    <section class="content-header">

    </section>

    <div class="row">

      <div id="calendar-container">
        <div id="Calendario1" style="border: 0px solid #000;padding:50px"></div>
      </div>

      <div class="col-2">
        <div id='external-events'
          style="margin-top:7em;margin-bottom:1em; height: 350px; border: 2px solid #DADFE2; overflow: auto;padding:1em">
          <h4 class="text-center">Eventos predefinidos</h4>
          <div id='listaeventospredefinidos'>

            <?php
            require("../controller/conexion.php");
            $datos = mysqli_query($con, "select id_evento,titulo,horainicio,horafin,colortexto,colorfondo from eventospredefinidosusuarios");
            $ep = mysqli_fetch_all($datos, MYSQLI_ASSOC);
            foreach ($ep as $fila)
              echo "<div class='fc-event' data-titulo='$fila[titulo]' data-horafin='$fila[horafin]' data-horainicio='$fila[horainicio]' 
                    data-colorfondo='$fila[colorfondo]' data-colortexto='$fila[colortexto]' data-id_evento='$fila[id_evento]'
                    style='border-color:$fila[colorfondo];color:$fila[colortexto];background-color:$fila[colorfondo];margin:10px'>
                    $fila[titulo]  [" . substr($fila['horainicio'], 0, 5) . " a " . substr($fila['horafin'], 0, 5) . "]</div>";

            ?>
          </div>
        </div>
        <hr>
        <div style="text-align:center"><button type="button" id="BotonEventosPredefinidos"
            class="btn btn-success">Administrar eventos predefinidos</button>
        </div>
        <hr>
        <div style="text-align:center">*Para agendar una cita da click sobre cualquier día<br><br>
        *Para agregar un evento predefinido arrástralo a cualquier día
        </div>
      </div>

    </div>
  </div>


  <!-- FormularioEventos -->
  <div class="modal fade" id="FormularioEventos" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Nuevo evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="idEvento">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Título del evento:</label>
              <input type="text" id="Titulo" class="form-control" placeholder="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Fecha de inicio:</label>

              <div class="input-group" data-autoclose="true">
                <input type="date" id="FechaInicio" value="" class="form-control" />
              </div>
            </div>
            <div class="form-group col-md-6" id="TituloHoraInicio">
              <label>Hora de inicio:</label>

              <div class="input-group clockpicker" data-autoclose="true">
                <input type="text" id="HoraInicio" value="" class="form-control" autocomplete="off" />
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Fecha de fin:</label>

              <div class="input-group" data-autoclose="true">
                <input type="date" id="FechaFin" value="" class="form-control" />
              </div>
            </div>
            <div class="form-group col-md-6" id="TituloHoraFin">
              <label>Hora de fin:</label>

              <div class="input-group clockpicker" data-autoclose="true">
                <input type="text" id="HoraFin" value="" class="form-control" autocomplete="off" />
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Descripción:</label>
            <textarea id="Descripcion" rows="3" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Color de fondo:</label>
            <input type="color" value="#3788D8" id="ColorFondo" class="form-control" style="height:36px;">
          </div>
          <div class="form-group">
            <label>Color de texto:</label>
            <input type="color" value="#ffffff" id="ColorTexto" class="form-control" style="height:36px;">
          </div>

        </div>
        <div class="modal-footer">

          <button type="button" id="BotonAgregar" class="btn btn-success">Agregar</button>
          <button type="button" id="BotonModificar" class="btn btn-success">Modificar</button>
          <button type="button" id="BotonBorrar" class="btn btn-danger">Borrar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

        </div>
      </div>
    </div>
  </div>


  <script>
    document.addEventListener("DOMContentLoaded", function () {

      $('.clockpicker').clockpicker();

      let calendario1 = new FullCalendar.Calendar(document.getElementById('Calendario1'), {
        plugins: ['dayGrid', 'timeGrid', 'interaction'],
        height: 700,
        droppable: true,
        locale: 'es',
        firstDay: 7,
        showNonCurrentDates: false,
        header: {
          left: 'today,prev,next',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        editable: true,
        events: '../model/datoseventos.php?accion=listar',
        dateClick: function (info) {
          limpiarFormulario();
          $('#BotonAgregar').show();
          $('#BotonModificar').hide();
          $('#BotonBorrar').hide();
          if (info.allDay) {
            $('#FechaInicio').val(info.dateStr);
            $('#FechaFin').val(info.dateStr);
          } else {
            let fechaHora = info.dateStr.split("T");
            $('#FechaInicio').val(fechaHora[0]);
            $('#FechaFin').val(fechaHora[0]);
            $('#HoraInicio').val(fechaHora[1].substring(0, 5));
          }
          $("#FormularioEventos").modal();
        },
        eventClick: function (info) {
          $('#BotonModificar').show();
          $('#BotonBorrar').show();
          $('#BotonAgregar').hide();
          $('#idEvento').val(info.event.id);
          $('#Titulo').val(info.event.title);
          $('#Descripcion').val(info.event.extendedProps.descripcion);
          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
          $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
          $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
          $('#ColorFondo').val(info.event.backgroundColor);
          $('#ColorTexto').val(info.event.textColor);
          $("#FormularioEventos").modal();
        },
        eventResize: function (info) {
          $('#idEvento').val(info.event.id);
          $('#Titulo').val(info.event.title);
          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
          $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
          $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
          $('#ColorFondo').val(info.event.backgroundColor);
          $('#ColorTexto').val(info.event.textColor);
          $('#Descripcion').val(info.event.extendedProps.descripcion);
          let registro = recuperarDatosFormulario();
          modificarRegistro(registro);
        },
        eventDrop: function (info) {
          $('#idEvento').val(info.event.id);
          $('#Titulo').val(info.event.title);
          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
          $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
          $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
          $('#ColorFondo').val(info.event.backgroundColor);
          $('#ColorTexto').val(info.event.textColor);
          $('#Descripcion').val(info.event.extendedProps.descripcion);
          let registro = recuperarDatosFormulario();
          modificarRegistro(registro);
        },
        drop: function (info) {
          limpiarFormulario();
          $('#ColorFondo').val(info.draggedEl.dataset.colorfondo);
          $('#ColorTexto').val(info.draggedEl.dataset.colortexto);
          $('#Titulo').val(info.draggedEl.dataset.titulo);
          let fechaHora = info.dateStr.split("T");
          $('#FechaInicio').val(fechaHora[0]);
          $('#FechaFin').val(fechaHora[0]);
          if (info.allDay) { //verdadero si el calendario esta en vista de mes
            $('#HoraInicio').val(info.draggedEl.dataset.horainicio);
            $('#HoraFin').val(info.draggedEl.dataset.horafin);
          } else {
            $('#HoraInicio').val(fechaHora[1].substring(0, 5));
            $('#HoraFin').val(moment(fechaHora[1].substring(0, 5)).add(1, 'hours'));
          }
          let registro = recuperarDatosFormulario();
          agregarEventoPredefinido(registro);
        }
      });

      calendario1.render();


      new FullCalendarInteraction.Draggable(document.getElementById('listaeventospredefinidos'), {
        itemSelector: '.fc-event',
        eventData: function (eventEl) {
          return {
            title: eventEl.innerText.trim()
          }
        }
      });

      //Eventos de botones de la aplicación
      $('#BotonAgregar').click(function () {
        let registro = recuperarDatosFormulario();
        agregarRegistro(registro);
        $("#FormularioEventos").modal('hide');
      });

      $('#BotonModificar').click(function () {
        let registro = recuperarDatosFormulario();
        modificarRegistro(registro);
        $("#FormularioEventos").modal('hide');
      });

      $('#BotonBorrar').click(function () {
        let registro = recuperarDatosFormulario();
        borrarRegistro(registro);
        $("#FormularioEventos").modal('hide');
      });

      $('#BotonEventosPredefinidos').click(function () {
        window.location = "eventospredefinidos";
      });


      // funciones para comunicarse con el servidor via ajax
      function agregarRegistro(registro) {
        $.ajax({
          type: 'POST',
          url: '../model/datoseventos.php?accion=agregar',
          data: registro,
          success: function (msg) {
            calendario1.refetchEvents();
          },
          error: function (error) {
            alert("Hay un problema:" + error);
          }
        });
      }

      function modificarRegistro(registro) {
        $.ajax({
          type: 'POST',
          url: '../model/datoseventos.php?accion=modificar',
          data: registro,
          success: function (msg) {
            calendario1.refetchEvents();
          },
          error: function (error) {
            alert("Hay un problema:" + error);
          }
        });
      }

      function borrarRegistro(registro) {
        $.ajax({
          type: 'POST',
          url: '../model/datoseventos.php?accion=borrar',
          data: registro,
          success: function (msg) {
            calendario1.refetchEvents();
          },
          error: function (error) {
            alert("Hay un problema:" + error);
          }
        });
      }

      function agregarEventoPredefinido(registro) {
        $.ajax({
          type: 'POST',
          url: '../model/datoseventos.php?accion=agregar',
          data: registro,
          success: function (msg) {
            calendario1.removeAllEvents();
            calendario1.refetchEvents();
          },
          error: function (error) {
            alert("Hay un problema:" + error);
          }
        });
      }

      // funciones que interactuan con el formulario de entrada de datos
      function limpiarFormulario() {
        $('#idEvento').val('');
        $('#Titulo').val('');
        $('#Descripcion').val('');
        $('#FechaInicio').val('');
        $('#FechaFin').val('');
        $('#HoraInicio').val('');
        $('#HoraFin').val('');
        $('#ColorFondo').val('#3788D8');
        $('#ColorTexto').val('#ffffff');
      }

      function recuperarDatosFormulario() {
        let registro = {
          id_evento: $('#idEvento').val(),
          titulo: $('#Titulo').val(),
          descripcion: $('#Descripcion').val(),
          inicio: $('#FechaInicio').val() + ' ' + $('#HoraInicio').val(),
          fin: $('#FechaFin').val() + ' ' + $('#HoraFin').val(),
          colorfondo: $('#ColorFondo').val(),
          colortexto: $('#ColorTexto').val()
        };
        return registro;
      }

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