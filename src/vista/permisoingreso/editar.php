<?php
$pagina = 'Permiso Ingreso Ficha | Editar';
require 'src/vista/templates/header.php';
 ?>

 <div class="my-5">

   <div class="col-md-8 col-lg-6 mx-auto border rounded shadow">

     <h3 class="text-center my-3">Editar Permiso Ficha</h3>

     <form class="" action="<?php echo constant('URL'); ?>permisoficha/editar" method="post">

       <input type="hidden" name="id" value="<?php echo $pi->id; ?>">

       <div class="form-group">
           <label for="periodo" class="control-label">Seleccione un periodo:</label>
           <select class="form-control" name="periodo" id="cmbPeriodos">
               <option value="0">Periodos</option>

               <?php
               if (isset($periodos)) {
                   foreach ($periodos as $pl) {
                     if ($pi->idPeriodo == $pl->id) {
                       echo '<option selected value="' . $pl->id . '">' . $pl->nombre . '</option>';
                     } else {
                       echo '<option value="' . $pl->id . '">' . $pl->nombre . '</option>';
                     }
                   }
               }
               ?>
           </select>
       </div>



       <div class="form-group">

           <label for="tipoficha" class="control-label">Seleccione un tipo de ficha</label>
           <select name="tipoficha" class="form-control" id="cmbFichas">
               <option value="0">Fichas</option>
               <?php
               //Cargamos todos los periodos de la base de datos
               if (isset($tipofichas)) {
                   foreach ($tipofichas as $tf) {
                     if ($tf->id == $pi->idTipoFicha) {
                       echo '<option selected value="' . $tf->id . '">' . $tf->tipoFicha . '</option>';
                     } else {
                        echo '<option value="' . $tf->id . '">' . $tf->tipoFicha . '</option>';
                     }
                   }
               }
               ?>
           </select>

       </div>


       <div class="form-row">
           <div class="col">
               <div class="form-group">
                   <label for="fechaInicio" class="control-label">Fecha Inicio</label>
                   <input type="date" name="fechaInicio" value="<?php echo $pi->fechaInicio; ?>" class="form-control" id="inInicio">
               </div>
           </div>

           <div class="col">
               <div class="form-group">
                   <label for="fechaFin" class="control-label">Fecha Fin</label>
                   <input type="date" name="fechaFin" value="<?php echo $pi->fechaFin; ?>" class="form-control" id="inFin">
               </div>
           </div>
       </div>

       <div class="form-group">
           <input class="btn btn-success btn-block" type="submit" name="editar" value="Guardar"  id="btnGuardar">
       </div>

     </form>


   </div>

 </div>


<?php
require 'src/vista/templates/footer.php';
 ?>
