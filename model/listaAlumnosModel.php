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

          $sql3 = "SELECT alumnos.matricula,alumnos.nombre, alumnos.apellidos, TIMESTAMPDIFF(YEAR, alumnos.fechanacimiento, CURDATE()) AS edad,usuarios.email,  carrera.nombreCarrera from alumnos
          INNER JOIN usuarios ON alumnos.usuario = usuarios.nombre
          INNER JOIN datosacademicos ON alumnos.matricula = datosacademicos.matricula
          INNER JOIN carrera ON carrera.idCarrera = datosacademicos.idCarrera
          and alumnos.matricula = '$matriculaAlumno'";
          $result3 = mysqli_query($con,$sql3);
          array_push($row3, mysqli_fetch_all($result3,MYSQLI_ASSOC));
     }

?>