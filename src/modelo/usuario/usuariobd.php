<?php
require_once 'src/modelo/usuario/usuario.php';
require_once 'src/modelo/usuario/rol.php';
require_once 'src/modelo/clases/personamd.php';

abstract class UsuarioBD {

  static function buscarParaLogin ($usuario, $pass) {
    $sql = '
    SELECT
    u.usu_username,
    u.id_usuario,
    u.id_persona,
    p.persona_primer_nombre,
    p.persona_segundo_nombre,
    p.persona_primer_apellido,
    p.persona_segundo_apellido,
    p.persona_identificacion,
    p.persona_correo,
    p.persona_celular
    FROM
    public."Usuarios" u,
    public."Personas" p
    WHERE
    usu_username = '. "'%$usuario%'".' AND
    usu_password = set_byte( MD5('."'$pass'".') :: bytea, 4, 64 ) AND
    usu_estado = TRUE AND
    p.id_persona = u.id_persona;
    ';

    $ct = getCon();
    if($ct != null){
      $res = $ct->query($sql);
      if($res != null){
        $u = null;
        $p = new PersonaMD();
        while($r = $res->fetch(PDO::FETCH_ASSOC)){
          $u = new UsuarioMD();

          $u->id = $r['id_usuario'];
          $u->user = $r['usu_username'];

          $p->primerNombre = $r['persona_primer_nombre'];
          $p->segundoNombre = $r['persona_segundo_nombre'];
          $p->primerApellido = $r['persona_primer_apellido'];
          $r->segundoApellido = ['persona_segundo_apellido'];
          $r->identificacion = ['persona_identificacion'];
          $r->correo = ['persona_correo'];
          $r->celular = ['persona_celular'];

          $u->persona = $p;
          $u->roles = self::getRoles($usuario);
        }
        return $u;
      }
    }else {
      Errores::errorConectarBD('No pudimos establecer conexion para el login.');
      return [];
    }
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
    ru.usu_username = '.$username.' AND
    r.id_rol = ru.id_rol AND
    rol_estado = true;
    ';

    $ct = getCon();
    if($ct != null){
      $res = $ct->query($sql);
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
    }else {
      Errores::errorConectarBD('No podemos consultar los roles');
      return null;
    }
  }

}

 ?>
