<?php
session_start();
?>
<?php
if(isset($_SESSION['usuario'])){?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <h1>Bienvenido a la página <?=$_SESSION['usuario'];?>.</h1>
    </body>
    </html>
<?php
}
else{
    header("Location: Login2.html");
}

?>
