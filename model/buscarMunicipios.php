<?php
include('../controller/conexion.php');
$output = '';

$sql = "SELECT * from municipios where idEstado = '".$_POST["idEstado"]."' order by Municipio";
$result = mysqli_query($con, $sql);

$output = '<option value = "">Selecciona un municipio</option>';

while($row = mysqli_fetch_array($result)){
     $output .= '<option value = "'.$row["idMunicipio"].'">'.$row["Municipio"].'</option>';
}

echo $output;
?>