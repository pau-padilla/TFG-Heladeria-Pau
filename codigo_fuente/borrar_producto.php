<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM productos WHERE id=$id";
    $conexion->query($sql);
}

header("Location: productos.php");
exit();
?>
