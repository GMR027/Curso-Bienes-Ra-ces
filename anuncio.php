<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>


  <main class="contenedor seccion contenido-centrado">
    <h1>Casa en venta frente al bosque</h1>
    <picture>
      <source srcset="/build/img/destacada.webp" type="image/webp">
      <source srcset="/build/img/destacada.jpg" type="image/jpeg">
      <img src="/build/img/destacada.jpg" alt="imagen de propiedad" loading="lazy">
    </picture>

    <div class="resumen-propiedad">
      <p class="precio">$3,000,000</p>
      <ul class="iconos-caracteristicas">
          <li>
            <img src="/build/img/icono_wc.svg" alt="wc" loading="lazy">
            <p>3</p>
          </li>
          <li>
            <img src="/build/img/icono_estacionamiento.svg" alt="estacionamiento" loading="lazy">
            <p>3</p>
          </li>
          <li>
            <img src="/build/img/icono_dormitorio.svg" alt="dormitorio" loading="lazy">
            <p>4</p>
          </li>
        </ul>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, natus cupiditate est facere adipisci explicabo nulla sit soluta suscipit et mollitia excepturi perspiciatis eveniet ipsa quaerat quo! Consequatur, nobis asperiores.
        Adipisci id reprehenderit cumque facere velit ducimus omnis autem ex quis, odio eveniet minus saepe sapiente sed atque? Optio repellat enim ut nihil, tenetur unde omnis vero. Illum, vitae ab.
        Accusamus veniam dolore eligendi, quis quibusdam laudantium quisquam ipsam reiciendis quaerat voluptas asperiores beatae quam aspernatur nostrum sunt molestiae. Voluptas magnam et culpa reprehenderit beatae saepe voluptatum, non vitae iste?</p>
    </div>
  </main>

  <?php incluirTemplate('footer');?>