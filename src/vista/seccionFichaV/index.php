<?php
require 'src/vista/templates/header.php';
require_once 'src/vista/seccionFichaV/actualizar.php';
require_once 'src/vista/seccionFichaV/insertar.php';
require_once 'src/vista/seccionFichaV/eliminar.php';
 ?>


<br>
  <div class="row">
      <div class="col-sm-8" >
     
        <?php   
        if(isset($tiposSeccion)){
          foreach ($tiposSeccion as $ts) {
            echo "<input type='hidden' class='tiposSeccion' value='{$ts->id}'>
                  <input type='hidden' class='tiposSeccion' value='{$ts->tipoficha}'>";   
          }  
        }     
               
        ?>
        
        <div class="active-cyan-4 mb-4" style="width: 90%;margin-left:10%;" >
          <input class="form-control" type="text" placeholder="Buscar..." aria-label="Search" id="busqueda" name="busqueda" value="<?php if(isset($key)){echo $key;} ?>" ></div>
        </div>
      <div class="col-sm-4"> 
        <button type="button" class="btn btn-success insertarBtn" data-toggle='modal' data-target='#insertarSeccion'>Nuevo</button>
      </div>
    
    </div>
  </div>

 



<table class="table table-hover" style="width: 90%"  align="center" >
  <thead >
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tipo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>

  <?php
        
        if (isset($secciones)) {
            foreach($secciones as $seccion){
              
              echo "<tr>
              <th scope='row'>{$seccion[0]}</th>
              <td>{$seccion[1]}</td>
              <td>{$seccion[2]}</td>
              <td style='display:none;'>{$seccion[4]}</td>
              <td><button type='button' class='btn btn-primary actualizarBtn'
              data-toggle='modal' data-target='#actualizarSeccion'>Actualizar</button>
              <button type='button' class='btn btn-danger eliminarBtn' 
              data-toggle='modal' data-target='#eliminarSeccion'>Eliminar</button></td>
              </tr>";
              

             }

        }
        
       
  ?>
    
    
  </tbody>
</table>







<?php
require 'src/vista/templates/footer.php';
require_once 'src/vista/seccionFichaV/seccionFichaJS.php'
 ?>



