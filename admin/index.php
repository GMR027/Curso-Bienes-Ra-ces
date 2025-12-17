<?php
require '../includes/app.php';
estadoLogin();
  $baseDatos = conectarBD();
  use App\Propiedad;
  use App\Vendedores;

  $propiedades = Propiedad::all();
  $vendedor = Vendedores::all();
  //debuguear($propiedades);

  
  //Apartado de eliminacion de propiedad
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //debuguear($_POST);
    $idEliminar = $_POST['idEliminar'];
    $idEliminar = filter_var($idEliminar, FILTER_VALIDATE_INT);
    //var_dump($idEliminar);

    if($idEliminar) {

      $tipo = $_POST['tipo'];
      //debuguear($tipo);
      if(validarTipo($tipo)) {
        //debuguear('Es valido');
        
        //Compara lo que va a eliminar
        if($tipo === 'propiedad') {
          $propiedad = Propiedad::find($idEliminar);
          $propiedad->eliminar();
        } else if($tipo === 'vendedor') {
          $vendedor = Vendedores::find($idEliminar);
          $vendedor->eliminar();
        }
      } else {
        //debuguear('No es valido');
      }

      
    }
  }



  //Muestra mensaje de creacion de propiedad
  $mensajePropiedadCreada = $_GET['resultado'] ?? null; //validador ?? null en caso que no lo encuentre asigna null
  
  //Incluye un template
  incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Administrador de bienes raices</h1> 

    <!-- Generador de alerta de propiedad creada -->
    <?php 
      $mensaje = mostrarMensajes(intval($mensajePropiedadCreada));
      if($mensaje) {  ?>
      <p class="alerta exito"> <?php echo limpiar($mensaje); ?> </p>
    <?php 
      } 
    ?>


    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>
    <a href="/admin/vendedores/crear.php" class="boton boton-amarillo-corto">Nuevo vendedor</a>

    <h2>Propiedades</h2>
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
        <?php foreach($propiedades as $propiedad): ?>
        <tr>
          <td><?php echo $propiedad->id; ?></td>
          <td><?php echo $propiedad->titulo; ?></td>
          <td><img src='/imagenes/<?php echo $propiedad->imagen; ?>' alt="imagen" class="imagen-tabla"></td>
          <td>$<?php echo $propiedad->precio; ?></td>
          <td>
            <form action="" method="POST">
              <input type="hidden" name="idEliminar" value="<?php echo $propiedad->id; ?>">
              <input type="hidden" name="tipo" value="propiedad">
              <input type="submit" value="Eliminar" class="boton-rojo-block">
            </form>
            <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-azul-block">Actualizar</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>


  
  <h2>Vendedores</h2>
  <table class="propiedades">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>telefono</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody> <!--Mostrar las propiedades de la base de datos -->
        <?php foreach($vendedor as $vendedoritem): ?>
        <tr>
          <td><?php echo $vendedoritem->id; ?></td>
          <td><?php echo $vendedoritem->nombre . " " . $vendedoritem->apellido; ?></td>
          <td><?php echo $vendedoritem->telefono; ?></td>
          <td>
            <form action="" method="POST">
              <input type="hidden" name="idEliminar" value="<?php echo $vendedoritem->id; ?>">
              <input type="hidden" name="tipo" value="vendedor">
              <input type="submit" value="Eliminar" class="boton-rojo-block">
            </form>
            <a href="/admin/vendedores/actualizar.php?id=<?php echo $vendedoritem->id; ?>" class="boton-azul-block">Actualizar</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>

  <?php 
    incluirTemplate('footer');
  ?>
