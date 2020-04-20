<?php
  include('../model/verificarCodigoModel.php');
?>


<html>
<head>
<script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>
    <meta charset="UTF-8">
<title>CapellaníaUM | Recupera tu cuenta</title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/loadingstyle.css">
<body>
    <div class="identifybox">
    <img src="../assets/logo.png" class="avatar">
        <h1>Ingresa el código</h1>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        <form method="post">
            <p>Introduce el código enviado a tu correo electrónico</p>
            <input type="text" name="token" placeholder="" class="form_control" maxlength="6" required>

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