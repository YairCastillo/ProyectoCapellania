<?php

     include('../controller/conexion.php');
     $error = "";

     if(isset($_POST['EcPadres']) && isset($_POST['HijoEmpleado']) && isset($_POST['HijoObrero']) && isset($_POST['Hermanos'])){
          $sql = "";

          $usuario = $_POST['Usuario'];
          $ecPadres = $_POST['EcPadres'];
          $hijoEmpleado = $_POST['HijoEmpleado'];
          $hijoObrero = $_POST['HijoObrero'];
          $hermanos = $_POST['Hermanos'];

          $sql_verificar = "SELECT alumnos.matricula as matricula, datosdemograficos.matricula as damatricula from datosdemograficos
          INNER JOIN alumnos ON alumnos.matricula = datosdemograficos.matricula and alumnos.usuario = '$usuario' limit 1";

          $result = mysqli_query($con,$sql_verificar);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

          $count = mysqli_num_rows($result);

          if($count == 1){
               $matricula = $row['matricula'];

               $sql2 = "SELECT * from datosfamiliares where matricula = '$matricula' limit 1";

               $result2 = mysqli_query($con,$sql2);
               $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

               $count2 = mysqli_num_rows($result2);

               if($count2 == 0){
                    $sql = "INSERT into datosfamiliares values('$matricula', '$ecPadres', '$hijoEmpleado', '$hijoObrero', '$hermanos')";
               }else{
                    $sql = "UPDATE datosfamiliares set edoCivilPadres = '$ecPadres', hijoEmpleadoUM = '$hijoEmpleado', hijoObreroASD= '$hijoObrero', tieneHermanosUM='$hermanos' where matricula = '$matricula'";
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