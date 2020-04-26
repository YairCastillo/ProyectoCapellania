<?php

     include('../controller/conexion.php');
     $error = "";

     if(isset($_POST['Religion']) && isset($_POST['Iglesia']) && isset($_POST['Ae'])){
          $sql = "";

          $usuario = $_POST['Usuario'];
          $religion = $_POST['Religion'];
          $bautizado = $_POST['Bautizado'];
          $fechaBautismo = $_POST['FechaBautismo'];
          $feligresia = $_POST['Feligresia'];
          $iglesia = $_POST['Iglesia'];
          $cultosAsistencia = $_POST['CultosAsistencia'];
          $cultos = $_POST['Cultos'];
          $esAsistencia = $_POST['EsAsistencia'];
          $es = $_POST['Es'];
          $ae = $_POST['Ae'];

          $sql_verificar = "SELECT alumnos.matricula as matricula, datosfamiliares.matricula as dfmatricula from datosfamiliares
          INNER JOIN alumnos ON alumnos.matricula = datosfamiliares.matricula and alumnos.usuario = '$usuario' limit 1";

          $result = mysqli_query($con,$sql_verificar);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

          $count = mysqli_num_rows($result);

          if($count == 1){
               $matricula = $row['matricula'];

               $sql2 = "SELECT * from datosreligiosos where matricula = '$matricula' limit 1";

               $result2 = mysqli_query($con,$sql2);
               $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

               $count2 = mysqli_num_rows($result2);

               if($count2 == 0){
                    if($bautizado == 1){
                         if($iglesia == 'central'){
                              if($cultosAsistencia == 1){
                                   if($esAsistencia == 1){
                                        $sql = "INSERT INTO datosreligiosos (matricula, religion, bautizadoASD, fechaBautismo, feligresiaActual, iglesia, AsistenciaCulto, culto, AsistenciaEscSab, es, ae) values ('$matricula','$religion', $bautizado, '$fechaBautismo', '$feligresia', '$iglesia','$cultosAsistencia', '$cultos', '$esAsistencia','$es', '$ae')";
                                   }else if($esAsistencia == 0){
                                        $sql = "INSERT INTO datosreligiosos (matricula, religion, bautizadoASD, fechaBautismo, feligresiaActual, iglesia, AsistenciaCulto, culto, AsistenciaEscSab,ae) values ('$matricula','$religion', $bautizado, '$fechaBautismo', '$feligresia',  '$iglesia','$cultosAsistencia', '$cultos', '$esAsistencia', '$ae')";
                                   }
                              }else if($cultosAsistencia == 0){
                                   if($esAsistencia == 1){
                                        $sql = "INSERT INTO datosreligiosos (matricula, religion, bautizadoASD, fechaBautismo, feligresiaActual, iglesia, AsistenciaCulto, AsistenciaEscSab, es, ae) values ('$matricula','$religion', $bautizado, '$fechaBautismo', '$feligresia', '$iglesia','$cultosAsistencia', '$esAsistencia', '$es', '$ae')";
                                   }else if($esAsistencia == 0){
                                        $sql = "INSERT INTO datosreligiosos (matricula, religion, bautizadoASD, fechaBautismo, feligresiaActual, iglesia, AsistenciaCulto, AsistenciaEscSab, ae) values ('$matricula','$religion', $bautizado, '$fechaBautismo', '$feligresia', '$iglesia','$cultosAsistencia', '$esAsistencia', '$ae')";
                                   }
                              }
                         }else if($cultosAsistencia != 'central'){
                              $sql = "INSERT INTO datosreligiosos (matricula, religion, bautizadoASD, fechaBautismo, feligresiaActual, iglesia, ae) values ('$matricula', '$religion', $bautizado, '$fechaBautismo', '$feligresia', '$iglesia', '$ae')";
                         }
                    }else if($bautizado == 0){
                         $sql = "INSERT INTO datosreligiosos (matricula, religion, iglesia, ae) values ('$matricula', '$religion', '$iglesia', '$ae')";
                    }
               }else{
                    if($bautizado == 1){
                         if($iglesia == 'central'){
                              if($cultosAsistencia == 1){
                                   if($esAsistencia == 1){
                                        $sql = "UPDATE datosreligiosos set religion = '$religion', bautizadoASD = $bautizado, fechaBautismo = '$fechaBautismo', feligresiaActual = '$feligresia', iglesia = '$iglesia', AsistenciaCulto = '$cultosAsistencia', culto = '$cultos', AsistenciaEscSab = '$esAsistencia', es = '$es', ae = '$ae' where matricula = '$matricula'";

                                   }else if($esAsistencia == 0){
                                        $sql = "UPDATE datosreligiosos set religion = '$religion', bautizadoASD = $bautizado, fechaBautismo = '$fechaBautismo', feligresiaActual = '$feligresia', iglesia = '$iglesia', AsistenciaCulto = '$cultosAsistencia', culto = '$cultos', AsistenciaEscSab = '$esAsistencia', ae = '$ae' where matricula = '$matricula'";
                                   }
                              }else if($cultosAsistencia == 0){
                                   if($esAsistencia == 1){
                                        $sql = "UPDATE datosreligiosos set religion = '$religion', bautizadoASD = $bautizado, fechaBautismo = '$fechaBautismo', feligresiaActual = '$feligresia', iglesia = '$iglesia', AsistenciaCulto = '$cultosAsistencia', AsistenciaEscSab = '$esAsistencia', es = '$es', ae = '$ae' where matricula = '$matricula'";

                                   }else if($esAsistencia == 0){
                                        $sql = "UPDATE datosreligiosos set religion = '$religion', bautizadoASD = $bautizado, fechaBautismo = '$fechaBautismo', feligresiaActual = '$feligresia', iglesia = '$iglesia', AsistenciaCulto = '$cultosAsistencia', AsistenciaEscSab = '$esAsistencia', ae = '$ae' where matricula = '$matricula'";
                                   }
                              }
                         }else if($cultosAsistencia != 'central'){
                              $sql = "UPDATE datosreligiosos set religion = '$religion', bautizadoASD = $bautizado, fechaBautismo = '$fechaBautismo', feligresiaActual = '$feligresia', iglesia = '$iglesia', ae = '$ae' where matricula = '$matricula'";
                         }
                    }else if($bautizado == 0){
                         $sql = "UPDATE datosreligiosos set religion = '$religion', iglesia = '$iglesia', ae = '$ae' where matricula = '$matricula'";
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