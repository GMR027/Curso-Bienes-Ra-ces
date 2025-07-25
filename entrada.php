<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>

  <main class="contenedor seccion contenido-centrado">
    <h1>Guia para la decoracion de tu hogar</h1>

    <picture>
      <source srcset="/build/img/destacada2.webp" type="image/webp">
      <source srcset="/build/img/destacada2.jpg" type="image/jpeg">
      <img src="/build/img/destacada2.jpg" alt="imagen de propiedad" loading="lazy">
    </picture>

    <p class="info-meta">Escrito el: <span>14/07/2025</span> por: <span>Admin</span></p>

    <div class="resumen-propiedad">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, natus cupiditate est facere adipisci explicabo nulla sit soluta suscipit et mollitia excepturi perspiciatis eveniet ipsa quaerat quo! Consequatur, nobis asperiores.
      Adipisci id reprehenderit cumque facere velit ducimus omnis autem ex quis, odio eveniet minus saepe sapiente sed atque? Optio repellat enim ut nihil, tenetur unde omnis vero. Illum, vitae ab.
      Accusamus veniam dolore eligendi, quis quibusdam laudantium quisquam ipsam reiciendis quaerat voluptas asperiores beatae quam aspernatur nostrum sunt molestiae. Voluptas magnam et culpa reprehenderit beatae saepe voluptatum, non vitae iste?</p>
    </div>
  </main>

   <?php incluirTemplate('footer');?>
