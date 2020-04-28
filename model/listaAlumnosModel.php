<?php

     $sql = "SELECT nombreCapellan, idFacultad from capellanes where usuario = '$nombre'";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     $nombreCompleto = strtoupper($row['nombreCapellan']);
     $nombreArr = explode(' ',trim($nombreCompleto));
     $nombreCuenta = $nombreArr[0];

     $idFacultad = $row['idFacultad'];

     $sql2 = "SELECT matricula from datosacademicos where idFacultad = '$idFacultad'";
     $result2 = mysqli_query($con,$sql2);
     $row2=mysqli_fetch_all($result2, MYSQLI_ASSOC);


     $row3 = [];
     foreach($row2 as $value){
          $matriculaAlumno = $value['matricula'];
          #ESTO SE ENCARGA DE MOSTRAS SOLAMENTE LOS ALUMNOS QUE YA HAYA CONTESTADO SU ENTREVISTA INICIAL
          $ses_sql = mysqli_query($con,"SELECT alumnos.matricula, datosacademicos.matricula, datosdemograficos.matricula, datosfamiliares.matricula, datosreligiosos.matricula, serviciobecario.matricula, actividadesdevocionales.matricula, datossalud.matricula from alumnos
          INNER JOIN datosacademicos ON alumnos.matricula = datosacademicos.matricula
          INNER JOIN datosdemograficos ON alumnos.matricula = datosdemograficos.matricula
          INNER JOIN datosfamiliares ON alumnos.matricula = datosfamiliares.matricula
          INNER JOIN datosreligiosos ON alumnos.matricula = datosreligiosos.matricula
          INNER JOIN serviciobecario ON alumnos.matricula = serviciobecario.matricula
          INNER JOIN actividadesdevocionales ON alumnos.matricula = actividadesdevocionales.matricula
          INNER JOIN datossalud ON alumnos.matricula = datossalud.matricula
          and alumnos.matricula = '$matriculaAlumno' limit 1");
          
          $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

          $count = mysqli_num_rows($ses_sql);

          if($count == 1){
               $sql3 = "SELECT alumnos.matricula,alumnos.nombre, alumnos.apellidos, TIMESTAMPDIFF(YEAR, alumnos.fechanacimiento, CURDATE()) AS edad,usuarios.email,  carrera.nombreCarrera from alumnos
               INNER JOIN usuarios ON alumnos.usuario = usuarios.nombre
               INNER JOIN datosacademicos ON alumnos.matricula = datosacademicos.matricula
               INNER JOIN carrera ON carrera.idCarrera = datosacademicos.idCarrera
               and alumnos.matricula = '$matriculaAlumno'";
               $result3 = mysqli_query($con,$sql3);
               array_push($row3, mysqli_fetch_all($result3,MYSQLI_ASSOC));
          }
     }
?>