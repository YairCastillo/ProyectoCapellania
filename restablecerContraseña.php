<?php
  include("verificarCodigoRedireccion.php");
  include("conexion.php");

  $error = "";

  $username = $_SESSION['login_user'];

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["password"])) || empty(trim($_POST["confirm_password"]))){
      $error = "Por favor, completa todos los campos";

    }else{

      $password = trim($_POST["password"]);
      $confirm_password = trim($_POST["confirm_password"]);

      if($password != $confirm_password){
        $error = "Las contraseñas no coinciden"; //Verificar que las contraseñas coincidan
      }else if(strlen($password) < 6){
        $error = "La contraseña debe contener al menos 6 caracteres";
      }else{

        $hashed_password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);


        $sql = "UPDATE usuarios SET password = '$hashed_password' where nombre = '$username'";

        if(mysqli_query($con, $sql)){
          session_start();
          
          $_SESSION['login_user'] = $username;
          $_SESSION['redirected_from_verificarCodigo'] = false;
          $_SESSION['validado'] = true;
          
          header("location: index");
        }else{
          $error = "¡Oops! Ocurrió un error. Inténtalo de nuevo más tarde.";
        }
      }
    }
  }

?>

<html>
<head>
<script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>
    <meta charset="UTF-8">
<title>Capellanía | Restablece tu contraseña</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="loadingstyle.css">
<body>
    <div class="newpasswordbox">
    <img src="logo.png" class="avatar">
        <h1>Nueva Contraseña</h1>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        <form method="post">
            <p>Introduce tu nueva contraseña</p>
            <input type="password" name="password" class="form_control" placeholder="Nueva contraseña" required>

            <p>Confirma tu contraseña</p>
            <input type="password" name="confirm_password" class="form_control" placeholder="Confirmar contraseña" required>

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