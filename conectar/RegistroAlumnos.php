<?php 
    include('connect.php');
    session_start();
    if (isset($_SESSION['user'])) {
        header("Location:Alumnos.php");
    }
    if (isset($_REQUEST['user']) && !empty($_REQUEST['user'])) {
        $u=$_REQUEST['user'];
        $p=$_REQUEST['pass'];
        $n=$_REQUEST['nombre'];
        $f=$_FILES['foto']['name'];
        $t=$_REQUEST['tipo'];
        /*
        $checar=mysqli_num_rows(mysqliquery("SELECT * FROM usuarios WHERE usuario='".$u));
        if ($checar==1) {
            echo "Ya estas registrado en la base de datos";
        }else{
            mysql_query("INSERT INTO usuarios VALUES('$u','$p','$n','$f','$t')");
            move_uploaded_file($FILES['foto']['tmp_name'], "archivos/".$u.$f);
            header("Location:LoginAlumnos.php");
        }*/
            $us="SELECT * FROM usuarios WHERE usuario='".$u;
            $mq=mysqli_query($conn, $us);
            $checar=mysqli_num_rows($mq);
            if ($checar==1) {
                echo'<script type="text/javascript">
                alert("Este correo ya estas registrado");
                </script>';
            }else{
                $inus="INSERT INTO usuarios VALUES('$u','$p','$n','$f','$t')";
                mysqli_query($conn, $inus);
                move_uploaded_file($_FILES['foto']['tmp_name'], "../fotos/".$u.$f);
                header("Location:LoginAlumnos.php");
            }
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro Alumnos</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">


</head>

<script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>

<body class="body">
    <form class="formulario" action="RegistroAlumnos.php" method="post" enctype="multipart/form-data">
        <h1>Registrate</h1>
        <div class="contenedor">
            <div class="input-contenedor">
                <i class="fas fa-user icon"></i>
                <input type="text" name="nombre" placeholder="Nombre Completo" required>
            </div>

            <div class="input-contenedor">
                <i class="fas fa-envelope icon"></i>
                <input type="text" name="user" placeholder="Correo Electronico" required>
            </div>
            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input type="password" name="pass" placeholder="Contraseña" required>
            </div><!--
            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input type="password" name="rpass" placeholder="Repite contraseña" required>
            </div>-->
                <input type="file" name="foto" required>
                <select type="tipo" name="tipo">
                <option value="alumno">Alumno</option>
            </select>
            <br>
               <input type="hidden"  value="agregarmaestro"  name="valor">
               <button  type="subimet" class="button">Registrar</button>
            <br>
            <br>
            <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
            <p>¿Ya tienes una cuenta? <a class="link" href="LoginAlumnos.php"> Iniciar Sesion</a></p>
            
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