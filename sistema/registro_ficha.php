<?php 
	session_start();
	
	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['codpaciente']))
		{
			$alert='<p class="msg_error">Cod paciente es un campo obligatorio.</p>';
		}else{

			$codpaciente	= $_POST['codpaciente'];
			$motivo    		= $_POST['motivo'];
            $medico    		= $_POST['medico'];
			$examen    		= $_POST['examen'];
			$resultado    	= $_POST['resultado'];
			$diagnostico    = $_POST['diagnostico'];
			$medicamento1   = $_POST['medicamento1'];
			$aplicacion1    = $_POST['aplicacion1'];
			$medicamento2    = $_POST['medicamento2'];
			$aplicacion2    = $_POST['aplicacion2'];
			$medicamento3    = $_POST['medicamento3'];
			$aplicacion3    = $_POST['aplicacion3'];
			$observacion    = $_POST['observacion'];


			
			
			

			
				$query_insert = mysqli_query($conection,"INSERT INTO ficha(codpaciente,motivo,medico,examen,resultado,diagnostico,medicamento1,aplicacion1,medicamento2,aplicacion2,medicamento3,aplicacion3,observacion)
														VALUES('$codpaciente','$motivo','$medico','$examen','$resultado','$diagnostico','$medicamento1','$aplicacion1','$medicamento2','$aplicacion2','$medicamento3','$aplicacion3','$observacion')");

				if($query_insert){
					$alert='<p class="msg_save">La ficha del paciente se ha guardado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al guardar la ficha del paciente.</p>';
				}
			}
		}
		mysqli_close($conection);
			
	



 ?>
	

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Registro Paciente</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1><i class="fas fa-user-plus"></i> Crear Ficha</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

		

			<form action="" method="post">
				<!--Añadiendo Id Apaciente
				<label for="id">Código Paciente</label>
				<input type="number" name="codpaciente" id="codpaciente" placeholder="Ingrese el código del paciente">
				--><!--Añadiendo Id Apaciente-->
				<label for="id">Código Paciente</label>
				<input type="number" name="codpaciente" id="codpaciente" placeholder="Ingrese el código del paciente">
				<!--Añadiendo Nombre-->
				<label for="motivo">motivo</label>
				<textarea name="motivo" placeholder="Motivo de Visita"></textarea>
                <!--Asignar Medico-->
				<label for="medico">Médico Tratante</label>
				<select name="medico">
					<option value="Carlos enrique">Carlos enrique</option>	
					<option value="Jorge Méndez">Jorge Méndez</option>				
				</select>
				<!--Asignar examen-->
				<label for="examen">Examen realizado</label>
				<select name="examen">
					
					<option value="Visual">Visual</option>	
					<option value="Del Corazón">Del Corazón</option>				
				</select>
				<!--Añadiendo Resultado-->
				<label for="resultado">Resultado</label>
				<textarea name="resultado" id="resultado" placeholder="Escribir resultado"></textarea>
				<!--Añadiendo Diagnostico-->
				<label for="diagnostico">Diagnostico</label>
				<textarea name="diagnostico" id="diagnostico" placeholder="Escribir diagnóstico"></textarea>
				<label for="medicamento1">Medicamento</label>
				<select name="medicamento1">
					
					<option value="Aspirina">Aspirina</option>
					<option value="loratadina">loratadina</option>						
				</select>
				<!--Añadiendo Aplicacion1-->
				<label for="aplicacion1">Aplicación</label>
				<textarea name="aplicacion1" id="aplicacion1" placeholder="Especificar Aplicacion de Medicamento"></textarea>
				

  				
  				<!--Asignar Medicamento 2-->
				<label for="medicamento2">Medicamento (2)</label>
				<select name="medicamento2">
					
					<option value="Aspirina">Aspirina</option>
					<option value="loratadina">loratadina</option>				
				</select>
				<!--Añadiendo Aplicacion2-->
				<label for="aplicacion2">Aplicación</label>
				<textarea name="aplicacion2" id="aplicacion2" placeholder="Especificar Aplicacion de Medicamento"></textarea>

				

				<!--Asignar Medicamento 3-->
				<label for="medicamento3">Medicamento (3)</label>
				<select name="medicamento3">
					
					<option value="Aspirina">Aspirina</option>
					<option value="loratadina">loratadina</option>				
				</select>
				<!--Añadiendo Aplicacion3-->
				<label for="aplicacion3">Aplicación</label>
				<textarea name="aplicacion3" id="aplicacion3" placeholder="Especificar Aplicacion de Medicamento"></textarea>
				
				
				
				<!--Añadiendo Resultado-->
				<label for="observacion">Observación</label>
				<textarea name="observacion" id="observacion" placeholder="Observaciones"></textarea>

                <button type="submit" class="btn_save"><i class="far fa-save fa-lg"></i> Guardar Paciente</button>





		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>