<?php
require "includes/funciones.php";

incluirTemplate('header') ?>
    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="Imagen nosotros" loading="lazy">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>25 años de experiencia</blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores a laborum cumque facilis tempora dignissimos ut id delectus magnam, ullam autem officiis error fugiat rem animi dicta? Velit, iure expedita?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat dolorum alias eius illo aut quas vitae, praesentium impedit eum architecto commodi amet totam! Eum, impedit omnis! Minima fugiat possimus aliquam!</p>
            </div>
        </div>
    </main>
    <section class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1>
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
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis cum iure repellendus. Omnis itaque
                    aspernatur, ut adipisci, magnam autem voluptatem alias dolor molestias sed qui minima recusandae
                    quasi quo obcaecati!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono3" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis cum iure repellendus. Omnis itaque
                    aspernatur, ut adipisci, magnam autem voluptatem alias dolor molestias sed qui minima recusandae
                    quasi quo obcaecati!</p>
            </div>

        </div>
    </section>

<?php 
incluirTemplate('footer')
 ?>