<?php
require_once "src/modelo/gruposocioeconomico/gruposocioeconomico.php";

abstract class GrupoSocioEconomicoBD {

    static function guardarGrupoSocioeconomico($grupoSocioEconomico) {
        $ct = getCon();

        if ($ct != null) {
            $sentencia = $ct->prepare(self::$INSERT);
            $res = $sentencia->execute([
                'idTipoFicha' => $grupoSocioEconomico->idTipoFicha,
                'grupoSocioEconomico' => $grupoSocioEconomico->grupoSocioEconomico,
                'puntajeMinimo' => $grupoSocioEconomico->puntajeMinimo,
                'puntajeMaximo' => $grupoSocioEconomico->puntajeMaximo
            ]);
            if ($res != null) {
                echo "<h1>Guardamos correctamente</h1>";
                return true;
            }else{
              return false;
            }
        } else {
            echo "<h1>No contamos con una conexión</h1>";
            return false;
        }
    }

    static function editarGrupoSocioeconomico($grupoSocioEconomico) {
        $ct = getCon();
        if ($ct != null) {
            $sentencia = $ct->prepare(self::$UPDATE);
            $res = $sentencia->execute([
                'id' => $grupoSocioEconomico->id,
                'idTipoFicha' => $grupoSocioEconomico->idTipoFicha,
                'grupoSocioEconomico' => $grupoSocioEconomico->grupoSocioEconomico,
                'puntajeMinimo' => $grupoSocioEconomico->puntajeMinimo,
                'puntajeMaximo' => $grupoSocioEconomico->puntajeMaximo
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


    static function eliminarGrupoSocioeconomico($id) {

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

    static function getPorId($id){
        $sql = '
        SELECT
        id_grupo_socioeconomico,
        tF.id_tipo_ficha,
        gS.grupo_socioeconomico,
        gS.puntaje_minimo,
        gS.puntaje_maximo,
        FROM public."GrupoSocioeconomico" gS,public."TipoFicha" tF
        WHERE gS.id_tipo_ficha=tF.id_tipo_ficha
        AND gS.grupo_socioeconomico_activo=true
        AND id_grupo_socioeconomico = '.$id.';';

        $ct = getCon();
        if ($ct != null) {
            $res = $ct->query($sql);
            if ($res != null) {
                $pi = new GrupoSocioEconomicoMD();
                while($r = $res->fetch(PDO::FETCH_ASSOC)){
                  $pi->id = $r['id_grupo_socioeconomico'];
                  $pi->idTipoFicha = $r['id_tipo_ficha'];
                  $pi->grupoSocioeconomico = $r['grupo_socioeconomico'];
                  $pi->fechaInicio = $r['puntaje_minimo'];
                  $pi->fechaFin = $r['puntaje_maximo'];

                }
                return $pi;
            }else{
              return null;
            }
        }
      }


    static function getAll() {
        $sql = self::$BASEQUERY.' '.self::$ENDQUERY;
        $ct = getCon();
        if ($ct != null) {
            $res = $ct->query($sql);
            if ($res != null) {
                return self::obtenerParaTbl($res);
            }else{
              return [];
            }
        }
    }

    static function getPorTipoFicha($idTipoFicha){
      $sql = self::$BASEQUERY
      ." AND tf.id_tipo_ficha = $idTipoFicha "
      .self::$ENDQUERY;
      $ct = getCon();
      if ($ct != null) {
          $res = $ct->query($sql);
          if ($res != null) {
              return self::obtenerParaTbl($res);
          }else{
            return [];
          }
      }
    }

    static function buscar($aguja){
      $sql = self::$BASEQUERY
      ." AND gS.grupo_socioeconomico ILIKE '%$aguja%' "
      .self::$ENDQUERY;
      $ct = getCon();
      if ($ct != null) {
          $res = $ct->query($sql);
          if ($res != null) {
              return self::obtenerParaTbl($res);
          }else{
            return [];
          }
      }
    }

    private static function obtenerParaTbl($res){
      $items = array();
      while($r = $res->fetch(PDO::FETCH_ASSOC)){
        //var_dump($r);
        $pi = new GrupoSocioeconomicoMD();
        $pi->id = $r['id_grupo_socioeconomico'];
        $pi->idTipoFicha = $r['tipo_ficha'];
        $pi->grupoSocioEconomico = $r['grupo_socioeconomico'];
        $pi->puntajeMinimo = $r['puntaje_minimo'];
        $pi->puntajeMinimo = $r['puntaje_maximo'];

        array_push($items, $pi);
      }
      return $items;
    }

    public static $BASEQUERY = '
    SELECT
    id_grupo_socioeconomico,
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
    VALUES(:idTipoFicha, :grupoSocioecomomo, :puntajeMinimo, :puntajeMaximo )
    ';


    public static $UPDATE = '
    UPDATE public."GrupoSocioeconomico"
    SET id_tipo_ficha = :idTipoFicha,
    grupo_socioecomimino = :grupoSocioEconomico,
    puntaje_minimo = :puntajeMinimo,
    puntaje_maximo = :puntajeMaximo
    WHERE id_grupo_socioeconomico =: id;
    ';

    public static $DELETE = '
      UPDATE public."GrupoSocioeconomico"
      SET grupo_socioeconomico_activo = false
      WHERE id_grupo_socioeconomico=:id;
    ';

}

?>
