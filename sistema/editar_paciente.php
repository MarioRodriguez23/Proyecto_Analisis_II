<?php 
	
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
	
	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombrep']) )
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$idUsuario = $_POST['id'];
			$nombre = $_POST['nombre'];
			$email  = $_POST['correo'];
			$user   = $_POST['usuario'];
			$clave  = md5($_POST['clave']);
			$rol    = $_POST['rol'];


			$query = mysqli_query($conection,"SELECT * FROM usuario 
													   WHERE (usuario = '$user' AND idusuario != $idUsuario)
													   OR (correo = '$email' AND idusuario != $idUsuario) ");

			$result = mysqli_fetch_array($query);
			$result = count($result);

			if($result > 0){
				$alert='<p class="msg_error">El correo o el usuario ya existe.</p>';
			}else{

				if(empty($_POST['clave']))
				{

					$sql_update = mysqli_query($conection,"UPDATE usuario
															SET nombre = '$nombre', correo='$email',usuario='$user',rol='$rol'
															WHERE idusuario= $idUsuario ");
				}else{
					$sql_update = mysqli_query($conection,"UPDATE usuario
															SET nombre = '$nombre', correo='$email',usuario='$user',clave='$clave', rol='$rol'
															WHERE idusuario= $idUsuario ");

				}

				if($sql_update){
					$alert='<p class="msg_save">Usuario actualizado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al actualizar el usuario.</p>';
				}

			}


		}

	}

	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: listar_paciente.php');
		mysqli_close($conection);
	}
	$idpaciente = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT * FROM paciente WHERE codpaciente = $idpaciente ");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: listar_paciente.php');
	}else{
		
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$idpaciente  = $data['codpaciente'];
			$nombrep  = $data['nombrep'];
			$dpi  = $data['dpi'];
			$sexo  = $data['sexo'];
			$edad = $data['edad'];
			$fechacita   = $data['fechacita'];
			$hora     = $data['hora'];
			$estado     = $data['estado'];


		}
	}

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Actualizar Paciente</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1><i class="far fa-edit"></i> Actualizar Paciente</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<input type="hidden" name="id" value="<?php echo $idpaciente ;?>">
				<!--Añadiendo Id Apaciente
				<label for="id">Código Paciente</label>
				<input type="number" name="codpaciente" id="codpaciente" placeholder="Ingrese el código del paciente">
				-->
				<!--Añadiendo Nombre-->
				<label for="nombrep">Nombre</label>
				<input type="text" name="nombrep" id="nombrep" placeholder="Nombre completo" value="<?php echo $nombrep ;?>">
				<!--Añadiendo DPI-->
				<label for="dpi">Documeto de Identificación</label>
				<input type="number" name="dpi" id="dpi" placeholder="Añadir DPI" value="<?php echo $dpi ;?>" >
				<!--Añadiendo edad-->
				<label for="sexo">Sexo</label>
				<!--<input type="radio" name="sexo" value="Femenino"> Femenino
				<input type="radio" name="sexo" value="Masculino"> Masculino-->
				<input type="text" name="sexo" id="sexo" placeholder="sexo" value="<?php echo $sexo ;?>">
				<!--Añadiendo edad-->
				<label for="edad">Edad</label>
				<input type="number" name="edad" id="edad" placeholder="Añadir Edad" min="40" max="100" value="<?php echo $edad ;?>">
				<!--Añadiendo edad-->
				<label for="cita" >Proxima cinta</label>
				<input type="date" name="fechacita" id="fechacita" value="<?php echo $fechacita ;?>">
				<label for="cita">Horario</label>
				<input type="time" name="hora" id="hora" value="<?php echo $hora ;?>">
				<!--Añadiendo DPI-->
				<label for="estado">Estado</label>
				<!--<input type="radio" name="estado" value="Pendiente"> Pendiente
				<input type="radio" name="estado" value="Proceso"> Proceso
				<input type="radio" name="estado" value="Completado"> Completado-->
				<input type="text" name="estado" id="estado" placeholder="estado" value="<?php echo $estado ;?>">

                <button type="submit" class="btn_save"><i class="far fa-save fa-lg"></i> Actualizar Paciente</button>
			</form>

		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>