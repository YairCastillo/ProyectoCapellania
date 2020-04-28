<?php

     include('../controller/conexion.php');
     $error = "";

     if(isset($_POST['EdoCivil']) && isset($_POST['Pais']) && isset($_POST['Estado']) && isset($_POST['Sexo']) && isset($_POST['PrefSexual']) && isset($_POST['Residencia'])){
          $sql = "";

          $usuario = $_POST['Usuario'];
          $edoCivil = $_POST['EdoCivil'];
          $novio = $_POST['Novio'];
          $amigo = $_POST['Amigo'];
          $pais = $_POST['Pais'];
          $estado = $_POST['Estado'];
          $municipio = $_POST['Municipio'];
          $sexo = $_POST['Sexo'];
          $prefSexual = $_POST['PrefSexual'];
          $residencia = $_POST['Residencia'];
          $dormitorio = $_POST['Dormitorio'];
          $direccion = $_POST['Direccion'];

          $sql_verificar = "SELECT alumnos.matricula as matricula, datosacademicos.matricula as damatricula from datosacademicos
          INNER JOIN alumnos ON alumnos.matricula = datosacademicos.matricula and alumnos.usuario = '$usuario' limit 1";

          $result = mysqli_query($con,$sql_verificar);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

          $count = mysqli_num_rows($result);

          if($count == 1){
               $matricula = $row['matricula'];

               $sql2 = "SELECT * from datosdemograficos where matricula = '$matricula' limit 1";

               $result2 = mysqli_query($con,$sql2);
               $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

               $count2 = mysqli_num_rows($result2);

               if($count2 == 0){
                    if($edoCivil == 'Soltero'){
                         if($pais == 42){
                              if($residencia == 'Interno'){
                                   $sql = "INSERT INTO datosdemograficos (matricula, estadoCivil, tieneNovioa, tieneAmigoEspecial, pais, estado, municipio, sexo, preferenciaSexual,residencia, dormitorio) values ('$matricula', '$edoCivil', $novio, $amigo, $pais, $estado, $municipio, '$sexo', '$prefSexual', '$residencia', '$dormitorio')";
                              }else if($residencia == 'Externo'){
                                   $sql = "INSERT INTO datosdemograficos (matricula, estadoCivil, tieneNovioa, tieneAmigoEspecial, pais,estado, municipio, sexo, preferenciaSexual,residencia, direccion) values ('$matricula', '$edoCivil', $novio, $amigo, $pais, $estado, $municipio, '$sexo', '$prefSexual', '$residencia', '$direccion')";
                              }
                         }else if($pais != 42){
                              if($residencia == 'Interno'){
                                   $sql = "INSERT INTO datosdemograficos (matricula, estadoCivil, tieneNovioa, tieneAmigoEspecial, pais, estado, sexo, preferenciaSexual,residencia, dormitorio) values ('$matricula', '$edoCivil', $novio, $amigo, $pais, $estado, '$sexo', '$prefSexual', '$residencia', '$dormitorio')";
                              }else if($residencia == 'Externo'){
                                   $sql = "INSERT INTO datosdemograficos (matricula, estadoCivil, tieneNovioa, tieneAmigoEspecial, pais,estado, sexo, preferenciaSexual,residencia, direccion) values ('$matricula', '$edoCivil', $novio, $amigo, $pais, $estado, '$sexo', '$prefSexual', '$residencia', '$direccion')";
                              }
                         }
                    }else if($edoCivil != 'Soltero'){
                         if($pais == 42){
                              if($residencia == 'Interno'){
                                   $sql = "INSERT INTO datosdemograficos (matricula, estadoCivil, pais, estado, municipio, sexo, preferenciaSexual,residencia, dormitorio) values ('$matricula', '$edoCivil', $pais, $estado, $municipio, '$sexo', '$prefSexual', '$residencia', '$dormitorio')";
                              }else if($residencia == 'Externo'){
                                   $sql = "INSERT INTO datosdemograficos (matricula, estadoCivil, pais,estado, municipio, sexo, preferenciaSexual,residencia, direccion) values ('$matricula', '$edoCivil', $pais, $estado, $municipio, '$sexo', '$prefSexual', '$residencia', '$direccion')";
                              }
                         }else if($pais != 42){
                              if($residencia == 'Interno'){
                                   $sql = "INSERT INTO datosdemograficos (matricula, estadoCivil, pais, estado, sexo, preferenciaSexual,residencia, dormitorio) values ('$matricula', '$edoCivil', $pais, $estado, '$sexo', '$prefSexual', '$residencia', '$dormitorio')";
                              }else if($residencia == 'Externo'){
                                   $sql = "INSERT INTO datosdemograficos (matricula, estadoCivil, pais,estado, sexo, preferenciaSexual,residencia, direccion) values ('$matricula', '$edoCivil', $pais, $estado, '$sexo', '$prefSexual', '$residencia', '$direccion')";
                              }
                         }
                    }
               }else{
                    if($edoCivil == 'Soltero'){
                              if($pais == 42){
                                   if($residencia == 'Interno'){
                                        $sql = "UPDATE datosdemograficos set estadoCivil = '$edoCivil', tieneNovioa = $novio, tieneAmigoEspecial = $amigo, pais = $pais, estado = $estado, municipio = $municipio, sexo = '$sexo', preferenciaSexual = '$prefSexual', residencia ='$residencia', dormitorio = '$dormitorio', direccion = null where matricula = '$matricula'";

                                   }else if($residencia == 'Externo'){
                                        $sql = "UPDATE datosdemograficos set estadoCivil = '$edoCivil', tieneNovioa = $novio, tieneAmigoEspecial = $amigo, pais = $pais, estado = $estado, municipio = $municipio, sexo = '$sexo', preferenciaSexual = '$prefSexual', residencia ='$residencia', direccion = '$direccion' , dormitorio = null where matricula = '$matricula'";
                                   }
                              }else if($pais != 42){
                                   if($residencia == 'Interno'){
                                        $sql = "UPDATE datosdemograficos set estadoCivil = '$edoCivil', tieneNovioa = $novio, tieneAmigoEspecial = $amigo, pais = $pais, estado = $estado, municipio = null, sexo = '$sexo', preferenciaSexual = '$prefSexual', residencia ='$residencia', dormitorio = '$dormitorio', direccion = null where matricula = '$matricula'";

                                   }else if($residencia == 'Externo'){
                                        $sql = "UPDATE datosdemograficos set estadoCivil = '$edoCivil', tieneNovioa = $novio, tieneAmigoEspecial = $amigo, pais = $pais, estado = $estado, municipio = null, sexo = '$sexo', preferenciaSexual = '$prefSexual', residencia ='$residencia', dormitorio = null, direccion = '$direccion' where matricula = '$matricula'";
                                   }
                              }
                         }else if($edoCivil != 'Soltero'){
                              if($pais == 42){
                                   if($residencia == 'Interno'){
                                        $sql = "UPDATE datosdemograficos set estadoCivil = '$edoCivil', tieneNovioa = null, tieneAmigoEspecial = null, pais = $pais, estado = $estado, municipio = '$municipio', sexo = '$sexo', preferenciaSexual = '$prefSexual', residencia ='$residencia', dormitorio = '$dormitorio', direccion = null where matricula = '$matricula'";

                                   }else if($residencia == 'Externo'){
                                        $sql = "UPDATE datosdemograficos set estadoCivil = '$edoCivil', tieneNovioa = null, tieneAmigoEspecial = null, pais = $pais, estado = $estado, municipio = '$municipio', sexo = '$sexo', preferenciaSexual = '$prefSexual', residencia ='$residencia', dormitorio = null, direccion = '$direccion' where matricula = '$matricula'";
                                   }
                              }else if($pais != 42){
                                   if($residencia == 'Interno'){
                                        $sql = "UPDATE datosdemograficos set estadoCivil = '$edoCivil', tieneNovioa = null, tieneAmigoEspecial = null, pais = $pais, estado = $estado, municipio = null, sexo = '$sexo', preferenciaSexual = '$prefSexual', residencia ='$residencia', dormitorio = '$dormitorio', direccion = null where matricula = '$matricula'";
                                   }else if($residencia == 'Externo'){
                                        $sql = "UPDATE datosdemograficos set estadoCivil = '$edoCivil', tieneNovioa = null, tieneAmigoEspecial = null, pais = $pais, estado = $estado, municipio = null, sexo = '$sexo', preferenciaSexual = '$prefSexual', residencia ='$residencia', dormitorio = null, direccion = '$direccion' where matricula = '$matricula'";
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
                    $error = 'error1';
               }
          }
}else{
     $error = 'error2';  
}
     echo $error;
?>