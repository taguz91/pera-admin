<?php

abstract class UsuarioBD {

  static function buscarParaLogin($usuario, $pass) {
    $sql = '
    SELECT
    u.usu_username,
    u.id_usuario,
    u.id_persona,
    p.persona_primer_nombre || \' \' ||
    p.persona_primer_apellido  AS nombre_persona
    FROM
    public."Usuarios" u,
    public."Personas" p
    WHERE
    usu_username = :user AND
    usu_password = set_byte( MD5(:pass) :: bytea, 4, 64 ) AND
    usu_estado = TRUE AND
    p.id_persona = u.id_persona;';

    return getOneFromSQL($sql, [
      'user' => $usuario,
      'pass' => $pass
    ]);
  }

}

 ?>
