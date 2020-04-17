<?php
#ESTE ARCHIVO COMPRUEBA QUE EL USUARIO HAYA INTRODUCIDO LA CONTRASEÑA PARA INICIAR UNA SESION Y ENTRAR AL SISTEMA
   if(!isset($_SESSION['validado']) || $_SESSION['validado'] != true){
        session_destroy();
        header("location:login");
        die();
     }
?>