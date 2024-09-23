<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    // Comprobamos que se haya enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturamos los datos del formulario
        $nombre = $_POST['nombre'];
        $mail = $_POST['mail'];
        $contraseña = $_POST['contraseña'];
        $contraseña2 = $_POST['contraseña2'];

        // Comprobamos que las contraseñas coincidan
        if ($contraseña !== $contraseña2) {
        // Si no coinciden, mostramos un mensaje de error
        echo "Las contraseñas no coinciden. Por favor, inténtelo de nuevo.";
        } 
        else {
        // Si coinciden, conectamos con la base de datos
            $contraseña = test_input(data: $_POST["contraseña"]);
            $contraseña = md5(string: $contraseña);

            $conexion = mysqli_connect("localhost:3307", "root", "", "bddusuarios") or
            die("Problemas con la conexión");

            mysqli_query($conexion, "insert into usuarios(nombre,mail,contraseña) values 
                        ('$_POST[nombre]','$_POST[mail]','$contraseña')")
                        or die("Problemas en el select" . mysqli_error($conexion));

        mysqli_close($conexion);

        echo "El usuario fue registrado.";
        }
    }
    function test_input($data){
        $data = trim(string: $data);
        $data = stripslashes(string: $data);
        $data = htmlspecialchars(string: $data);
        return $data;
    }
  ?>
</body>
</html>