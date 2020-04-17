<?php
   if($_SESSION['redirected_to_verificarEmail'] != true){
        header("location:index");
        die();
     }
?>