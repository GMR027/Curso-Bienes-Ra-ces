<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Contacto</h1>
    <picture>
      <source srcset="/build/img/destacada3.webp" type="imgae/webp">
      <source srcset="/build/img/destacada3.jpg" type="image/jpeg">
      <img src="/build/img/destacada3.jpg" alt="contacto" loading="lazy">
    </picture>

    <h2>Llene el formulario de contacto</h2>
    <form action="" class="formulario">
      <fieldset>
        <legend>Informacion personal</legend>

        <label for="nombre">Nombre</label>
        <input type="text" placeholder="Nombre" id="nombre">

        <label for="mail">E-mail</label>
        <input type="email" placeholder="Tu e-mail" id="mail">

        <label for="telefono">Telefono</label>
        <input type="tel" placeholder="Tu telefono" id="telefono">

        <label for="mensaje">Mensaje</label>
        <textarea name="" id="mensaje" placeholder="Tu mensaje"></textarea>
      </fieldset> <!--Informacion personal-->

      <fieldset>
        <legend>Informacion de la propiedad</legend>
        <label for="opciones">Vende o compra</label>
        <select name="" id="opciones">
          <option value="" disabled selected>--Seleccione--</option>
          <option value="compra">Compra</option>
          <option value="vende">Vende</option>
        </select>

        <label for="presupuesto">Presupuesto o precio</label>
        <input type="number" placeholder="$" id="presupuesto">
      </fieldset> <!--Informacion de compra venta-->

      <fieldset>
        <legend>Contacto</legend>
        <p>Como desea ser contactado</p>

        <div class="forma-contacto">
          <label for="contactar-telefono">Telefono</label>
          <input type="radio" value="telefono" id="contactar-telefono" name="contacto">

          <label for="contactar-email">Email</label>
          <input type="radio" value="email" id="contactar-email" name="contacto">
        </div>

        <p>Si eligio el telefono, elija la fecha y la hora</p>

        <label for="fecha">Fecha</label>
        <input type="date" placeholder="Fecha" id="fecha">

        <label for="hora">Hora</label>
        <input type="time" placeholder="hora" id="hora" min="09:00" max="18:00">
      </fieldset> <!--Informacion de contacto fecha y hora-->

      <input type="submit" value="Enviar" class="boton-verde">

    </form>
  </main>

   <?php incluirTemplate('footer');?>
