<?php
   include('verificarEmailRedireccion.php');

   session_destroy();
?>
<html>
<head>
<script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>
    <meta charset="UTF-8">
<title>Capellanía | Verificación</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="loadingstyle.css">
<body>
    <div class="verificationbox">
    <img src="logo.png" class="avatar">
        <h1>Verifica tu correo</h1>
        <form method="post">
            <p>Tu cuenta ha sido creada.</br>Por favor, verifícala dando click en el link de activación que ha sido enviado a tu correo electrónico</p>
            <br>
            <a href="login">¿Ya verificaste tu correo? Ingresa aquí</a><br>
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