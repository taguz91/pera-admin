<?php

abstract class PersonaBD {

  static function getAll(){
    $sql = self::$BASEQUERY . ' ' . self::$ENDQUERY;
    return getArrayFromSQL($sql, []);
  }

  static private $BASEQUERY = '
  SELECT
  id_persona,
  persona_identificacion,
  persona_primer_apellido,
  persona_segundo_apellido,
  persona_primer_nombre,
  persona_segundo_nombre,
  persona_telefono,
  persona_celular,
  persona_correo
  FROM public."Personas"
  ';

  static private $ENDQUERY = '
    ORDER BY
    persona_primer_apellido,
    persona_primer_nombre;
  ';
}
 ?>
