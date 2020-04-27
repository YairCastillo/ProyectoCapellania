<?php

     include('../controller/conexion.php');
     $error = "";

     if(isset($_POST['Biblia']) && isset($_POST['Lecciones']) && isset($_POST['Planestudio']) && isset($_POST['Tema']) && isset($_POST['EstudiarMas'])){

          $sql = "";

          $usuario = $_POST['Usuario'];
          $biblia = $_POST['Biblia'];
          $lecciones = $_POST['Lecciones'];
          $planestudio = $_POST['Planestudio'];
          $formatoBiblia = $_POST['FormatoBiblia'];
          $formatoEs = $_POST['FormatoEs'];
          $diasLecturaBiblia = $_POST['DiasLecturaBiblia'];
          $tema = $_POST['Tema'];
          $estudiarMas = $_POST['EstudiarMas'];

          $sql_verificar = "SELECT alumnos.matricula as matricula, serviciobecario.matricula as sbmatricula from serviciobecario
          INNER JOIN alumnos ON alumnos.matricula = serviciobecario.matricula and alumnos.usuario = '$usuario' limit 1";

          $result = mysqli_query($con,$sql_verificar);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

          $count = mysqli_num_rows($result);

          if($count == 1){
               $matricula = $row['matricula'];

               $sql2 = "SELECT * from actividadesdevocionales where matricula = '$matricula' limit 1";

               $result2 = mysqli_query($con,$sql2);
               $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

               $count2 = mysqli_num_rows($result2);

               if($count2 == 0){
                    if($biblia == 1){
                         if($lecciones == 1){
                              $sql = "INSERT INTO actividadesdevocionales values ('$matricula', $biblia, $lecciones, $planestudio, '$formatoBiblia', '$formatoEs', $diasLecturaBiblia, '$tema', $estudiarMas)";
                         }else if($lecciones == 0){
                              $sql = "INSERT INTO actividadesdevocionales (matricula, tieneBiblia, tieneEscSabatica, tienePlanEstudio, formatoBiblia, formatoEscSabatica, frecLecturaBiblicaSemanal, tema, estudiarMas) values ('$matricula', $biblia, $lecciones, $planestudio, '$formatoBiblia', null, $diasLecturaBiblia, '$tema', $estudiarMas)";
                         }
                    }else if($biblia == 0){
                         if($lecciones == 1){
                              $sql = "INSERT INTO actividadesdevocionales (matricula, tieneBiblia, tieneEscSabatica, tienePlanEstudio, formatoEscSabatica, tema, estudiarMas) values ('$matricula', $biblia, $lecciones, $planestudio, '$formatoEs', '$tema', $estudiarMas)";
                         }else if($lecciones == 0){
                              $sql = "INSERT INTO actividadesdevocionales (matricula, tieneBiblia, tieneEscSabatica, formatoBiblia, formatoEscSabatica, tema, estudiarMas) values ('$matricula', $biblia, $lecciones, null, null, '$tema', $estudiarMas)";
                         }
                    }
               }else{
                    if($biblia == 1){
                         if($lecciones == 1){
                              $sql = "UPDATE actividadesdevocionales set tieneBiblia = $biblia, tieneEscSabatica = $lecciones, tienePlanEstudio = $planestudio, formatoBiblia = '$formatoBiblia', formatoEscSabatica = '$formatoEs', frecLecturaBiblicaSemanal = $diasLecturaBiblia, tema = '$tema', estudiarMas = $estudiarMas where matricula = '$matricula'";

                         }else if($lecciones == 0){
                              $sql = "UPDATE actividadesdevocionales set tieneBiblia = $biblia, tieneEscSabatica = $lecciones, tienePlanEstudio = $planestudio, formatoBiblia = '$formatoBiblia', formatoEscSabatica = null,frecLecturaBiblicaSemanal = $diasLecturaBiblia, tema = '$tema', estudiarMas = $estudiarMas where matricula = '$matricula'";
                         }
                    }else if($biblia == 0){
                         if($lecciones == 1){
                              $sql = "UPDATE actividadesdevocionales set tieneBiblia = $biblia, tieneEscSabatica = $lecciones, tienePlanEstudio = $planestudio, formatoBiblia = null,formatoEscSabatica = '$formatoEs', tema = '$tema', estudiarMas = $estudiarMas where matricula = '$matricula'";
                         }else if($lecciones == 0){
                              $sql = "UPDATE actividadesdevocionales set tieneBiblia = $biblia, tieneEscSabatica = $lecciones, formatoBiblia = null, formatoEscSabatica = null, tema = '$tema', estudiarMas = $estudiarMas where matricula = '$matricula'";
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
                    $error = 'error';
               }
          }
}else{
     $error = 'error';  
}
     echo $error;
?>