<?php

     $sql = "SELECT alumnos.nombre, datosacademicos.idFacultad from alumnos INNER JOIN datosacademicos ON alumnos.matricula = datosacademicos.matricula and  alumnos.usuario = '$nombre'";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     $nombreCompleto = strtoupper($row['nombre']);
     $nombreArr = explode(' ',trim($nombreCompleto));
     $nombreCuenta = $nombreArr[0];

     $idFacultad = $row['idFacultad'];


     $sql_capellan = "SELECT capellanes.nombreCapellan, capellanes.imagenPath, capellanes.descripcion, capellanes.telefono, usuarios.email from capellanes INNER JOIN usuarios ON capellanes.usuario = usuarios.nombre and capellanes.idFacultad = '$idFacultad' limit 1";
     $result1 = mysqli_query($con,$sql_capellan);
     $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
     $count1 = mysqli_num_rows($result1);

     if($count1 == 1){
          $nombreCapellan = $row1['nombreCapellan'];
          $imagenPath = $row1['imagenPath'];
          $descripcion = $row1['descripcion'];
          $telefono = $row1['telefono'];
          $email = $row1['email'];
     }else{
          $nombreCapellan = 'Aún no lo tenemos claro...';
          $imagenPath = '../assets/unknown.jpg';
          $descripcion = 'Lo sentimos, tu capellán no está registrado en el sistema
          ¡Invítalo a que se registre!';
          $telefono = '';
          $email = '';
          
     }
?>