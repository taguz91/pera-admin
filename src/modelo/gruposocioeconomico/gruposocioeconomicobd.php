<?php
require_once "src/modelo/gruposocioeconomico/gruposocioeconomico.php";

abstract class GrupoSocioEconomicoBD {

  static function guardar($gs) {
    $sql = self::$INSERT;
    return execute($sql, [
      'idTipoFicha' => $gs->idTipoFicha,
      'grupoSocioEconomico' => $gs->grupoSocioEconomico,
      'puntajeMinimo' => $gs->puntajeMinimo,
      'puntajeMaximo' => $gs->puntajeMaximo
    ]);
  }

  static function editar($gs) {
    $sql = self::$UPDATE;
    return execute($sql, [
      'id' => $gs->id,
      'idTipoFicha' => $gs->idTipoFicha,
      'grupoSocioEconomico' => $gs->grupoSocioEconomico,
      'puntajeMinimo' => $gs->puntajeMinimo,
      'puntajeMaximo' => $gs->puntajeMaximo
    ]);
  }

  static function eliminar($id) {
    $sql = self::$DELETE;
    return execute($sql, [
      'id' => $id
    ]);
  }

  static function getPorId($id){
    $sql = '
    SELECT
    id_grupo_socioeconomico,
    tF.id_tipo_ficha,
    gS.grupo_socioeconomico,
    gS.puntaje_minimo,
    gS.puntaje_maximo
    FROM public."GrupoSocioeconomico" gS,
    public."TipoFicha" tF
    WHERE gS.id_tipo_ficha=tF.id_tipo_ficha
    AND gS.grupo_socioeconomico_activo=true
    AND id_grupo_socioeconomico = :id;';

    $res = getRes($sql, [
      'id' => $id
    ]);

    if ($res != null) {
      $gs = new GrupoSocioEconomicoMD();
      while($r = $res->fetch(PDO::FETCH_ASSOC)){
        $gs->id = $r['id_grupo_socioeconomico'];
        $gs->idTipoFicha = $r['id_tipo_ficha'];
        $gs->grupoSocioEconomico = $r['grupo_socioeconomico'];
        $gs->puntajeMinimo = $r['puntaje_minimo'];
        $gs->puntajeMaximo = $r['puntaje_maximo'];
      }
      return $gs;
    }
  }

  static function getAll() {
    $sql = self::$BASEQUERY.' '.self::$ENDQUERY;

    $res = getRes($sql, []);
    if ($res != null) {
      return self::obtenerParaTbl($res);
    }else{
      return [];
    }
  }

  static function getPorTipoFicha($idTipoFicha){
    $sql = self::$BASEQUERY. "
    AND tf.id_tipo_ficha = :idTipoFicha ".self::$ENDQUERY;

    $res = getRes($sql, [
      'idTipoFicha' => $idTipoFicha
    ]);
    if ($res != null) {
      return self::obtenerParaTbl($res);
    }else{
      return [];
    }
  }

  static function buscar($aguja){
    $sql = self::$BASEQUERY."
    AND gS.grupo_socioeconomico ILIKE :aguja ".self::$ENDQUERY;

    $res = getRes($sql, [
      'aguja' => '%'.$aguja.'%'
    ]);
    if ($res != null) {
      return self::obtenerParaTbl($res);
    }else{
      return [];
    }
  }

  private static function obtenerParaTbl($res){
    $items = array();
    while($r = $res->fetch(PDO::FETCH_ASSOC)){
      //var_dump($r);
      $gs = new GrupoSocioeconomicoMD();
      $gs->id = $r['id_grupo_socioeconomico'];
      $gs->idTipoFicha = $r['tipo_ficha'];
      $gs->grupoSocioEconomico = $r['grupo_socioeconomico'];
      $gs->puntajeMinimo = $r['puntaje_minimo'];
      $gs->puntajeMaximo = $r['puntaje_maximo'];

      array_push($items, $gs);
    }
    return $items;
  }

  public static $BASEQUERY = '
  SELECT
  gs.id_grupo_socioeconomico,
  tf.tipo_ficha,
  gS.grupo_socioeconomico,
  gS.puntaje_minimo,
  gS.puntaje_maximo
  FROM
  public."GrupoSocioeconomico" gS,
  public."TipoFicha" tf
  WHERE gS.id_tipo_ficha = tf.id_tipo_ficha
  AND gS.grupo_socioeconomico_activo = true
  ';

  public static $ENDQUERY = '
  ORDER BY
  gS.grupo_socioeconomico DESC';

  public static $INSERT = '
  INSERT INTO public."GrupoSocioeconomico"(
     id_tipo_ficha, grupo_socioeconomico, puntaje_minimo, puntaje_maximo)
  VALUES(:idTipoFicha, :grupoSocioEconomico, :puntajeMinimo, :puntajeMaximo )
  ';

  public static $UPDATE = '
  UPDATE public."GrupoSocioeconomico"
  SET id_tipo_ficha = :idTipoFicha,
  grupo_socioeconomico = :grupoSocioEconomico,
  puntaje_minimo = :puntajeMinimo,
  puntaje_maximo = :puntajeMaximo
  WHERE id_grupo_socioeconomico = :id;
  ';

  public static $DELETE = '
    UPDATE public."GrupoSocioeconomico"
    SET grupo_socioeconomico_activo = false
    WHERE id_grupo_socioeconomico = :id;
  ';

}

?>
