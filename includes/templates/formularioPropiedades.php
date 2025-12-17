<fieldset>
  <legend>Informacion general de propiedad (No ingresar caracteres especiales o acentos)</legend>

  <label for="titulo">Nombre propiedad</label>
  <input type="text" name="propiedad[titulo]" id="titulo" placeholder="Ingresar nombre" value="<?php echo limpiar($propiedad->titulo); ?>">

  <label for="precio">Precio</label>
  <input type="number" name="propiedad[precio]"  id="precio" placeholder="Precio" value="<?php echo limpiar($propiedad->precio); ?>">

  <label for="imagen">Imagen:</label>
  <input type="file" name="propiedad[imagenCargada]" id="imagen" accept="image/jpeg, image/png" value="<?php echo limpiar($propiedad->imagen); ?>">

  <?php if($propiedad->imagen): ?>
    <img class="imgForm" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen formulario">
  <?php endif; ?> 

  <label for="descripcion">Descripcion</label>
  <textarea name="propiedad[descripcion]" id="descripcion" ><?php echo limpiar($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
  <legend>Informacion de la propiedad</legend>
  <label for="habitaciones">Habitaciones</label>
  <input type="number" name="propiedad[habitaciones]" id="habitaciones" placeholder="Habitaciones"  value="<?php echo limpiar($propiedad->habitaciones); ?>">

  <label for="wc">Sanitarios</label>
  <input type="number" name="propiedad[wc]" id="wc" placeholder="Sanitarios" value="<?php echo limpiar($propiedad->wc); ?>">

  <label for="estacionamientos">Estacionamientos</label>
  <input type="number" name="propiedad[estacionamiento]" id="estacionamientos" placeholder="Estacionamientos" value="<?php echo limpiar($propiedad->estacionamiento); ?>">

</fieldset>

<fieldset>
  <legend>Vendedor</legend>
  <label for="vendedor">Vendedor</label>
  <select name="propiedad[Vendedores_id]" id="vendedor">
    <option value="" disabled selected>--Seleccione--</option>
    <?php foreach($vendedores as $vendedor) : ?>
      <option 
      <?php echo $propiedad->Vendedores_id === $vendedor->id ? 'selected' : '' ;?>
      value="<?php echo limpiar($vendedor->id); ?>">
      <?php echo limpiar($vendedor->nombre) . " " . limpiar($vendedor->apellido); ?>
    </option>

    <?php endforeach; ?>
  </select>
</fieldset>
