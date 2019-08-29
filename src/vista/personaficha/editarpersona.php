<br><br>

<h2>Editar</h2>
<div class="formulario">
  <form class="" action="<?php echo constant('URL'); ?>personaficha/editarpersona" method="post">
    <input type="hidden" name="idPersona" value="<?php echo $pi->idPersona; ?>">

    <button class="btn btn-primary">
      Cambiar Contraseña
    </button>

    <div class="form-group">
      <label for="password" class="control-label">Ingrese la nueva Contraseña</label>
      <input type="text" name="password">
    </div>

    <input type="submit" name="editar" value="Guardar">
  </form>

  <button class="btn btn-primary">Enviar en Correo nuevo</button>

  <label for="correo" class="control-label">Ingrese un nuevo Correo</label>
  <input type="text" name="correo">

  <button class="btn btn-primary">Enviar Correo</button>


</div>