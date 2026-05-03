<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM productos";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de productos</title>
</head>
<body>

<h1>Listado de productos</h1>

<p>Usuario conectado: <?php echo $_SESSION["usuario"]; ?></p>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>

    <?php
    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila["id"] . "</td>";
            echo "<td>" . $fila["nombre"] . "</td>";
            echo "<td>" . $fila["precio"] . "</td>";
            echo "<td>" . $fila["stock"] . "</td>";
            echo "<td>";
            echo "<a href='editar_producto.php?id=" . $fila["id"] . "'>Editar</a> | ";
            echo "<a href='borrar_producto.php?id=" . $fila["id"] . "'>Borrar</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No hay productos registrados</td></tr>";
    }
    ?>
</table>

<br>
<a href="anadir_producto.php">Añadir producto</a>
<br><br>
<a href="panel.php">Volver al panel</a>

</body>
</html>
