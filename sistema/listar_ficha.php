<?php
	session_start();
	include "../conexion.php";

 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista Fichas</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<h1> <i class="fas fa-users"></i> Lista de Ficha</h1>
		<a href="registro_ficha.php" class="btn_new"><i class="fas fa-user-plus"></i> Crear Ficha</a>
		<form action="buscar_ficha.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
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
			inner join paciente p WHERE f.ficha = 1 ");
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

			$query = mysqli_query($conection,"SELECT f.ficha, p.codpaciente, p.nombrep, f.fecha, f.examen, f.resultado, f.diagnostico, f.medicamento1, f.medicamento2, f.medicamento3  FROM ficha f
														inner join paciente p on f.codpaciente = p.codpaciente
                                                      ORDER BY f.ficha ASC LIMIT $desde,$por_pagina 
				");

			mysqli_close($conection);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {

			?>
				<tr>
					<td><?php echo $data["ficha"]; ?></td>
					<td><?php echo $data["nombrep"]; ?></td>
					<td><?php echo $data["fecha"]; ?></td>
                    <td><?php echo $data["examen"]; ?></td>
					<td><?php echo $data["resultado"]; ?></td>
                    <td><?php echo $data["diagnostico"]; ?></td>
                    <td><?php echo $data["medicamento1"]; ?></td>
					<td><?php echo $data["medicamento2"]; ?></td>
					<td><?php echo $data["medicamento3"]; ?></td>
					
					<td>
						<a class="link_edit" href="editar_ficha.php?id=<?php echo $data["ficha"]; ?>"><i class="far fa-edit"></i> Editar</a>
							|
						<a class="link_delete" href="eliminar_confirmar_ficha.php?id=<?php echo $data["codpaciente"]; ?>"><i class="far fa-trash-alt"></i> Eliminar</a>


					</td>
				</tr>
		<?php
				}

			}
		 ?>


		</table>
	</div>
		<div class="paginador">
			<ul>
			<?php
				if($pagina != 1)
				{
			 ?>
				<li><a href="?pagina=<?php echo 1; ?>"><i class="fas fa-step-backward"></i></a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>"><i class="fas fa-backward"></i></a></li>
			<?php
				}
				for ($i=1; $i <= $total_paginas; $i++) {
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
					}
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?>"><i class="fas fa-forward"></i></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?> "><i class="fas fa-step-forward"></i></a></li>
			<?php } ?>
			</ul>
		</div>
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>