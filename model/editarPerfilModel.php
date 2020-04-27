<?php
     #TRAER DATOS
     $sql = "SELECT * FROM capellanes where usuario = '$nombre' limit 1";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     $matricula = $row['matricula'];
     $nombreCapellan = $row['nombreCapellan'];
     $imagenPath = $row['imagenPath'];
     $descripcion = $row['descripcion'];
     $telefono = $row['telefono'];


     #TRAER FACULTADES
     $sql_facultad = "SELECT idFacultad, nombreFacultad FROM facultad order by nombreFacultad";
     $query_facultad = mysqli_query($con, $sql_facultad);
     while ($results[] = mysqli_fetch_object($query_facultad));
     array_pop($results);

     $error = "";
     $success = '';

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          if(empty(trim($_POST["nombre"])) or empty(trim($_POST["matricula"])) or empty(trim($_POST["bio"])) or empty(trim($_POST["telefono"]))){
               $error = "Por favor, ingresa los datos solicitados";
          }else{
               $matricula = strtoupper(trim($_POST["matricula"]));
               $nombreCompleto = ucwords(trim($_POST["nombre"]));
               $bio = trim($_POST["bio"]);
               $tel = trim($_POST["telefono"]);
               $idFacultad = $_POST["selectFacultad"];

               $matricula = mysqli_real_escape_string($con, $matricula);

               $nombreCompleto = mysqli_real_escape_string($con, $nombreCompleto);

               $bio = mysqli_real_escape_string($con, $bio);
               
               $tel = mysqli_real_escape_string($con, $tel);

               #Verificar que la matricula no exista
               $sql ="SELECT matricula, usuario from capellanes where matricula='$matricula' and not usuario = '$nombre' limit 1";
               $result = mysqli_query($con,$sql);
               $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
               $count = mysqli_num_rows($result);

               if($count != 0){
                    $error = "Ya existe un capellán asociado a esta matrícula";
               }

               if($idFacultad != ''){
                    #Verificar que no exista un capellan para la facultad
                    $sql ="SELECT idFacultad, usuario from capellanes where idFacultad='$idFacultad' and not usuario = '$nombre' limit 1";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $count = mysqli_num_rows($result);

                    if($count != 0){
                         $error = "Ya existe un capellán asociado a esta facultad";
                    }
               }else if($idFacultad == ''){
                    $error = 'Selecciona tu facultad';
               }

               #Mover foto
               if(isset($_FILES['foto'])){
                    $foto = $_FILES['foto'];

                    $temName = $foto['tmp_name'];
                    $nombreFoto = $foto['name'];

                    $local = "../uploadedImages/";
                    $localpath = $local.$nombreFoto;
                    $upload = move_uploaded_file($temName, $localpath);

                    if(!$upload){
                         $error = "¡Oops! Ocurrió un error. Inténtalo de nuevo más tarde.";
                    }

               }else{
                    $error = "¡Oops! Ocurrió un error. Inténtalo de nuevo más tarde.";
               }
          }

          if($error == ""){
               $sql = "UPDATE capellanes set usuario = '$nombre', idFacultad = '$idFacultad', nombreCapellan = '$nombreCompleto', imagenPath = '$localpath', descripcion = '$bio', telefono = '$tel' where matricula = '$matricula'";

               if(mysqli_query($con, $sql)){
                    $success = 'Se actualizaron tus datos';
               }else{
                   $error = "¡Oops! Ocurrió un error. Inténtalo de nuevo más tarde.";
               }
          }
     }
?>