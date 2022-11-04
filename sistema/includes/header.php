<?php 

	if(empty($_SESSION['active']))
	{
		header('location: ../');
	}
 ?>
	<header>
		<div class="header">
			<a href="#" class="btnMenu"><i class="fas fa-bars"></i></a>
			<h1>Sistema Centro Médico</h1>
			
			<div class="optionsBar">
			<p><?php echo fechaC(); ?>
			<?php echo '|' ?></p>
				<span  class="user"><?php echo $_SESSION['user']; ?></span>
				<img class="photouser" src="img/login07.png" alt="Usuario">
				<a href="salir.php"><img class="close" src="img/btnsalir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<?php include "nav.php"; ?>
	</header>
	<div class="modal">
		<div class="bodyModal">
		</div>
	</div>