<?php
require_once 'src/modelo/usuario/usuario.php';
require_once 'src/modelo/usuario/rol.php';
require_once 'src/modelo/clases/personamd.php';

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

  static function getRoles($username){
    $sql = '
    SELECT
    ru.id_rol,
    r.rol_nombre,
    r.rol_observaciones
    FROM
    public."RolesDelUsuario" ru,
    publoc."Roles" r
    WHERE
    ru.usu_username = :user AND
    r.id_rol = ru.id_rol AND
    rol_estado = true;
    ';

    $res = getRes($sql, [
      'user' => $username
    ]);

    if($res != null){
      $roles = array();
      while($r = $res->fetch(PDO::FETCH_ASSOC)){
        $rol = new RolMD();
        $rol->id = $r['id_rol'];
        $rol->nombre = $r['rol_nombre'];
        $rol->observacion = $r['rol_observaciones'];
        array_push($roles, $rol);
      }
      return $roles;
    }
  }

}

 ?>
