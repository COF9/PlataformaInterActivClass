<?php
    include('connect.php');
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location:index.html");
    }
    if (isset($_REQUEST['clave']) && !empty($_REQUEST['clave'])) {
    	$_SESSION['clave']=$_REQUEST['clave'];
    } 
    $f="SELECT * FROM plan WHERE clave='".$_SESSION['clave']."' ORDER BY fecha DESC";
   	$qp=mysqli_query($conn, $f);
   	$mnr=mysqli_num_rows($qp);
   	$aplan=mysqli_fetch_assoc($qp);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<title>Actividades</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon.png" />
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body class="body">
		<H1>Actividades</H1> <br>
				<?php 
						if ($mnr>0) {
							do {
                                echo "<hr>Fecha en la que se dejo: ".$aplan['fecha']."<br>";
								echo "<h2>".$aplan['titulo']."</h2>";
								echo "<h4>".$aplan['texto']."</h4>";
								echo "Fecha entrega: ".$aplan['fechaentrega']."<br>";
								echo "<hr>";
							} while ($aplan=mysqli_fetch_assoc($qp));
						}else{
							echo "No hay Actividades para esta Clase";
						}
					 ?>
    <div class="card text-dark text-center ">
            <p class="t9">@InteractivClass|2020</p>
    </div>
</body>
</html>