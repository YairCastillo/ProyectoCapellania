<?php

     if($_SESSION['redirected_from_identificacion'] != true){
        header("location:index");
        die();
     }else if($_SESSION['redirected_from_identificacion'] == true &&
          ($token == null || $expDate == null)){

          mysqli_query($con,"UPDATE usuarios set token = null, expDate = null where nombre = '$nombre'");

          session_destroy();
          header("location:identificacion");
          die();
     }
?>