<?php

  require '../includes/config/database.php';  //1. Importar la conexion a la base de datos
  $baseDatos = conectarBD();
  //var_dump($baseDatos);

  //2. validar la conexion
  // if($baseDatos) { 
  //   echo 'conexion exitosa';
  // } else {
  //   echo 'error en conexion';
  // }

  //3. Escribir el query
  $query = "SELECT * FROM propiedades";

  //4. Consultar la base de datos
  $listadoPropiedades = mysqli_query($baseDatos, $query);

  //Muestra mensaje de creacion de propiedad
  $mensajePropiedadCreada = $_GET['resultado'] ?? null; //validador ?? null en caso que no lo encuentre asigna null
  
  //Incluye un template
  require '../includes/funciones.php';
  incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Administrador de bienes raices</h1> 

    <!-- Generador de alerta de propiedad creada -->
    <?php if(intval($mensajePropiedadCreada)=== 1 ): ?>  <!--intval sirve para que tome como igual el valor string del mensaje de header/admin -->
      <p class="alerta exito">Anuncio creado correctamente</p>
    <?php endif;?>


    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>


    <table class="propiedades">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Imagen</th>
          <th>Precio</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody> <!--Mostrar las propiedades de la base de datos -->
        <?php while( $propiedad = mysqli_fetch_assoc($listadoPropiedades) ): ?>
        <tr>
          <td><?php echo $propiedad['id']; ?></td>
          <td><?php echo $propiedad['titulo']; ?></td>
          <td><img src='/imagenes/<?php echo $propiedad['imagen']; ?>' alt="imagen" class="imagen-tabla"></td>
          <td>$<?php echo $propiedad['precio']; ?></td>
          <td>
            <a href="" class="boton-rojo-block">Eliminar</a>
            <a href="" class="boton-azul-block">Actualizar</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </main>

  <?php 
    mysqli_close($baseDatos); //cerrar la conexion
    incluirTemplate('footer');
  ?>
