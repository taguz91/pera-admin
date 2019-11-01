<?php
abstract class PeriodoLectivoBD {

  static function getParaCombo(){
    $sql = '
    SELECT
    id_prd_lectivo,
    prd_lectivo_nombre
    FROM
    public."PeriodoLectivo"
    WHERE
    prd_lectivo_activo = true AND
    prd_lectivo_estado = true
    ORDER BY
    prd_lectivo_fecha_fin DESC;
    ';
    return getArrayFromSQL($sql, []);
  }

}

 ?>
