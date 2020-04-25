<?php
	$servidor = 'localhost';
	$usuario = 'root';
	$password = '123456789';
	$bd = 'proyectocapellania';
	$con = mysqli_connect($servidor, $usuario, $password, $bd)
	or die('Error de conexión al servidor. Revise los parámetros de la conexión.');

	mysqli_set_charset($con, 'utf8');
	return $con;
?>