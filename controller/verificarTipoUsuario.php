<?php
#ESTE ARCHIVO COMPRUEBA EL TIPO DE USUARIO Y LO REDIRIGE SEGUN ESTO
   if($tipoUsuario == "Capellán"){
        header("location:capellanes");
        die();
     }else if($tipoUsuario == "Alumno"){
        header("location:servicioCapellania");
        die();
     }
?>