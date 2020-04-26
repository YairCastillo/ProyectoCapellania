<?php
	$servidor = 'localhost';
	$usuario = 'root';
	$password = '';
	$bd = 'proyectocapellania';
	$con = mysqli_connect($servidor, $usuario, $password, $bd)
	or die('Error de conexión al servidor. Revise los parámetros de la conexión.');

	mysqli_set_charset($con, 'utf8');
	return $con;
?>