<?php 
    include('connect.php');
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location:index.html");
    }
    if (isset($_REQUEST['clave'])) {
    	$cone="SELECT * FROM clase WHERE clave='".$_REQUEST['clave']."'";
   		$mq=mysqli_query($conn, $cone);
   		$n=mysqli_num_rows($mq);
   		if ($n>0) {
	    	$conec="SELECT * FROM misclases WHERE clave='".$_REQUEST['clave']."' AND usuario='".$_SESSION['user']."'";
	   		$mqy=mysqli_query($conn, $conec);
	   		$nc=mysqli_num_rows($mqy);
	   		if ($nc==0) {
	    		$u=$_SESSION['user'];
	    		$c=$_REQUEST['clave'];
	    		$cl="INSERT INTO  misclases VALUES(NULL, '$u', '$c')";
	   			mysqli_query($conn, $cl);
	   		}else{
	   			echo'<script type="text/javascript">
	            alert("Ya ingresaste a esta clase");
	            </script>';
	   		}
   		}else{
   			echo'<script type="text/javascript">
            alert("La clase no existe");
            </script>';
   		}
    }
    if (isset($_REQUEST['e'])) {
    	$eli="DELETE FROM misclase WHERE idmiclase=".$_REQUEST['e'];
   		mysqli_query($conn, $eli);
    }
    $f="SELECT clase.nombre, misclases.idmiclase, clase.clave FROM clase, misclases WHERE clase.clave=misclases.clave AND misclases.usuario='".$_SESSION['user']."'";
   	$con=mysqli_query($conn, $f);
   	$mnr=mysqli_num_rows($con);
   	$a=mysqli_fetch_assoc($con);
 ?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="utf-8">
 	<title>Unirse a Clase</title>
 </head>
 <body>
 	<H1>Unirse a Clase</H1>
	<form action="UnirseClase.php" method="post">
		<input type="text" name="clave" placeholder="CLAVE DE LA CLASE" required>
		<input type="submit" name="Crear" value="Unirse">
		<input type="button" value="Actualizar" onclick="location.reload()"/>
	</form>
	<H1>Mis Clases</H1>
	<table border>
		<tr>
			<td>Nombre</td>
			<td>Eliminar</td>
			<td>Actividades</td>
		</tr>
		<?php 
			if ($mnr>0) {
				do {
					echo "<tr><td>".$a['nombre']."</td>";
					echo "<td><a href='CrearClase.php?e=".$a['idmiclase']."'>Eliminar</a></td>";
					echo "<td><a href='PlanAlumno.php?clave=".$a['clave']."' target='_blank'>Ver Actividades</a></td></tr>";
				} while ($a=mysqli_fetch_assoc($con));
			}else{
				echo "<tr><td>No hay Clase Creadas</td></tr>";
			}
		 ?>
	</table>
 </body>
 </html>