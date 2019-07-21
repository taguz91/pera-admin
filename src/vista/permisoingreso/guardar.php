<?php
require 'src/vista/templates/headerform.php';
 ?>

 <div class="formulario">
   <form class="" action="<?php echo constant('URL'); ?>permisoficha/guardar" method="post">

     <label for="periodo">Seleccione un periodo:</label>
     <select class="" name="periodo">
       <option value="0">Periodos</option>

       <?php
       //Cargamos todos los periodos de la base de datos
       if(isset($periodos)){
         foreach ($periodos as $pl) {
           echo '<option value="'.$pl->id.'">'.$pl->nombre.'</option>';
         }
       }
        ?>

     </select>

     <label for="">Seleccione un tipo de ficha</label>
     <select class="" name="tipoficha">
       <option value="0">Fichas</option>
       <?php
       //Cargamos todos los periodos de la base de datos
       if(isset($tipofichas)){
         foreach ($tipofichas as $tf) {
           echo '<option value="'.$tf->id.'">'.$tf->tipoFicha.'</option>';
         }
       }
        ?>

     </select>

     <label for="">Fecha Inicio</label>
     <input type="date" name="fechaInicio" value="">
     <label for="">Fecha Fin</label>
     <input type="date" name="fechaFin" value="">

     <input type="submit" name="guardar" value="Guardar">
   </form>

 </div>


<?php
require 'src/vista/templates/footerform.php';
 ?>
