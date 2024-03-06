<?php
require_once '../modelo/database.php';

$conexion = Conexion::obtenerConexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["title"];
    $precio = $_POST["price"];
    $imagen = $_POST["thumbnail"];

    // Insertar el nuevo producto en la base de datos
    $sql = "INSERT INTO productos (title, price, thumbnail) VALUES ('$nombre', '$precio','$imagen')";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir a la página principal
        header("Location: ../vistas/crud.php");
        exit();
    } else {
        echo "Error al agregar el producto: " . $conexion->error;
    }
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="../css/style_crear.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

  <header>
    <h1>VoleySport</h1>
  </header>

  <nav>
    <a href="../vistas/inicio.php">Productos</a>
  </nav>
  <br><br><br>


    <div class="container">
        <h1>Agregar Producto</h1>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $producto["id"]; ?>">
            <div class="form-group">
                <label for="title">Nombre:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="price">Precio:</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="thumbnail">Imagen:</label>
                <br>
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="../crud.php" class="btn btn-secondary">Atras</a>
        </form>
    </div>
    <br><br><br>
</body>
</html>
