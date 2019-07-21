<?php
require_once 'src/modelo/clases/periodolectivomd.php';

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

    $ct = getCon();
    if($ct != null){
      $res = $ct->query($sql);
      if($res != null){
        $items = array();
        while($r = $res->fetch(PDO::FETCH_ASSOC)){
          $pl = new PeriodoLectivoMD();
          $pl->id = $r['id_prd_lectivo'];
          $pl->nombre = $r['prd_lectivo_nombre'];
          array_push($items, $pl);
        }
        return $items;
      }else{
        return [];
      }
    }
  }



}

 ?>
