<?php
#ESTE ARCHIVO COMPRUEBA QUE EL ALUMNO HAYA RELLENADO LOS DATOS INICIALES
   include('conexion.php');
   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($con,"SELECT usuario from alumnos where usuario = '$user_check' limit 1");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $count = mysqli_num_rows($ses_sql);

   if($count == 0){
        
        header("location:entrevistaInicial");
        die();
     }
?>