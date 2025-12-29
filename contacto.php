<?php
require "includes/funciones.php";

incluirTemplate('header') ?>
    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="img/webp">
            <source srcset="build/img/destacada3.jpg" type="img/jpef">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen form">
        </picture>
        <h2>Llena el formulario</h2>
        <form action="" class="formulario">
            <fieldset>
                <legend>Informacion Personal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre">
                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu email" id="email">
                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu telefono" id="telefono">
                <label for="mensaje">Mensaje</label>
                <textarea name="" id="mensaje"></textarea>
            </fieldset>
            <fieldset>
                <legend>Informacion de la propiedad</legend>
                <label for="opciones">Vende o Compra</label>
                <select name="" id="opciones">
                    <option value="" selected disabled>--SELECCIONA--</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>
                <label for="presupuesto">Tu presupuesto</label>
                <input type="number" placeholder="Tu presupuesto" id="presupuesto">
            </fieldset>


            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">
                    <label for="contactar-email">E-Mail</label>
                    <input name="contacto" type="radio" value="E-Mail" id="contactar-email">
                </div>
                <p>Si eligió telefono elija fecha y hora para contactar</p>
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">
                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="18:00">
            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

<?php 
incluirTemplate('footer')
 ?>