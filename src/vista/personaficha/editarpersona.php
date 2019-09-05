<br><br>

<h2>Editar</h2>
<div class="formulario">

<form class="form-inline my-auto" action="#" method="get">

<div class="form-group">

  <label for="">Buscar:</label>
  <div class="input-group mx-md-2">
    <input type="text" name="busqueda" class="form-control">
    <div class="input-group-append">
      <button type="button" name="button" class="btn btn-primary btn-sm">BU</button>
    </div>
  </div>

  <span class="text-danger">Errores</span>
</div>

<div class="row mt-4">
    <table class="table">
      <thead class="thead-dark bg-ista-blue">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">IDPermiso</th>
          <th scope="col">IDPersona</th>
          <th scope="col">Nombre Persona</th>
          <th scope="col">Fecha Inicio</th>
          <th scope="col">Fecha Modificación</th>
          <th scope="col">Editar</th>
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
            echo "</tr>";
          }
        }else{
          Errores::errorBuscar("No encontramos las fichas de las personas");
        }
         ?>

      </tbody>
    </table>

</form>


  <form class="" action="<?php echo constant('URL'); ?>personaficha/editarpersona" method="post">
    <input type="hidden" name="idPersona" value="<?php echo $pi->idPersona; ?>">

    <button class="btn btn-primary">
      Cambiar Contraseña
    </button>

    <div class="form-group">
      <label for="password" class="control-label">Ingrese la nueva Contraseña</label>
      <input type="text" name="password">
    </div>

    <input type="submit" name="editar" value="Editar">
  </form>

  <button class="btn btn-primary">Enviar en Correo nuevo</button>

  <label for="correo" class="control-label">Ingrese un nuevo Correo</label>
  <input type="text" name="correo">

  <button class="btn btn-primary">Enviar Correo</button>


</div>