<?php
require './utils.php';
require './src/modelo/prueba/pruebamd.php';

class PruebaBD extends PruebaMD {

  function insertarPermiso(){
    $sql = '
    INSERT INTO public."PermisoIngresoFichas"(
    id_prd_lectivo, id_tipo_ficha, permiso_ingreso_fecha_inicio, permiso_ingreso_fecha_fin)
    VALUES (:idPeriodo, :idTipoFicha, :fechaInicio, :fechaFin);
    ';

    $ct = getCon();
    if($ct != null){
      $sentencia = $ct->prepare($sql);
      $res = $sentencia->execute([
        'idPeriodo' => 21,
        'idTipoFicha' => 1,
        'fechaInicio' => '27/5/2019',
        'fechaFin' => '27/12/2019'
      ]);
      if($res != null){
          echo "<h1>Guardamos correctamente</h1>";
      }
    }
  }
}
 ?>
