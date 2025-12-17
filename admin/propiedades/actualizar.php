<?php

use App\Propiedad;
use App\Vendedores;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

  require '../../includes/app.php';
  estadoLogin();

  //Validar que al seleccionar el boton actualizar sea un id valido
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);
  //var_dump($id);

  if(!$id) {
    header('Location: /admin');
  }

  $vendedores = Vendedores::all();
  $propiedad = Propiedad::find($id);
  //debuguear($propiedad);

  $errores = Propiedad::getErrores();

  //Ejecutar el codigo para enviar la informacion a la base de datos
  if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

    //debuguear($_POST);

    //Asignar los atributos
    $array = $_POST['propiedad'];


    $propiedad->sincronizar($array);
    //debuguear($propiedad);

    $errores = $propiedad->validarErrores();

    //generar nombre para imagenes
      $nombreIMG = md5(uniqid( rand(), true )) . '.jpg';

    //validacion subida de archivos
    if($_FILES['propiedad']['tmp_name']['imagenCargada']) {
      $manager = new ImageManager(Driver::class);
      $imagenLeida = $manager->read($_FILES['propiedad']['tmp_name']['imagenCargada'])->cover(800, 600);
      $propiedad->setImage($nombreIMG);
      //debuguear($imagen);
    }

    //debuguear($propiedad);
    
    if(empty($errores)){
    //Almacenar imagen en DD
    if($_FILES['propiedad']['tmp_name']['imagenCargada']) {
          $imagenLeida->save(CARPETA_IMG . $nombreIMG);
      }

      $propiedad->guardar();
    } 
  }
  

  
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
      <?php require '../../includes/templates/formularioPropiedades.php'; ?>
      <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
    </form>
  </main>

  <?php incluirTemplate('footer');?>
