<?php
session_start();
include "../conexion.php";


if(!empty($_POST))
{
    $idpaciente = $_POST['idpaciente'];

    //$query_delete = mysqli_query($conection,"DELETE FROM usuario WHERE idusuario =$idusuario ");
    $query_delete = mysqli_query($conection,"UPDATE paciente SET estatus = 0 WHERE codpaciente = $idpaciente ");
    mysqli_close($conection);
    if($query_delete){
        header("location: listar_paciente.php");
    }else{
        echo "Error al eliminar";
    }
}

if(empty($_REQUEST['id']) )
	{
		header("location: listar_paciente.php");
		mysqli_close($conection);
	}else{
        

		$idpaciente = $_REQUEST['id'];

		$query = mysqli_query($conection,"SELECT * FROM paciente WHERE codpaciente = $idpaciente ");
		mysqli_close($conection);
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
				
				$nombrep = $data['nombrep'];
                
			}
		}else{
			header("location: listar_paciente.php");
		}


	}
 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Paciente</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
    <div class="data_delete">
			<i class="fas fa-user-times fa-7x" style="color: #e66262"></i>
			<br><br>
			<h2>¿Está seguro de eliminar el siguiente registro?</h2>
            <p>Codigo: <span><?php echo $idpaciente; ?></span></p>
			<p>Nombre del Paciente: <span><?php echo $nombrep; ?></span></p>
			

			<form method="post" action="">
				<input type="hidden" name="idpaciente" value="<?php echo $idpaciente; ?>">
				<a href="listar_paciente.php" class="btn_cancel"><i class="fas fa-ban"></i> Cancelar</a>
				<button type="submit" class="btn_ok"><i class="far fa-trash-alt"></i> Eliminar</button>
			</form>
		</div>
    </section>	
    <?php include "includes/footer.php"; ?>
</body>
</html>