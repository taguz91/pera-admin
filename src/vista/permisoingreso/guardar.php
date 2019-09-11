<?php
require 'src/vista/templates/header.php';
?>

<div class="container my-5">

    <div class="col-md-8 col-lg-6 mx-auto border rounded">

        <h3 class="text-center my-3">
            Ingreso de Permiso Ficha
        </h3>
        <form class="form-horizontal" action="<?php echo constant('URL'); ?>permisoficha/guardar" method="post">

            <div class="form-group">
                <label for="periodo" class="control-label">Seleccione un periodo:</label>
                <select class="form-control" name="periodo" id="cmbPeriodos">
                    <option value="0">Periodos</option>

                    <?php
                    //Cargamos todos los periodos de la base de datos
                    if (isset($periodos)) {
                        foreach ($periodos as $pl) {
                            echo '<option value="' . $pl->id . '">' . $pl->nombre . '</option>';
                        }
                    }
                    ?>
                    <!--                     <option value="1">test</option> -->
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
                    <!--                     <option value="1">test</option> -->
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

            <div class="form-group">
                <input class="btn btn-success btn-block" type="submit" name="guardar" value="Guardar" disabled id="btnGuardar">
            </div>

        </form>

    </div>
</div>


<?php
require 'src/vista/templates/footer.php';
?>
<script src="<?php echo constant('URL'); ?>public/js/jquery.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/popper.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/jquery.js"></script>

<script>
    //Validamos
    //Validamos campo periodos
    //Validamos campo tipo de ficha
    //Validamos fechas
    // Fecha cierre debe ser mayor a la de inicio
    console.log("VALIDACION GUARDA.PHP");

    let valPeriodos = false;
    let valFichas = false;
    let valFechas = false;

    const btnGuardar = $("#btnGuardar")

    function activarBtn() {
        if (valPeriodos && valFichas && valFechas) {
            btnGuardar.attr("disabled", false)
        } else {
            btnGuardar.attr("disabled", true)
        }
    }

    $("#cmbPeriodos").change(function(event) {
        const cmb = $(this)

        if (cmb.val() == 0) {
            cmb.val(1)
            alert("SELECCIONE UN PERIODO")
            valPeriodos = false;
        } else {
            valPeriodos = true;
        }
        activarBtn();
    });

    $("#cmbFichas").change(function(event) {
        const cmb = $(this)

        if (cmb.val() == 0) {
            cmb.val(1)
            alert("SELECCIONE UNA FICHA")
            valFichas = false;
        } else {
            valFichas = true;
        }
        activarBtn();

    });


    function validarFechas() {
        const fInicio = $("#inInicio").val()
        const fFin = $("#inFin").val()


        if (fFin != "") {
            const fechaInicio = new Date(fInicio)
            const fechaFin = new Date(fFin)

            if (fechaInicio > fechaFin) {

                $(this).val("")
                $("#inFin").val("")
                alert("LA FECHA DE INICIO NO PUEDE SER MAYOR A LA FECHA DE FIN")
                valFechas = false;
            } else {
                valFechas = true;
            }

        }

        if (fInicio == "" || fFin == "") {
            valFechas = false;
        }
        activarBtn();
    }

    $("#inInicio").change(async () => validarFechas());

    $("#inFin").change(async () => validarFechas());
</script>