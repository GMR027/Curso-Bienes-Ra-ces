<?php
  require '../../includes/app.php';

//POO propiedad
use App\Propiedad;
use App\Vendedores;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

  //Autentificacion
  estadoLogin();


  $errores = Propiedad::getErrores();
  $propiedad = new Propiedad();

  //Consulta para obtener vendedores
  $vendedores = Vendedores::all();
  //debuguear($vendedores);
  

  //Ejecutar el codigo para enviar la informacion a la base de datos
  if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

    $propiedad = new Propiedad($_POST['propiedad']);
    //debuguear($_FILES['propiedad']);

    //generar nombre para imagenes
      $nombreIMG = md5(uniqid( rand(), true )) . '.jpg';

    if($_FILES['propiedad']['tmp_name']['imagenCargada']) {
      $manager = new ImageManager(Driver::class);
      $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagenCargada'])->cover(800, 600);
      $propiedad->setImage($nombreIMG);
      //debuguear($imagen);
    }

    $errores = $propiedad->validarErrores();


    //Revisar que el array de errores esta vacio
    if(empty($errores)){


      //carpeta de imagenes
      //$carpetaIMG = '../../imagenes/';
      if(!is_dir($CARPETA_IMG)) {
        mkdir($CARPETA_IMG);
      }
  
      //Guardar imagen en servidor
      $imagen->save(CARPETA_IMG . $nombreIMG);
      
      $propiedad->guardar();

      
    } 
  }
  
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

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">  <!-- Get para cuando se requiera ver datos en la barra nav y POST para no mostrarlos -->
      <?php require '../../includes/templates/formularioPropiedades.php';?>
      <input type="submit" value="Crear propiedad" class="boton boton-verde">
    </form>
  </main>

  <?php incluirTemplate('footer');?>
