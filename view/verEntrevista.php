<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapellaníaUM | Ver Encuesta</title>

    <!--links para CDN *copiar desde aqui para poner una navbar-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"><script src="js/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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
                        <a class="dropdown-item" href="modificarCap">Configuración</a>
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
                <th>Matrícula:</th>
                <td>matrícula</td>
                <th>Fecha de nacimiento:</th>
                <td>fecha</td>
               </tr>

               <tr>
                <th>Nombre:</th>
                <td>nombre y apellidos</td>
                <th>Correo electrónico:</th>
                <td>correo</td>
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
                <th>Carrera:</th>
                <td colspan="3">carreras</td>
                
               </tr>

               <tr>
                <th>Semestre:</th>
                <td>semestre</td>
                <th>Situación académica:</th>
                <td>situación</td>
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
                <th>Estado civil:</th>
                <td>estado civil</td>
                <th>Tengo novio(a):</th>      
                <td>novia</td>   
                <th>Tengo amigo(a) especial:</th>
                <td>amigo</td>       
               </tr>

               <tr>
                <th>Lugar de nacimineto:</th>
                <td colspan="5">municipio, estado, pais</td>
               </tr>
               <tr>
                <th>Sexo:</th>
                <td>sexo</td>
                <th>Preferencia sexual:</th>
                <td>preferencia</td>
               </tr>
               <tr>
                <th>Residencia actual:</th>
                <td>residencia</td>
                <th>Dirección:</th>
                <td colspan="3">direccion</td>
               </tr>
              </table>
            </div>
          </div>
      </div>
</body>
</html>