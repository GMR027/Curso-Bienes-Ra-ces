<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>
  <main class="contenedor seccion">
    <h1>Titulo anuncios</h1>
  </main>

  <section class="seccion contenedor">
  <h2>Casas y depas en venta</h2>
  
  <?php   
    $limite = 10;
      include 'includes/templates/anuncios.php'
    ?>

</section>

  <?php incluirTemplate('footer');?>
