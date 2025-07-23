<?php
  $inicio = true; //esta variable esta solo en index por ende solo es activo en esta pagina
  include './includes/templates/header.php' 
?>


  <main class="contenedor seccion">
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
  </main>

  <section class="seccion contenedor">
    <h2>Casas y depas en venta</h2>
    <div class="contenedor-anuncios">


      <div class="anuncio">
        <picture>
          <source srcset="build/img/anuncio1.webp" type="image/webp">
          <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
          <img src="build/img/anuncio1.jpg" alt="anuncio" loading="lazy">
        </picture>

        <div class="contenido-anuncio">
          <h3>Casa de lujo en el lago</h3>
          <p>Casa de lujo en excelente vista, acabados de lujo a un excelente precio</p>
          <p class="precio">$3,000,000</p>


          <ul class="iconos-caracteristicas">
            <li>
              <img src="build/img/icono_wc.svg" alt="wc" loading="lazy">
              <p>3</p>
            </li>
            <li>
              <img src="build/img/icono_estacionamiento.svg" alt="estacionamiento" loading="lazy">
              <p>3</p>
            </li>
            <li>
              <img src="build/img/icono_dormitorio.svg" alt="dormitorio" loading="lazy">
              <p>4</p>
            </li>
          </ul>

          <a href="/pages/anuncio.php" class="boton boton-amarillo"> Ver propiedad</a>
        </div><!--Contenido Anuncio-->
      </div><!--Anuncio-->

      <div class="anuncio">
        <picture>
          <source srcset="build/img/anuncio2.webp" type="image/webp">
          <source srcset="build/img/anuncio2.jpg" type="image/jpeg">
          <img src="build/img/anuncio2.jpg" alt="anuncio" loading="lazy">
        </picture>

        <div class="contenido-anuncio">
          <h3>Casa terminados de lujo</h3>
          <p>Casa de lujo en excelente vista, acabados de lujo a un excelente precio</p>
          <p class="precio">$3,000,000</p>


          <ul class="iconos-caracteristicas">
            <li>
              <img src="build/img/icono_wc.svg" alt="wc" loading="lazy">
              <p>3</p>
            </li>
            <li>
              <img src="build/img/icono_estacionamiento.svg" alt="estacionamiento" loading="lazy">
              <p>3</p>
            </li>
            <li>
              <img src="build/img/icono_dormitorio.svg" alt="dormitorio" loading="lazy">
              <p>4</p>
            </li>
          </ul>

          <a href="/pages/anuncio.php" class="boton boton-amarillo"> Ver propiedad</a>
        </div><!--Contenido Anuncio-->
      </div><!--Anuncio-->

      <div class="anuncio">
        <picture>
          <source srcset="build/img/anuncio3.webp" type="image/webp">
          <source srcset="build/img/anuncio3.jpg" type="image/jpeg">
          <img src="build/img/anuncio3.jpg" alt="anuncio" loading="lazy">
        </picture>

        <div class="contenido-anuncio">
          <h3>Casa con alberca</h3>
          <p>Casa de lujo en excelente vista, acabados de lujo a un excelente precio</p>
          <p class="precio">$3,000,000</p>


          <ul class="iconos-caracteristicas">
            <li>
              <img src="build/img/icono_wc.svg" alt="wc" loading="lazy">
              <p>3</p>
            </li>
            <li>
              <img src="build/img/icono_estacionamiento.svg" alt="estacionamiento" loading="lazy">
              <p>3</p>
            </li>
            <li>
              <img src="build/img/icono_dormitorio.svg" alt="dormitorio" loading="lazy">
              <p>4</p>
            </li>
          </ul>

          <a href="/pages/anuncio.php" class="boton boton-amarillo"> Ver propiedad</a>
        </div><!--Contenido Anuncio-->
      </div><!--Anuncio-->


    </div><!--Contenedor de anuncios-->

    <div class="alinear-derecha">
      <a href="anuncios.php" class="boton-verde">Ver todas</a>
    </div>
  </section>

  <section class="imagen-contacto">
    <h2 class="h2">Encuentra la casa de tus suenos</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nemo, sit delectus fuga quae beatae nesciunt quibusdam consequuntur ut molestiae expedita odio nobis autem eum illo, ea doloremque modi dolore?</p>
    <a href="contacto.php" class="boton-amarillo-corto">Contactanos</a>
  </section>

  <div class="contenedor seccion seccion-inferior">
    <seccion class="blog">
      <h3>Nuestro blog</h3>

      <article class="entrada-blog">
        <div class="imagen">
          <picture>
            <source srcset="build/img/blog1.webp" type="image/webp">
            <source srcset="build/img/blog1.jpg" type="image/jpg">
            <img src="build/img/blog1.jpg" alt="texto entrada blog" loading="lazy">
          </picture>
        </div>

        <div class="texto-entrada">
          <a href="/pages/entrada.php">
            <h4>Terraza en el techo de tu casa</h4>
            <p class="info-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span> </p>
            <p>Consejos para construir una terraza en el techo de tu casa</p>
          </a>
        </div>
      </article>

      <article class="entrada-blog">
        <div class="imagen">
          <picture>
            <source srcset="build/img/blog2.webp" type="image/webp">
            <source srcset="build/img/blog2.jpg" type="image/jpg">
            <img src="build/img/blog2.jpg" alt="texto entrada blog" loading="lazy">
          </picture>
        </div>

        <div class="texto-entrada">
          <a href="/pages/entrada.php">
            <h4>Guia para la decoracion de tu hogar</h4>
            <p class="info-meta">Escrito el: <span>23/10/2025</span> por: <span>Admin</span> </p>
            <p>Consejos para decorar tu casa con estillo</p>
          </a>
        </div>
      </article>
    </seccion>
    <section class="testimoniales">
      <h3>Testimoniales</h3>
      <div class="testimonial">
        <blockquote>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum ab quo voluptatem. Provident excepturi at libero maiores dignissimos corrupti quibusdam consectetur odio tempora tempore, rerum, similique, laborum fuga nobis nemo?
        </blockquote>
        <p>Edgar Guzman</p>
      </div>
    </section>
  </div> <!--Entrada de blogs-->

  <?php include './includes/templates/footer.php';?>