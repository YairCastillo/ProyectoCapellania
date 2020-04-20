<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar datos</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"><script src="js/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/estilo.css" />

</head>
<body>
      <div class="container">
          <div class="row">
              <div class="col col-md-12">
                <form action="modificarDatos.php" method="POST" enctype="multipart/form-data">
                    <div id="formulario">
                        <h3>Datos del Capellán</h3>
                    </div>
                    <div id="formulario-capellan">
                      <div class="form-group">

                        <label for="photo">Selecciona una fotografía para tu perfil:</label>
                        <input type="file" name="fileToUpload" id="fileToUpload">

                        <label for="nombre">Nombre completo</label>
                        <input type="text" class="form-control" style="text-transform: capitalize;" name="nombre" placeholder="Nombre completo" required>
                        <br>

                        <label for="bio">Biografía</label>
                        <input type="text" class="form-control" style="text-transform: capitalize;" name="bio" placeholder="Escribir una breve biografía" required>
                        <br>

                        </div>
                        <br>
                    <div class="col text-center">
                    <button class="btn btn-success regular-button" name="btnDatosCap" type="submit" id="btnDatosCap">
                        Guardar
                    </button>
                    </div>
                </div>
                </form>
            </div>
              </div>
          </div>
      </div>
</body>
</html>