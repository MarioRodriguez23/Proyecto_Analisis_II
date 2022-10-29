<?php
	session_start();
	include "../conexion.php";

 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de Pacientes</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
    
    <?php
        /*Busqueda*/
        $busqueda = strtolower($_REQUEST['busqueda']);
        if(empty($busqueda))
        {
            header("location: listar_paciente.php");
        }

        ?>
		<h1> <i class="fas fa-users"></i> Lista de Pacientes</h1>
		<a href="registrar_paciente.php" class="btn_new"><i class="fas fa-user-plus"></i> Crear Paciente</a>
		<form action="buscar_paciente.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
			<button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
		</form>
	
	<div class="containerTable">
		<table>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>DPI</th>
                <th>Edad</th>
				<th>Fecha Cita</th>
				<th>Hora</th>
                <th>Estado</th>
				<th>Acciones</th>
			</tr>
		<?php
			//Paginador
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM paciente 
                                                            WHERE ( codpaciente LIKE '%$busqueda%' OR 
                                                                    nombrep LIKE '%$busqueda%' OR 
                                                                    dpi LIKE '%$busqueda%' OR
                                                                    edad LIKE '%$busqueda%' OR 
                                                                    fechacita LIKE '%$busqueda%' OR 
                                                                    hora LIKE '%$busqueda%' OR 
                                                                    estado LIKE '%$busqueda%')");
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

			$query = mysqli_query($conection,"SELECT codpaciente, nombrep, dpi, edad, fechacita, hora, estado  FROM paciente 
                                                        WHERE (codpaciente LIKE '%$busqueda%' OR 
                                                                    nombrep LIKE '%$busqueda%' OR 
                                                                    dpi LIKE '%$busqueda%' OR 
                                                                    edad LIKE '%$busqueda%' OR
                                                                    fechacita LIKE '%$busqueda%' OR 
                                                                    hora LIKE '%$busqueda%' OR 
                                                                    estado LIKE '%$busqueda%' )
                                                                    ORDER BY codpaciente ASC LIMIT $desde,$por_pagina");

			mysqli_close($conection);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {

			?>
				<tr>
					<td><?php echo $data["codpaciente"]; ?></td>
					<td><?php echo $data["nombrep"]; ?></td>
					<td><?php echo $data["dpi"]; ?></td>
                    <td><?php echo $data["edad"]; ?></td>
					<td><?php echo $data["fechacita"]; ?></td>
                    <td><?php echo $data["hora"]; ?></td>
                    <td><?php echo $data["estado"]; ?></td>
					
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