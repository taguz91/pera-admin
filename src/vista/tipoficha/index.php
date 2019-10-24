<?php
$pagina = 'Tipo Ficha';
require 'src/vista/templates/header.php';
 ?>


<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="row">
      <div class="col">
        <h6 class="m-0 font-weight-bold text-primary">
          Tipos de ficha
        </h6>
      </div>
      <div class="col-4 col-lg-2">
        <a href="<?php echo constant('URL'); ?>tipoficha/guardar"
        class="btn btn-success btn-block">
          Ingresar
        </a>
      </div>
    </div>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tipo Ficha</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Editar</th>
          </tr>
        </thead>

        <tbody>
          <?php if(isset($tiposfichas)){?>
            <?php foreach ($tiposfichas as $tf): ?>
              <tr scope="row">
                <td><?php echo $tf->id; ?></td>
                <td><?php echo $tf->tipoFicha; ?></td>
                <td><?php echo $tf->descripcion; ?></td>
                <td> <a href="<?php echo constant('URL').'tipoficha/editar/?editar='.$tf->id; ?>"> Editar </a> </td>
              </tr>
            <?php endforeach; ?>
            <?php }else{
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
