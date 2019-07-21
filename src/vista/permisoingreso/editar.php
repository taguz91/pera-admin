<?php
require 'src/vista/templates/headerform.php';
 ?>

 <h2>Editar </h2>
 <div class="formulario">
   <form class="" action="<?php echo constant('URL'); ?>permisoficha/editar" method="post">
     <input type="hidden" name="id" value="<?php echo $pi->id; ?>">

     <label for="periodo">Seleccione un periodo:</label>
     <select class="" name="periodo" >
       <option value="<?php echo $pi->idPeriodo; ?>">Periodos</option>
       <option value="21">TDS</option>
       <option value="22">TAS</option>
       <option value="23">TAF</option>
       <option value="24">TMI</option>
     </select>

     <label for="">Seleccione un tipo de ficha</label>
     <select class="" name="tipoficha">
       <option value="<?php echo $pi->idTipoFicha; ?>">Periodos</option>
       <option value="1">Socioeconomica</option>
       <option value="1">Ocupacional</option>
     </select>

     <label for="">Fecha Inicio</label>
     <input type="date" name="fechaInicio" value="<?php echo $pi->fechaInicio; ?>">
     <label for="">Fecha Fin</label>
     <input type="date" name="fechaFin" value="<?php echo $pi->fechaFin; ?>">

     <input type="submit" name="editar" value="Guardar">
   </form>

 </div>


<?php
require 'src/vista/templates/footerform.php';
 ?>
