<?php
     #NOMBRE COMPLETO Y DE CUENTA, DESCRIPCION, TELEFONO
     $sql = "SELECT nombreCapellan, idFacultad, imagenPath, descripcion, telefono from capellanes where usuario = '$nombre'";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     $nombreCompleto = strtoupper($row['nombreCapellan']);
     $nombreArr = explode(' ',trim($nombreCompleto));
     $nombreCuenta = $nombreArr[0];

     $error = '';
     $success = '';
     $errorEliminar = '';

     if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnNewPass'])){
          if(empty(trim($_POST["conActual"])) || empty(trim($_POST["conNueva"])) || empty(trim($_POST["confNueva"]))){
               $error = "Por favor, completa todos los campos";
          }else{
               $password = trim($_POST["conActual"]);
               $new_password = trim($_POST["conNueva"]);
               $confirm_password = trim($_POST["confNueva"]);

               $sql = "SELECT password FROM usuarios WHERE nombre = '$nombre' limit 1";
               $result = mysqli_query($con,$sql);
               $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

               $hashed_password = $row['password'];

               if(password_verify($password, $hashed_password)) {
                    if($new_password != $confirm_password){
                         $error = "Las contraseñas no coinciden"; //Verificar que las contraseñas coincidan
                       }else if(strlen($new_password) < 6){
                         $error = "La contraseña debe contener al menos 6 caracteres";
                       }else{
                 
                         $hashed_password = password_hash($new_password, PASSWORD_BCRYPT, ['cost'=>4]);
                 
                 
                         $sql = "UPDATE usuarios SET password = '$hashed_password' where nombre = '$nombre'";
                 
                         if(mysqli_query($con, $sql)){
                              $error = '';
                              $success = 'Se actualizó tu contraseña';
                         }else{
                           $error = "¡Oops! Ocurrió un error. Inténtalo de nuevo más tarde.";
                         }
                       }

               }else{
                    $error = 'La contraseña introducida es incorrecta';
               }
          }


     }else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['borrarCuenta'])){
          if(empty(trim($_POST["pass"]))){
               $errorEliminar = "Introduce tu contraseña";
          }else{
               $password = trim($_POST["pass"]);

               $sql = "SELECT password FROM usuarios WHERE nombre = '$nombre' limit 1";
               $result = mysqli_query($con,$sql);
               $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

               $hashed_password = $row['password'];

               if(password_verify($password, $hashed_password)) {
                    $sql = "DELETE FROM usuarios WHERE nombre = '$nombre'";
                    if(mysqli_query($con, $sql)){
                         session_destroy();
                         header('location:login');
                    }else{
                         $errorEliminar = 'Ocurrió un error. Inténtalo de nuevo más tarde.';
                    }

               }else{
                    $errorEliminar = 'La contraseña introducida es incorrecta';
               }
          }
     }
?>