<?php
require 'src/vista/templates/header.php';
 ?>

 <div class="container my-5">

   <div class="col-md-8 col-lg-6 mx-auto border rounded">

     <h3 class="text-center my-3">
       Ingreso de Permiso Ficha
     </h3>
     <form class="form-horizontal" action="<?php echo constant('URL'); ?>permisoficha/guardar" method="post">

       <div class="form-group">
         <label for="periodo"
         class="control-label"
         >Seleccione un periodo:</label>
         <select class="form-control" name="periodo">
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
       </div>

       <div class="form-group">

         <label for="tipoficha"
         class="control-label"
         >Seleccione un tipo de ficha</label>
         <select name="tipoficha"
         class="form-control">
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

       </div>


       <div class="form-row">
         <div class="col">
           <div class="form-group">
             <label for="fechaInicio"
             class="control-label"
             >Fecha Inicio</label>
             <input type="date" name="fechaInicio" value=""
             class="form-control">
           </div>
         </div>

         <div class="col">
           <div class="form-group">
             <label for="fechaFin"
             class="control-label"
             >Fecha Fin</label>
             <input type="date" name="fechaFin" value=""
             class="form-control">
           </div>
         </div>
       </div>

       <div class="form-group">
          <input class="btn btn-success btn-block"
          type="submit" name="guardar" value="Guardar">
       </div>

     </form>

   </div>
 </div>




<?php
require 'src/vista/templates/footer.php';
?>
