<?php
   include('verificarIdentificacionRedireccion.php');
   include('comprobarVerificacion.php');
   include('conexion.php');

   $error = "";

   $username = $_SESSION['login_user'];


     if($_SERVER["REQUEST_METHOD"] == "POST"){

          mysqli_query($con, "UPDATE usuarios SET token = null, expDate = null where expDate < NOW()");

          if(empty(trim($_POST["token"]))){
               $error = "Por favor, ingresa el código solicitado";
          }else{
               $code = trim($_POST["token"]);

               $sql = "SELECT nombre, token FROM usuarios WHERE expDate > NOW() and nombre = '$username'";

               $result = mysqli_query($con,$sql);
               $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

               $token = $row['token'];

               $count = mysqli_num_rows($result);

               if(password_verify($code, $token)) {
                    mysqli_query($con, "UPDATE usuarios SET token = null, expDate = null where nombre = '$username'");
                    
                    $_SESSION['redirected_from_verificarCodigo'] = true;
                    $_SESSION['redirected_from_identificacion'] = false;
                    header("location: restablecerContraseña");
               }else {
                    $error = "El código introducido es incorrecto o ha expirado";
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
<title>Capellanía | Recupera tu cuenta</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="loadingstyle.css">
<body>
    <div class="identifybox">
    <img src="logo.png" class="avatar">
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