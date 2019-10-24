<?php
require 'src/vista/templates/header.php';
 ?>

 <div class="container my-5">

   <div class="col-md-8 col-lg-6 mx-auto border rounded">

     <h3 class="text-center my-3">
       Edicion de grupo socieconómico
     </h3>
     <form class="form-horizontal" action="<?php echo constant('URL'); ?>gruposocioeconomico/editar" method="post">

       <input type="hidden" name="id" value="<?php echo $gs->id; ?>">

       <div class="form-group">

         <label for="tipoficha"
         class="control-label"
         >Seleccione un tipo de ficha</label>
         <select name="tipoficha"
         class="form-control">
           <option value="<?php echo $gs->idTipoFicha; ?>">Fichas</option>
           <?php
           if(isset($tipofichas)){
             foreach ($tipofichas as $tf) {
               if ($tf->id == $gs->idTipoFicha) {
                  echo '<option selected  value="'.$tf->id.'">'.$tf->tipoFicha.'</option>';
               } else {
                  echo '<option value="'.$tf->id.'">'.$tf->tipoFicha.'</option>';
               }
             }
           }
            ?>
         </select>

       </div>

       <div class="form-group">
         <label for="nombreGrupo"
         class="control-label"
         >Grupo Socioeconomico</label>
         <input type="text" name="gruposocioeconomico"
         value="<?php echo $gs->grupoSocioEconomico; ?>"
         class="form-control"
         placeholder="Ingrese el nuevo nombre del Grupo Socieconómico" >
       </div>

       <div class="form-row">

         <div class="col">
           <div class="form-group">
             <label for="puntajeMinimo"
             class="control-label"
             >Puntaje Minimo</label>
             <input type="number" name="puntajeMinimo" value="<?php echo $gs->puntajeMinimo; ?>"
             class="form-control"
             placeholder="Ingrese el nuevo Puntaje Mínimo">
           </div>
         </div>

          <div class="col">
            <div class="form-group">
              <label for="puntajeMaximo"
              class="control-label"
              >Puntaje Máximo</label>
              <input type="number" name="puntajeMaximo" value="<?php echo $gs->puntajeMaximo; ?>"
              class="form-control"
              placeholder="Ingrese el nuevo Puntaje Máximo">
            </div>
          </div>

       </div>


       <div class="form-group">
          <input class="btn btn-success btn-block"
          type="submit" name="editar" value="Guardar">
       </div>

     </form>

   </div>
 </div>

<?php
require 'src/vista/templates/footer.php';
?>
