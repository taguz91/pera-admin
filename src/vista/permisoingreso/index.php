<?php
require 'src/vista/templates/header.php';
 ?>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>IDPeriodo</th>
      <th>IDTipoFicha</th>
      <th>Fecha Inicio</th>
      <th>Fecha Fin</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(isset($permisoingresos)){
      foreach ($permisoingresos as $pi) {
        echo "<tr>";
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
      echo "<h2>No encontramos tipos de fichas</h2>";
    }
     ?>



  </tbody>
</table>

<?php
require 'src/vista/templates/footer.php';
 ?>
