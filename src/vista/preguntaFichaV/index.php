<?php
require 'src/vista/templates/header.php';
require_once 'src/vista/preguntaFichaV/insertar.php';
require_once 'src/vista/preguntaFichaV/actualizar.php';
 ?>

<br>
  <div class="row">
      <div class="col-sm-8" >

        <div class="active-cyan-4 mb-4" style="width: 90%;margin-left:10%;" >
          <input class="form-control" type="text" placeholder="Buscar..." aria-label="Search" id="busqueda" name="busqueda" value="<?php if(isset($key)){echo $key;} ?>" ></div>
        </div>
      <div class="col-sm-4"> 
        <button type="button" class="btn btn-success insertarBtn" data-toggle='modal' data-target='#insertarPregunta'>Nuevo</button>
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
              
              echo "<tr>
              <th scope='row'>{$pregunta[0]}</th>
              <td>{$pregunta[1]}</td>
              <td >{$pregunta[2]}</td>
              <td style='display:none;'>{$pregunta[4]}</td>
              <td><button type='button' class='btn btn-primary actualizarBtn'
              data-toggle='modal' data-target='#actualizarPregunta'>Actualizar</button>
              <button type='button' class='btn btn-danger eliminarBtn' 
              data-toggle='modal' data-target='#eliminarPregunta'>Eliminar</button></td>
              </tr>";
              

             }

        }
        
       
  ?>

 
<?php
require 'src/vista/templates/footer.php';
require_once 'src/vista/preguntaFichaV/preguntaFichaJS.php';
 ?>