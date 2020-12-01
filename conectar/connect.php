<?php 
	$server="localhost"; 
	$user="root"; 
	$pass=""; 
	$bd="inter";//nombre de la bd
	$conn=mysqli_connect($server,$user,$pass,$bd);
	if (!$conn) {
		echo '<script type="text/javascript">
        alert("Sin Conexion a la Base de Datos");
        </script>';;
	}
?>