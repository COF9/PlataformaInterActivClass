<?php 
    include('connect.php');
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location:index.html");
    }
    if (isset($_REQUEST['cerrar'])) {
        session_destroy();
        header("Location:index.html");   
    }
    $user="SELECT * FROM clase, usuarios WHERE clase.usuario=usuarios.usuario AND clase.clave='".$_SESSION['clave']."'";
    $res=mysqli_query($conn, $user);
    $profe=mysqli_fetch_assoc($res);
    $us="SELECT * FROM misclases, usuarios WHERE misclases.usuario=usuarios.usuario AND misclases.clave='".$_SESSION['clave']."'";
    $resu=mysqli_query($conn, $us);
    $alumno=mysqli_fetch_assoc($resu);
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
 	<meta charset="utf-8">
 	<title>Miembros</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon.png" />
 </head>
 <body>
 	<tr>
 		<td>Tipo</td>
 		<td>Foto</td>
 		<td>Nombre</td>
 	</tr>
 	<tr>
 	<?php 
 		echo "<td>".$profe['tipo']."</td>";
 		echo "<td><img src='../fotos/".$profe['usuario']."".$profe['foto']."'height=50 width=50></td>";
 		echo "<td>".$profe['nombre']."</td>";
 	 ?>
 	 </tr>
 	 <tr>
 	 <?php 
			if ($alumno>0) {
				do {
 					echo "<td>".$alumno['tipo']."</td>";
 					echo "<td><img src='../fotos/".$alumno['usuario']."".$alumno['foto']."'height=50 width=50></td>";
 					echo "<td>".$alumno['nombre']."</td>";
				} while ($alumno=mysqli_fetch_assoc($resu));
				}else{
				echo "<tr><td>No hay Alumnos</td></tr>";
			}
			?>
				</tr>
 </body>
 </html>