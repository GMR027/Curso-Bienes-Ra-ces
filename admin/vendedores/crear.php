<?php
  require '../../includes/app.php';
  use App\Vendedores;
  estadoLogin();


  $vendedor = new Vendedores();
  $errores = Vendedores::getErrores();

  //debuguear($vendedor);


  if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $vendedor = new Vendedores(($_POST['vendedor']));
    //debuguear($vendedor);

    $errores = $vendedor->validarErrores();

    if(empty($errores)){
      $vendedor->guardar();
    }
  }

  incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>Crear Vendedores</h1>
    <a href="/admin/index.php" class="boton boton-verde">Regresar</a>

    <?php foreach($errores as $error): ?>
      <div class="alerta error">
        <?php echo $error ?>
      </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/admin/vendedores/crear.php" enctype="multipart/form-data">  <!-- Get para cuando se requiera ver datos en la barra nav y POST para no mostrarlos -->
      <?php require '../../includes/templates/formularioVendedores.php';?>
      <input type="submit" value="Crear vendedor" class="boton boton-verde">
    </form>
  </main>

  <?php incluirTemplate('footer');?>