
  <div class="modal fade" id="actualizarPregunta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Actualización de Pregunta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?php echo constant('URL'); ?>preguntaFicha/actualizar" >
        <input type="hidden" name="idPregunta" id="idPreguntaA">
            <div class="form-group">
              <label for="pregunta">Pregunta:</label>
              <input type="text" class="form-control" id="preguntaA" name="pregunta" placeholder="Ingrese una pregunta...">
              </div>   
              <label for="tipoSeccion">Sección de la Pregunta:</label>
              <select class="browser-default custom-select" id="listaSeccionesActualizar" name="seccionPregunta" >
              <?php
                if (isset($seccionesFicha)) {
                    foreach ($seccionesFicha as $seccionFicha) {
                        echo "<option value={$seccionFicha[0]}>{$seccionFicha[2]}</option>";
                    }
                }  
              ?>
                              
              </select>   
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" >Guardar</button>
        </div> 
        </form>
        </div>
        
      </div>
    </div>
  </div>