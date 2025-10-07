<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>
  <main class="contenedor seccion">
    <h1>Titulo anuncios</h1>
  </main>

<?php 
  $limite = 10;
  include 'includes/templates/anuncios.php'; 
    
?>

  <?php incluirTemplate('footer');?>
