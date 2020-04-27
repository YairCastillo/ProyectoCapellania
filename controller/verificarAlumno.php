<?php
#ESTE ARCHIVO COMPRUEBA EL TIPO DE USUARIO Y LO REDIRIGE SEGUN ESTO
   if($tipoUsuario != "Alumno"){
        header("location:capellanes");
        die();
     }
?>