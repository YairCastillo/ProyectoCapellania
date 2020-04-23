<?php

     $sql_facultad = "SELECT idFacultad, nombreFacultad FROM facultad order by nombreFacultad";
     $query_facultad = mysqli_query($con, $sql_facultad);
     while ($results[] = mysqli_fetch_object($query_facultad));
     array_pop($results);

     $error = "";

     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
               $sql ="SELECT matricula from capellanes where matricula='$matricula' limit 1";
               $result = mysqli_query($con,$sql);
               $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
               $count = mysqli_num_rows($result);

               if($count != 0){
                    $error = "Ya existe un capellán asociado a esta matrícula";
               }

               #Verificar que no exista un capellan para la facultad
               $sql ="SELECT idFacultad from capellanes where idFacultad='$idFacultad' limit 1";
               $result = mysqli_query($con,$sql);
               $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
               $count = mysqli_num_rows($result);

               if($count != 0){
                    $error = "Ya existe un capellán asociado a esta facultad";
               }

               #Mover foto
               if(isset($_FILES['foto'])){
                    $foto = $_FILES['foto'];

                    $temName = $foto['tmp_name'];
                    $nombreFoto = $foto['name'];
                    #$extensionFoto = substr(strrchr($nombreFoto, '.'), 1);

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
               $sql = "INSERT into capellanes (matricula, usuario, idFacultad, nombreCapellan, imagenPath,  descripcion, telefono) values ('$matricula', '$nombre', '$idFacultad', '$nombreCompleto', '$localpath', '$bio', '$tel')";

               if(mysqli_query($con, $sql)){
                    header("location: capellanes");
               }else{
                   $error = "¡Oops! Ocurrió un error. Inténtalo de nuevo más tarde.";
               }
          }
     }
?>