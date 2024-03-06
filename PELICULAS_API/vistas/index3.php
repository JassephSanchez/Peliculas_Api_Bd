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
        <a href="../vistas/inicio.php"> <i class="btn btn-primary btn-lg active" role="button" aria-pressed="true">INICIO </i></a>

        <a href="../vistas/conexion_api.php?id"><i class="btn btn-primary btn-lg active" role="button" aria-pressed="true">CARGAR LOS DATOS DE API REST</a></i></a>

        <a href="../vistas/crud.php"> <i class="btn btn-primary btn-lg active" role="button" aria-pressed="true">CRUD DEL SISTEMA</a></i></a>

        <a href="../api_pel/index.html"> <i class="btn btn-primary btn-lg active" role="button" aria-pressed="true">BUSCAR  </i></a>

        

    </nav>


    
    <main align="center" >
        <form id="form-id">
            <input type="text" placeholder="BUSCAR..." id="search-tab">
            <button type="submit" id="search-btn" value="movie">BUSCAR PELICULA</button>
        </form>
        <div id="movie-list">
         

        </div>
     </main>
    
<script src="index.js" type="module"></script>

    <footer>
        JASDAN  NIT 445523444
    </footer>
    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
 
</html>