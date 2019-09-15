<?php
$pagina = 'Envío de correos';
require 'src/vista/templates/header.php';
?>
<div class="my-5">

  <div class="col-md-8 col-lg-6 mx-auto border rounded shadow">

    <h3 class="text-center my-3">
      Envío de correos
    </h3>
    <form class="form-horizontal" action="<?php echo constant('URL'); ?>personaficha/guardarpersona" method="post">

      <div class="form-group">
        <label for="permiso" class="control-label">Seleccione un Permiso:</label>
        <select class="form-control" name="permiso" required id="cmbPermisos">
          <option value="0">Permisos</option>

          <?php
          if (isset($permisos)) {
            foreach ($permisos as $pf) {
              echo '<option value="' . $pf->id . '">' . $pf->tipoFicha->tipoFicha . ' - ' . $pf->periodo->nombre . '</option>';
            }
          }
          ?>
        </select>
      </div>

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
        <input class="btn btn-success btn-block" type="submit" name="guardar" value="Guardar" id="btnGuardar" disabled>
      </div>

    </form>

  </div>
</div>


<?php
require 'src/vista/templates/footer.php';
?>


<script>
  console.log("VALIDACION INGRESO PERSONA FICHA");
  const cmbPermisos = $("#cmbPermisos");
  const cmbCiclos = $("#cmbCiclos");
  const inFechaInicio = $("#inFechaInicio");
  const inFechaFin = $("#inFechaFin");
  const btnGuardar = $("#btnGuardar")

  const validaciones = {
    valPermisos: false,
    valCiclos: false,
    valFechas: false,
  }

  function validarCmb(obj, mensajeAlerta, validacion) {

    if (obj.val() == 0) {
      alert(mensajeAlerta);
      validaciones[validacion] = false;
      obj.val(1)
    } else {
      validaciones[validacion] = true;
    }
    activarBtn();
  }

  function validarFechas() {

    const fechaInicio = inFechaInicio.val()
    const fechaFin = inFechaFin.val()

    if (fechaFin != "") {
      const inicio = new Date(fechaInicio)
      const fin = new Date(fechaFin)

      if (fechaInicio > fechaFin) {

        inFechaInicio.val("")
        inFechaFin.val("")

        alert("LA FECHA DE INICIO NO PUEDE SER MAYOR A LA FECHA DE FIN")
        validaciones.valFechas = false;
      } else {
        validaciones.valFechas = true;
      }

    }

    if (fechaInicio == "" || fechaFin == "") {
      validaciones.valFechas = false;
    }

    activarBtn();
  }

  function activarBtn() {

    if (
      validaciones.valPermisos &&
      validaciones.valCiclos &&
      validaciones.valFechas
    ) {
      btnGuardar.attr("disabled", false)
    } else {
      btnGuardar.attr("disabled", true)
    }

  }

  cmbPermisos.change(async (event) => validarCmb(cmbPermisos, "SELECCIONE UNA OPCION DIFERENTE", 'valPermisos'));
  cmbCiclos.change(async (event) => validarCmb(cmbCiclos, "SELECCIONE UNA OPCION DIFERENTE", 'valCiclos'));

  inFechaInicio.change(async (event) => validarFechas());
  inFechaFin.change(async (event) => validarFechas())
</script>
