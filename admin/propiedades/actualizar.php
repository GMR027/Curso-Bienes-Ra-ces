<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');


  //Validar que al seleccionar el boton actualizar sea un id valido
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);
  //var_dump($id);

  if(!$id) {
    header('Location: /admin');
  }

  //Base de datos
  require '../../includes/config/database.php';
  $baseDatos = conectarBD();

  //Consulta para obtener datos de la propiedad
  $consultaPropiedad = "SELECT * FROM propiedades WHERE id = ${id}";
  $resultadoPropiedad = mysqli_query($baseDatos, $consultaPropiedad);
  $propiedad = mysqli_fetch_assoc($resultadoPropiedad);
  //var_dump($propiedad);

  //Consulta para obtener los datos de los vendedores
  $consultaVendedor = "SELECT * FROM Vendedores";
  $resultadoCVendedores = mysqli_query($baseDatos, $consultaVendedor);


  // var_dump($baseDatos); para ver la informacion de la conexion

  // echo "<pre>";
  // var_dump($_POST); $_GET, $_SERVER similar
  // echo "</pre>"; forma de ver los datos

  //Validador de formulario
  $errores = [];


  //Variables en blanco para que con la propiedad valie en los input se quede la informacion escrita en caso de que no se suba la publicacion debido algun error de informacion no ingresada
  $titulo = $propiedad['titulo'];
  $precio = $propiedad['precio'];
  $descripcion = $propiedad['descripcion'];
  $habitaciones = $propiedad['habitaciones'];
  $sanitarios = $propiedad['wc'];
  $estacionamiento = $propiedad['estacionamiento'];
  $vendedorid = $propiedad['Vendedores_id'];
  $imagenDePropiedad = $propiedad['imagen'];

  //Ejecutar el codigo para enviar la informacion a la base de datos
  if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

    
    // echo "<pre>";
    // var_dump($_POST); 
    // echo "</pre>"; //forma de ver los datos
    // echo 'Es un metodo de respuesta POST';

    // echo "<pre>";
    // var_dump($_FILES); 
    // echo "</pre>"; //forma de ver los datos

    

    $titulo = mysqli_real_escape_string($baseDatos, $_POST['titulo']); //mysqli_real_escape_string() es para sanitizar y proteger los datos.
    $precio = mysqli_real_escape_string($baseDatos, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($baseDatos, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($baseDatos, $_POST['habitaciones']);
    $sanitarios = mysqli_real_escape_string($baseDatos, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($baseDatos, $_POST['estacionamientos']);
    $vendedorid = mysqli_real_escape_string($baseDatos, $_POST['vendedor']);
    $creacion = date('Y/m/d');

    //Asignar files a una variable
    $imagen = $_FILES['imagen'];
    //var_dump($imagen);


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

    if(!$vendedorid) {
      $errores[] = 'Debes ingresar el vendedor';
    }

    // if(!$imagen['name'] || $imagen['error']) {  En actualizar no es obligatoria por lo tanto se comenta o se borra
    //   $errores[] = 'La imagen es obligatoria';
    // }

    //validacion por tamano
    $medida = 1000 * 1000;

    if($imagen['size'] > $medida) {
      $errores[] = 'El tamano de la imagen supera 1MB';
    }


    // var_dump($errores);
    // exit; validador de pruebas
    
    //Revisar que el array de errores esta vacio
    if(empty($errores)){

      //carpeta de imagenes
      $carpetaIMG = '../../imagenes/';
      if(!is_dir($carpetaIMG)) {
        mkdir($carpetaIMG);
       }

       $nombreIMG = '';

    //Actualizacion de imagen (para mantener o cambiar imagen)
    //var_dump($imagen); Uso de var para ver si se subio una imagen
    if($imagen['name']) {
    //echo 'Se registra nueva imagen';

    //eliminar imagen previa
    unlink($carpetaIMG . $propiedad['imagen']);

    //generar nombre para imagenes
    $nombreIMG = md5(uniqid( rand(), true ) );

    //Subir la imagen en formatos jpg y png
    if($imagen['type'] === 'image/jpeg') {
      $nombreIMG .= '.jpg';
      move_uploaded_file( $imagen['tmp_name'], $carpetaIMG . $nombreIMG);
    } elseif ($imagen['type'] === 'image/png') {
        $nombreIMG .= '.png';
        move_uploaded_file( $imagen['tmp_name'], $carpetaIMG . $nombreIMG);
      } else {
        $errores[] = 'El formato de imagen no es compartible';
      }
    } else {
    //echo 'Se mantiene imagen anterior';
      $nombreIMG = $propiedad['imagen'];
    }
      

        //Insertar base de datos (No se ponen '' en aquellos que son numeros como habitaciones, sanitarios, estacionamiento y vendedor)
      $query = "UPDATE propiedades SET 
        titulo = '$titulo', 
        precio = '$precio',
        imagen = '$nombreIMG',
        descripcion = '$descripcion',
        habitaciones = $habitaciones, 
        wc = $sanitarios,
        estacionamiento = $estacionamiento,
        Vendedores_id = $vendedorid
        WHERE id = $id";

      //echo $query; //sirve para validar la informacion del query si esta subiendo toda la informacion solicitada en el formulario.
      

      //Almacenar en la base de datos
      $resultado = mysqli_query($baseDatos, $query);

      if($resultado) {
        //echo 'Informacion publicada';

        header('Location: /admin?resultado=2');
      }
    } 
  }
  

  require '../../includes/funciones.php';
  incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Actualizar propiedad</h1>
    <a href="/admin/index.php" class="boton boton-verde">Regresar</a>

    <?php foreach($errores as $error): ?>
      <div class="alerta error">
        <?php echo $error ?>
      </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">  <!-- Get para cuando se requiera ver datos en la barra nav y POST para no mostrarlos -->
      <fieldset>
        <legend>Informacion general de propiedad (No ingresar caracteres especiales o acentos)</legend>

        <label for="titulo">Nombre propiedad</label>
        <input type="text" name="titulo" id="titulo" placeholder="Ingresar nombre" value="<?php echo $titulo; ?>">

        <label for="precio">Precio</label>
        <input type="number" name="precio"  id="precio" placeholder="Precio" value="<?php echo $precio; ?>">

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png" value="<?php echo $imagen; ?>">

        <img src="/imagenes/<?php echo $imagenDePropiedad?>" class="imagen-small" alt="imagenPublicacion">

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
          <?php while($registro = mysqli_fetch_assoc($resultadoCVendedores)): ?>
            <option  <?php echo $vendedorid == $registro['id'] ? 'selected' : ''; ?> value="<?php echo $registro['id']; ?>"> 
              <?php echo $registro['nombre'] . ' ' . $registro['apellido']; ?> 
            </option>
          <?php endwhile; ?>
        </select>
      </fieldset>

      <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
    </form>
  </main>

  <?php incluirTemplate('footer');?>
