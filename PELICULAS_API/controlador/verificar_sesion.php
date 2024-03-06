<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiendavirtual";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["usuario"];
    $contrasena = $_POST["contraseña"];

    $sql = "SELECT cli_id, cli_tipo_documento, cli_nro_documento, cli_nombre, cli_apellido, cli_telefono, cli_correo FROM clientes WHERE usuario='$correo' AND contraseña='$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        // Puedes almacenar información del usuario en sesiones o cookies si es necesario
        header("Location: ../vistas/inicio.php"); // Redirige a la página de inicio
        exit();
    } else {
        // Credenciales incorrectas
        echo 'Usuario o contraseña incorrectos';
    }
}

$conn->close();
?>