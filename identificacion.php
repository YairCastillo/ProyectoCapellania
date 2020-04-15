<?php
include("verificarSesionLogin.php");
include("conexion.php");

$error ="";

$usuario = "";
$email = "";
$username = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
     if(empty(trim($_POST["email_username"]))){
          $error = "Por favor, ingresa el dato solicitado";
     }else{
          $usuario = trim($_POST["email_username"]);

          $sql = "SELECT nombre, email, verificado FROM usuarios WHERE nombre = '$usuario' OR email = '$usuario' limit 1";
          $result = mysqli_query($con,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

          #print_r($row);

          $count = mysqli_num_rows($result);

          if($count == 0){
               $error = "El usuario no existe";
          }else{
            
               $verificado = $row['verificado'];

               if($verificado != 1){
                 session_start();
                 $_SESSION['login_user'] = $username;
                 $_SESSION['redirected_from_signup'] = true;
                 include('comprobarVerificacion.php');
               }

               $username = $row['nombre'];
               $email = $row['email'];

               $token = rand(100000,999999);

               $hashed_token = password_hash($token, PASSWORD_BCRYPT, ['cost'=>4]);

               date_default_timezone_set('America/Monterrey');
               $expDate = date("Y-m-d H:i:s",strtotime("+2 hours"));

               $sql = "UPDATE usuarios set token= '$hashed_token', expDate = '$expDate' where nombre = '$username'";

               if(mysqli_query($con, $sql)){
                    session_start();

                    $to = $email; // Send email to our user
                    $subject = 'Capellanía UM | Restablecer contraseña'; // Give the email a subject 
                    $message = "
                      Hola, $username.
                      Has pedido el restablecimiento de tu contraseña. Ingresa el siguiente código en la página para continuar:
                      $token

                      Si no has sido tú, ignora este mensaje.
                      *El código vencerá en 2 horas"; // Our message above including the link
                                                          
                    $headers = 'From: <pabloyair993@gmail.com>' . "\r\n"; // Set from headers
                          
                    mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers); // Send our email
                    
                    $_SESSION['login_user'] = $username;
                    $_SESSION['redirected_from_identificacion'] = true;
                    header("location: verificarCodigo");
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
<title>Capellanía | Recupera tu cuenta</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="loadingstyle.css">
<body>
    <div class="identifybox">
    <img src="logo.png" class="avatar">
        <h1>Recupera tu cuenta</h1>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        <form method="post">
            <p>Introduce tu correo electrónico o nombre de usuario</p>
            <input type="text" name="email_username" placeholder="Correo electrónico o usuario" class="form_control" value="<?php echo $usuario ?>" required>

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