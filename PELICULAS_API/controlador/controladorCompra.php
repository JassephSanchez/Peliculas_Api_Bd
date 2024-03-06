<?php
require_once '../modelo/clientes.php';
require_once '../modelo/database.php';

// Iniciar la sesión
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['agregar_carrito'])) {
        if (!isset($_SESSION['cli_id'])) {
            header("Location: ../vistas/login.php");
            exit();
        }

        $producto_id = $_POST['prod_id'];
        $cliente_id = $_SESSION['cli_id'];
        $carrito_cantidad = 1;

        $conexion = Conexion::obtenerConexion();
        $query = "INSERT INTO carrito (prod_id, cli_id, car_cantidad) VALUES ('$producto_id', '$cliente_id', '$carrito_cantidad')";

        if ($conexion) {
            mysqli_query($conexion, $query);
            $_SESSION['producto_agregado'] = true;
        } else {
            echo "Error de conexión a la base de datos.";
        }
    }
}
?>