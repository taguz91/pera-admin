
  <div class="modal fade" id="insertarPregunta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Ingreso de Nueva Pregunta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?php echo constant('URL'); ?>preguntaFicha/insertar" >
           
              <div class="form-group">
              <label for="tipoSeccion">Sección de la Pregunta:</label>
              
                <select class="browser-default custom-select" id="listaSeccionesInsertar" name="seccionPregunta">
                <?php
                  if (isset($seccionesFicha)) {
                      foreach ($seccionesFicha as $seccionFicha) {
                          echo "<option value={$seccionFicha[0]}>{$seccionFicha[2]}</option>";
                      }
                  }  
                ?>
                        
                   
              </select>
              </div> 
           
              <div class="form-group">
              <label for="pregunta">Pregunta:</label>
              <input type="text" class="form-control" name="pregunta" placeholder="Ingrese una pregunta...">
              </div>  
               
              <div class="form-group">
                <label for="exampleFormControlTextarea2">Descripción para la Pregunta:</label>
                <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"></textarea> 
              </div>   

              <div class="form-group">
                <label for="tipoPregunta">Tipo de Respuestas:</label>
                <select class="browser-default custom-select" id="tipoPregunta">
                  <option value="1">Única</option>
                  <option value="2">Múltiple</option>
                  <option value="3">Libre Única</option>
                  <option value="4">Libre Múltiple</option>
                </select>
                </div> 

                <div class="form-group" id="respuestasMenu">
             
                </div>  


                <div class="form-group" id="respuestas">
             
                
                </div>  

             <div></div>
            
             <div class="modal-footer">
              <button type="button" id="cancelar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" >Guardar</button>
            </div> 
       
        </form>
        </div>
        
      </div>
    </div>
  </div>