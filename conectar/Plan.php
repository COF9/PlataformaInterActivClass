<?php
    include('connect.php');
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location:index.html");
    }
    if (isset($_REQUEST['clave']) && !empty($_REQUEST['clave'])) {
    	$_SESSION['clave']=$_REQUEST['clave'];
    }
    if (isset($_REQUEST['fe']) && !isset($_REQUEST['modificar'])) {
        $u=$_SESSION['user'];
        $c=$_SESSION['clave'];
        $t=$_REQUEST['titulo'];
        $tx=$_REQUEST['texto'];
        $fe=$_REQUEST['fe'];
        $us="INSERT INTO plan VALUES(NULL, '$u', '$c', '$t', '$tx', NULL, '$fe')";
        mysqli_query($conn, $us);
    }
    if (isset($_REQUEST['modificar'])) {
        $u=$_SESSION['user'];
        $c=$_SESSION['clave'];
        $t=$_REQUEST['titulo'];
        $tx=$_REQUEST['texto'];
        $fe=$_REQUEST['fe'];
        $us="UPDATE plan SET titulo='$t', texto='$tx', fechaentrega='$fe' WHERE idplan=".$_REQUEST['modificar'];
        mysqli_query($conn, $us);
    }
    if (isset($_REQUEST['e'])) {
        $eli="DELETE FROM plan WHERE idplan=".$_REQUEST['e'];
        mysqli_query($conn, $eli);
    }

    if (isset($_REQUEST['m'])) {
        $mo="SELECT * FROM plan WHERE idplan=".$_REQUEST['m'];
        $mq=mysqli_query($conn, $mo);
        $mplan=mysqli_fetch_assoc($mq);
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
		<form class="formulario" action="Plan.php" method="post" enctype="multipart/form-data">
			<center>
		<H1>Agregar Actividad</H1> <br>
        <div class="contenedor">
					<input type="text" name="titulo" 
                    <?php if (isset($_REQUEST['m'])) {echo "value'".$mplan['titulo']."'"; } ?> 
                    placeholder="TITULO" required> <br><br>
					<textarea name="texto" id="" cols="30" rows="10" placeholder="TEXTO" required>
                    <?php if (isset($_REQUEST['m'])) {echo $mplan['texto']; } ?></textarea> <br><br>
					<input type="date" name="fe" placeholder="FECHA DE ENTREGA"
                    <?php if (isset($_REQUEST['m'])) {echo "value'".$mplan['fechaentrega']."'"; } ?> 
                    required> <br><br>
                    <?php if (isset($_REQUEST['m'])) {echo "<input type='hidden' name='modificar' value='".$_REQUEST['m']."'>";} ?>
               <button  type="submit" class="button" 
                    <?php if (isset($_REQUEST['m'])) {echo "value'Guardar'"; }else{echo "value='Agregar'";} ?>>Agregar</button>
        </div>
           </center>
				</form>
				<?php 
						if ($mnr>0) {
							do {
                                echo "<hr>Fecha en la que se dejo: ".$aplan['fecha']."<br>";
								echo "<h2>".$aplan['titulo']."</h2>";
								echo "<h4>".$aplan['texto']."</h4>";
								echo "Fecha entrega: ".$aplan['fechaentrega']."<br>";
								echo "[<a href='Plan.php?e=".$aplan['idplan']."'>Eliminar Actividad</a>]\t";
								echo "[<a href='Plan.php?m=".$aplan['idplan']."'>Modificar Actividad</a>]";
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