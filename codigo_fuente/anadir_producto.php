<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    $sql = "INSERT INTO productos (nombre, precio, stock) VALUES ('$nombre', '$precio', '$stock')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: productos.php");
        exit();
    } else {
        $mensaje = "Error al añadir el producto";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir producto</title>
</head>
<body>

<h1>Añadir producto</h1>

<?php
if ($mensaje != "") {
    echo "<p>$mensaje</p>";
}
?>

<form method="POST">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" required><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" required><br><br>

    <button type="submit">Guardar producto</button>
</form>

<br>
<a href="productos.php">Volver al listado</a>

</body>
</html>
