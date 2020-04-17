<?php
   if( $_SESSION['redirected_from_verificarCodigo'] != true){
        header("location:index");
        die();
     }
?>