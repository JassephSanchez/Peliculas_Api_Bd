<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Eliminación</title>
    <link rel="stylesheet" href="../css/styles_crud.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <br><br><br>
    <div class="container">
        <h1>Confirmar Eliminación</h1>
        <p>¿Estás seguro de que deseas eliminar este producto?</p>
        <a href="../modelo/modelo_eliminar.php?id=<?php echo $_GET["id"]; ?>" style="background-color: azure; color:brown;" class="btn btn-secondary">Eliminar</a>
        <a href="../vistas/crud.php" style="background-color: azure; color:black;" class="btn btn-secondary">Cancelar</a>
    </div>
</body>
</html>
