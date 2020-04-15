<?php
   include('conexion.php');
   session_start();
   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($con,"select nombre, token, expDate from usuarios where nombre = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['nombre'];
   $token = $row['token'];
   $expDate = $row['expDate'];


   if(!isset($_SESSION['login_user'])){
        header("location:login");
        die();
     }else if(isset($_SESSION['login_user']) && $_SESSION['redirected_from_identificacion'] != true){
          header("location:index");
          die();
     }else if(isset($_SESSION['login_user']) && $_SESSION['redirected_from_identificacion'] == true && ($token == null || $expDate == null)){
          
          mysqli_query($con,"UPDATE usuarios set token = null, expDate = null where nombre = '$login_session'");

          header("location:identificacion");
          die();
     }
?>