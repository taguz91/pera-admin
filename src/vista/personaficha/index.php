<?php
require 'src/vista/templates/header.php';
 ?>


<div class="card shadown mb-4">
  <div class="card-header py-3">
    <div class="row">
      <div class="col">
        <h6 class="m-0 font-weight-bold text-primary">
          Todas las fichas enviadas a una persona
        </h6>
      </div>

      <div class="col-4 col-lg-2">
        <a href="<?php echo constant('URL') ?>personaficha/guardarpersona" class="btn btn-success btn-block">Ingresar </a>
      </div>

    </div>
  </div>

  <div class="card-body">
    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">IDPermiso</th>
            <th scope="col">IDPersona</th>
            <th scope="col">Nombre Persona</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Fecha Modificación</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>

        <tbody>
          <?php
          if(isset($personaFichas)){
            foreach ($personaFichas as $pf) {
              echo '<tr scope="row">';
              echo "<td>".$pf->idPersonaFicha."</td>";
              echo "<td>".$pf->idPermisoIngFicha."</td>";
              echo "<td>".$pf->idPersona."</td>";
              echo "<td>".$pf->persona->primerNombre." ".$pf->persona->primerApellido."</td>";
              echo "<td>".$pf->fechaIngreso."</td>";
              echo "<td>".$pf->fechaModificacion."</td>";
              echo '<td> <a href="'.constant('URL').'personaFicha/editarpersona?id='.$pf->idPersonaFicha.'">Editar</a> </td>';
              echo '<td> <a href="'.constant('URL').'personaFicha/eliminarpersona?id='.$pf->idPersonaFicha.'">Eliminar</a> </td>';
              echo "</tr>";
            }
          }else{
            Errores::errorBuscar("No encontramos las fichas de las personas");
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
