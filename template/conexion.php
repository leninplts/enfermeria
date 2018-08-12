<?php
	$bd_host = "localhost"; 
	$bd_usuario = "root"; 
	$bd_password = "paracaida1"; 
	$bd_base = "evaluacionnutricional"; 

	$con = new mysqli($bd_host, $bd_usuario, $bd_password,$bd_base);
	if (!$con) {
		echo "error al conectar";
	}
?>