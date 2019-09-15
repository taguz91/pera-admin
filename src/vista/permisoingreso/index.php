<?php
$pagina = 'Permiso Ingreso Fichas';
require 'src/vista/templates/header.php';
 ?>

 <div class="card shadown mb-4">
  <div class="card-header py-3">
    <div class="row">
      <div class="col">
        <h6 class="m-0 font-weight-bold text-primary">
          Todos los permiso fichas ingresados
        </h6>
      </div>
      <div class="col-4 col-lg-2">
        <a href="<?php echo constant('URL'); ?>permisoficha/guardar"
        class="btn btn-success btn-block">Ingresar</a>
      </div>
    </div>
  </div>

    <div class="card-body">

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
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
</div>


<?php
require 'src/vista/templates/footer.php';
 ?>
