<?php
require_once '../modelo/database.php';
require_once '../modelo/clientes.php';

session_start();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>JASDAN PP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style_Inicio.css" rel="stylesheet">
    <link href="../imagenes/favicon.jpg" sizes="32x32" type="image/x-icon" rel="icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <header align="center"  >
        <h1 >PELIC PLUS JASDAN 2024</h1>
    </header>
    

    <nav>
        <a href="inicio.php"> <i class="btn btn-primary btn-lg active" role="button" aria-pressed="true">INICIO </i></a>

        <a href="../vistas/conexion_api.php?id"><i class="btn btn-primary btn-lg active" role="button" aria-pressed="true">CARGAR LOS DATOS DE API REST</a></i></a>

        <a href="../vistas/crud.php"> <i class="btn btn-primary btn-lg active" role="button" aria-pressed="true">CRUD DEL SISTEMA</a></i></a>

        <a href="../api_pel/index2.php"> <i class="btn btn-primary btn-lg active" role="button" aria-pressed="true">BUSCAR </i>
        

    </nav>


    <header>
       
    </header>

  
        

    <?php
    // Mostrar la alerta si se ha agregado un artículo
    if (isset($_SESSION['producto_agregado']) && $_SESSION['producto_agregado']) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Producto añadido al carrito. ¡Listo para comprar!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        // Reinicia la variable de sesión después de mostrar la alerta
        $_SESSION['producto_agregado'] = false;
    }
    ?>

    <div class="product-container">
        <?php
        $conexion = Conexion::obtenerConexion();
        $sql = "SELECT * FROM productos";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {

                echo '<article class="product-item">';
                echo '<a href="../vistas/detalle_producto1.php?id=' . $fila['id'] . '" >';
                echo '<img src="' . $fila['thumbnail'] . '" alt="">';
                echo '</a>';
                echo '<h4>' . $fila['title'] . '</h4>';
                echo '<p>Precio de la pelic : $' . $fila['price'] . '</p>';
                echo "<form method='post' action='../vistas/inicio.php'>";
                echo "<input type='hidden' name='producto_id' value='{$fila['id']}'>";
                echo "<button type='submit' name='agregar_carrito'>VER MAS</button>";
                echo "</form>";
                echo '</article>';
            }
        } else {
            echo 'No se encontraron productos.';
        }
        $conexion->close();
        ?>
    </div>

    <br>
    <footer>
        JASDAN  NIT 445523444
    </footer>
    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
 
</html>