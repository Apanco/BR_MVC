<?php
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="/bienesraices_inicio/build/css/app.css">
</head>
<body>
    <header class="header inicio">
        <div class="contenido-header">
            <div class="barra">
                <div class="barra-fija">
                    <div class="contenido-barra contenedor">
                        <a href="/bienesraices_inicio/index.php" class="logo">
                            <img src="build/img/logo.svg" alt="Logo de bienes raices">
                        </a>
                        <nav class="navegacion fija">
                            <a href="nosotros.php">Nosotros</a>
                            <a href="anuncios.php">Anuncios</a>
                            <a href="blog.php">Blog</a>
                            <a href="contacto.php">Contacto</a>
                            <?php if($auth){
                                ?>
                                    <a class="boton-esp" href="/bienesraices_inicio/cerrar-sesion.php">Cerrar sesion</a>
                                <?php
                            } ?>
                            <div class="container">
                                <div class="toggle"></div>
                            </div>
                        </nav>
                        <div class="toggle-btn"><i class="fa-solid fa-bars"></i></div>
                    </div>
                    
                </div>
                <div class="menu-desplegable contenedor">
                    <nav class="navegacion">
                        <a href="nosotros.html">Nosotros</a>
                        <a href="anuncios.html">Anuncios</a>
                        <a href="blog.html">Blog</a>
                        <a href="contacto.html">Contacto</a>
                        <div class="container2">
                            <div class="toggle2"></div>
                        </div>
                    </nav>
                </div>
            </div>
            
            <div class="titulo-header">
                <h1>Venta de casas y departamentos exclusivos de lujo</h1>
            </div>
        </div>

    </header>