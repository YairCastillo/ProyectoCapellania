<?php

     include('../controller/conexion.php');
     $error = "";

     if(isset($_POST['Facultad']) && isset($_POST['Semestre']) && isset($_POST['Situacion'])){
          $sql = "";

          $usuario = $_POST['Usuario'];
          $idFacultad = $_POST['Facultad'];
          $idCarrera = $_POST['Carrera'];
          $semestre = $_POST['Semestre'];
          $situacion = $_POST['Situacion'];

          $sql_verificar = "SELECT * from alumnos where usuario = '$usuario' limit 1";

          $result = mysqli_query($con,$sql_verificar);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

          $count = mysqli_num_rows($result);

          if($count == 1){
               $matricula = $row['matricula'];

               $sql2 = "SELECT * from datosacademicos where matricula = '$matricula' limit 1";

               $result2 = mysqli_query($con,$sql2);
               $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

               $count2 = mysqli_num_rows($result2);

               if($count2 == 0){
                    if($idCarrera == ''){
                         $sql = "INSERT INTO datosacademicos (matricula, idFacultad, semestre, situacionAcademica) values ('$matricula', '$idFacultad', '$semestre', '$situacion')";
                    }else{
                         $sql = "INSERT INTO datosacademicos values ('$matricula', '$idFacultad', '$idCarrera', '$semestre', '$situacion')";
                    }
               }else{
                    if($idCarrera == ''){
                         $sql = "UPDATE datosacademicos set idFacultad = '$idFacultad', idCarrera = null, semestre = '$semestre', situacionAcademica = '$situacion' where matricula ='$matricula'";
                    }else{
                         $sql = "UPDATE datosacademicos set idFacultad = '$idFacultad', idCarrera = '$idCarrera', semestre = '$semestre', situacionAcademica = '$situacion' where matricula ='$matricula'";
                    }
               }
          }else{
               $error = "Error. Contestar seccion anterior.";
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