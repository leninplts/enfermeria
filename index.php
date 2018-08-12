<?php
require 'template/conexion.php';
$sql = "select Dni,Nombres,Edad from fichanutricional order by idEvaluacionNutricional desc";
$res = $con->query($sql);
if (isset($_GET['opcion'])) {
	$opcion = $_GET['opcion'];
	$sql1 = "select Dni,Nombres,Edad,Peso,Talla,PerimetroAbdominal from fichanutricional where Dni like '$opcion'";
	$result = $con->query($sql1);
	$row1;
	while ($row = $result->fetch_assoc()) {
		$row1 = $row;
	}
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- BOOTSTRAP LIBRARY -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- RUBIK FONT FAMILY -->
    <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
    <!-- <link href='css/font-rubik.css' rel='stylesheet'> -->
    <!-- <script src="js/jquery.min.js"></script> -->
    <script>
    	function buscar(){
	    	var opcion = document.getElementById("names").value;
	    	window.location.href='http://localhost:8080/projects/enfermeria/index.php?opcion='+opcion;
    		
    	}
    </script>
</head>
<body>

	<div class="container">
	  	<div class="row" style="border: 2px solid red;font-family: Rubik;">
	    <div class="col">
	    	<h4><strong>FICHA DE EVALUACIÓN NUTRICIONAL</strong></h4>
    		<form name="nueva_evaluacion">
	      		<div class="form-group">
					<label><strong>Numero de DNI</strong></label>
					<input type="text" name="dni" id="dni" class="form-control" placeholder="70125188">
					<small class="form-text text-danger">Tenga cuidado al completar el No DNI</small>
				</div>

				<div class="form-group">
					<label><strong>Nombres y apellidos</strong></label>
					<input type="text" name="nombre" class="form-control" placeholder="Roberto ccallata medrano">
				</div>

				<label class="form-check-label"><strong>Genero</strong></label>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="genero" checked value="1">
					<label class="form-check-label">
					Masculino
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="genero" value="2">
					<label class="form-check-label">
					Femenino
					</label>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label><strong>Edad</strong></label>
						<input type="number" name="edad" class="form-control" placeholder="35">
					</div>

					<div class="form-group col-md-6">
						<label><strong>Peso (kg.)</strong></label>
						<input type="text" name="peso" class="form-control" placeholder="59">
					</div>

					<div class="form-group col-md-6">
						<label><strong>Talla (cm.)</strong></label>
						<input type="text" name="talla" class="form-control" placeholder="160">
					</div>

					<div class="form-group col-md-6">
						<label><strong>Perimetro Abdominal(cm.)</strong></label>
						<input type="text" name="perimetro" class="form-control" placeholder="70">
					</div>
				</div>

				<div class="form-group">
					<label><strong>Diagnostico Nutricional</strong></label>
					<input type="text" name="diagnostico" class="form-control" placeholder="diagnostico">
				</div>

				<div class="form-group">
					<label><strong>Tratamiento Nutricional</strong></label>
					<input type="text" name="tratamiento" class="form-control" placeholder="Tratamiento">
				</div>

				<div class="form-group">
					<label><strong>Observaciones</strong></label>
					<input type="text" name="observacion" class="form-control" placeholder="Si el cliente tiene alguna observacion">
				</div>
				<button type="button" class="btn btn-primary" name="submit" onclick="loadLog(this.form)">Submit</button>
			</form>
			<div class="form-group" id="resultado" style="width: 100%;height: 50px;border: 2px solid blue;">
				
			</div>

			<!-- <?php //include('consulta.php');?> -->
	    </div>

	    <div class="col">
          	<h4><strong>DESPISTAJE DE H ARTERIAL Y RIEGO</strong></h4>
    		<form name="nueva_evaluacion">
    			<div class="form-group">
    			    <label for="names"><strong>Opcional</strong></label>
    			    <select id="names" name="names" class="form-control" onchange="return buscar();">
			        	<option value="1">Opcional seleccionar 1 opcion</option>
			        	<?php while ($row = $res->fetch_assoc()) { ?>
			        		<option value="<?php echo $row['Dni']; ?>"><?php echo $row['Nombres']; ?></option>
			        	<?php
			        	} ?>
			    	</select>
			    </div>

	      		<div class="form-group">
					<label><strong>Numero de DNI</strong></label>
					<?php if (isset($row1)) {?>
						<input type="text" name="ddni" id="dni" class="form-control" placeholder="70125188" value="<?php echo $row1['Dni']; ?>">
					<?php } else { ?>
					<input type="text" name="ddni" id="dni" class="form-control" placeholder="70125188">
					<?php } ?>
					<small class="form-text text-danger">Tenga cuidado al completar el No DNI</small>
				</div>

				<div class="form-group">
					<label><strong>Nombres y apellidos</strong></label>
					<?php if(isset($row1)) {?>
						<input type="text" name="dnombre" class="form-control" value="<?php echo $row1['Nombres']; ?>">
					<?php } else {?>
					<input type="text" name="dnombre" class="form-control" placeholder="Roberto ccallata medrano">
					<?php } ?>
				</div>
				
				<div class="form-row">
					<div class="form-group col-md-6">
						<label><strong>Edad</strong></label>
						<?php if(isset($row1)) {?>
							<input type="number" name="dedad" class="form-control" value="<?php echo $row1['Edad']; ?>">
						<?php } else {?>
							<input type="number" name="dedad" class="form-control" placeholder="35">
						<?php } ?>
					</div>

					<div class="form-group col-md-6">
						<label class="form-check-label"><strong>Genero</strong></label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="dgenero" checked value="1">
							<label class="form-check-label">
							Masculino
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="dgenero" value="2">
							<label class="form-check-label">
							Femenino
							</label>
						</div>
					</div>
					
					<div class="form-group col-md-6">
						<label><strong>Procedencia</strong></label>
						<input type="text" name="dprocedencia" class="form-control" placeholder="Laraqueri-puno">
					</div>

					<div class="form-group col-md-6">
						<label><strong>FS VS</strong></label>
						<input type="text" name="dfsvs" class="form-control" placeholder="fsvs">
					</div>

					<div class="form-group col-md-6">
						<label><strong>Dignostico PRE H o H</strong></label>
						<input type="text" name="ddiagnosticopre" class="form-control" placeholder="hipertencion">
					</div>

					<div class="form-group col-md-6">
						<label><strong>Peso (kg.)</strong></label>
						<?php if(isset($row1)) {?>
							<input type="text" name="dpeso" class="form-control" value="<?php echo $row1['Peso']; ?>">
						<?php } else {?>
							<input type="text" name="dpeso" class="form-control" placeholder="59">
						<?php } ?>
						
					</div>

					<div class="form-group col-md-6">
						<label><strong>Talla (cm.)</strong></label>
						<?php if(isset($row1)) {?>
							<input type="text" name="dtalla" class="form-control"  value="<?php echo $row1['Talla']; ?>">
						<?php } else {?>
							<input type="text" name="dtalla" class="form-control" placeholder="160">
						<?php } ?>
						
					</div>

					<div class="form-group col-md-6">
						<label><strong>Perimetro Abdominal(cm.)</strong></label>
						<?php if(isset($row1)) {?>
							<input type="text" name="dperimetro" class="form-control" value="<?php echo $row1['PerimetroAbdominal']; ?>">
						<?php } else {?>
							<input type="text" name="dperimetro" class="form-control" placeholder="70">
						<?php } ?>
						
					</div>
				</div>

				<div class="form-group">
					<label><strong>Diagnostico IMC</strong></label>
					<input type="text" name="ddiagnosticoimc" class="form-control" placeholder="20.5">
				</div>

				<div class="form-group">
					<label><strong>Riesgo de Sindrome</strong></label>
					<input type="text" name="driesgo" class="form-control" placeholder="regular">
				</div>

				<div class="form-group">
					<label><strong>Responsable</strong></label>
					<input type="text" name="dresponsable" class="form-control" placeholder="jose">
				</div>
				<button type="button" class="btn btn-primary" name="submit" onclick="loadLog(this.form)">Submit</button>
			</form>
			<div class="form-group" id="resultado" style="width: 100%;height: 50px;border: 2px solid blue;">
				
			</div>
	    </div>
	  </div>
	</div>
	
	<script language="JavaScript" type="text/javascript" src="js/ajax.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>