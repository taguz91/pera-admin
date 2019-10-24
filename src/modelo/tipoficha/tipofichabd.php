<?php
require_once 'src/modelo/tipoficha/tipofichamd.php';

abstract class TipoFichaBD{

  static function guardar($tipoFicha) {
    return execute(self::$INSERT, [
      'tipoFicha' => $tipoFicha->tipoFicha,
      'descripcion' => $tipoFicha->descripcion
    ]);
  }

  static function editar($tipoFichas) {
    return execute(self::$UPDATE, [
      'id' => $tipoFichas->id,
      'tipoFicha' => $tipoFichas->tipoFicha,
      'descripcion' => $tipoFichas->descripcion,
    ]);
  }

  static function eliminar($id) {
    return execute(self::$DELETE, [
      'id' => $id
    ]);
  }

  public static function getParaCombo(){
    $sql = '
    SELECT
    id_tipo_ficha,
    tipo_ficha
    FROM
    public."TipoFicha"
    WHERE
    tipo_ficha_activo = true
    '.self::$ENDQUERY;

    $res = getRes($sql, []);
    if($res != null){
      $items = array();
      while($r = $res->fetch(PDO::FETCH_ASSOC)){
        $tf = new TipoFichaMD();
        $tf->id = $r['id_tipo_ficha'];
        $tf->tipoFicha = $r['tipo_ficha'];
        array_push($items, $tf);
      }
      return $items;
    }
  }

  public static function getAll(){
    $sql = self::$BASEQUERY.'
    '.self::$ENDQUERY;

    $res = getRes($sql, []);
    if($res != null){
      return self::obtenerParaTbl($res);
    }else{
      return [];
    }
  }

  static function getPorId($idTipoFicha) {
    $sql = self::$BASEQUERY
    . ' AND id_tipo_ficha = :id ';

    $res = getRes($sql, [
      'id' => $idTipoFicha
    ]);
    if($res != null){
      $tf = null;
      while($r = $res->fetch(PDO::FETCH_ASSOC)){
        $tf = new TipoFichaMD();
        $tf->id = $r['id_tipo_ficha'];
        $tf->tipoFicha = $r['tipo_ficha'];
        $tf->descripcion = $r['tipo_ficha_descripcion'];
      }
      return $tf;
    }
  }

  private static function obtenerParaTbl($res){
    $items = array();
    while($r = $res->fetch(PDO::FETCH_ASSOC)){
      $tf = new TipoFichaMD();
      $tf->id = $r['id_tipo_ficha'];
      $tf->tipoFicha = $r['tipo_ficha'];
      $tf->descripcion = $r['tipo_ficha_descripcion'];

      array_push($items, $tf);
    }
    return $items;
  }

  private static $BASEQUERY = '
  SELECT
  id_tipo_ficha,
  tipo_ficha,
  tipo_ficha_descripcion
  FROM
  public."TipoFicha"
  WHERE
  tipo_ficha_activo = true
  ';

  private static $ENDQUERY = '
  ORDER BY
  tipo_ficha;
  ';

  public static $INSERT = '
  INSERT INTO public."TipoFicha"(
  tipo_ficha, tipo_ficha_descripcion)
  VALUES(:tipoFicha, :descripcion)';

  public static $UPDATE = '
  UPDATE public."TipoFicha"
  SET tipo_ficha = :tipoFicha,
  tipo_ficha_descripcion = :descripcion 
  WHERE id_tipo_ficha = :id;';

  public static $DELETE = '
  UPDATE public."TipoFicha"
  SET tipo_ficha_activo = false
  WHERE id_tipo_ficha = :id;
  ';
}
?>
