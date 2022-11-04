<?php 
	session_start();
	
	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombrep']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$nombrep      	= $_POST['nombrep'];
			$dpi    		= $_POST['dpi'];
			$sexo   		= $_POST['sexo'];
			$edad  			= $_POST['edad'];
			$fechacita  	= $_POST['fechacita'];
			$hora  			= $_POST['hora'];
			$estado  		= $_POST['estado'];
			

			
				$query_insert = mysqli_query($conection,"INSERT INTO paciente(nombrep,dpi,sexo,edad,fechacita,hora,estado)
														VALUES('$nombrep','$dpi','$sexo','$edad','$fechacita','$hora','$estado')");

				if($query_insert){
					$alert='<p class="msg_save">Cliente guardado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al guardar el cliente.</p>';
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
			<h1><i class="fas fa-user-plus"></i> Registrar Paciente</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

		

			<form action="" method="post">
				<!--Añadiendo Id Apaciente
				<label for="id">Código Paciente</label>
				<input type="number" name="codpaciente" id="codpaciente" placeholder="Ingrese el código del paciente">
				-->
				<!--Añadiendo Nombre-->
				<label for="nombrep">Nombre</label>
				<input type="text" name="nombrep" id="nombrep" placeholder="Nombre completo" >
				<!--Añadiendo DPI-->
				<label for="dpi">Documeto de Identificación</label>
				<input type="number" name="dpi" id="dpi" placeholder="Añadir DPI" >
				<!--Añadiendo edad-->
				<label for="sexo">Sexo</label>
				<select name="sexo" id="sexo">
					<option value="Femenino">Femenino</option>
					<option value="Masculino">Maculino</option>
				</select>
				<!--Añadiendo edad-->
				<label for="edad">Edad</label>
				<input type="number" name="edad" id="edad" placeholder="Añadir Edad" min="40" max="100">
				<!--Añadiendo edad-->
				<label for="cita">Proxima cinta</label>
				<input type="date" name="fechacita" id="fechacita" >
				<label for="cita">Horario</label>
				<input type="time" name="hora" id="hora" >
				<!--Añadiendo DPI-->
				<label for="estado">Estado</label>
				<select name="estado" id="estado">
					<option value="Pendiente">Pendiente</option>
					<option value="Proceso"  >Proceso</option>
					<option value="Completado">Completado</option>
				</select>

                <button type="submit" class="btn_save"><i class="far fa-save fa-lg"></i> Guardar Paciente</button>





		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>