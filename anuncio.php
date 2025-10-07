<?php
  require 'includes/funciones.php';
  incluirTemplate('header');

  require 'includes/config/database.php';
  $baseDatos = conectarBD();

  $idPropiedad = $_GET['idPropiedad'] ?? null;
  $idPropiedad = filter_var($idPropiedad, FILTER_VALIDATE_INT);
  echo $idPropiedad;

  //Consulta
  $cPropiedades = "SELECT * FROM propiedades WHERE id = $idPropiedad";
  $rcPropiedades = mysqli_query($baseDatos, $cPropiedades);
?>


  <main class="contenedor seccion contenido-centrado">
    <?php while($propiedad = mysqli_fetch_assoc($rcPropiedades)): ?>
    <h1><?php echo $propiedad['titulo']; ?></h1>
    <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagenPropiedad">

    <div class="resumen-propiedad">
      <p class="precio">$ <?php echo $propiedad['precio']; ?></p>
      <ul class="iconos-caracteristicas">
          <li>
            <img src="/build/img/icono_wc.svg" alt="wc" loading="lazy">
            <p><?php echo $propiedad['wc']; ?></p>
          </li>
          <li>
            <img src="/build/img/icono_estacionamiento.svg" alt="estacionamiento" loading="lazy">
            <p><?php echo $propiedad['estacionamiento']; ?></p>
          </li>
          <li>
            <img src="/build/img/icono_dormitorio.svg" alt="dormitorio" loading="lazy">
            <p><?php echo $propiedad['habitaciones']; ?></p>
          </li>
        </ul>

        <p><?php echo $propiedad['descripcion']; ?></p>
    </div>
    <?php endwhile; ?>
  </main>

  <?php 
  incluirTemplate('footer');
  mysqli_close($baseDatos);
  ?>