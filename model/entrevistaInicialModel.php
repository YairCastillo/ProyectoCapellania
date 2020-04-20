<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     if (isset($_POST['btnPersonales'])) {
          if(empty(trim($_POST["matricula"])) or empty(trim($_POST["nombre"])) or empty(trim($_POST["apellidos"])) or empty(trim($_POST["fechaNac"]))){
               $error = "Por favor, ingresa los datos solicitados";
          }else{
               $matricula = trim($_POST["matricula"]);
               $nombres = ucwords(trim($_POST["nombre"]));
               $apellidos = ucwords(trim($_POST["apellidos"]));
               $fechaNac = trim($_POST["fechaNac"]);

               $matricula = mysqli_real_escape_string($con, $matricula);

               $nombres = mysqli_real_escape_string($con, $nombres);

               $apellidos = mysqli_real_escape_string($con, $apellidos);
               
               $fechaNac = mysqli_real_escape_string($con, $fechaNac);
               
               $sql_edad = "SELECT TIMESTAMPDIFF(YEAR, '$fechaNac', CURDATE()) AS edad";

               $result = mysqli_query($con,$sql_edad);

               $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
               $edad = $row['edad'];

               $sql = "INSERT into alumnos (matricula, usuario, nombre, apellidos, fechanacimiento, edad) values ('$matricula','$nombre', '$nombres', '$apellidos', '$fechaNac', $edad)";
               
               if(mysqli_query($con, $sql)){
               }else{
                    echo 'ERROR';
               }
          }
     }
 }
?>