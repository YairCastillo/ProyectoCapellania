<?php
include("../controller/conexion.php");
include('../controller/verificarSesion.php');
include('../controller/comprobarVerificacion.php');
include('../controller/validado.php');
include('../controller/verificarEntrevistaInicial.php');
include('../model/servicioCapellaniaModel.php');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapellaníaUM</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"><script src="js/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- CSS para la barra de navegacion -->
    <link rel="stylesheet" type="text/css" href="../css/navStyle.css"/>

    <!--estilo para el perfil-->
    <link rel="stylesheet" type="text/css" href="../css/capStyle.css">

    <!--loadingstyle.css es para el efecto de cargarndo-->
    <link rel="stylesheet" type="text/css" href="../css/loadingstyle.css">

    
    
    <!--para abajo es lo que estaba en la pagina inicialmente-->
    <script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>
        
    </head>
    <body>

    <!--Barra de Navegacion para alumnos-->

    <nav class="navbar navbar-expand-md fixed-top sticky-top">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
          <span class="navbar-toggler-icon">
          <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
          </span>
        </button>
                <div class="collapse navbar-collapse" id="collapse_target">
              <label class="logo">CapellaníaUM</label>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="servicioCapellania">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="calendarioAlumnos">CITAS</a></li>
                    <li class="nav-item"><a class="nav-link" href="modificarDatos">MODIFICAR MIS DATOS</a></li>
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
<div class="container pt-3">
    <div class="row justify-content-around">
        <div class="col col-md-6 align-self-center">
            <!--Foto del capellan de su facultad-->
            <img class="responsive" src="<?php echo $imagenPath; ?>" alt="">
        </div>
        <div class="col col-md-6 align-self-center">
            <!--Imagen del servicio de capellania-->
            <img class="responsive" src="https://ucasur.org/inicio/wp-content/uploads/2018/04/304841_508807139133647_846231736_n.jpg" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6">
        <table style="width:100%">
                <tr>
                    <th style="text-align:center"><?php echo $nombreCapellan; ?></th>
                </tr>
            </table>
        </div>
        <div class="col col-md-6 align-self-center">
            <table style="width:100%">
                <tr>
                    <th style="text-align:center">Servicios de CapellaníaUM</th>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6">
        <table style="width:100%">
                <tr>
                    <td style="text-align:center"><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td style="text-align:center"><?php echo $telefono; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="container pt-3">
    <div class="row">
        <div class="col col-md-6">
        <table style="width:100%">
                <tr>
                    <th style="text-align:center">ACERCA DE TU CAPELLÁN</th>
                </tr>
            </table>
        </div>
        <div class="col col-md-6 align-self-center">
            <table style="width:100%">
                <tr>
                    <th style="text-align:center">ACERCA DEL SERVICIO DE CAPELLANÍA UM</th>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6">
        <table style="width:100%">
                <tr>
                    <td style="text-align:left"><?php echo $descripcion; ?></td>
                </tr>
            </table>
        </div>
        <div class="col col-md-6 align-self-center">
            <table style="width:100%">
                <tr>
                    <td style="text-align:left">
                        <p>Nos llena de alegría y entusiasmo saber que Dios te ha traído a este lugarpara que puedas cumplir con los
                            propósitos del ceilo. Definitivamente tu vida cambiará por completo y tu carácter podrá ser más semejante 
                            al de Cristo, ya que el fin primario de la Universidad de Montemorelos, es tener un encuentro salvador con 
                            Jesucristo por medio de su palabra.</p>
                        <p>Nos esforzaremos para ser un equipo de apoyo y fortalecimiento espiritual para tu vida durante este curso escolar.</p>
                        <p>Te deseamos el mejor de los éxitos: "He manifestado tu nombre a los hombres que del mundo me diste; tuyos eran, 
                            y me los diste, y han guardado tu palabra" (Juan 17:).</p>
                        <p>¡Excelente, mejorando y a Jesucristo esperando!</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
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