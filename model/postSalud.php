<?php

     include('../controller/conexion.php');
     $error = "";

     if(isset($_POST['ComidasalDia']) && isset($_POST['DiasEjercicioSemana']) && isset($_POST['DiasComidaSemana'])){

          $sql = "";

          $usuario = $_POST['Usuario'];
          $comidasalDia = $_POST['ComidasalDia'];
          $diasComidaSemana = $_POST['DiasComidaSemana'];
          $diasEjercicioSemana = $_POST['DiasEjercicioSemana'];
          $practicaDeporte = $_POST['PracticaDeporte'];
          $deporte = $_POST['Deporte'];
          $alcohol = $_POST['Alcohol'];
          $tabaco = $_POST['Tabaco'];
          $droga = $_POST['Droga'];
          $sustancia = $_POST['Sustancia'];
          $padeceEnfermedad = $_POST['PadeceEnfermedad'];
          $enfermedad = $_POST['Enfermedad'];
          $tratamientos = $_POST['Tratamientos'];

          $sql_verificar = "SELECT alumnos.matricula as matricula, actividadesja.matricula as ajamatricula from actividadesja
          INNER JOIN alumnos ON alumnos.matricula = actividadesja.matricula and alumnos.usuario = '$usuario' limit 1";

          $result = mysqli_query($con,$sql_verificar);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

          $count = mysqli_num_rows($result);

          if($count == 1){
               $matricula = $row['matricula'];

               $sql2 = "SELECT * from datossalud where matricula = '$matricula' limit 1";

               $result2 = mysqli_query($con,$sql2);
               $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

               $count2 = mysqli_num_rows($result2);

               if($count2 == 0){
                    if($practicaDeporte == 1){
                         if($droga == 1){
                              if($padeceEnfermedad == 1){
                                   $sql = "INSERT INTO datossalud values ('$matricula', $comidasalDia, $diasComidaSemana, $diasEjercicioSemana, $practicaDeporte, '$deporte', $alcohol, $tabaco, $droga, '$sustancia', $padeceEnfermedad, '$enfermedad', '$tratamientos')";

                              }else if($padeceEnfermedad == 0){
                                   $sql = "INSERT INTO datossalud values ('$matricula', $comidasalDia, $diasComidaSemana, $diasEjercicioSemana, $practicaDeporte, '$deporte', $alcohol, $tabaco, $droga, '$sustancia', $padeceEnfermedad, null, null)";

                              }
                         }else if($droga == 0){
                              if($padeceEnfermedad == 1){
                                   $sql = "INSERT INTO datossalud values ('$matricula', $comidasalDia, $diasComidaSemana, $diasEjercicioSemana, $practicaDeporte, '$deporte', $alcohol, $tabaco, $droga, null, $padeceEnfermedad, '$enfermedad', '$tratamientos')";

                              }else if($padeceEnfermedad == 0){
                                   $sql = "INSERT INTO datossalud values ('$matricula', $comidasalDia, $diasComidaSemana, $diasEjercicioSemana, $practicaDeporte, '$deporte', $alcohol, $tabaco, $droga, null, $padeceEnfermedad, null, null)";

                              }
                         }
                    }else if($practicaDeporte == 0){
                         if($droga == 1){
                              if($padeceEnfermedad == 1){
                                   $sql = "INSERT INTO datossalud values ('$matricula', $comidasalDia, $diasComidaSemana, $diasEjercicioSemana, $practicaDeporte, null, $alcohol, $tabaco, $droga, '$sustancia', $padeceEnfermedad, '$enfermedad', '$tratamientos')";

                              }else if($padeceEnfermedad == 0){
                                   $sql = "INSERT INTO datossalud values ('$matricula', $comidasalDia, $diasComidaSemana, $diasEjercicioSemana, $practicaDeporte, null, $alcohol, $tabaco, $droga, '$sustancia', $padeceEnfermedad, null, null)";

                              }
                         }else if($droga == 0){
                              if($padeceEnfermedad == 1){
                                   $sql = "INSERT INTO datossalud values ('$matricula', $comidasalDia, $diasComidaSemana, $diasEjercicioSemana, $practicaDeporte, null, $alcohol, $tabaco, $droga, null, $padeceEnfermedad, '$enfermedad', '$tratamientos')";

                              }else if($padeceEnfermedad == 0){
                                   $sql = "INSERT INTO datossalud values ('$matricula', $comidasalDia, $diasComidaSemana, $diasEjercicioSemana, $practicaDeporte, null, $alcohol, $tabaco, $droga, null, $padeceEnfermedad, null, null)";

                              }
                         }
                    }
               }else{
                    if($practicaDeporte == 1){
                         if($droga == 1){
                              if($padeceEnfermedad == 1){
                                   $sql = "UPDATE datossalud SET comidasXDia = $comidasalDia, diasSemanaComio = $diasComidaSemana, ejercicioXSemana = $diasEjercicioSemana, practicaDeporte = $practicaDeporte, cualDeporte = '$deporte', consumeAlcohol = $alcohol, consumeTabaco = $tabaco,consumeDrogas = $droga, sustanciaActiva = '$sustancia', padeceEnfermedad = $padeceEnfermedad, nombreEnfermedad = '$enfermedad', tratamiento = '$tratamientos' where matricula = '$matricula'";

                              }else if($padeceEnfermedad == 0){
                                   $sql = "UPDATE datossalud SET comidasXDia = $comidasalDia, diasSemanaComio = $diasComidaSemana, ejercicioXSemana = $diasEjercicioSemana, practicaDeporte = $practicaDeporte, cualDeporte = '$deporte', consumeAlcohol = $alcohol, consumeTabaco = $tabaco,consumeDrogas = $droga, sustanciaActiva = '$sustancia', padeceEnfermedad = $padeceEnfermedad, nombreEnfermedad = null, tratamiento = null where matricula = '$matricula'";

                              }
                         }else if($droga == 0){
                              if($padeceEnfermedad == 1){
                                   $sql = "UPDATE datossalud SET comidasXDia = $comidasalDia, diasSemanaComio = $diasComidaSemana, ejercicioXSemana = $diasEjercicioSemana, practicaDeporte = $practicaDeporte, cualDeporte = '$deporte', consumeAlcohol = $alcohol, consumeTabaco = $tabaco,consumeDrogas = $droga, sustanciaActiva = null, padeceEnfermedad = $padeceEnfermedad, nombreEnfermedad = '$enfermedad', tratamiento = '$tratamientos' where matricula = '$matricula'";

                              }else if($padeceEnfermedad == 0){
                                   $sql = "UPDATE datossalud SET comidasXDia = $comidasalDia, diasSemanaComio = $diasComidaSemana, ejercicioXSemana = $diasEjercicioSemana, practicaDeporte = $practicaDeporte, cualDeporte = '$deporte', consumeAlcohol = $alcohol, consumeTabaco = $tabaco,consumeDrogas = $droga, sustanciaActiva = null, padeceEnfermedad = $padeceEnfermedad, nombreEnfermedad = null, tratamiento = null where matricula = '$matricula'";

                              }
                         }
                    }else if($practicaDeporte == 0){
                         if($droga == 1){
                              if($padeceEnfermedad == 1){
                                   $sql = "UPDATE datossalud SET comidasXDia = $comidasalDia, diasSemanaComio = $diasComidaSemana, ejercicioXSemana = $diasEjercicioSemana, practicaDeporte = $practicaDeporte, cualDeporte = null, consumeAlcohol = $alcohol, consumeTabaco = $tabaco,consumeDrogas = $droga, sustanciaActiva = '$sustancia', padeceEnfermedad = $padeceEnfermedad, nombreEnfermedad = '$enfermedad', tratamiento = '$tratamientos' where matricula = '$matricula'";

                              }else if($padeceEnfermedad == 0){
                                   $sql = "UPDATE datossalud SET comidasXDia = $comidasalDia, diasSemanaComio = $diasComidaSemana, ejercicioXSemana = $diasEjercicioSemana, practicaDeporte = $practicaDeporte, cualDeporte = null, consumeAlcohol = $alcohol, consumeTabaco = $tabaco,consumeDrogas = $droga, sustanciaActiva = '$sustancia', padeceEnfermedad = $padeceEnfermedad, nombreEnfermedad = null, tratamiento = null where matricula = '$matricula'";

                              }
                         }else if($droga == 0){
                              if($padeceEnfermedad == 1){
                                   $sql = "UPDATE datossalud SET comidasXDia = $comidasalDia, diasSemanaComio = $diasComidaSemana, ejercicioXSemana = $diasEjercicioSemana, practicaDeporte = $practicaDeporte, cualDeporte = null, consumeAlcohol = $alcohol, consumeTabaco = $tabaco,consumeDrogas = $droga, sustanciaActiva = null, padeceEnfermedad = $padeceEnfermedad, nombreEnfermedad = '$enfermedad', tratamiento = '$tratamientos' where matricula = '$matricula'";

                              }else if($padeceEnfermedad == 0){
                                   $sql = "UPDATE datossalud SET comidasXDia = $comidasalDia, diasSemanaComio = $diasComidaSemana, ejercicioXSemana = $diasEjercicioSemana, practicaDeporte = $practicaDeporte, cualDeporte = null, consumeAlcohol = $alcohol, consumeTabaco = $tabaco,consumeDrogas = $droga, sustanciaActiva = null, padeceEnfermedad = $padeceEnfermedad, nombreEnfermedad = null, tratamiento = null where matricula = '$matricula'";

                              }
                         }
                    }
               }
          }else{
               $error = "Error. Contestar seccion anterior.";
          }

          if($error == ''){
               if(mysqli_query($con, $sql)){
                    $error = '';
               }else{
                    $error = $sql;
               }
          }
}else{
     $error = 'error';  
}
     echo $error;
?>