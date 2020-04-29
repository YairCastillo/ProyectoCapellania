<?php
  include("../model/loginModel.php");
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>CapellaníaUM | Inicio de Sesión</title>
    
    <script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/loadingstyle.css">
<body>
    <div class="loginbox">
    <img src="../assets/logo.png" class="avatar">
        <h1>Iniciar Sesión</h1>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        <form method="post">
            <p>Usuario o correo electrónico</p>
            <input type="text" name="username" placeholder="Usuario o correo electrónico" value="<?php echo $username ?>" required>
            <p>Contraseña</p>
            <input type="password" name="password" placeholder="Contraseña" autocomplete="new-password" required>
            <input type="submit" name="" value="Ingresar" onClick="this.form.submit(); this.disabled=true; this.value='Cargando...'; ">
            <a href="identificacion">¿Olvidaste tu contraseña?</a><br>
            <a href="signup">¿No tienes cuenta todavía? Regístrate aquí</a>
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