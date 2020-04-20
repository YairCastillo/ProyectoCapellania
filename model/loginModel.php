<?php
include("../controller/conexion.php");
include("../controller/verificarSesionLogin.php");

$error = "";
$username = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
     
     $username = mysqli_real_escape_string($con,$_POST['username']);
     $password = mysqli_real_escape_string($con,$_POST['password']);
     
     $sql = "SELECT nombre, password, verificado FROM usuarios WHERE nombre = '$username' OR email = '$username' limit 1";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     $nombre = $row['nombre'];
     $hashed_password = $row['password'];
     $verificado = $row['verificado'];
     //$count = mysqli_num_rows($result);

     if(password_verify($password, $hashed_password) && $verificado != 1){

      session_start();
      $_SESSION['login_user'] = $nombre;
      $_SESSION['redirected_to_verificarEmail'] = true;
      header("location: verificarEmail.php");

     }else if(password_verify($password, $hashed_password) && $verificado == 1) {

       session_start();
        $_SESSION['login_user'] = $nombre;
        $_SESSION['redirected_from_identificacion'] = false;
        $_SESSION['redirected_to_verificarEmail'] = false;
        $_SESSION['redirected_from_verificarCodigo'] = false;
        $_SESSION['validado'] = true;
        header("location: index");

      }else {
        $error = "Tu usuario o contraseña son incorrectos";
      }
  }
?>