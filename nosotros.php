<?php  include './includes/templates/header.php' ?>

  <main class="contenedor seccion">
    <h1>Conoce sobre nosotros</h1>
    <section class="informacion-nosotros">
      <div class="imagen">
        <picture>
          <source srcset="/build/img/nosotros.webp" type="image/webp">
          <source srcset="/build/img/nosotros.jpg" type="image/jpeg">
          <img src="/build/img/nosotros.jpg" alt="nosotros" loading="lazy">
        </picture>
      </div>
      <div class="informacion">
        <h3>25 anios de experiencia</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi nam quas expedita aliquid odio animi dolorum sapiente autem corporis, aut praesentium suscipit earum provident impedit distinctio voluptates porro, temporibus ratione!
        Quisquam animi minima repudiandae, eius numquam, quasi vitae debitis rem commodi quo laudantium distinctio ut laboriosam quas voluptas eum nisi vel veritatis est perspiciatis! Veniam dolorem ipsam non atque repudiandae?</p>
      </div>
    </section>
  </main>

  <section class="contenedor seccion">
    <h1>Mas sobre nosotros</h1>
    <div class="iconos-sobreNosotros">

      <div class="icono">
        <img src="/build/img/icono1.svg" alt="icono seguridad" loading="lazy">
        <h3>Seguridad</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, dolorum. Maiores amet, ex quo iste pariatur illo neque tempore corrupti eaque qui ullam molestias tenetur, explicabo distinctio sequi voluptate cupiditate.</p>
      </div>

      <div class="icono">
        <img src="/build/img/icono2.svg" alt="icono precio" loading="lazy">
        <h3>Precio</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, dolorum. Maiores amet, ex quo iste pariatur illo neque tempore corrupti eaque qui ullam molestias tenetur, explicabo distinctio sequi voluptate cupiditate.</p>
      </div>

      <div class="icono">
        <img src="/build/img/icono3.svg" alt="icono tiempo" loading="lazy">
        <h3>Tiempo</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, dolorum. Maiores amet, ex quo iste pariatur illo neque tempore corrupti eaque qui ullam molestias tenetur, explicabo distinctio sequi voluptate cupiditate.</p>
      </div>
    </div>
  </section>

  <?php include './includes/templates/footer.php';?>
