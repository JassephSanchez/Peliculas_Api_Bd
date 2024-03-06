<html>

<head>
    <title>VoleySport</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styleregistro.css" rel="stylesheet" type="text/css" />
    <link href="imagenes/favicon.jpg" sizes="32x32" type="image/x-icon" rel="icon" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</head>

<body>
    <form class="center" action="../controlador/guardar_registro.php" method="POST">

        <div class="txt_field">
            <select type="text" for="tipo_doc" name="form-select" aria-label="Default select example">
                <option selected>Nomero de documento</option>
                <option id="tipo_don" name="tipo_doc" value="TI">TI</option>
                <option id="tipo_don" name="tipo_doc" value="CC">CC</option>
            </select><br>
        </div>

        <div class="txt_field">
            <label for="numero_doc">Nomero de documento:</label><br>
            <input type="text" id="numero_doc" name="numero_doc" value="" required><br>
        </div>

        <div class="txt_field">
            <label for="nombre">Nombres:</label><br>
            <input type="text" id="nombre" name="nombre" value="" required><br>
        </div>

        <div class="txt_field">
            <label for="apellido">Apellidos:</label><br>
            <input type="text" id="apellido" name="apellido" value="" required><br>
        </div class="txt_field">

        <div class="txt_field">
            <label for="Telefono">Telefono:</label><br>
            <input type="text" id="telefono" name="telefono" value="" required><br>
        </div class="txt_field">

        <div class="txt_field">
            <label for="correo">correo:</label><br>
            <input type="text" id="correo" name="correo" value="" required><br>
        </div>

        <div class="txt_field">
            <label for="usuario">usuario:</label><br>
            <input type="text" id="suario" name="usuario" value="" required><br>
        </div>

        <div class="txt_field">
            <label for="contraseña">contraseña:</label><br>
            <input type="text" id="contraseña" name="contraseña" value="" required><br>
        </div>

        <div class="pass">
            <input href="login.php" class="boton" type="submit" value="registrar" onclick="">
        </div>

    </form>

</body>

</html>