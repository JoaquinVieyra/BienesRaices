<?php
if (!isset($_SESSION)){
    session_start();
}
$auth=$_SESSION['login']?? false; ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página base | Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header class="header <?php if ($inicio) echo 'inicio'; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img src="/build/img/logo.svg" alt="Logotipo BienesRaices" loading="lazy">
                </a>

                <div class="mobile-menu" id="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Abrir menú">
                </div>

                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="Cambiar modo oscuro" class="modo-noche">

                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if ($auth){ ?>
                        <a href="cerrarSesion.php">Cerrar Sesion</a>

                            <?php } ?>
                    </nav>
                </div>
            </div>
            <?php echo $inicio ? "<h1>Casa y departamentosexclusivos de Lujo</h1>": ""; ?>
        </div>
    </header>