<?php
require_once 'database.php';

$conexion = Conexion::obtenerConexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["title"];
    $precio = $_POST["price"];

    // Actualizar el producto en la base de datos
    $sql = "UPDATE productos SET title = '$nombre', price = '$precio' WHERE id = $id";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir a la página principal
        header("Location: ../vistas/crud.php");
        exit();
    } else {
        echo "Error al actualizar el producto: " . $conexion->error;
    }
}

$conexion->close();
?>
