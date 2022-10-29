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
		header('Location: listar_ficha.php');
		mysqli_close($conection);
	}
	$idficha = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT * FROM ficha WHERE ficha = $idficha ");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: listar_ficha.php');
	}else{
		
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$ficha          = $data['ficha'];
			$codpaciente    = $data['codpaciente'];
			$fecha          = $data['fecha'];
			$motivo         = $data['motivo'];
			$medico         = $data['medico'];
			$examen         = $data['examen'];
			$resultado      = $data['resultado'];
			$diagnostico    = $data['diagnostico'];
            $medicamento1   = $data['medicamento1'];
			$aplicacion1    = $data['aplicacion1'];
			$medicamento2   = $data['medicamento2'];
			$aplicacion2    = $data['aplicacion2'];
			$medicamento3   = $data['medicamento3'];
			$aplicacion3    = $data['aplicacion3'];
			$observacion    = $data['observacion'];
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
			<h1><i class="far fa-edit"></i> Actualizar Ficha</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $ficha ;?>">
				<!--Añadiendo Id Apaciente
				<label for="id">Código Paciente</label>
				<input type="number" name="codpaciente" id="codpaciente" placeholder="Ingrese el código del paciente">
				--><!--Añadiendo Id Apaciente-->
				<label for="id">Código Ficha</label>
				<input type="number" name="codpaciente" id="codpaciente" placeholder="Ingrese el código del paciente" value="<?php echo $codpaciente ;?>">
				<!--Añadiendo Nombre-->
				<label for="motivo">motivo</label>
                <input name="motivo" placeholder="Motivo de Visita" value="<?php echo $motivo ;?>">
                <!--Asignar Medico-->
				<label for="medico">Médico Tratante</label>
				<input type="text" value="<?php echo $medico ;?>">
				<!--Asignar examen-->
				<label for="examen">Examen realizado</label>
				<input type="text" value="<?php echo $examen ;?>">
				<!--Añadiendo Resultado-->
				<label for="resultado">Resultado</label>
				<input type="text" value="<?php echo $resultado ;?>">
				<!--Añadiendo Diagnostico-->
				<label for="diagnostico">Diagnostico</label>
				<input type="text" value="<?php echo $diagnostico ;?>">
				<label for="medicamento1">Medicamento</label>
				<input type="text" value="<?php echo $medicamento1 ;?>">
				<!--Añadiendo Aplicacion1-->
				<label for="aplicacion1">Aplicación</label>
				<input type="text" value="<?php echo $aplicacion1 ;?>">
				

  				
  				<!--Asignar Medicamento 2-->
				<label for="medicamento2">Medicamento (2)</label>
				<input type="text" value="<?php echo $medicamento2 ;?>">
				<!--Añadiendo Aplicacion2-->
				<label for="aplicacion2">Aplicación</label>
				<input type="text" value="<?php echo $aplicacion2 ;?>">
				

				<!--Asignar Medicamento 3-->
				<label for="medicamento3">Medicamento (3)</label>
				<input type="text" value="<?php echo $medicamento3 ;?>">
				<!--Añadiendo Aplicacion3-->
				<label for="aplicacion3">Aplicación</label>
				<input type="text" value="<?php echo $aplicacion3 ;?>">
				
				
				
				<!--Añadiendo Resultado-->
				<label for="observacion">Observación</label>
				<input type="text" value="<?php echo $observacion ;?>">

                <button type="submit" class="btn_save"><i class="far fa-save fa-lg"></i> Actualizar Paciente</button>


			</form>

		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>