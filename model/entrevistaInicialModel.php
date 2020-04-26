<?php
     include("../controller/conexion.php");

     $matricula= "";
     $nombres="";
     $apellidos="";
     $fechaNac= "";
     $username2="";

     // $sql2 = "SELECT nombre FROM usuarios WHERE nombre = '$username2'";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     if (isset($_POST['btnPersonales'])) {
          if(empty(trim($_POST["matricula"])) or empty(trim($_POST["nombres"])) or empty(trim($_POST["apellidos"])) or empty(trim($_POST["fechaNac"]))){
               $error = "Por favor, ingresa los datos solicitados";
          }else{
               $matricula = trim($_POST["matricula"]);
               $nombres = ucwords(trim($_POST["nombres"]));
               $apellidos = ucwords(trim($_POST["apellidos"]));
               $fechaNac = trim($_POST["fechaNac"]);     
     
               $matricula = mysqli_real_escape_string($con, $matricula);     
               $nombres = mysqli_real_escape_string($con, $nombres);     
               $apellidos = mysqli_real_escape_string($con, $apellidos);               
               $fechaNac = mysqli_real_escape_string($con, $fechaNac);


               // $sql_usuario = "SELECT nombre FROM usuarios WHERE nombre = '$username2' OR email = '$username2' limit 1";
               // $res = mysqli_query($con,$sql_usuario);
               // $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
               // $nombre = $row['nombre'];
               // if(password_verify($password) && $verificado == 1)


               $sql_edad = "SELECT TIMESTAMPDIFF(YEAR, '$fechaNac', CURDATE()) AS edad"; #EDAD NO SE GUARDA, SE CALCULA DEPENDIENDO DE LA FECHA DE NACIMIENTO     
               $result = mysqli_query($con,$sql_edad);     
               $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
               $edad = $row['edad'];
     
               $sql = "INSERT INTO alumnos (matricula, usuario, nombre, apellidos, fechanacimiento, edad) VALUES ('$matricula', 'Alex97', '$nombres', '$apellidos', '$fechaNac', '$edad')";
               
              // $sql = "INSERT INTO alumnos(`matricula`, `usuario`, `nombre`, `apellidos`, `fechanacimiento`, `edad`) VALUES (1160593,'Alex97','Alejandro','Contreras','1997-12-02',22)";
               if(mysqli_query($con, $sql)){
                    echo 'Guardado';
               }else{
                    echo 'ERROR';
                    echo error_reporting();
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