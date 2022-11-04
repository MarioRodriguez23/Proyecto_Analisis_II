<?php
session_start();
include "../conexion.php";


if(!empty($_POST))
{
    $idficha = $_POST['idficha'];

    //$query_delete = mysqli_query($conection,"DELETE FROM usuario WHERE idusuario =$idusuario ");
    $query_delete = mysqli_query($conection,"UPDATE fichaf SET estatus = 0 WHERE ficha = $idficha ");
    mysqli_close($conection);
    if($query_delete){
        header("location: listar_ficha.php");
    }else{
        echo "Error al eliminar";
    }
}

if(empty($_REQUEST['id']) )
	{
		header("location: listar_ficha.php");
		mysqli_close($conection);
	}else{
        

		$idficha = $_REQUEST['id'];

		$query = mysqli_query($conection,"SELECT * FROM fichaf WHERE ficha = $idficha ");
		mysqli_close($conection);
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
				
				$nombrep = $data['codpaciente'];
                
			}
		}else{
			header("location: listar_ficha.php");
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
            <p>Codigo: <span><?php echo $idficha; ?></span></p>
			<p>Nombre del Paciente: <span><?php echo $nombrep; ?></span></p>
			

			<form method="post" action="">
				<input type="hidden" name="idficha" value="<?php echo $idficha; ?>">
				<a href="listar_ficha.php" class="btn_cancel"><i class="fas fa-ban"></i> Cancelar</a>
				<button type="submit" class="btn_ok"><i class="far fa-trash-alt"></i> Eliminar</button>
			</form>
		</div>
    </section>	
    <?php include "includes/footer.php"; ?>
</body>
</html>