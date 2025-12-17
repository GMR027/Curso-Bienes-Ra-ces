<fieldset>
  <legend>Informacion general de vendedor (No ingresar caracteres especiales o acentos)</legend>

  <label for="nombre">Nombre Empleado</label>
  <input type="text" name="vendedor[nombre]" id="nombre" placeholder="Ingresar nombre" value="<?php echo limpiar($vendedor->nombre); ?>">

  <label for="apellido">Apellido</label>
  <input type="text" name="vendedor[apellido]"  id="apellido" placeholder="Apellido" value="<?php echo limpiar($vendedor->apellido); ?>">

  <label for="telefono">Telefono</label>
  <input type="number" name="vendedor[telefono]"  id="telefono" placeholder="tel" value="<?php echo limpiar($vendedor->telefono); ?>">
  
</fieldset>