<?php
require_once "src/modelo/personaficha/personaficha.php";
require_once "src/modelo/clases/personamd.php";

abstract class PersonaFichaBD {

  static function guardarPersonaFicha($personaFicha) {
    $ct = getCon();
    if ($ct != null) {
      $sentencia = $ct->prepare(self::$INSERT);
      $res = $sentencia->execute([
        'id_permiso_ingreso_ficha' => $personaFicha->idPermisoIngFicha,
        'id_persona' => $personaFicha->idPersona,
        'persona_ficha_clave' => $personaFicha->clave
      ]);
      if ($res != null) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  static function editarPersonaFicha($id, $clave){
    $ct = getCon();
    if ($ct != null) {
      $sentencia = $ct->prepare(self::$UPDATE);
      return $sentencia->execute([
        'id' => $id,
        'persona_ficha_clave' => $clave
      ]);
    } else {
      return false;
    }
  }

  static function eliminarPersonaFicha($id){
    $ct = getCon();
    if ($ct != null) {
      $sentencia = $ct->prepare(self::$DELETE);
      $res = $sentencia->execute([
        'id_persona_ficha' => $id
      ]);
      if ($res != null) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  static function getMatricula($idPeriodo)
  {
    $sql = '
      SELECT
      id_matricula,
      id_alumno,
      id_prd_lectivo,
      matricula_fecha,
      matricula_tipo,
      matricula_activa
      FROM
      public."Matricula"
      WHERE
      matricula_activa = true AND
      id_prd_lectivo = ' . $idPeriodo . '
      ORDER BY
      matricula_fecha DESC;
      ';

    $ct = getCon();
    if ($ct != null) {
      $res = $ct->query($sql);
      if ($res != null) {
        $items = array();
        while ($r = $res->fetch(PDO::FETCH_ASSOC)) {
          $m = new MatriculaMD();
          $m->idMatricula = $r['id_matricula'];
          $m->idAlumno = $r['id_alumno'];
          $m->idPrdLectivo = $r['id_prd_lectivo'];
          $m->matriculaFecha = $r['matricula_fecha'];
          $m->matriculaTipo = $r['matricula_tipo'];
          $m->matriculaActivo = $r['matricula_activa'];
          array_push($items, $m);
        }
        return $items;
      } else {
        return [];
      }
    }
  }

  static function getAll()
  {
    $sql = self::$BASEQUERY . ' ' . self::$ENDQUERY;
    $ct = getCon();
    if ($ct != null) {
      $res = $ct->query($sql);
      if ($res != null) {
        return self::obtenerParaTbl($res);
      } else {
        return [];
      }
    }
  }

  static function getCorreosEst($numCiclo, $idPermiso)
  {
    $sql = self::$ESTUDIANTE . " (SELECT id_prd_lectivo FROM public.\"PermisoIngresoFichas\" WHERE id_permiso_ingreso_ficha = $idPermiso)  AND
    curso_ciclo = $numCiclo))) AND id_persona NOT IN
    (SELECT id_persona FROM public.\"PersonaFicha\" WHERE id_permiso_ingreso_ficha = $idPermiso) ORDER BY id_persona;";
    $ct = getCon();
    if ($ct != null) {
      $res = $ct->query($sql);
      if ($res != null) {
        return self::obtenerParaTblPer($res);
      } else {
        return [];
      }
    }
  }

  static function getCorreosDoc($numCiclo, $idPermiso)
  {
    $sql = self::$DOCENTE . " (SELECT id_prd_lectivo FROM public.\"PermisoIngresoFichas\" WHERE id_permiso_ingreso_ficha = $idPermiso) AND
    curso_ciclo = $numCiclo)) AND id_persona NOT IN
    (SELECT id_persona FROM public.\"PersonaFicha\" WHERE id_permiso_ingreso_ficha = $idPermiso) ORDER BY id_persona;";
    $ct = getCon();
    if ($ct != null) {
      $res = $ct->query($sql);
      if ($res != null) {
        return self::obtenerParaTblPer($res);
      } else {
        return [];
      }
    }
  }

  static function getPorId($id)
  {
    $sql = '
        SELECT
        pr.id_persona_ficha,
        pi.id_permiso_ingreso_ficha,
        p.id_persona,
        pr.persona_ficha_clave,
        pr.persona_ficha_fecha_ingreso,
        pr.persona_ficha_fecha_modificacion
        FROM
        public."PersonaFicha" pr,
        public."PermisoIngresoFichas" pi,
        public."Personas" p
        WHERE
        pr.id_permiso_ingreso_ficha = pi.id_permiso_ingreso_ficha
        AND pr.id_persona = p.id_persona
        AND pr.persona_ficha_activa = true
        AND id_persona_ficha = ' . $id . ';';

    $ct = getCon();
    if ($ct != null) {
      $res = $ct->query($sql);
      if ($res != null) {
        $pi = new PermisoIngresoMD();
        while ($r = $res->fetch(PDO::FETCH_ASSOC)) {
          $pi->id = $r['id_permiso_ingreso_ficha'];
          $pi->idPeriodo = $r['id_prd_lectivo'];
          $pi->idTipoFicha = $r['id_tipo_ficha'];
          $pi->fechaInicio = $r['permiso_ingreso_fecha_inicio'];
          $pi->fechaFin = $r['permiso_ingreso_fecha_fin'];
        }
        return $pi;
      } else {
        return null;
      }
    }
  }

  static function buscarPorNombre($aguja)
  {
    $sql = self::$BASEQUERY
      . " AND p.persona_primer_apellido ILIKE '%$aguja%' OR p.persona_segundo_apellido ILIKE '%$aguja%'
        OR p.persona_primer_nombre ILIKE '%$aguja%' OR p.persona_segundo_nombre ILIKE '%$aguja%'"
      . self::$ENDQUERY;
    $ct = getCon();
    if ($ct != null) {
      $res = $ct->query($sql);
      if ($res != null) {
        return self::obtenerParaTbl($res);
      } else {
        return [];
      }
    }
  }

  static function buscarPorCedula($aguja)
  {
    $sql = self::$BASEQUERY
      . " AND p.persona_identificacion ILIKE '%$aguja%' "
      . self::$ENDQUERY;
    $ct = getCon();
    if ($ct != null) {
      $res = $ct->query($sql);
      if ($res != null) {
        return self::obtenerParaTbl($res);
      } else {
        return [];
      }
    }
  }

  private static function obtenerParaTbl($res)
  {
    $items = array();
    while ($r = $res->fetch(PDO::FETCH_ASSOC)) {
      //var_dump($r);
      $pi = new PersonaFichaMD();
      $pe = new PersonaFichaMD();
      $pi->idPersonaFicha = $r['id_persona_ficha'];
      $pi->idPermisoIngFicha = $r['id_permiso_ingreso_ficha'];
      $pi->idPersona = $r['id_persona'];
      $pi->clave = $r['persona_ficha_clave'];
      $pi->fechaIngreso = $r['persona_ficha_fecha_ingreso'];
      $pi->fechaModificacion = $r['persona_ficha_fecha_modificacion'];
      $pe->primerNombre = $r['persona_primer_nombre'];
      $pe->primerApellido = $r['persona_primer_apellido'];
      $pi->persona = $pe;
      array_push($items, $pi);
    }
    return $items;
  }

  private static function obtenerParaTblPer($res)
  {
    $items = array();
    while ($r = $res->fetch(PDO::FETCH_ASSOC)) {
      $p = new PersonaMD();
      $p->idPersona = $r['id_persona'];
      $p->correo = $r['persona_correo'];
      array_push($items, $p);
    }
    return $items;
  }

  public static $BASEQUERY = '
      SELECT
      pr.id_persona_ficha,
      pi.id_permiso_ingreso_ficha,
      p.id_persona,
      pr.persona_ficha_clave,
      pr.persona_ficha_fecha_ingreso,
      pr.persona_ficha_fecha_modificacion,
      p.persona_primer_nombre,
      p.persona_primer_apellido
      FROM
      public."PersonaFicha" pr,
      public."PermisoIngresoFichas" pi,
      public."Personas" p
      WHERE
      pr.id_permiso_ingreso_ficha = pi.id_permiso_ingreso_ficha
      AND pr.id_persona = p.id_persona
      AND pr.persona_ficha_activa = true';

  public static $ENDQUERY = '
      ORDER BY
      pr.persona_ficha_fecha_ingreso DESC';

  public static $INSERT = '
      INSERT INTO public."PersonaFicha"(
        id_permiso_ingreso_ficha, id_persona, persona_ficha_clave, persona_ficha_activa)
      VALUES(
        :id_permiso_ingreso_ficha,
        :id_persona, bytea(md5(:persona_ficha_clave)),
        true)';

  public static $UPDATE = '
      UPDATE public."PersonaFicha"
      SET persona_ficha_clave =  bytea(md5(:persona_ficha_clave))
      WHERE id_persona_ficha = :id;';

  public static $DELETE = '
      UPDATE public."PersonaFicha"
      SET persona_ficha_activa = false
      WHERE id_persona_ficha =: id_persona_ficha;
      ';

  public static $ESTUDIANTE = '
      SELECT id_persona, persona_correo FROM public."Personas" WHERE
      id_persona IN (SELECT id_persona FROM public."Alumnos" WHERE id_alumno IN
      (SELECT id_alumno FROM public."AlumnoCurso" WHERE id_curso IN
        (SELECT DISTINCT id_curso FROM public."Cursos" WHERE id_prd_lectivo =';

  public static $DOCENTE = '
  SELECT id_persona, persona_correo FROM public."Personas" WHERE
  id_persona IN (SELECT id_persona FROM public."Docentes" WHERE id_docente IN
   (SELECT DISTINCT id_docente FROM public."Cursos" WHERE id_prd_lectivo =';
}
