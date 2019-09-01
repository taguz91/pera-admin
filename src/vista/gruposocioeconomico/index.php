<?php
require 'src/vista/templates/header.php';
 ?>

 <div class="container my-4">

   <div class="row">

     <div class="col-sm-10">

       <form action="#" method="get" class="form-inline my-auto">

        <div class="form-group">
          <label for="txtBuscar">Buscar:</label>

          <div class="input-group mx-md-2">
            <input type="text" id="query" name="txtBuscar" class="form-control" placeholder="Ingreso lo que buscará">
            <div class="input-group-append">
              <button type="button" name="button" class="btn btn-primary btn-sm">BU</button>
            </div>
          </div>

          <span class="text-danger">Errores</span>

        </div>

       </form>

     </div>

     <div class="col-sm-2">
       <a href="<?php echo constant('URL'); ?>permisoficha/guardar"
       class="btn btn-success btn-block">Ingresar</a>
     </div>

   </div>

   <div class="row mt-4">
     <table class="table">
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
           <!-- Aquí tienes que cambiar los atributos de $pi correspondientes con los de tu clase -->
         <?php
         if(isset($gruposocioeconomico)){
           foreach ($gruposocioeconomico as $pi) {
             echo '<tr scope="row">';
             echo "<td>".$pi->id."</td>";
             echo "<td>".$pi->idTipoFicha."</td>";
             echo "<td>".$pi->grupoSocionomico."</td>";
             echo "<td>".$pi->puntajeMinimo."</td>";
             echo "<td>".$pi->puntajeMaximo."</td>";
             echo '<td> <a href="'.constant('URL').'gruposocioeconomico/editar?id='.$pi->id.'">Editar</a> </td>';
             echo '<td> <a href="'.constant('URL').'gruposocioeconomico/eliminar?id='.$pi->id.'">Eliminar</a> </td>';
             echo "</tr>";
           }
         }else{
           Errores::errorBuscar("No encontramos a esos grupos socieconómicos");
         }
          ?>

       </tbody>
     </table>

   </div>

 </div>

<?php
require 'src/vista/templates/footer.php';
 ?>
