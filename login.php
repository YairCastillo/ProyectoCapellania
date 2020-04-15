<?php
include("verificarSesionLogin.php");
include("conexion.php");

$error = "";
$username = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
     
     $username = mysqli_real_escape_string($con,$_POST['username']);
     $password = mysqli_real_escape_string($con,$_POST['password']);
     
     $sql = "SELECT nombre, password, verificado FROM usuarios WHERE nombre = '$username' limit 1";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     $hashed_password = $row['password'];
     $verificado = $row['verificado'];
     //$count = mysqli_num_rows($result);

     if(password_verify($password, $hashed_password) && $verificado != 1){
      session_start();
      $_SESSION['login_user'] = $username;
      $_SESSION['redirected_from_signup'] = true;
      header("location: verificarEmail");
     }else if(password_verify($password, $hashed_password) && $verificado == 1) {

       session_start();
        $_SESSION['login_user'] = $username;
        $_SESSION['redirected_from_identificacion'] = false;
        $_SESSION['redirected_from_signup'] = false;
        $_SESSION['redirected_from_verificarCodigo'] = false;
        $_SESSION['validado'] = true;
        header("location: index");

      }else {
        $error = "Tu usuario o contraseña son incorrectos";
      }
  }
?>

<html>
<head>
    <meta charset="UTF-8">
    <script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>
<title>Capellanía | Inicio de Sesión</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="loadingstyle.css">
<body>
    <div class="loginbox">
    <img src="logo.png" class="avatar">
        <h1>Iniciar Sesión</h1>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        <form method="post">
            <p>Usuario</p>
            <input type="text" name="username" placeholder="Nombre del usuario" value="<?php echo $username ?>" required>
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