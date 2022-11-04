		<nav>
			<ul>
				<li><a href="index.php"><i class="fas fa-home"></i> Inicio</a></li>
			<?php
				if($_SESSION['rol'] == 1){
			 ?>
				<li class="principal">

					<a href="#"><i class="fas fa-user-md"></i> Usuarios <span class="arrow"><i class="fas fa-angle-down"></i></span></a>
					<ul>
						<li><a href="registro_usuario.php"><i class="fas fa-user-plus"></i> Nuevo Usuario</a></li>
						<li><a href="lista_usuarios.php"><i class="fas fa-user-md"></i> Lista de Usuarios</a></li>
					</ul>
				</li>
			<?php } ?>
				<li class="principal">
						<a href="#"><i class="far fa-address-card"></i> Paciente <span class="arrow"><i class="fas fa-angle-down"></i></span></a>
						<ul>
							<li><a href="registrar_paciente.php"><i class="fas fa-user-plus"></i> Nuevo Paciente</a></li>
							<li><a href="listar_paciente.php"><i class="far fa-address-card"></i> Listar Pacientes</a></li>
							<li><a href="registro_ficha.php"><i class="fas fa-user-plus"></i> Crear Ficha</a></li>
							<li><a href="listar_ficha.php"><i class="far fa-address-card"></i> Ver Ficha</a></li>
						</ul>
					</li>
				<li class="principal">
					<a href="#"><i class="fas fa-user-circle"></i> Donadores <span class="arrow"><i class="fas fa-angle-down"></i></span></a>
					<ul>
						<li><a href="registro_cliente.php"><i class="fas fa-user-plus"></i> Nuevo Cliente</a></li>
						<li><a href="lista_clientes.php"><i class="fas fa-user-circle"></i> Lista de Clientes</a></li>
					</ul>
				</li>
				
			<?php
				if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2){
			 ?>
				<li class="principal">
					<a href="#"><i class="far fa-building"></i> Proveedores <span class="arrow"><i class="fas fa-angle-down"></i></span></a>
					<ul>
						<li><a href="registro_proveedor.php"><i class="fas fa-plus"></i> Nuevo Proveedor</a></li>
						<li><a href="lista_proveedor.php"><i class="far fa-list-alt"></i> Lista de Proveedores</a></li>
					</ul>
				</li>
			<?php } ?>
				<li class="principal">
					<a href="#"><i class="fa fa-plus"></i> Productos <span class="arrow"><i class="fas fa-angle-down"></i></span></a>
					<ul>
						<?php
							if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2){
						 ?>
							<li><a href="registro_producto.php"><i class="fas fa-plus"></i> Nuevo Producto</a></li>
						<?php } ?>
						<li><a href="lista_producto.php"><i class="fas fa-cube"></i> Lista de Productos</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#"><i class="far fa-money-bill-alt"></i> Ventas <span class="arrow"><i class="fas fa-angle-down"></i></span></a>
					<ul>
						<li><a href="nueva_venta.php"><i class="fas fa-plus"></i> Nueva Venta</a></li>
						<li><a href="ventas.php"><i class="far fa-newspaper"></i> Ventas</a></li>
					</ul>
				</li>
			</ul>
		</nav>