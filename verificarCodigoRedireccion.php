<?php
   include('conexion.php');
   session_start();
   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($con,"select nombre from usuarios where nombre = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['nombre'];

   if(!isset($_SESSION['login_user'])){
        header("location:login");
        die();
     }else if(isset($_SESSION['login_user']) && $_SESSION['redirected_from_verificarCodigo'] != true){
          header("location:index");
          die();
     }
?>