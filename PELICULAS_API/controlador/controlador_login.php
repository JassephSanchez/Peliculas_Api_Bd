<?php

require_once '../modelo/modelo_login.php';

class SesionController
{
    private $modelo;

    public function __construct($modelo)
    {
        $this->modelo = $modelo;
    }

    public function procesarInicioSesion($nombreCliente, $contrasena)
    {
        // Obtener el usuario por nombre de usuario
        $clienteBD = $this->modelo->obtenerUsuarioPorNombre($nombreCliente);

        if ($clienteBD && password_verify($contrasena, $clienteBD['contraseña'])) {
            // Iniciar la sesión y redirigir al usuario
            session_start();
            $_SESSION['cli_id'] = $clienteBD['id'];
            $_SESSION['usuario'] = $clienteBD['usuario'];
            header("Location: ../Vista/inicio.php");
            exit();
        } else {
            // Credenciales incorrectas, redirigir a la página de inicio de sesión con un mensaje de error
            header("Location: ../Vista/login.php?error=1");
            exit();
        }
    }
}
