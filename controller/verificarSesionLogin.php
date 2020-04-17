<?php
   session_start();
   
   if(isset($_SESSION['login_user'])){
        header("location:index");
        die();
     }
   
   session_destroy();
?>