<?php
require 'src/vista/templates/headerform.php';
 ?>

 <h2>Editar </h2>
 <div class="formulario">
   <form class="" action="<?php echo constant('URL'); ?>gruposocioeconomico/editar" method="post">
     <input type="hidden" name="id" value="<?php echo $pi->id; ?>">

     <div class="form-group">
     <label for="">Seleccione un tipo de ficha</label>
     <select class="" name="tipoficha">
       <option value="<?php echo $pi->idTipoFicha; ?>">Periodos</option>
       <option value="1">Socioeconomica</option>
       <option value="1">Ocupacional</option>
     </select>
     </div>

     <div class="form-group">
        <label for="nombreGrupo">Ingrese el nuevo nombre del Grupo Socieconómico</label>
        <input type="text" name="nombreGrupo">
     </div>

     <div class="form-group">
        <label for="puntajeMin">Ingrese el nuevo Puntaje Mínimo</label>
        <input type="number" name="puntajeMin">
     </div>

     <div class="form-group">
        <label for="puntajeMax">Ingrese el nuevo Puntaje Máximo</label>
        <input type="number" name="puntajeMax">
     </div>

     <input type="submit" name="editar" value="Guardar">
   </form>

 </div>


<?php
require 'src/vista/templates/footerform.php';
 ?>
