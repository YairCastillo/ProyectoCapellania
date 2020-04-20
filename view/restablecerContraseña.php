<?php
  include("../model/RestablecerContraseñaModel.php");
?>

<html>
<head>
<script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>
    <meta charset="UTF-8">
<title>CapellaníaUM | Restablecer contraseña</title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/loadingstyle.css">
<body>
    <div class="newpasswordbox">
    <img src="../assets/logo.png" class="avatar">
        <h1>Restablece tu contraseña</h1>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        <form method="post">
            <p>Nueva contraseña</p>
            <input type="password" name="password" class="form_control" placeholder="Nueva contraseña" required>

            <p>Confirma tu contraseña</p>
            <input type="password" name="confirm_password" class="form_control" placeholder="Confirma tu contraseña" required>

            <input type="submit" name="" value="Aceptar" onClick="this.form.submit(); this.disabled=true; this.value='Cargando...'; ">
            <br>
            <a href="login">Inicia sesión</a><br>
            <a href="signup">Crea una cuenta</a><br>
        </form>
    </div>

    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <script>
        $(window).on("load",function(){
          $(".loader-wrapper").fadeOut("slow");
        });
    </script>
</body>
</head>
</html>