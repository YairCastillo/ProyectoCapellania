<?php
#ESTE ARCHIVO COMPRUEBA QUE EL USUARIO HAYA INTRODUCIDO LA CONTRASEÑA PARA INICIAR UNA SESION Y ENTRAR AL SISTEMA
   include('conexion.php');
   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($con,"select nombre from usuarios where nombre = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['nombre'];

   if(!isset($_SESSION['validado']) || $_SESSION['validado'] != true){
        session_destroy();
        header("location:login");
        die();
     }
?>