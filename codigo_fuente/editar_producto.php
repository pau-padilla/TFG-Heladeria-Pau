<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET["id"])) {
    header("Location: productos.php");
    exit();
}

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    $sql = "UPDATE productos SET nombre='$nombre', precio='$precio', stock='$stock' WHERE id=$id";

    if ($conexion->query($sql) === TRUE) {
        header("Location: productos.php");
        exit();
    } else {
        $error = "Error al actualizar el producto";
    }
}

$sql = "SELECT * FROM productos WHERE id=$id";
$resultado = $conexion->query($sql);
$producto = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>
</head>
<body>

<h1>Editar producto</h1>

<?php
if (isset($error)) {
    echo "<p>$error</p>";
}
?>

<form method="POST">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required><br><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" value="<?php echo $producto['stock']; ?>" required><br><br>

    <button type="submit">Guardar cambios</button>
</form>

<br>
<a href="productos.php">Volver al listado</a>

</body>
</html>
