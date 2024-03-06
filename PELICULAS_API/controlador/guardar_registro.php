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
    $tipo_doc = $_POST['form-select'];
    $numero_doc = $_POST['numero_doc'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $sql = "INSERT INTO clientes(cli_tipo_documento, cli_nro_documento, 
    cli_nombre, cli_apellido, cli_telefono, cli_correo, usuario, contraseña) 
    VALUES ('$tipo_doc','$numero_doc', '$nombre','$apellido','$telefono','$correo','$usuario','$contraseña')";
    $result = $conn->query($sql);

    
    if ($result) {
        header("Location: ../vistas/login.php"); // Redirige a la página de inicio
        exit();
    } else {
        // Credenciales incorrectas
        echo "no se pudo hacer el registro";
    }

}
