<aside>
	<a href="index.html">Home</a><br>
	<?php 
		if ($auser['tipo']=='maestro') {
			echo "<a href='CrearClase.php'>Crear Clase</a>";
		}
		if($auser['tipo']=='alumno') {
			echo "<a href='UnirseClase.php'>Unirse a Clase</a>";
		}
	 ?>
	 <br>
</aside>