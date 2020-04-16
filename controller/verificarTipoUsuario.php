<?php
#ESTE ARCHIVO COMPRUEBA EL TIPO DE USUARIO Y LO REDIRIGE SEGUN ESTO
   include('conexion.php');
   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($con,"SELECT tipoUsuario from usuarios where nombre = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['tipoUsuario'];

   if($login_session == "Capellán"){
        header("location:capellanes");
        die();
     }
?>