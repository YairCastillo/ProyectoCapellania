<?php
   session_start();

   if(!isset($_SESSION['login_user'])){
      header("location:login");
      die();
   }

   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"select nombre, verificado, token, expDate, tipoUsuario from usuarios where nombre = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $_SESSION['nombre'] = $row['nombre'];
   $_SESSION['verificado'] = $row['verificado'];
   $_SESSION['token'] = $row['token'];
   $_SESSION['expDate'] = $row['expDate'];
   $_SESSION['tipoUsuario'] = $row['tipoUsuario'];

   $nombre = $row['nombre'];
   $verificado = $row['verificado'];
   $token = $row['token'];
   $expDate = $row['expDate'];
   $tipoUsuario = $row['tipoUsuario'];
?>