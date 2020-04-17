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

    <!-- CSS para la barra de navegacion 
    <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>-->

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
          <span class="navbar-toggler-icon"></span>
        </button>
                <div class="collapse navbar-collapse" id="collapse_target">
              <label class="logo">CapellaníaUM</label>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="calendar">CITA</a></li>
                    <li class="nav-item"><a class="nav-link" href="entrevistaInicial">MODIFICAR MIS DATOS</a></li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        NOMBRE
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Configuración</a>
                        <a class="dropdown-item" href="#">Cerrar Sesión</a>
                      </div>
                    </li>
                    </div>
                </ul>
          </div>
      </nav>
<div class="container pt-3">
    <div class="row">
        <div class="col col-md-6 align-self-center">
            <!--Foto del capellan de su facultad-->
            <img class="responsive" src="data:image/png;base64,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" alt="">
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
                    <th>NOMBRE COMPLETO DEL CAPELLAN</th>
                </tr>
            </table>
        </div>
        <div class="col col-md-6 align-self-center">
            <table style="width:100%">
                <tr>
                    <th>Servicios de CapellaníaUM</th>
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