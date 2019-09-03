<?php
require_once 'src/controlador/preguntaficha/preguntaFichaAJAX.php';
require 'src/vista/templates/header.php';
require_once 'src/vista/preguntaFichaV/insertar.php';
require_once 'src/vista/preguntaFichaV/actualizar.php';
require_once 'src/vista/preguntaFichaV/eliminar.php';
 ?>



<br>
  <div class="row">
      <div class="col-sm-8" >
        <div class="active-cyan-4 mb-4" style="width: 90%;margin-left:10%;" >
          <input class="form-control" type="text" placeholder="Buscar..." aria-label="Search" id="busquedaP" name="busqueda" value="<?php if(isset($key)){echo $key;} ?>" ></div>
        </div>
      <div class="col-sm-4"> 
        <button type="button" class="btn btn-success insertarBtn" data-toggle='modal' data-target='#insertarPregunta' id="insertarPregunta">Nuevo</button>
      </div>
    
    </div>
  </div>

  <table class="table table-hover" style="width: 90%"  align="center" >
  <thead >
    <tr>
      <th scope="col">#</th>
      <th scope="col">Seccion</th>
      <th scope="col">Pregunta</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>

  <?php
        
        if (isset($preguntas)) {
            foreach($preguntas as $pregunta){
              
              echo "<tr idQuiz='{$pregunta[0]}'>
              <th  scope='row'>{$pregunta[0]}</th>
              <td>{$pregunta[1]}</td>
              <td >{$pregunta[2]}</td>
              <td style='display:none;'>{$pregunta[3]}</td>
              <td style='display:none;'>{$pregunta[4]}</td>
              <td style='display:none;'>{$pregunta[6]}</td>
              <td style='display:none;'>{$pregunta[7]}</td>
              <td style='display:none;'>{$pregunta[8]}</td>
              <td><button type='submit' class='btn btn-primary actualizarBtnP'
              data-toggle='modal' data-target='#actualizarPregunta'>Actualizar</button>
              <button type='button' class='btn btn-danger eliminarBtnP' 
              data-toggle='modal' data-target='#eliminarPregunta'>Eliminar</button></td>
              </tr>";
              

             }

        }
        
       
  ?>


 
<?php
require 'src/vista/templates/footer.php';
require_once 'src/vista/preguntaFichaV/preguntaFichaJS.php';
 ?>


