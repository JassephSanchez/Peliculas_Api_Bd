<?php
require_once '../controlador/controlador_carrito.php';
require_once '../modelo/modelo_carrito.php';
require_once '../modelo/database.php';
require_once '../modelo/clientes.php';


// Crear una instancia del modelo (ajusta según tus necesidades)
$conexion = Conexion::obtenerConexion();

$modeloCarrito = new CarritoModelo($conexion);
$carritoController = new CarritoControlador($modeloCarrito);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica si el usuario ha iniciado sesión antes de acceder a $_SESSION['cli_id']
$cliente_id = isset($_SESSION['cli_id']) ? $_SESSION['cli_id']: false;

// Eliminar producto del carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_producto'])) {
    $producto_id = $_POST['id'];
    $cliente_id = $_SESSION['cli_id'];
    $carritoController->eliminarProducto($producto_id, $cliente_id);
}

// Verifica si $_SESSION['cli_id'] está definido antes de usarlo
if ($cliente_id !== false) {
    $result_carrito = $carritoController->obtenerProductos($cliente_id);
} else {
    // Puedes redirigir al usuario a la página de inicio de sesión si no ha iniciado sesión
    header("Location: ../vistas/login.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_detalle_producto.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Carrito de Compras</title>
</head>

<body>

    <header>
        <nav class="inicio-sesion">
            <?php
            // Verifica si el cliente ha iniciado sesión antes de mostrar el enlace de cerrar sesión
            if (isset($_SESSION['cli_id'])) {
                $nombreCliente = Clientes::obtenerNombreCliente($_SESSION['cli_id']);

                echo '<p>Bienvenido, ' . $nombreCliente . '!</p>';
                echo '<form method="post" action="../vistas/carrito.php">';
                echo '<button type="submit" name="cerrar_sesion">Cerrar Sesión</button>';
                echo '</form>';
            } else {
                echo '<a href="../vistas/login.php">Iniciar Sesión</a>';
            }
            ?>
        </nav>
    </header>


    <header>
        <h1>Carrito de Compras</h1>
    </header>

    <nav>
        <a href="../vistas/inicio.php" ><i class="bi bi-house"></i>Productos</a>
    </nav>



    <div class="product-container">
        <?php

        $total = 0;

        if ($result_carrito->num_rows > 0) {
            echo '<table class="cart-table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Producto</th>';
            echo '<th>Precio</th>';
            echo '<th>Cantidad</th>';
            echo '<th>Acciones</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($fila_carrito = $result_carrito->fetch_assoc()) {
                echo '<tr>';
                echo '<td><img src="' . $fila_carrito['thumbnail'] . '" alt="' . $fila_carrito['ttitle'] . '"></td>';
                echo '<td>';
                echo '<h2>' . $fila_carrito['title'] . '</h2>';
                echo '<p>' . $fila_carrito['price'] . '</p>';
                echo '</td>';
                echo '<td>1</td>'; // Puedes ajustar la cantidad según lo que tengas en tu base de datos
                echo '<td>';
                echo "<form method='post' action='../vistas/carrito.php'>";
                echo "<input type='hidden' name='id' value='{$fila_carrito['id']}'>";
                echo "<button type='submit' name='eliminar_producto'>Eliminar</button>";
                echo '</form>';
                echo '</td>';
                echo '</tr>';

                // Sumar el precio del artículo al total
                $total += $fila_carrito['price'];
            }
            // Mostrar el total al final de la tabla
            echo '<tr>';
            echo '<td colspan="3"></td>';
            echo '<td style="background-color: #222;"><strong style="color: #fff;">Total:</strong></td>';
            echo '<td>$' . $total . '</td>';
            echo '</tr>';

            echo '</tbody>';
            echo '</table>';
        } else {
            echo 'El carrito está vacío.';
        }

        ?>
    </div>

    <form id="paypal-form" action="guardar_compra.php" method="POST">
        <!-- Campos del formulario para el pago con PayPal -->
        <input type="hidden" name="cli_id" value="<?php echo $usuario_id; ?>">
        <input type="hidden" name="total" value="<?php echo $total; ?>">
        <div id="paypal-button-container"></div>
    </form>

    <script src="https://www.paypal.com/sdk/js?client-id=AczLWQmXrstvhBWxHtycWYPXuIrVtxP23eEUQ3-dHSiNfFuavUNsGDTSqdJJotLO4LZNE2bUbuBpK8zD&currency=USD"
        data-sdk-integration-source="button-factory">
    </script>
    
    <script>
        paypal.Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total; ?>'
                        }
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    // Llamada AJAX para guardar la compra en la base de datos
                    $.ajax({
                        url: 'guardar_compra.php',
                        type: 'POST',
                        data: {
                            usuario_id: '<?php echo $usuario_id; ?>',
                            total: '<?php echo $total; ?>'
                        },
                        success: function (response) {
                            alert('Compra guardada en la base de datos');
                            // Redirigir a la página de confirmación o agradecimiento
                            window.location.href = 'confirmacion.php';
                        },
                        error: function (xhr, status, error) {
                            alert('Error al guardar la compra en la base de datos');
                            console.error(error);
                        }
                    });
                });
            },
            onError: function (err) {
                console.error(err);
                alert('Ocurrió un error durante el proceso de pago con PayPal');
            }
        }).render('#paypal-button-container');
    </script>







    <footer>
        <p>&copy; JASDAM PELIC PLUS 2024</p>
    </footer>
</body>

</html>