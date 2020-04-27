<?php

     /* Select de Facultades */
     $output = "";
     $sql_facultad = "SELECT idFacultad, nombreFacultad FROM facultad order by nombreFacultad";
     $result = mysqli_query($con, $sql_facultad);
     $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

     foreach($row as $item){
          $output .= '<option value="'.$item['idFacultad'].'">'.$item['nombreFacultad'].'</option>';
     };


     /* Select de Paises */
     $paises = "";
     $sql_paises = "SELECT * FROM paises order by paisnombre";
     $result1 = mysqli_query($con, $sql_paises);
     $row1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

     foreach($row1 as $item){
          $paises .= '<option value="'.$item['id'].'">'.$item['paisnombre'].'</option>';
     };


     #RECUPERAR DATOS
     $sql = "SELECT alumnos.nombre, datosacademicos.idFacultad from alumnos INNER JOIN datosacademicos ON alumnos.matricula = datosacademicos.matricula and  alumnos.usuario = '$nombre'";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     $nombreCompleto = strtoupper($row['nombre']);
     $nombreArr = explode(' ',trim($nombreCompleto));
     $nombreCuenta = $nombreArr[0];

     $matricula = "";
     $nombres = "";
     $apellidos = "";
     $fechaNac = "";

     #TRAER DATOS PERSONALES
     $sql = "SELECT * FROM alumnos where usuario = '$nombre'";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     $matricula = $row['matricula'];
     $nombres = $row['nombre'];
     $apellidos = $row['apellidos'];
     $fechaNac = $row['fechanacimiento'];

?>