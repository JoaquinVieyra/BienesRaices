<?php
require "includes/funciones.php";

incluirTemplate('header',$inicio=true) ?>
    <main class="contenedor seccion">
        <h2>Más sobre nosotros</h2>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono1" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis cum iure repellendus. Omnis itaque
                    aspernatur, ut adipisci, magnam autem voluptatem alias dolor molestias sed qui minima recusandae
                    quasi quo obcaecati!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono2" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis cum iure repellendus. Omnis itaque
                    aspernatur, ut adipisci, magnam autem voluptatem alias dolor molestias sed qui minima recusandae
                    quasi quo obcaecati!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono3" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis cum iure repellendus. Omnis itaque
                    aspernatur, ut adipisci, magnam autem voluptatem alias dolor molestias sed qui minima recusandae
                    quasi quo obcaecati!</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Departamentos en Venta</h2>
        <?php
        $limite=3;
         include 'includes/templates/anuncios.php' ?>
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="botonAmarillo">Contactános</a>
    </section>


<?php 
incluirTemplate('footer')
 ?>
