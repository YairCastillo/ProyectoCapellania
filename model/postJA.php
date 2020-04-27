<?php

     include('../controller/conexion.php');
     $error = "";

     if(isset($_POST['PerteneceClub']) && isset($_POST['PlanMisionero'])){

          $sql = "";

          $usuario = $_POST['Usuario'];
          $perteneceClub = $_POST['PerteneceClub'];
          $tipoClub = $_POST['TipoClub'];
          $lider = $_POST['Lider'];
          $aspirante = $_POST['Aspirante'];
          $planMisionero = $_POST['PlanMisionero'];
          $lugarPlan = $_POST['LugarPlan'];

          $sql_verificar = "SELECT alumnos.matricula as matricula, actividadesdevocionales.matricula as admatricula from actividadesdevocionales
          INNER JOIN alumnos ON alumnos.matricula = actividadesdevocionales.matricula and alumnos.usuario = '$usuario' limit 1";

          $result = mysqli_query($con,$sql_verificar);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

          $count = mysqli_num_rows($result);

          if($count == 1){
               $matricula = $row['matricula'];

               $sql2 = "SELECT * from actividadesja where matricula = '$matricula' limit 1";

               $result2 = mysqli_query($con,$sql2);
               $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

               $count2 = mysqli_num_rows($result2);

               if($count2 == 0){
                    if($perteneceClub == 1){
                         if($planMisionero == 1){
                              $sql = "INSERT INTO actividadesja values ('$matricula', $perteneceClub, '$tipoClub', $lider, $aspirante, $planMisionero, '$lugarPlan')";
                         }else if($planMisionero == 0){
                              $sql = "INSERT INTO actividadesja values ('$matricula', $perteneceClub, '$tipoClub', $lider, $aspirante, $planMisionero, null)";
                         }
                    }else if($perteneceClub == 0){
                         if($planMisionero == 1){
                              $sql = "INSERT INTO actividadesja values ('$matricula', $perteneceClub, null, null, null, $planMisionero, '$lugarPlan')";
                         }else if($planMisionero == 0){
                              $sql = "INSERT INTO actividadesja values ('$matricula', $perteneceClub, null, null, null, $planMisionero, null)";
                         }
                    }
               }else{
                    if($perteneceClub == 1){
                         if($planMisionero == 1){
                              $sql = "UPDATE actividadesja set perteneceClubJA = $perteneceClub, clubJA = '$tipoClub', esLider = $lider, esAspirante = $aspirante, participariasPlanMisionero = $planMisionero, dondeParticiparias = '$lugarPlan' where matricula = '$matricula'";

                         }else if($planMisionero == 0){
                              $sql = "UPDATE actividadesja set perteneceClubJA = $perteneceClub, clubJA = '$tipoClub', esLider = $lider, esAspirante = $aspirante, participariasPlanMisionero = $planMisionero, dondeParticiparias = null where matricula = '$matricula'";
                         }
                    }else if($perteneceClub == 0){
                         if($planMisionero == 1){
                              $sql = "UPDATE actividadesja set perteneceClubJA = $perteneceClub, clubJA = null, esLider = null, esAspirante = null, participariasPlanMisionero = $planMisionero, dondeParticiparias = '$lugarPlan' where matricula = '$matricula'";

                         }else if($planMisionero == 0){
                              $sql = "UPDATE actividadesja set perteneceClubJA = $perteneceClub, clubJA = null, esLider = null, esAspirante = null, participariasPlanMisionero = $planMisionero, dondeParticiparias = null where matricula = '$matricula'";

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