<?php
//Validar el id
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
//var_dump($id);

if(!$id) {
    header('Location: /admin');
  }


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
$consultaAnuncio = "SELECT * FROM propiedades WHERE id= $id";
$resultadoDeConsultaAnuncio = mysqli_query($baseDeDatos, $consultaAnuncio);
$anuncio = mysqli_fetch_assoc($resultadoDeConsultaAnuncio);
//var_dump($resultadoDeConsultaPropiedades);



  require 'includes/funciones.php';
  incluirTemplate('header');
?>


  <main class="contenedor seccion contenido-centrado">
    <h1><?php echo $anuncio['titulo'];  ?></h1>
    <img src="/imagenes/<?php echo $anuncio['imagen'];  ?>" alt="imagenAnuncio">

    <div class="resumen-propiedad">
      <p class="precio">$<?php echo $anuncio['precio'];  ?></p>
      <ul class="iconos-caracteristicas">
          <li>
            <img src="/build/img/icono_wc.svg" alt="wc" loading="lazy">
            <p><?php echo $anuncio['wc'];  ?></p>
          </li>
          <li>
            <img src="/build/img/icono_estacionamiento.svg" alt="estacionamiento" loading="lazy">
            <p><?php echo $anuncio['estacionamiento'];  ?></p>
          </li>
          <li>
            <img src="/build/img/icono_dormitorio.svg" alt="dormitorio" loading="lazy">
            <p><?php echo $anuncio['habitaciones'];  ?></p>
          </li>
        </ul>

       <p><?php echo $anuncio['descripcion'];  ?></p>
    </div>
  </main>

  <?php 
  incluirTemplate('footer');
  mysqli_close($baseDeDatos);
  ?>