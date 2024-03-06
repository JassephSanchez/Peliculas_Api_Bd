<?php
require_once '../modelo/database.php';

$conexion = Conexion::obtenerConexion();

$sql = "SELECT id, title, price, thumbnail FROM productos";
$result = $conexion->query($sql);

$productos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="../css/style_crud.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

  <header>
    <h1>JASDAN TIENDA VIRTUAL DE PC</h1>
  </header>

  <nav>
    <a href="inicio.php"><i class="btn btn-primary btn-lg active" role="button" aria-pressed="true">INICIO</a></i></a>
  </nav>
  <br><br><br>
    <div class="container">
        <a href="../procesoscrud/crear.php" class="btn btn-primary mb-3">PROD</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto["id"]; ?></td>
                        <td><?php echo $producto["title"]; ?></td>
                        <td><?php echo $producto["price"]; ?></td>
                        <td><img src="<?php echo $producto["thumbnail"]; ?>" alt="Imagen del producto" style="max-width: 100px; max-height: 100px;"></td>
                        <td>
                            <a href="../procesoscrud/editar.php?id=<?php echo $producto["id"]; ?>" ><i class="bi bi-pen" title="Editar"></i></a>
                            <a href="../procesoscrud/eliminar.php?id=<?php echo $producto["id"]; ?>"><i class="bi bi-trash3" title="Eliminar"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
