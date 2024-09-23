<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    $ipServidor="localhost:3307";
    $userName="root";
    $DBpass="";
    $DBname="bddusuarios";
    $conexion = mysqli_connect($ipServidor,$userName,$DBpass,$DBname);

    if ($conexion->connect_error) {
        die("Conexion fallida");
    }
    
    $usuario=$_POST['usuario'];
    $contraseña=md5($_POST['contraseña']);
    
    $sql = "SELECT nombre, contraseña FROM usuarios WHERE nombre = '$usuario' AND contraseña = '$contraseña'";
    $result = $conexion->query($sql);

    if($result->num_rows > 0){
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
    }
    else{
        header("Location: Login2.html");

    }
    
    mysqli_close($conexion);
    ?>

</body>
</html>