<?php
	require 'template/conexion.php';
	echo $dni=$_POST['dni'];
	echo $nombre=$_POST['nombre'];
	echo $genero=$_POST['genero'];
	echo $edad=$_POST['edad'];
	echo $peso=$_POST['peso'];
	echo $talla=$_POST['talla'];
	echo $perimetro=$_POST['perimetro'];
	echo $diagnostico=$_POST['diagnostico'];
	echo $tratamiento=$_POST['tratamiento'];
	echo $observacion=$_POST['observacion'];

	$sql = "call insertar('$dni','$nombre','$genero','$edad','$peso','$talla','$perimetro','$diagnostico','$tratamiento','$observacion')";

	$con->query($sql);
	//include('consulta.php');
?>