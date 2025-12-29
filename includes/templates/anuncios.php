<?php
require __DIR__ . '/../config/database.php';
$db = conectarDB();
$query = "SELECT * FROM propiedades LIMIT $limite;";
$resultado = mysqli_query($db, $query);

?>


<div class="contenedor-anuncios">
    <?php while ($propiedad = mysqli_fetch_assoc($resultado)) { ?>
        <div class="anuncio">
            <picture>
                <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="Anuncio">
            </picture>
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo'] ?></h3>
                <p><?php echo $propiedad['descripcion'] ?></p>
                <p class="precio">$<?php echo number_format($propiedad['precio']); ?></p>


                <ul class="iconos-caracteristicas">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="icono baño">
                        <p><?php echo $propiedad['wc'] ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono Playa">
                        <p><?php echo $propiedad['estacionamiento'] ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono Dormitorio">
                        <p><?php echo $propiedad['habitaciones'] ?></p>
                    </li>
                </ul>
                <a href="propiedad.php?id=<?php echo $propiedad['id']; ?>" class="botonAmarillo ">Ver Propiedad</a>
            </div>
        </div>
    <?php } ?>
</div>