<?php
     /* Select de Facultades */
     $sql_facultad = "SELECT idFacultad, nombreFacultad FROM facultad order by nombreFacultad";
     $query_facultad = mysqli_query($con, $sql_facultad);
     while ($results[] = mysqli_fetch_object($query_facultad));
     array_pop($results);


     $idFacultad = $_COOKIE['selectedOption'];

     $sql_carrera = "SELECT idCarrera, nombreCarrera FROM carrera where idFacultad = '$idFacultad' order by nombreCarrera";
     $query_facultad = mysqli_query($con, $sql_facultad);
     while ($results[] = mysqli_fetch_object($query_facultad));
     array_pop($results);

     /* Select de paises */
     /* $sql_pais = "SELECT id, paisnombre FROM paises order by paisnombre";
     $query_pais = mysqli_query($con, $sql_pais);
     while ($results[] = mysqli_fetch_object($query_facultad));
     array_pop($results);


     $idPais = $_COOKIE['selectedOption'];

     $sql_carrera = "SELECT idCarrera, nombreCarrera FROM carrera where idFacultad = '$idFacultad' order by nombreCarrera";
     $query_facultad = mysqli_query($con, $sql_facultad);
     while ($results[] = mysqli_fetch_object($query_facultad));
     array_pop($results); */


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
               
               #$sql_edad = "SELECT TIMESTAMPDIFF(YEAR, '$fechaNac', CURDATE()) AS edad"; #EDAD NO SE GUARDA, SE CALCULA DEPENDIENDO DE LA FECHA DE NACIMIENTO

               #$result = mysqli_query($con,$sql_edad);

               #$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
               #$edad = $row['edad'];

               $sql = "INSERT into alumnos (matricula, usuario, nombre, apellidos, fechanacimiento) values ('$matricula','$nombre', '$nombres', '$apellidos', '$fechaNac')";
               
               if(mysqli_query($con, $sql)){
               }else{
                    echo 'ERROR';
               }
          }
     }
 }
?>