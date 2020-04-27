<?php

     include('../controller/conexion.php');
     $error = "";

     if(isset($_POST['Matricula']) && isset($_POST['Nombre']) && isset($_POST['Apellidos']) && isset($_POST['FechaNac'])){
          $sql = "";

          $usuario = $_POST['Usuario'];
          $matricula = $_POST['Matricula'];
          $nombre = ucwords($_POST['Nombre']);
          $apellidos = ucwords($_POST['Apellidos']);
          $fechaNac = $_POST['FechaNac'];

          $matricula = mysqli_real_escape_string($con, $matricula);
          $nombre = mysqli_real_escape_string($con, $nombre);
          $apellidos = mysqli_real_escape_string($con, $apellidos);
          $fechaNac = mysqli_real_escape_string($con, $fechaNac);

          $sql_verificar = "SELECT * from alumnos where usuario = '$usuario' limit 1";

          $result = mysqli_query($con,$sql_verificar);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

          $count = mysqli_num_rows($result);

          #VERIFICAMOS SI EL USUARIO ESTA ACTUALIZANDO AGREGANDO POR PRIMERA VEZ SUS DATOS
          if($count == 1){
               $matriculaAnterior = $row['matricula'];
               
               #COMPROBAMOS SI LA MATRICULA ES LA MISMA QUE LA QUE ESTABA ALMACENADA
               if($matriculaAnterior != $matricula){
                    $sql_ver_matr = "SELECT * from alumnos where matricula = '$matricula' limit 1";

                    $result2 = mysqli_query($con,$sql_ver_matr);
                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

                    $count2 = mysqli_num_rows($result2);

                    #COMPROBAMOS QUE LA MATRICULA NO ESTE ASIGNADA A OTRO USUARIO
                    if($count2 == 1){
                         $error = 'Error. Matricula ya existente';
                    }else{
                         $sql = "UPDATE alumnos SET matricula = '$matricula', nombre = '$nombre', apellidos = '$apellidos', fechanacimiento = '$fechaNac' where matricula = '$matriculaAnterior'";
                    }
               }else{
                    $sql = "UPDATE alumnos Set nombre = '$nombre', apellidos = '$apellidos', fechanacimiento = '$fechaNac' where matricula = '$matricula'";
               }
          }else{
                    $sql_ver_matr3 = "SELECT * from alumnos where matricula = '$matricula' limit 1";

                    $result3 = mysqli_query($con,$sql_ver_matr3);
                    $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);

                    $count3 = mysqli_num_rows($result3);

                    #COMPROBAMOS QUE LA MATRICULA NO ESTE ASIGNADA A OTRO USUARIO
                    if($count3 == 1){
                         $error = 'Error. Matricula ya existente';
                    }else{
                         $sql = "INSERT into alumnos (matricula, usuario, nombre, apellidos, fechanacimiento) values ('$matricula','$usuario', '$nombre', '$apellidos', '$fechaNac')";
                    }
          }

          if($error == ''){
               if(mysqli_query($con, $sql)){
                    $error = '';
               }else{
                    $error = 'error';
               }
          }
}else{
     $error = 'error';  
}

     echo $error;
?>