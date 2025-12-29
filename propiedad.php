<?php
require "includes/config/database.php";
$db=conectarDB();
require "includes/funciones.php";
$id= $_GET['id'];
$query= "SELECT * FROM propiedades WHERE id= $id;";
$resultado= mysqli_query($db,$query);
$propiedad=mysqli_fetch_assoc($resultado);

incluirTemplate('header') ?>
<main class="contenedor seccion contenido-centrado">
    <h1 class="tituloPropiedad"><?php echo $propiedad['titulo']; ?></h1>
    <div class="resumen-propiedad">
        <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de la propiedad">
    </picture>

        <p class="precio">$<?php echo number_format($propiedad['precio']); ?></p>

        <ul class="iconos-caracteristicas">
            <li>
                <img loading="lazy" src="build/img/icono_wc.svg" alt="Baños">
                <p><?php echo $propiedad['wc']; ?></p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Estacionamientos">
                <p><?php echo $propiedad['estacionamiento']; ?></p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="Dormitorios">
                <p><?php echo $propiedad['habitaciones']; ?></p>
            </li>
        </ul>

        <p class="propiedad-descripcion">
            <?php echo $propiedad['descripcion']; ?>
        </p>
    </div>
</main>

<?php 
incluirTemplate('footer')
 ?>