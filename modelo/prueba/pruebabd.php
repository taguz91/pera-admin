<?php
require 'prueba.php';

class PruebaBD extends PruebaMD{


  function insertarPermiso(){
    $sql = '
    INSERT INTO public."PermisoIngresoFichas"(
    id_prd_lectivo, id_tipo_ficha, permiso_ingreso_fecha_inicio, permiso_ingreso_fecha_fin)
    VALUES (:idPeriodo, :idTipoFicha, :fechaInicio, :fechaFin);
    ';

    $ct = $this::getCon();
    if($ct != null){
      $setencia = $ct->prepare($sql);
      $sentencia->bindParam(':idPeriodo', 21);
      $sentencia->bindParam(':idTipoFicha', 1);
      $sentencia->bindParam(':fechaInicio', '27/5/2019');
      $sentencia->bindParam(':fechaFin', '27/12/2019');
      $res = $this->noquery($sentencia);

      if($res != null){
          echo "<h1>Guardamos correctamente</h1>";
      }
    }
  }
}
 ?>
