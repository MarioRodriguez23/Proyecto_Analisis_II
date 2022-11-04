<?php 
	
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'bd_centro_medico';

	$conection = @mysqli_connect($host,$user,$password,$db);

	if(!$conection){
		echo "Error en la conexión";
	}

?>