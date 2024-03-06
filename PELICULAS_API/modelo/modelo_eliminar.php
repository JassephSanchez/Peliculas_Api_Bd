<?php
require_once 'database.php';

$conexion = Conexion::obtenerConexion();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Eliminar el producto de la base de datos
    $sql = "DELETE FROM productos WHERE id = $id";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir a la página principal
        header("Location: ../vistas/crud.php");
        exit();
    } else {
        echo "Error al eliminar el producto: " . $conexion->error;
    }
} else {
    echo "Parámetro ID no especificado";
    exit();
}

$conexion->close();
?>
