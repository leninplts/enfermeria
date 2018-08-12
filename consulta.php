<?php
 
//Configuracion de la conexion a base de datos
  $bd_host = "localhost"; 
  $bd_usuario = "root"; 
  $bd_password = "paracaida1"; 
  $bd_base = "evaluacionnutricional"; 
 
$con = mysqli_connect($bd_host, $bd_usuario, $bd_password,$bd_base);

//consulta todos los registros
$sql="SELECT * FROM fichanutricional";
$res=$con->query($sql) or die('Error. '.mysql_error());

?>
<table style="color:#000099;width:400px;">
	<tr style="background:#9BB;">
		<td>DNI</td>
		<td>Nombre</td>
    <td>Genero</td>
    <td>Edad</td>
    <td>Peso (kg.)</td>
    <td>Talla (cm.)</td>
    <td>Perimetro Abdominal (cm.)</td>
    <td>Diagnostico Nutricional</td>
    <td>Tratamiento Nutricional</td>
		<td>Observaciones</td>
	</tr>
<?php
  while($row = mysqli_fetch_array($res)){
?>
  <tr>
    <td><?php echo $row['Dni']; ?></td>
    <td><?php echo $row['Nombres']; ?></td>
    <td><?php echo $row['Sexo_id']; ?></td>
    <td><?php echo $row['Edad']; ?></td>
    <td><?php echo $row['Peso']; ?></td>
    <td><?php echo $row['Talla']; ?></td>
    <td><?php echo $row['PerimetroAbdominal']; ?></td>
    <td><?php echo $row['DxNutricional']; ?></td>
    <td><?php echo $row['TratamientoNutricional']; ?></td>
  	<td><?php echo $row['Observaciones']; ?></td>
  </tr>
<?php
  }
?>
</table>