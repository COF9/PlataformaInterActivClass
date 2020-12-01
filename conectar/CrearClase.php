<?php 
    include('connect.php');
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location:index.html");
    }
    if (isset($_REQUEST['clase'])) {
    	$n=$_REQUEST['clase'];
    	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    	$cad = "";
    	for($i=0;$i<5;$i++) {
    		$cad .= substr($str,rand(0,62),1);
    	}
    	$gr=$_REQUEST['grupo'];
    	$u=$_SESSION['user'];
    	$us="INSERT INTO  clase VALUES(NULL, '$n', '$cad', '$gr', '$u', NULL)";
   		mysqli_query($conn, $us);
    }
    if (isset($_REQUEST['e'])) {
    	$eli="DELETE FROM clase WHERE idclase=".$_REQUEST['e'];
   		mysqli_query($conn, $eli);
    }
    	$f="SELECT * FROM clase WHERE usuario='".$_SESSION['user']."'";
   		$con=mysqli_query($conn, $f);
   		$mnr=mysqli_num_rows($con);
   		$a=mysqli_fetch_assoc($con);
?>

<!DOCTYPE html>
<html lang="es">
<head>
 	<meta charset="utf-8">
	<title>Crear Clase</title>
</head>
<body>
	<H1>Gestion de Clases</H1>
	<form action="CrearClase.php" method="post">
		<input type="text" name="clase" placeholder="NOMBRE CLASE" required>
		<input type="text" name="grupo" placeholder="GRUPO" required>
		<input type="submit" name="Crear" value="Crear">
		<input type="button" value="Actualizar" onclick="location.reload()"/>
	</form>
	<table border>
		<tr>
			<td>Nombre</td>
			<td>Clave</td>
			<td>Grupo</td>
			<td>Fecha</td>
			<td>Eliminar</td>
			<td>Ver Actividades</td>
			<td>Miembros</td>
		</tr>
		<?php 
			if ($mnr>0) {
				do {
					echo "<tr><td>".$a['nombre']."</td>";
					echo "<td>".$a['clave']."</td>";
					echo "<td>".$a['grupo']."</td>";
					echo "<td>".$a['fecha']."</td>";
					echo "<td><a href='CrearClase.php?e=".$a['idclase']."'>Eliminar</a></td>";
					echo "<td><a href='Plan.php?clave=".$a['clave']."' target='_blank'>Ver Actividades</a></td>";
					echo "<td><a href='Miembros.php?clave=".$a['clave']."' target='_blank'>Miembros</a></td></tr>";
				} while ($a=mysqli_fetch_assoc($con));
				echo "<tr><td colspan='6'><b>Total de clases".$mnr."</b></td></tr>";
			}else{
				echo "<tr><td colspan='6'>No hay Clase Creadas</td></tr>";
			}
		 ?>
	</table>
</body>
</html>