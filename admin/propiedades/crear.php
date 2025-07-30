<?php
  //Base de datos
  require '../../includes/config/database.php';
  $baseDatos = conectarBD();
  // var_dump($baseDatos); para ver la informacion de la conexion

  // echo "<pre>";
  // var_dump($_POST); $_GET, $_SERVER similar
  // echo "</pre>"; forma de ver los datos

  if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    echo "<pre>";
    var_dump($_POST); 
    echo "</pre>"; //forma de ver los datos
    echo 'Es un metodo de respuesta POST';

    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
  }
  

  require '../../includes/funciones.php';
  incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin/index.php" class="boton boton-verde">Regresar</a>

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php">  <!-- Get para cuando se requiera ver datos en la barra nav y POST para no mostrarlos -->
      <fieldset>
        <legend>Informacion general de propiedad</legend>

        <label for="titulo">Nombre propiedad</label>
        <input type="text" name="titulo" id="titulo" placeholder="Ingresar nombre">

        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" placeholder="Precio">

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="descripcion"></textarea>
      </fieldset>

      <fieldset>
        <legend>Informacion de la propiedad</legend>
        <label for="habitaciones">Habitaciones</label>
        <input type="number" name="habitaciones" id="habitaciones" placeholder="Habitaciones" min="1" max="9">

        <label for="sanitarios">Sanitarios</label>
        <input type="number" name="sanitarios" id="sanitarios" placeholder="Sanitarios">

        <label for="estacionamientos">Estacionamientos</label>
        <input type="number" name="estacionamientos" id="estacionamientos" placeholder="Estacionamientos">

      </fieldset>

      <fieldset>
        <legend>Vendedor</legend>
        <select name="" id="">
          <option value="1">Edgar</option>
          <option value="2">Elvira</option>
        </select>
      </fieldset>

      <input type="submit" value="Crear propiedad" class="boton boton-verde">
    </form>
  </main>

  <?php incluirTemplate('footer');?>
