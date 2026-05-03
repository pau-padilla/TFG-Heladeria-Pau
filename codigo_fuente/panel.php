<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel principal</title>
</head>
<body>
    <h1>Bienvenido al panel principal</h1>
    <p>Usuario conectado: <?php echo $_SESSION["usuario"]; ?></p>

    <br>
    <a href="productos.php">Ver productos</a>
    <a href="añadir_producto.php">Añadir producto</a>
</body>
</html>
