<?php
	session_start();
	include "../conexion.php";

 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de Fichas</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
    
    <?php
        /*Busqueda*/
        $busqueda = strtolower($_REQUEST['busqueda']);
        if(empty($busqueda))
        {
            header("location: listar_ficha.php");
        }

        ?>
		<h1> <i class="fas fa-users"></i> Lista de Fichas</h1>
		<a href="registro_ficha.php" class="btn_new"><i class="fas fa-user-plus"></i> Crear Ficha</a>
		<form action="buscar_ficha.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
			<button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
		</form>
	
	<div class="containerTable">
		<table>
			<tr>
				<th>No.</th>
				<th>Codigo Paciente</th>
				<th>Visita</th>
				<th>Examen</th>
                <th>Resultado</th>
				<th>Diagnostico</th>
                <th>Medicamento1</th>
				<th>Medicamento2</th>
				<th>Medicamento3</th>
				<th>Acciones</th>
			</tr>
		<?php
			//Paginador
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM ficha f
															INNER JOIN paciente p ON f.codpaciente = p.codpaciente
                                                            WHERE ( f.ficha LIKE '%$busqueda%' OR 
                                                                    p.nombrep LIKE '%$busqueda%' OR 
                                                                    f.motivo LIKE '%$busqueda%' OR
                                                                    f.examen LIKE '%$busqueda%' OR 
                                                                    f.resultado LIKE '%$busqueda%' OR 
                                                                    f.diagnostico LIKE '%$busqueda%' OR
																	f.medicamento1 LIKE '%$busqueda%' OR 
                                                                    f.medicamento2 LIKE '%$busqueda%' OR 
																	f.medicamento3 LIKE '%$busqueda%')");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

			$por_pagina = 50;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);

			$query = mysqli_query($conection,"SELECT f.ficha, p.nombrep, f.motivo, f.examen, f.resultado, f.diagnostico, f.medicamento1, f.medicamento2, f.medicamento3  FROM ficha f
                                                        INNER JOIN paciente p ON f.codpaciente = p.codpaciente
														WHERE (		f.ficha LIKE '%$busqueda%' OR 
																	p.nombrep LIKE '%$busqueda%' OR 
                                                                    f.motivo LIKE '%$busqueda%' OR 
                                                                    f.examen LIKE '%$busqueda%' OR 
                                                                    f.resultado LIKE '%$busqueda%' OR
                                                                    f.diagnostico LIKE '%$busqueda%' OR 
                                                                    f.medicamento1 LIKE '%$busqueda%' OR 
                                                                    f.medicamento2 LIKE '%$busqueda%' OR
																	f.medicamento3 LIKE '%$busqueda%')
                                                                    ORDER BY ficha ASC LIMIT $desde,$por_pagina");

			mysqli_close($conection);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {

			?>
				<tr>
					<td><?php echo $data["ficha"]; ?></td>
					<td><?php echo $data["nombrep"]; ?></td>
					<td><?php echo $data["motivo"]; ?></td>
                    <td><?php echo $data["examen"]; ?></td>
					<td><?php echo $data["resultado"]; ?></td>
                    <td><?php echo $data["diagnostico"]; ?></td>
                    <td><?php echo $data["medicamento1"]; ?></td>
					<td><?php echo $data["medicamento2"]; ?></td>
					<td><?php echo $data["medicamento3"]; ?></td>
					
					<td>
						<a class="link_edit" href="editar_paciente.php?id=<?php echo $data["codpaciente"]; ?>"><i class="far fa-edit"></i> Editar</a>

						<a class="link_delete" href="eliminar_confirmar_paciente.php?id=<?php echo $data["codpaciente"]; ?>"><i class="far fa-trash-alt"></i> Eliminar</a>


					</td>
				</tr>
		<?php
				}

			}
		 ?>


		</table>
<?php

			if($total_registro != 0)
			{
					
			

?>



	</div>
		<div class="paginador">
			
			<ul>
			<?php
				if($pagina != 1)
				{
			 ?>
				<li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>"><i class="fas fa-step-backward"></i></a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo $busqueda; ?>"><i class="fas fa-backward"></i></a></li>
			<?php
				}
				for ($i=1; $i <= $total_paginas; $i++) {
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';
					}
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?> &busqueda=<?php echo $busqueda; ?>"><i class="fas fa-forward"></i></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?> &busqueda=<?php echo $busqueda; ?>"><i class="fas fa-step-forward"></i></a></li>
			<?php } ?>
			</ul>
		</div>
		<?php } ?>
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>