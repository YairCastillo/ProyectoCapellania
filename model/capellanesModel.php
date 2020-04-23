<?php
     #NOMBRE COMPLETO Y DE CUENTA, DESCRIPCION, TELEFONO
     $sql = "SELECT nombreCapellan, idFacultad, imagenPath, descripcion, telefono from capellanes where usuario = '$nombre'";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     $nombreCompleto = strtoupper($row['nombreCapellan']);
     $nombreArr = explode(' ',trim($nombreCompleto));
     $nombreCuenta = $nombreArr[0];

     $descripcion = $row['descripcion'];

     $telefono = $row['telefono'];

     $imgPath = $row['imagenPath'];

     #Facultad
     $idFacultad = $row['idFacultad'];

     $sql2 = "SELECT nombreFacultad from facultad where idFacultad = '$idFacultad'";
     $result2 = mysqli_query($con,$sql2);
     $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

     $facultad = strtoupper($row2['nombreFacultad']);
?>