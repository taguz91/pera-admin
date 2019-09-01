<?php
require 'src/vista/templates/header.php';
 ?>
<div class="container my-5">

   <div class="col-md-8 col-lg-6 mx-auto border rounded">

     <h3 class="text-center my-3">
       Ingreso de Persona Ficha
     </h3>
     <form class="form-horizontal" action="<?php echo constant('URL'); ?>personaficha/guardarpersona" method="post">

       <div class="form-group">
         <label for="permiso"
         class="control-label"
         >Seleccione un Permiso:</label>
         <select class="form-control" name="permiso" required>
           <option value="0">Permisos</option>

           <?php
           //Cargamos todos los permisos de la base de datos
           if(isset($permisos)){
             foreach ($permisos as $pf) {
               echo '<option value="'.$pf->id.'"> Id - Período: '.$pl->idPeriodo.'</option>';
             }
           }
            ?>

         </select>
       </div>

       <div class="form-group">
         <label for="ciclo"
         class="control-label"
         >Seleccione un Ciclo:</label>
         <select class="form-control" name="ciclo" required>
           <option value="0">CICLOS</option>
           <option value="1">PRIMEROS</option>
           <option value="2">SEGUNDOS</option>
           <option value="3">TERCEROS</option>
           <option value="4">CUARTOS</option>
           <option value="5">QUINTOS</option>
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
             <label for="fechaModificación"
             class="control-label"
             >Fecha Fin</label>
             <input type="date" name="fechaModificación" value=""
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
