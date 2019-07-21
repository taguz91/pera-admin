<?php

require_once("src/modelo/permisoingreso/permisoingreso.php");

abstract class PermisoIngresoBD {

    static function guardar($permisoIngreso) {
        $sql = '
    INSERT INTO public."PermisoIngresoFichas"(
    id_prd_lectivo, id_tipo_ficha, permiso_ingreso_fecha_inicio, permiso_ingreso_fecha_fin)
    VALUES (:idPeriodo, :idTipoFicha, :fechaInicio, :fechaFin);
    ';
        echo $permisoIngreso->id;
        echo $permisoIngreso->fechaInicio;
        echo $permisoIngreso->fechaFin;

        $ct = getCon();

        if ($ct != null) {
            $sentencia = $ct->prepare($sql);
            $res = $sentencia->execute([
                'idPeriodo' => $permisoIngreso->idPeriodo,
                'idTipoFicha' => $permisoIngreso->idTipoFicha,
                'fechaInicio' => $permisoIngreso->fechaInicio,
                'fechaFin' => $permisoIngreso->fechaFin
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

    static function eliminar($id) {
        $sql = '
    UPDATE public."PermisoIngresoFichas"
    SET permiso_ingreso_activo=false
    WHERE id_permiso_ingreso_ficha=:id;
    ';

        $ct = getCon();
        if ($ct != null) {
            $sentencia = $ct->prepare($sql);
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

    static function editar($permisoIngreso) {
        $sql = '
  UPDATE public."PermisoIngresoFichas"
  SET id_prd_lectivo=:idPeriodo,
  id_tipo_ficha=:idTipoFicha,
  permiso_ingreso_fecha_inicio =: fechaInicio,
  permiso_ingreso_fecha_fin =: fechaFin
  WHERE id_permiso_ingreso_ficha=:id;
  ';

        $ct = getCon();
        if ($ct != null) {
            $sentencia = $ct->prepare($sql);
            $res = $sentencia->execute([
                'id' => $permisoIngreso->id,
                'idPeriodo' => $permisoIngreso->idPeriodo,
                'idTipoFicha' => $permisoIngreso->idTipoFicha,
                'fechaInicio' => $permisoIngreso->fechaInicio,
                'fechaFin' => $permisoIngreso->fechaFin
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

    static function getPorId($id){
      $sql = '
      SELECT
      id_permiso_ingreso_ficha,
      p.id_prd_lectivo,
      tF.id_tipo_ficha,
      pF.permiso_ingreso_fecha_inicio,
      pF.permiso_ingreso_fecha_fin
      FROM public."PermisoIngresoFichas" pF, public."PeriodoLectivo" p,public."TipoFicha" tF
      WHERE pF.id_prd_lectivo=p.id_prd_lectivo
      AND pF.id_tipo_ficha=tF.id_tipo_ficha
      AND pF.permiso_ingreso_activo=true
      AND id_permiso_ingreso_ficha = '.$id.';';

      $ct = getCon();
      if ($ct != null) {
          $res = $ct->query($sql);
          if ($res != null) {
              $pi = new PermisoIngresoMD();
              while($r = $res->fetch(PDO::FETCH_ASSOC)){

                $pi->id = $r['id_permiso_ingreso_ficha'];

                $pi->idPeriodo = $r['id_prd_lectivo'];

                $pi->idTipoFicha = $r['id_tipo_ficha'];

                $pi->fechaInicio = $r['permiso_ingreso_fecha_inicio'];

                $pi->fechaFin = $r['permiso_ingreso_fecha_fin'];


              }
              return $pi;
          }else{
            return null;
          }
      }
    }

    static function getAll() {
        $sql = '
        SELECT
        id_permiso_ingreso_ficha,
        p.prd_lectivo_nombre,
        tF.tipo_ficha,
        pF.permiso_ingreso_fecha_inicio,
        pF.permiso_ingreso_fecha_fin
        FROM public."PermisoIngresoFichas" pF, public."PeriodoLectivo" p,public."TipoFicha" tF
        WHERE pF.id_prd_lectivo=p.id_prd_lectivo
        AND pF.id_tipo_ficha=tF.id_tipo_ficha
        AND pF.permiso_ingreso_activo=true ;';

        $ct = getCon();
        if ($ct != null) {
            $res = $ct->query($sql);
            if ($res != null) {
                $items = array();
                while($r = $res->fetch(PDO::FETCH_ASSOC)){
                  //var_dump($r);
                  $pi = new PermisoIngresoMD();

                  $pi->id = $r['id_permiso_ingreso_ficha'];

                  $pi->idPeriodo = $r['prd_lectivo_nombre'];

                  $pi->idTipoFicha = $r['tipo_ficha'];

                  $pi->fechaInicio = $r['permiso_ingreso_fecha_inicio'];

                  $pi->fechaFin = $r['permiso_ingreso_fecha_fin'];

                  array_push($items, $pi);
                }
                return $items;
            }else{
              return [];
            }
        }
    }

}

?>
