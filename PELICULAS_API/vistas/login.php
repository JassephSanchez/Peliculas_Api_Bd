<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="imagenes/favicon.jpg" sizes="32x32" type="image/x-icon" rel="icon" />

  <title>INICIO</title>

  <link rel="stylesheet" href="../css/style_login.css">
</head>

<body>

<?php
    require_once '../controlador/controlador_login.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['username'];
        $contrasena = $_POST['password'];
    
        // Instancia de tu controlador
        $sesionController = new SesionController();
    
        // Llamada al método con los argumentos
        $sesionController->procesarInicioSesion($email, $contrasena);
    }
    ?>

    <?php
        // Recuperar el parámetro de la URL
    $errorInicioSesion = isset($_GET['error']) ? $_GET['error'] : '';

    // Mostrar mensaje según el parámetro
    if ($errorInicioSesion === '1') {
        echo '<p style="color: red;">Credenciales incorrectas. Inténtalo de nuevo.</p>';
    }
    ?>

  <?php
  session_start();
  // Verifica si hay una alerta de registro exitoso
  if (isset($_SESSION['registro_exitoso']) && $_SESSION['registro_exitoso']) {
    echo '<div class="alert alert-success" role="alert">
                Usuario registrado correctamente. ¡Bienvenido!
              </div>';

    // Reinicia la variable de sesión después de mostrar la alerta
    $_SESSION['registro_exitoso'] = false;
  }
  ?>
  <div class="center">
    <h1>Login</h1>
    <form action="../controlador/verificar_sesion.php" method="post">
      <div class="txt_field">
        <input type="text" id="usuario" name="usuario" required>
        <span></span>
        <label>usuario</label>
      </div>
      <div class="txt_field">
        <input type="password" id="contraseña" name="contraseña" required>
        <span></span>
        <label>contraseña</label>
      </div>
      <input type="submit" value="Iniciar sesion">
      <div class="signup_link">
        No posees una cuenta? <a href="../vistas/registrar.php">Registrarme</a>
      </div>
    </form>
  </div>

</body>

</html>