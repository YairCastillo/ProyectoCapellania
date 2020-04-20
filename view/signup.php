<?php
    include("../model/signupModel.php");
?>

<html>
<head>
    <meta charset="UTF-8">
    <script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>
<title>CapellaníaUM | Registrarse</title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/loadingstyle.css">
<body>
    <div class="signupbox">
    <img src="../assets/logo.png" class="avatar">
        <h1>Resgístrate</h1>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        
        <form autocomplete="off" method="post" id="signup_form">
            <p>Nuevo usuario</p>
            <input type="text" name="username" placeholder="Nuevo usuario" class="form_control" value="<?php echo $username ?>" required>

            <p>Correo electrónico*</p>
            <input type="email" name="email" placeholder="Correo electrónico" value="<?php echo $email ?>" required>

            <p>Contraseña nueva</p>
            <input type="password" name="password" placeholder="Contraseña nueva" required>

            <p>Confirma tu contraseña</p>
            <input type="password" name="confirm_password" placeholder="Confirma tu contraseña" autocomplete="new-password" required>

            <input type="submit" name="" value="Aceptar" onClick="this.form.submit(); this.disabled=true; this.value='Cargando...'; ">

            <a href="login">¿Ya tienes una cuenta? Ingresa aquí</a><br>
            <label>*En caso de que seas capellán, ingresa con tu correo institucional</label>
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