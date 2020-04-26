<?php
     include("../controller/conexion.php");

     $error ="";

     $matricula ="";
     $nombres = "";
     $apellidos = "";
     $fechaNac = "";

     /* Select de Facultades */
     $output = "";
     $sql_facultad = "SELECT idFacultad, nombreFacultad FROM facultad order by nombreFacultad";
     $result = mysqli_query($con, $sql_facultad);
     $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

     foreach($row as $item){
          $output .= '<option value="'.$item['idFacultad'].'">'.$item['nombreFacultad'].'</option>';
     };


      /* Select de Paises */
      $paises = "";
      $sql_paises = "SELECT * FROM paises order by paisnombre";
      $result1 = mysqli_query($con, $sql_paises);
      $row1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
 
      foreach($row1 as $item){
           $paises .= '<option value="'.$item['id'].'">'.$item['paisnombre'].'</option>';
      };
?>