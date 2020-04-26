<?php
#ESTE ARCHIVO COMPRUEBA QUE EL ALUMNO HAYA RELLENADO LOS DATOS INICIALES

   $ses_sql = mysqli_query($con,"SELECT alumnos.matricula, datosacademicos.matricula, datosdemograficos.matricula, datosfamiliares.matricula, datosreligiosos.matricula, serviciobecario.matricula, actividadesdevocionales.matricula, datossalud.matricula from alumnos
   INNER JOIN datosacademicos ON alumnos.matricula = datosacademicos.matricula
   INNER JOIN datosdemograficos ON alumnos.matricula = datosdemograficos.matricula
   INNER JOIN datosfamiliares ON alumnos.matricula = datosfamiliares.matricula
   INNER JOIN datosreligiosos ON alumnos.matricula = datosreligiosos.matricula
   INNER JOIN serviciobecario ON alumnos.matricula = serviciobecario.matricula
   INNER JOIN actividadesdevocionales ON alumnos.matricula = actividadesdevocionales.matricula
   INNER JOIN datossalud ON alumnos.matricula = datossalud.matricula
   and alumnos.usuario = '$nombre'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $count = mysqli_num_rows($ses_sql);

   if($count == 0){
        header("location:entrevistaInicial");
        die();
     }
?>