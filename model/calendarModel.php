<?php

     $sql = "SELECT nombreCapellan from capellanes where usuario = '$nombre'";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     $nombreCompleto = strtoupper($row['nombreCapellan']);
     $nombreArr = explode(' ',trim($nombreCompleto));
     $nombreCuenta = $nombreArr[0];

?>