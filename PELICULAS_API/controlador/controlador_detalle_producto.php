<?php
require_once '../modelo/database.php';
require_once '../Modelo/modelo/producto_modelo.php';

// Obtener la conexión
$conexion = Conexion::obtenerConexion();

// Crear una instancia del modelo
$detalle = new detalle_producto($conexion);
$idProducto = $_GET['id'];

$detalle->obtenerProducto($idProducto);

$conexion->close();
?>