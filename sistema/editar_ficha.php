<?php 
	session_start();
	
	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['codpaciente']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$ficha = $_POST['idficha'];
			$codpaciente	= $_POST['codpaciente'];
			$motivo    		= $_POST['motivo'];
            $medico    		= $_POST['medico'];
			$examen    		= $_POST['examen'];
			/*$resultado    	= $_POST['resultado'];
			$diagnostico    = $_POST['diagnostico'];
			$medicamento1   = $_POST['medicamento1'];
			$aplicacion1    = $_POST['aplicacion1'];
			$medicamento2    = $_POST['medicamento2'];
			$aplicacion2    = $_POST['aplicacion2'];
			$medicamento3    = $_POST['medicamento3'];
			$aplicacion3    = $_POST['aplicacion3'];
			$observacion    = $_POST['observacion'];
			/*$query = mysqli_query($conection,"SELECT * FROM fichaf 
			WHERE ficha = '$ficha'");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">El correo o el usuario ya existe.</p>';
			}else*/

				$sql_update = mysqli_query($conection,"UPDATE fichaf f inner join paciente p on f.codpaciente = p.codpaciente SET p.codpaciente ='$codpaciente', motivo ='$motivo', medico ='$medico'
				WHERE f.ficha = '$ficha'");
				if($sql_update){
					$alert='<p class="msg_save">Ficha Actualizada Correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error en Actualización.</p>';
				}

			


		}

	}

	//Mostrar datos

	if(empty($_GET['id']))
	{
		header('Location: Listar_ficha.php');
	}
	$iduser = $_GET['id'];

	$sql = mysqli_query($conection,"SELECT f.ficha, p.codpaciente, f.motivo, f.medico, f.examen, f.resultado, f.diagnostico, f.medicamento1, f.aplicacion1, f.medicamento2, f.aplicacion2, f.medicamento3, f.aplicacion3, f.observacion 
						FROM fichaf f INNER JOIN paciente p ON f.codpaciente = p.codpaciente WHERE ficha = $iduser");

	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: Listar_Ficha.php');
	}else{
		while ($data = mysqli_fetch_array($sql)){
			#code ...
			$iduser = $data['ficha'];
			$codpaciente = $data['codpaciente'];
			$motivo = $data['motivo'];
			$medico = $data['medico'];
			$examen = $data['examen'];
			$resultado = $data['resultado'];
			$diagnostico = $data['diagnostico'];
			$medicamento1 = $data['medicamento1'];
			$aplicacion1 = $data['aplicacion1'];
			$medicamento2 = $data['medicamento2'];
			$aplicacion2 = $data['aplicacion2'];
			$medicamento3 = $data['medicamento3'];
			$aplicacion3 = $data['aplicacion3'];
			$observacion = $data['observacion'];
		}
	}


 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Actualizar Ficha</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1><i class="far fa-edit"></i> Actualizar Ficha</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
            <input type="hidden" name="idficha" value="<?php echo $iduser ;?> " >
				<!--Añadiendo Id Apaciente
				<label for="id">Código Paciente</label>
				<input type="number" name="codpaciente" id="codpaciente" placeholder="Ingrese el código del paciente">
				--><!--Añadiendo Id Apaciente-->
				<label for="id">Código Paciente</label>
				<input disabled="" type="number" name="codpaciente" id="codpaciente"  value="<?php echo $codpaciente ;?>">
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

                <button type="submit" class="btn_save"><i class="far fa-save fa-lg"></i> Actualizar Ficha</button>


			</form>

		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>