<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');

  //Base de datos
  require '../../includes/config/database.php';
  $baseDatos = conectarBD();


  // var_dump($baseDatos); para ver la informacion de la conexion

  // echo "<pre>";
  // var_dump($_POST); $_GET, $_SERVER similar
  // echo "</pre>"; forma de ver los datos

  //Validador de formulario
  $errores = [];


  //Variables en blanco para que con la propiedad valie en los input se quede la informacion escrita en caso de que no se suba la publicacion debido algun error de informacion no ingresada
  $titulo = '';
  $precio = '';
  $descripcion = '';
  $habitaciones = '';
  $sanitarios = '';
  $estacionamiento = '';
  $vendedor = '';

  //Ejecutar el codigo para enviar la informacion a la base de datos
  if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    //echo "<pre>";
    //var_dump($_POST); 
    //echo "</pre>"; //forma de ver los datos
    //echo 'Es un metodo de respuesta POST';

    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $sanitarios = $_POST['wc'];
    $estacionamiento = $_POST['estacionamientos'];
    $vendedor = $_POST['vendedor'];

    if(!$titulo) {
      $errores[] = 'Debes ingresar un titulo';
    }

    if(!$precio) {
      $errores[] = 'Debes ingresar un precio';
    }

    if(strlen($descripcion) < 50) {  //< indica menor que
      $errores[] = 'Debes ingresar una descripcion mas amplia mayor a 50 caracteres';
    }

    if(!$habitaciones) {
      $errores[] = 'Debes ingresar el numero de habitaciones';
    }

    if(!$sanitarios) {
      $errores[] = 'Debes ingresar el numero de sanitarios';
    }

    if(!$estacionamiento) {
      $errores[] = 'Debes ingresar si cuenta con estacionamientos';
    }

    if(!$vendedor) {
      $errores[] = 'Debes ingresar el vendedor';
    }

    // var_dump($errores);
    // exit; validador de pruebas

    
    //Revisar que el array de errores esta vacio
    if(empty($errores)){
        //Insertar base de datos
      $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, Vendedores_id) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$sanitarios', '$estacionamiento', '$vendedor')";

      // echo $query; sirve para validar la informacion del query si esta subiendo toda la informacion solicitada en el formulario.

      //Almacenar en la base de datos
      $resultado = mysqli_query($baseDatos, $query);

      if($resultado) {
        echo 'Informacion publicada';
      }
    } 
  }
  

  require '../../includes/funciones.php';
  incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin/index.php" class="boton boton-verde">Regresar</a>

    <?php foreach($errores as $error): ?>
      <div class="alerta error">
        <?php echo $error ?>
      </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php">  <!-- Get para cuando se requiera ver datos en la barra nav y POST para no mostrarlos -->
      <fieldset>
        <legend>Informacion general de propiedad</legend>

        <label for="titulo">Nombre propiedad</label>
        <input type="text" name="titulo" id="titulo" placeholder="Ingresar nombre" value="<?php echo $titulo; ?>">

        <label for="precio">Precio</label>
        <input type="number" name="precio"  id="precio" placeholder="Precio" value="<?php echo $precio; ?>">

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="descripcion" ><?php echo $descripcion; ?></textarea>
      </fieldset>

      <fieldset>
        <legend>Informacion de la propiedad</legend>
        <label for="habitaciones">Habitaciones</label>
        <input type="number" name="habitaciones" id="habitaciones" placeholder="Habitaciones" min="1" max="9" value="<?php echo $habitaciones; ?>">

        <label for="wc">Sanitarios</label>
        <input type="number" name="wc" id="wc" placeholder="Sanitarios" value="<?php echo $sanitarios; ?>">

        <label for="estacionamientos">Estacionamientos</label>
        <input type="number" name="estacionamientos" id="estacionamientos" placeholder="Estacionamientos" value="<?php echo $estacionamiento; ?>">

      </fieldset>

      <fieldset>
        <legend>Vendedor</legend>
        <select name="vendedor">
          <option value="">--Seleccione--</option>
          <option value="1">Edgar</option>
          <option value="2">Elvira</option>
        </select>
      </fieldset>

      <input type="submit" value="Crear propiedad" class="boton boton-verde">
    </form>
  </main>

  <?php incluirTemplate('footer');?>
