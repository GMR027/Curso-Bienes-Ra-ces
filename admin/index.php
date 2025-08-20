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
  
  //Eliminar propiedad
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id) {
      //var_dump($id);
      $queryEliminarImagen = "SELECT imagen FROM propiedades WHERE id = $id";
      $resultadoEliminarImagen = mysqli_query($baseDatos, $queryEliminarImagen);
      $propiedad = mysqli_fetch_assoc($resultadoEliminarImagen);
      unlink('../imagenes/' . $propiedad['imagen']);
      //var_dump($propiedad['imagen']); Ver el valor que arroja la consulta

      $queryEliminarPropiedad = "DELETE FROM propiedades WHERE id = $id";
      echo $queryEliminarPropiedad;

      $resultadoEliminacion = mysqli_query($baseDatos, $queryEliminarPropiedad);
      if($resultadoEliminacion) {
        header('location: /admin?resultado=3');
      }
    } else {
      echo 'Error de id';
    }
  }


  //Incluye un template
  require '../includes/funciones.php';
  incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Administrador de bienes raices</h1> 

    <!-- Generador de alerta de propiedad creada -->
    <?php if(intval($mensajePropiedadCreada)=== 1 ): ?>  <!--intval sirve para que tome como igual el valor string del mensaje de header/admin -->
      <p class="alerta exito">Anuncio creado correctamente</p>
    <?php  elseif(intval($mensajePropiedadCreada) === 2 ): ?>
      <p class="alerta actualizacion">Anuncio Actualizado correctamente</p> 
    <?php elseif (intval( $mensajePropiedadCreada) === 3 ): ?>
      <p class="alerta exito">Anuncio Eliminado correctamente</p>
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
          <td> <!--Botones para eliminar o actualizar -->
            <form action="" method="POST" class="w-100">
              <input type="hidden" name="id" id="" value="<?php echo $propiedad['id']; ?>">
              <input type="submit" class="boton-rojo-block" value='Eliminar'> 
            </form>

            <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-azul-block">Actualizar</a>
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
