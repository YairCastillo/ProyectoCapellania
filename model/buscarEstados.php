<?php
include('../controller/conexion.php');
$output = '';

$sql = "SELECT * from estados where ubicacionpaisid = '".$_POST["idPais"]."' order by estadonombre";
$result = mysqli_query($con, $sql);

$output = '<option value = "">Selecciona un estado</option>';

while($row = mysqli_fetch_array($result)){
     $output .= '<option value = "'.$row["id"].'">'.$row["estadonombre"].'</option>';
}

echo $output;
?>