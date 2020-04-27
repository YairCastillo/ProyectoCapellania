<?php

     $sql = "SELECT nombre from alumnos where usuario = '$nombre'";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     $nombreCompleto = strtoupper($row['nombre']);
     $nombreArr = explode(' ',trim($nombreCompleto));
     $nombreCuenta = $nombreArr[0];

?>