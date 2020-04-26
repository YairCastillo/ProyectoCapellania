<?php
     include("../controller/conexion.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

               $sql = "insert into alumnos (matricula, usuario, nombre, apellidos, fechanacimiento) values ('$matricula','$nombre', '$nombres', '$apellidos', '$fechaNac')";
               
               if(mysqli_query($con, $sql)){
                    echo 'Guardado';
               }else{
                    echo 'ERROR';
               }
          }
     }
 }

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
?>