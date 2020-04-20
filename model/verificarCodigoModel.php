<?php
   include('../controller/conexion.php');
   include("../controller/verificarSesion.php");
   include('../controller/verificarIdentificacionRedireccion.php');
   include('../controller/comprobarVerificacion.php');


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