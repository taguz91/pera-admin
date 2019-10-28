<?php
$pagina = 'Grupo socioeconomico';
require 'src/vista/templates/header.php';
 ?>


 <div class="card shadow mb-4">
   <div class="card-header py-3">
     <div class="row">
       <div class="col">
         <h6 class="m-0 font-weight-bold text-primary">Todos los grupos socieconómicos</h6>
       </div>
       <div class="col-4 col-lg-2">
         <a href="<?php echo constant('URL'); ?>gruposocioeconomico/guardar"
         class="btn btn-success btn-block">Ingresar</a>
       </div>
     </div>

     <?php if (isset($mensaje)): ?>
       <div class="row">
         <div class="col-10 mx-auto">
           <div class="alert alert-info my-2 text-center">
             <?php echo $mensaje; ?>
           </div>
         </div>
       </div>
     <?php endif; ?>
     
   </div>

   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered"
       id="dataTable" width="100%" cellspacing="0">

       <thead class="thead-dark bg-ista-blue">
         <tr>
           <th scope="col">ID</th>
           <th scope="col">IDTipoFicha</th>
           <th scope="col">GrupoSocienomico</th>
           <th scope="col">Puntaje Mínimo</th>
           <th scope="col">Puntaje Máximo</th>
           <th scope="col">Editar</th>
           <th scope="col">Eliminar</th>
         </tr>
       </thead>

      <tbody>
        <?php
        if(isset($gruposocioeconomico)){
          foreach ($gruposocioeconomico as $pi) {
            echo '<tr scope="row">';
            echo "<td>".$pi->id."</td>";
            echo "<td>".$pi->idTipoFicha."</td>";
            echo "<td>".$pi->grupoSocioEconomico."</td>";
            echo "<td>".$pi->puntajeMinimo."</td>";
            echo "<td>".$pi->puntajeMaximo."</td>";
            echo '<td> <a href="'.constant('URL').'gruposocioeconomico/editar?id='.$pi->id.'">Editar</a> </td>';
            echo '<td> <a href="'.constant('URL').'gruposocioeconomico/eliminar?id='.$pi->id.'">Eliminar</a> </td>';
            echo "</tr>";
          }
        }else{
          Errores::errorBuscar("No encontramos grupos socieconómicos");
        }
         ?>

      </tbody>


     </table>
   </div>
 </div>

 </div>

<?php
require 'src/vista/templates/footer.php';
 ?>
