<?php
$conexion = new mysqli("localhost", "heladeriauser", "heladeria123", "heladeria");
if ($conexion->connect_error) {
    die("Error de conexion: " . $conexion->connect_error);
}
?>

