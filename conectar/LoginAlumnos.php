<?php 
    include('connect.php');
    session_start();
    if (isset($_SESSION['user'])) {
        header("Location:Alumnos.php");
    }
    if (isset($_REQUEST['u']) && !empty($_REQUEST['u'])) {
        $u=$_REQUEST['u'];
        $p=$_REQUEST['p'];/*
        $siesta=mysqli_num_rows(mysql_query("SELECT * FROM usuarios WHERE usuario='$u' AND password='$p'"));
        if ($siesta==1) {
            $_SESSION['user']=$u;
            header("Location:Alumnos.php");
        }else{
            echo'<script type="text/javascript">
        alert("Usuario o Contraseña incorrecta");
        </script>';
        }*/
        $into="SELECT * FROM usuarios WHERE usuario='$u' AND password='$p'";
        $mq=mysqli_query($conn, $into);
        $esta=mysqli_num_rows($mq);
            if ($esta==1) {
                $_SESSION['user']=$u;
                header("Location:Alumnos.php");
            }else{
                echo'<script type="text/javascript">
                alert("Usuario o Contraseña incorrecta");
                </script>';
            }
    }
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="UTF-8">
    <title>Login Alumnos</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">


</head>

<script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>

<body class="body">
    <form class="formulario" action="LoginAlumnos.php" method="post">
        <h1>Iniciar Sesión</h1>
        <div class="contenedor">
            <div class="input-contenedor">
                <i class="fas fa-envelope icon"></i>
                <input type="text" name="u" placeholder="Correo Electronico" required>
            </div>
            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input type="password" name="p" placeholder="Contraseña" required>
            </div>
            <br>
            <input type="submit" value="Ingresar" class="button">
            <br><br>
            <p>¿No tienes una cuenta? <a class="link" href="RegistroAlumnos.php">Registrate </a></p>
        </div>
        <div class="card text-dark text-center ">
            <p class="t9">@InteractivClass|2020</p>
    </div>
        
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js " integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js " integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI " crossorigin="anonymous "></script>
    
</body>

</html>