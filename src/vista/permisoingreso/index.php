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
            <input type="text" id="query" name="txtBuscar" class="form-control" placeholder="Ingreso lo que buscara">
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
           <th scope="col">IDPeriodo</th>
           <th scope="col">IDTipoFicha</th>
           <th scope="col">Fecha Inicio</th>
           <th scope="col">Fecha Fin</th>
           <th scope="col">Editar</th>
           <th scope="col">Eliminar</th>
         </tr>
       </thead>
       <tbody>
         <?php
         if(isset($permisoingresos)){
           foreach ($permisoingresos as $pi) {
             echo '<tr scope="row">';
             echo "<td>".$pi->id."</td>";
             echo "<td>".$pi->idPeriodo."</td>";
             echo "<td>".$pi->idTipoFicha."</td>";
             echo "<td>".$pi->fechaInicio."</td>";
             echo "<td>".$pi->fechaFin."</td>";
             echo '<td> <a href="'.constant('URL').'permisoficha/editar?id='.$pi->id.'">Editar</a> </td>';
             echo '<td> <a href="'.constant('URL').'permisoficha/eliminar?id='.$pi->id.'">Eliminar</a> </td>';
             echo "</tr>";
           }
         }else{
           Errores::errorBuscar("No encontramos tipos de fichas");
         }
          ?>

       </tbody>
     </table>

   </div>

 </div>

<?php
require 'src/vista/templates/footer.php';
 ?>
