<?php 
    include('connect.php');
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location:index.html");
    }

    /*$user=mysql_query("SELECT * FROM usuario WHERE usuario='".$_SESSION['user']."'");
    $a=mysql_fetch_assoc($user);*/
    $user="SELECT * FROM usuarios WHERE usuario='".$_SESSION['user']."'";
    $res=mysqli_query($conn, $user);
    $a=mysqli_fetch_assoc($res);

    if (isset($_REQUEST['cerrar'])) {
        session_destroy();
        header("Location:index.html");   
    }
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> InteractivClass</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>

<body class="body">
    <nav class="navbar navbar-light" style="background-color: #acd8f6;">
        <table style="width:100%;">
          <tr>
            <td rowspan="3"><h1 class="c2"><img src="../img/icon.png" height="75" width="80"> InteractivClass</h1></td>
            <td width="9%" align="center"><?php echo "<img src='../fotos/".$_SESSION['user']."".$a['foto']."'height=50 width=50>"; ?></td>
          </tr>
          <tr align="center">
            <td width="9%"><h3><?php echo $a['nombre']; ?></h3></td>
          </tr>
          <tr align="center">
            <td width="9%"><a href="javascript:if (confirm('¿Quieres cerrar session?')) {parent.location='Alumnos.php?cerrar=1';};">Cerrar Sesion</a></td>
          </tr>
        </table>
    </nav>
    <br>
    <br>
    
        <div class="col mb-4">
            <div class="card">
                <p class="sub"><i class="fas fa-qrcode"></i>Clases</p>
                <div id="ocultable"><iframe src="UnirseClase.php" width="400" height="400"></iframe></div>
                
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js " integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js " integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI " crossorigin="anonymous "></script>

</body>

</html>