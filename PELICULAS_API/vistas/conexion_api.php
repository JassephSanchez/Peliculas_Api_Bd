<?php
require_once '../modelo/database.php';

$conn = Conexion::obtenerConexion();

// URL de la API de Mercado Libre
$url = "https://api.mercadolibre.com/sites/MLM/search?q=filtrar/peliculas/accion";


// Obtener datos de la API

$response = file_get_contents($url);

// Decodificar la respuesta JSON
$data = json_decode($response, true);

// Verificar si hay datos
if (!empty($data['results'])) {
  // Recorrer los datos y guardarlos en la base de datos
  foreach ($data['results'] as $item) {
    $titulo = isset($item['title']) ? $item['title'] : '';
    $precio = isset($item['price']) ? $item['price'] : '';
    $imagen = isset($item['thumbnail']) ? $item['thumbnail'] : '';

    // Insertar datos en la base de datos
    $sql = "INSERT INTO productos (title, price, thumbnail) 
    VALUES ('$titulo','$precio','$imagen')";



    if ($conn->query($sql) === TRUE) {
      echo "Datos insertados correctamente";
      header("Location: ../vistas/inicio.php");
    } else {
      echo "Error al insertar datos: " . $conn->error;
    }
  }
} else {
  echo "No se encontraron datos en la API";
}

// Cerrar conexión
$conn->close();

?>

