<?php
  include("../controller/conexion.php");
  include("../controller/verificarSesion.php");
  include("../controller/verificarCodigoRedireccion.php");


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