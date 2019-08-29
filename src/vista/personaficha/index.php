
<br><br>
<div class="col-sm-10">

<form action="#" method="get" class="form-inline my-auto">

 <div class="form-group">
   <label for="txtBuscar">Buscar:</label>

   <div class="input-group mx-md-2">
     <input type="text" id="query" name="txtBuscar" class="form-control" placeholder="Ingrese aquí">
     <div class="input-group-append">
       <button type="button" name="button" class="btn btn-primary btn-sm">Buscar</button>
     </div>
   </div>

   <span class="text-danger">Errores</span>

 </div>

</form>

</div>

<div class="col-sm-2">
<a href="<?php echo constant('URL'); ?>personaFicha/guardarPersona.php"
class="btn btn-success btn-block">Ingresar</a>
</div>

</div>

<div class="row mt-4">
<table class="table">
<thead class="thead-dark bg-ista-blue">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">IDPermiso</th>
    <th scope="col">IDPersona</th>
    <th scope="col">ClavePersona</th>
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
      echo "<td>".$pf->clave."</td>";
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