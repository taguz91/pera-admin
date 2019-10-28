<?php
$pagina = 'Envío de correos';
require 'src/vista/templates/header.php';
?>
<div class="my-5">

  <div class="col-md-8 col-lg-6 mx-auto border rounded shadow">

    <div id="ctn-msg"></div>

    <form class="form-horizontal" action="<?php echo constant('URL'); ?>personaficha/guardarpersona" method="post">

      <h3 class="text-center my-3">Permiso de ingreso ficha</h3>

      <div class="form-group">
          <label for="periodo" class="control-label">Seleccione un periodo:</label>
          <select class="form-control" name="periodo" id="cmbPeriodos">
              <option value="0">Periodos</option>

              <?php
              if (isset($periodos)) {
                  foreach ($periodos as $pl) {
                      echo '<option value="' . $pl->id . '">' . $pl->nombre . '</option>';
                  }
              }
              ?>
          </select>
      </div>

      <div class="form-group">

          <label for="tipoficha" class="control-label">Seleccione un tipo de ficha</label>
          <select name="tipoficha" class="form-control" id="cmbFichas">
              <option value="0">Fichas</option>
              <?php
              //Cargamos todos los periodos de la base de datos
              if (isset($tipofichas)) {
                  foreach ($tipofichas as $tf) {
                      echo '<option value="' . $tf->id . '">' . $tf->tipoFicha . '</option>';
                  }
              }
              ?>
          </select>

      </div>

      <div class="form-row">
          <div class="col">
              <div class="form-group">
                  <label for="fechaInicio" class="control-label">Fecha Inicio</label>
                  <input type="date" name="fechaInicio" value="" class="form-control" id="inInicio">
              </div>
          </div>

          <div class="col">
              <div class="form-group">
                  <label for="fechaFin" class="control-label">Fecha Fin</label>
                  <input type="date" name="fechaFin" value="" class="form-control" id="inFin">
              </div>
          </div>
      </div>

      <h3 class="text-center my-3">
        Envío de correos
      </h3>

      <div class="form-group">
        <label for="ciclo" class="control-label">Seleccione un Ciclo:</label>
        <select class="form-control" name="ciclo" required id="cmbCiclos">
          <option value="0">CICLOS</option>
          <option value="1">PRIMEROS</option>
          <option value="2">SEGUNDOS</option>
          <option value="3">TERCEROS</option>
          <option value="4">CUARTOS</option>
          <option value="5">QUINTOS</option>
        </select>
      </div>

      <div class="form-group">
        <label for="">Correo:</label>
        <textarea name="correo" class="form-control" rows="5" cols="5" placeholder="Escriba el correo que enviara." required></textarea>
      </div>

      <div class="form-group">
        <input class="btn btn-success btn-block" type="submit" name="guardar" value="Guardar">
      </div>

    </form>

  </div>
</div>


<script type="text/javascript">
  const URL_PETICION;
  const SELECT_PERIODO = document.querySelector('#cmbPeriodos');
  const SELECT_CURSO = document.querySelector('#cmbCiclos');

  SELECT_PERIODO.addEventListener('change', function() {
    let v = SELECT_PERIODO.value;
    if (v > 0) {
      cargarCursos(v);
    }
  });

  function cargarCursos(idPeriodo) {
    fetch(URL_PETICION)
    .then(res => res.json())
    .then(data => {
      if(data.statuscode == '200') {
        llenarCiclos(data.items);
      } else {
        recetarCmbCiclo();
      }
    })
    .catch( e=> {
      console.log('Error: ' + e);
    })
  }

  function llenarCiclos(ciclos) {
    recetarCmbCiclo();
    ciclos.forEach(c => {


    });
  }

  function recetarCmbCiclo() {
    while (SELECT_CURSO.firstChild) {
      SELECT_CURSO.removeChild(SELECT_CURSO.firstChild);
    }

    let opt = document.createElement('option');
    opt.value = "0";
    opt.appendChild(
      document.createTextNode('Seleccione')
    );

    SELECT_CURSO
  }

</script>


<?php
require 'src/vista/templates/footer.php';
?>
