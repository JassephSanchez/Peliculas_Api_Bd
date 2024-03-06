<?php
require_once '../modelo/database.php';  // Ajusta la ruta según la ubicación de tu archivo
require_once '../Controlador/controladorCompra.php';
require_once '../modelo/modelo_detalle.php';

$Conexion = Conexion::obtenerConexion();
$Detalleproducto = new Detalleproducto($Conexion);
$id_producto = $_GET['id'];
$detalles = $Detalleproducto->obtenerProducto($id_producto);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style_detalle_producto.css">
    <title>Detalle del Reloj</title>
</head>

<body>

    <header>
        <div class="titulo">
            <h1>Detalle Producto</h1>
        </div>
        <nav>
            <a href="../vistas/inicio.php"><i class="bi bi-house" title="Productos"></i></a>
        </nav>
    </header>

    <?php
    // Mostrar la alerta si se ha agregado un artículo
    if (isset($_SESSION['articulo_agregado']) && $_SESSION['articulo_agregado']) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Artículo añadido al carrito. ¡Listo para comprar!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';

        // Reinicia la variable de sesión después de mostrar la alerta
        $_SESSION['articulo_agregado'] = false;
    }
    ?>

    <br><br>

    
    <div class="centered-card">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo $detalles['thumbnail']; ?>"  class="img-fluid rounded-start" >
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $detalles['title']; ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $detalles['price']; ?>
                        </p>
                        <form method='post' action='../vistas/inicio.php'>
                            <input type='hidden' name='id' value=<?php echo $detalles['id']; ?>>
                            <button type='submit' name='agregar_carrito'>Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <footer>
        PELIC PLUS JASDAN 2024
    </footer>


</body>

</html>