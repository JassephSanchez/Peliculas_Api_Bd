<?php
require_once '../modelo/database.php';
require_once '../modelo/producto_modelo.php';

// Obtener la conexión
$conexion = Conexion::obtenerConexion();

// Crear una instancia del modelo
$detalle_Producto = new detalle_producto($conexion);
// Recuperar el ID del reloj desde la URL
$producto_id = $_GET['prod_id'];

// Llamar a la función del modelo para obtener detalles del reloj
$detalle_Producto->obtenerProducto($producto_id);

// Cerrar la conexión
$conexion->close();
?>