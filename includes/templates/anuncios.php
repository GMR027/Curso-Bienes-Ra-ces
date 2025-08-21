<?php 
//Importar la conexion
require './includes/config/database.php';
$baseDeDatos = conectarBD();


//consultar
if($baseDeDatos) {
  //echo 'Se ha conectado correctamente a la base de datos';
  //var_dump($baseDeDatos);
} else {
  echo 'Error en la conexion';
}


//leer los resultados
$consultaPropiedades = "SELECT * FROM propiedades LIMIT $limite";
$resultadoDeConsultaPropiedades = mysqli_query($baseDeDatos, $consultaPropiedades);
//var_dump($resultadoDeConsultaPropiedades);


?>


<div class="contenedor-anuncios">
  <?php while ($anuncio = mysqli_fetch_assoc($resultadoDeConsultaPropiedades)) : ?>
    <!-- <?php var_dump($anuncio); ?>  -->
  <?php 
  $imagen = $anuncio['imagen']; 
  ?>

  <div class="anuncio">
    <img src="/imagenes/<?php echo $imagen ?>" alt="anuncio">

    <div class="contenido-anuncio">
      <h3><?php echo $anuncio['titulo'];?></h3>
      <p><?php echo $anuncio['descripcion'];?></p>
      <p class="precio">$ <?php echo $anuncio['precio'];?></p>


      <ul class="iconos-caracteristicas">
        <li>
          <img src="build/img/icono_wc.svg" alt="wc" loading="lazy">
          <p><?php echo $anuncio['wc'];?></p>
        </li>
        <li>
          <img src="build/img/icono_estacionamiento.svg" alt="estacionamiento" loading="lazy">
          <p><?php echo $anuncio['estacionamiento'];?></p>
        </li>
        <li>
          <img src="build/img/icono_dormitorio.svg" alt="dormitorio" loading="lazy">
          <p><?php echo $anuncio['habitaciones'];?></p>
        </li>
      </ul>

      <a href="/anuncio.php?id=<?php echo $anuncio['id']; ?>" class="boton boton-amarillo"> Ver propiedad</a>
    </div><!--Contenido Anuncio-->
  </div><!--Anuncio-->
  <?php endwhile; ?>
</div>


<!-- Cerrar la conexion-->
 <?php
  mysqli_close($baseDeDatos);
 ?>
