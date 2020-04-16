<?php
   include('conexion.php');
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"select nombre, verificado, token, expDate from usuarios where nombre = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $nombre = $row['nombre'];
   $verificado = $row['verificado'];
   $token = $row['token'];
   $expDate = $row['expDate'];
   
   if($verificado != 1){
        if($token != null || $expDate != null){
          $sql = "UPDATE usuarios SET token=null, expDate=null WHERE nombre =$nombre";
          mysqli_query($con, $sql);
        }
        header("location:verificarEmail");
        die();
     }
?>