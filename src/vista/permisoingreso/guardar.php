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
       }else{
         echo "<h2>No tenemos el objeto de periodos</h2>";
       }
        ?>
     </select>

     <label for="">Seleccione un tipo de ficha</label>
     <select class="" name="tipoficha">
       <option value="0">Fichas</option>
       <option value="1">Socioeconomica</option>
       <option value="1">Ocupacional</option>
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
