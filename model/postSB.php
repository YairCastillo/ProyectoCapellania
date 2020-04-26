<?php

     include('../controller/conexion.php');
     $error = "";

     if(isset($_POST['Becado']) && isset($_POST['Colportado']) && isset($_POST['ColportadoInter'])){

          $sql = "";

          $usuario = $_POST['Usuario'];
          $becado = $_POST['Becado'];
          $tipoBeca = $_POST['TipoBeca'];
          $departamento = $_POST['Departamento'];
          $horasTrabajo = $_POST['HorasTrabajo'];
          $colportado = $_POST['Colportado'];
          $colportadoInter = $_POST['ColportadoInter'];
          $veranos = $_POST['Veranos'];
          $inviernos = $_POST['Inviernos'];

          $sql_verificar = "SELECT alumnos.matricula as matricula, datosreligiosos.matricula as drmatricula from datosreligiosos
          INNER JOIN alumnos ON alumnos.matricula = datosreligiosos.matricula and alumnos.usuario = '$usuario' limit 1";

          $result = mysqli_query($con,$sql_verificar);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

          $count = mysqli_num_rows($result);

          if($count == 1){
               $matricula = $row['matricula'];

               $sql2 = "SELECT * from serviciobecario where matricula = '$matricula' limit 1";

               $result2 = mysqli_query($con,$sql2);
               $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

               $count2 = mysqli_num_rows($result2);

               if($count2 == 0){
                    if($becado == 1){
                         if($colportado == 1){
                              $sql = "INSERT INTO serviciobecario values ('$matricula', $becado, '$tipoBeca', '$departamento', $horasTrabajo, $colportado, $colportadoInter, $veranos, $inviernos)";
                         }else if($colportado == 0){
                              $sql = "INSERT INTO serviciobecario (matricula, esBecado, tipoBeca, departamento,horasTrabajoDiario, haColportado, colportajeInter) values ('$matricula', $becado, '$tipoBeca', '$departamento', $horasTrabajo, $colportado, $colportadoInter)";
                         }
                    }else if($becado == 0){
                         if($colportado == 1){
                              $sql = "INSERT INTO serviciobecario (matricula, esBecado,haColportado, colportajeInter, cuantosVeranos, cuantosInviernos) values ('$matricula', $becado, $colportado, $colportadoInter, $veranos, $inviernos)";
                         }else if($colportado == 0){
                              $sql = "INSERT INTO serviciobecario (matricula, esBecado, haColportado, colportajeInter) values ('$matricula', $becado, $colportado, $colportadoInter)";
                         }
                    }
               }else{
                    if($becado == 1){
                         if($colportado == 1){
                              $sql = "UPDATE serviciobecario set esBecado = $becado, tipoBeca = '$tipoBeca', departamento = '$departamento', horasTrabajoDiario = $horasTrabajo, haColportado = $colportado, colportajeInter = $colportadoInter, cuantosVeranos = $veranos, cuantosInviernos = $inviernos where matricula ='$matricula'";
                         }else if($colportado == 0){
                              $sql = "UPDATE serviciobecario set esBecado = $becado, tipoBeca = '$tipoBeca', departamento = '$departamento', horasTrabajoDiario = $horasTrabajo, haColportado = $colportado where matricula ='$matricula'";
                         }
                    }else if($becado == 0){
                         if($colportado == 1){
                              $sql = "UPDATE serviciobecario set esBecado = $becado, haColportado = $colportado, colportajeInter = $colportadoInter, cuantosVeranos = $veranos, cuantosInviernos = $inviernos where matricula ='$matricula'";
                         }else if($colportado == 0){
                              $sql = "UPDATE serviciobecario set esBecado = $becado, haColportado = $colportado, colportajeInter = $colportadoInter where matricula ='$matricula'";
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