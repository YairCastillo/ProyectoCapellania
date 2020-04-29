<?php
  include("../controller/conexion.php");
  include('../controller/verificarSesion.php');
  include('../controller/comprobarVerificacion.php');
  include('../controller/validado.php');
  include('../controller/verificarCapellan.php');
  include('../controller/verificarPerfilInicial.php');
  include('../model/editarPerfilModel.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapellaníaUM | Perfil de Capellán</title>

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

    <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
    
    <link rel="stylesheet" type="text/css" href="../css/placeholders.css" />


</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <div>
                        <h3>Datos del Capellán</h3>
                    </div>
                    <?php if($error != ''){ ?>
                    <div style="font-size:20px; color:#cc0000; margin-top:5px"><label id="error"><?php echo $error; ?></label></div>
                    <?php } ?>

                    <?php if($success != ''){ ?>
                        <div style="font-size:20px; color:#0BC302; margin-top:5px"><label id="success"><?php echo $success; ?></label></div>
                    <?php } ?>
                    <div>
                        <div class="form-group">

                            <label for="foto">Selecciona una fotografía para tu perfil:</label>

                            <input type="file" name="foto" id="foto" accept="image/x-png,image/jpeg"
                                onchange="readURL(this);" required>
                            <br><br>
                            <img class="rounded-circle" id="imageViewer" src="" alt="imagen" style="display:none" />
                            <br>

                            <label for="nombre">Nombre completo</label>
                            <input type="text" class="form-control" style="text-transform: capitalize;" name="nombre"
                                id="nombre" placeholder="Nombre completo" value="<?php echo $nombreCapellan; ?>" required>
                            <br>

                            <label for="matricula">Matrícula</label>
                            <input type="text" class="form-control" name="matricula" id="matricula" maxlength="7"
                                placeholder="Matrícula" value="<?php echo $matricula; ?>" required>
                            <br>

                            <label for="selectFacultad">Facultad/Escuela</label>
                            <select class="form-control" id="selectFacultad" name="selectFacultad">
                            <option value="">Selecciona tu facultad/escuela</option>
                                <?php foreach ($results as $option) : ?>
                                <option value="<?php echo $option->idFacultad; ?>">
                                    <?php echo $option->nombreFacultad; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>

                            <label for="bio">Saludo o Mensaje</label>
                            <textarea class="form-control" name="bio" id="bio" style="min-height: 65px;"
                                placeholder="Escribe una breve biografía, descripción de tu trabajo o un mensaje para tus alumnos" maxlength="250" required></textarea>
                            <br>

                            <script>document.getElementById("bio").value = "<?php echo $descripcion; ?>";</script>

                            <label for="telefono">Número de teléfono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono"
                                placeholder="Número de teléfono de contacto" value="<?php echo $telefono; ?>" required>
                            <br>

                            <div class="col text-center">
                            <button class="btn btn-secondary regular-button"  name="btnVolver" type="submit"
                                id="btnVolver">
                                Volver
                            </button>
                            <button class="btn btn-success regular-button"  name="btnDatosCap" type="submit"
                                id="btnDatosCap">
                                Actualizar perfil
                            </button>
                        </div>

                        
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        function readURL(input) {
            if (ValidateSingleInput(input)) {
                if (input.files && input.files[0]) {
                    document.getElementById("imageViewer").style.display = "block";
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imageViewer')
                            .attr('src', e.target.result)
                            .width(200)
                            .height(200);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        }

        var _validFileExtensions = [".jpg", ".png", ".jpeg", ".jfif", ".pjpeg", ".pjp"];

        function ValidateSingleInput(oInput) {
            if (oInput.type == "file") {
                var sFileName = oInput.value;
                if (sFileName.length > 0) {
                    var blnValid = false;
                    for (var j = 0; j < _validFileExtensions.length; j++) {
                        var sCurExtension = _validFileExtensions[j];
                        if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length)
                            .toLowerCase() == sCurExtension.toLowerCase()) {
                            blnValid = true;
                            break;
                        }
                    }

                    if (!blnValid) {
                        alert("Lo sentimos, " + sFileName +
                            " contiene un formato inválido, las extensiones permitidas son: " + _validFileExtensions
                            .join(", "));
                        oInput.value = "";
                        return false;
                    }
                }
            }
            return true;
        }
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
      $('#btnVolver').click(function () {
        window.location = "capellanes";
      });
    });
  </script>

  <div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
  </div>
</body>

</html>