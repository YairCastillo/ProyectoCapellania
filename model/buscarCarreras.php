<?php
include('../controller/conexion.php');
$output = '';

$sql = "SELECT * from carrera where idFacultad = '".$_POST["idFacultad"]."' order by nombreCarrera";
$result = mysqli_query($con, $sql);

$output = '<option value = "">Selecciona una carrera</option>';

while($row = mysqli_fetch_array($result)){
     $output .= '<option value = "'.$row["idCarrera"].'">'.$row["nombreCarrera"].'</option>';
}

echo $output;
?>