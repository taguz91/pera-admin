<?php
require_once 'src/modelo/tipoficha/tipofichamd.php';

abstract class TipoFichaBD{

  static function guardar($tipoFicha) {
    $ct = getCon();

    if ($ct != null) {
        $sentencia = $ct->prepare(self::$INSERT);
        $res = $sentencia->execute([
            'tipoFicha' => $tipoFicha->tipoFicha,
            'descripcion' => $tipoFicha->descripcion
        ]);
        if ($res != null) {
            echo "<h1>Guardamos correctamente</h1>";
            return true;
        }else{
          return false;
        }
    } else {
        echo "<h1>No contamos con una conexion</h1>";
        return false;
    }
}

    static function editar($tipoFichas) {
        $ct = getCon();
        if ($ct != null) {
            $sentencia = $ct->prepare(self::$UPDATE);
            $res = $sentencia->execute([
                'id' => $tipoFichas->id,
                'tipoFicha' => $tipoFichas->tipoFicha,
                'descripcion' => $tipoFichas->descripcion,
            ]);
            if ($res != null) {
                echo "<h1>Editamos correctamente</h1>";
                return true;
            }else{
              return false;
            }
        }else {
          return false;
        }
    }


    static function eliminar($id) {

        $ct = getCon();
        if ($ct != null) {
            $sentencia = $ct->prepare(self::$DELETE);
            $res = $sentencia->execute([
                'id' => $id
            ]);
            if ($res != null) {
                echo "<h1>Eliminamos correctamente</h1>";
                return true;
            }else{
              return false;
            }
        }else{
          return false;
        }
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
    $ct = getCon();
    if($ct != null){
      $res = $ct->query($sql);
      if($res != null){
        $items = array();
        while($r = $res->fetch(PDO::FETCH_ASSOC)){
          $tf = new TipoFichaMD();
          $tf->id = $r['id_tipo_ficha'];
          $tf->tipoFicha = $r['tipo_ficha'];
          array_push($items, $tf);
        }
        return $items;
      }else{
        return [];
      }
    }
  }

  public static function getAll(){
    $sql = self::$BASEQUERY.'
    '.self::$ENDQUERY;
    $ct = getCon();
    if($ct != null){
      $res = $ct->query($sql);
      if($res != null){
        return self::obtenerParaTbl($res);
      }else{
        return [];
      }
    }
  }

  static function getPorId($idTipoFicha) {
    $sql = self::$BASEQUERY
    . ' AND id_tipo_ficha = :id ';
    $ct = getCon();
    if($ct != null){
      $res = $ct->prepare($sql);
      $res->execute([
        'id' => $idTipoFicha
      ]);
      $tf = null;
      while($r = $res->fetch(PDO::FETCH_ASSOC)){
        $tf = new TipoFichaMD();
        $tf->id = $r['id_tipo_ficha'];
        $tf->tipoficha = $r['tipo_ficha'];
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
      $tf->tipoficha = $r['tipo_ficha'];
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
    tipo_ficha_descripcion = :descripcion,
    WHERE id_tipo_ficha = :id;';

    public static $DELETE = '
    UPDATE public."TipoFicha"
    SET tipo_ficha_activo = false
    WHERE id_tipo_ficha = :id;
    ';
}
?>
