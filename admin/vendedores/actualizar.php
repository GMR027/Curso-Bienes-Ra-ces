<?php
  require '../../includes/app.php';
  use App\Vendedores;
  estadoLogin();


  $errores = Vendedores::getErrores();

  //debuguear($vendedor);

  //Validar id
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);
  //debuguear($id);

  if(!$id) {
    header('Location: /admin');
  }

  $vendedor = Vendedores::find($id);




  if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $array = $_POST['vendedor'];

    $vendedor->sincronizar($array);
    //debuguear($vendedor);

    $errores = $vendedor->validarErrores();

    if(empty($errores)) {
      $vendedor->guardar();
      //debuguear($vendedor);
    }
  }

  incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>Actualizar Vendedores</h1>
    <a href="/admin/index.php" class="boton boton-verde">Regresar</a>

    <?php foreach($errores as $error): ?>
      <div class="alerta error">
        <?php echo $error ?>
      </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">  <!-- Get para cuando se requiera ver datos en la barra nav y POST para no mostrarlos -->
      <?php require '../../includes/templates/formularioVendedores.php';?>
      <input type="submit" value="Actualizar vendedor" class="boton boton-verde">
    </form>
  </main>

  <?php incluirTemplate('footer');?>