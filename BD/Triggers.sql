--TipoFicha
CREATE OR REPLACE FUNCTION tipo_ficha_elim()
RETURNS TRIGGER AS $tipo_ficha_elim$
BEGIN
  IF new.tipo_ficha_activo = FALSE THEN
    INSERT INTO public."HistorialUsuarios"(
      usu_username, historial_fecha, historial_tipo_accion,
      historial_nombre_tabla, historial_pk_tabla,
      historial_ip)
    VALUES (USER, now(), 'DELETE', TG_TABLE_NAME,
    old.id_tipo_ficha, inet_client_addr());
  ELSE
    INSERT INTO public."HistorialUsuarios"(
      usu_username, historial_fecha, historial_tipo_accion,
      historial_nombre_tabla, historial_pk_tabla,
      historial_ip)
    VALUES (USER, now(), 'ACTIVACION', TG_TABLE_NAME,
    old.id_tipo_ficha, inet_client_addr());
  END IF;
  --Actualizamos todas las tablas que dependen de esta
  UPDATE public."GrupoSocioeconomico"
    SET grupo_socioeconomico_activo = new.tipo_ficha_activo
    WHERE id_tipo_ficha = old.id_tipo_ficha;

  UPDATE public."PermisoIngresoFichas"
    SET permiso_ingreso_activo = new.tipo_ficha_activo
    WHERE id_tipo_ficha = old.id_tipo_ficha;

  UPDATE public."SeccionesFicha"
    SET seccion_ficha_activa = new.tipo_ficha_activo
    WHERE id_tipo_ficha = old.id_tipo_ficha;
  RETURN NEW;
END;
$tipo_ficha_elim$ LANGUAGE plpgsql;

CREATE TRIGGER auditoria_tipo_ficha_elim
BEFORE UPDATE OF tipo_ficha_activo
ON public."TipoFicha" FOR EACH ROW
EXECUTE PROCEDURE tipo_ficha_elim();

--GrupoSocioeconomico
CREATE OR REPLACE FUNCTION grupo_socioeconomico_elim()
RETURNS TRIGGER AS $grupo_socioeconomico_elim$
BEGIN
  IF new.grupo_socioeconomico_activo = FALSE THEN
    INSERT INTO public."HistorialUsuarios"(
      usu_username, historial_fecha, historial_tipo_accion,
      historial_nombre_tabla, historial_pk_tabla, historial_ip)
      VALUES(USER, now(), 'DELETE', TG_TABLE_NAME,
      old.id_grupo_socioeconomico, inet_client_addr());
  ELSE
    INSERT INTO public."HistorialUsuarios"(
      usu_username, historial_fecha, historial_tipo_accion,
      historial_nombre_tabla, historial_pk_tabla, historial_ip)
      VALUES(USER, now(), 'ACTIVACION', TG_TABLE_NAME,
      old.id_grupo_socioeconomico, inet_client_addr());
  END IF;
  RETURN NEW;
END;
$grupo_socioeconomico_elim$ LANGUAGE plpgsql;

CREATE TRIGGER auditoria_grupo_socioeconomico
BEFORE UPDATE OF grupo_socioeconomico_activo
ON public."GrupoSocioeconomico" FOR EACH ROW
EXECUTE PROCEDURE grupo_socioeconomico_elim();

--SeccionesFicha
CREATE OR REPLACE FUNCTION seccion_ficha_elim()
RETURNS TRIGGER AS $seccion_ficha_elim$
BEGIN
  IF new.seccion_ficha_activa = FALSE THEN
    INSERT INTO public."HistorialUsuarios"(
      usu_username, historial_fecha, historial_tipo_accion,
      historial_nombre_tabla, historial_pk_tabla, historial_ip)
      VALUES(USER, now(), 'DELETE', TG_TABLE_NAME,
      old.id_seccion_ficha, inet_client_addr());
  ELSE
    INSERT INTO public."HistorialUsuarios"(
      usu_username, historial_fecha, historial_tipo_accion,
      historial_nombre_tabla, historial_pk_tabla, historial_ip)
      VALUES(USER, now(), 'ACTIVACION', TG_TABLE_NAME,
      old.id_seccion_ficha, inet_client_addr());
  END IF;
  --Tambien actualizamos en las tablas que dependen de esta
  UPDATE public."PreguntasFicha"
  SET pregunta_ficha_activa = new.seccion_ficha_activa
  WHERE id_seccion_ficha = old.id_seccion_ficha;
  RETURN NEW;
END;
$seccion_ficha_elim$ LANGUAGE plpgsql;

CREATE TRIGGER auditoria_seccion_ficha
BEFORE UPDATE OF seccion_ficha_activa
ON public."SeccionesFicha" FOR EACH ROW
EXECUTE PROCEDURE seccion_ficha_elim();

--PreguntasFicha
CREATE OR REPLACE FUNCTION pregunta_ficha_elim()
RETURNS TRIGGER AS $pregunta_ficha_elim$
BEGIN
  IF new.pregunta_ficha_activa = FALSE THEN
    INSERT INTO public."HistorialUsuarios"(
      usu_username, historial_fecha, historial_tipo_accion,
      historial_nombre_tabla, historial_pk_tabla, historial_ip)
      VALUES(USER, now(), 'DELETE', TG_TABLE_NAME,
      old.id_pregunta_ficha, inet_client_addr());
  ELSE
    INSERT INTO public."HistorialUsuarios"(
      usu_username, historial_fecha, historial_tipo_accion,
      historial_nombre_tabla, historial_pk_tabla, historial_ip)
      VALUES(USER, now(), 'ACTIVACION', TG_TABLE_NAME,
      old.id_pregunta_ficha, inet_client_addr());
  END IF;
  --Tambien actualizamos en las tablas que dependen de esta
  UPDATE public."RespuestaFicha"
  SET respuesta_ficha_activa = new.pregunta_ficha_activa
  WHERE id_pregunta_ficha = old.id_pregunta_ficha;

  UPDATE public."DocenteRespuestaFO"
  SET docente_fo_activo = new.pregunta_ficha_activa
  WHERE id_pregunta_ficha = old.id_pregunta_ficha;

  UPDATE public."AlumnoRespuestaLibreFS"
  SET alumno_fs_activo = new.pregunta_ficha_activa
  WHERE id_pregunta_ficha = old.id_pregunta_ficha;
  RETURN NEW;
END;
$pregunta_ficha_elim$ LANGUAGE plpgsql;

CREATE TRIGGER auditoria_pregunta_ficha
BEFORE UPDATE OF pregunta_ficha_activa
ON public."PreguntasFicha" FOR EACH ROW
EXECUTE PROCEDURE pregunta_ficha_elim();

--RespuestaFicha
CREATE OR REPLACE FUNCTION respuesta_ficha_elim()
RETURNS TRIGGER AS $respuesta_ficha_elim$
BEGIN
  IF new.respuesta_ficha_activa = FALSE THEN
    INSERT INTO public."HistorialUsuarios"(
      usu_username, historial_fecha, historial_tipo_accion,
      historial_nombre_tabla, historial_pk_tabla, historial_ip)
      VALUES(USER, now(), 'DELETE', TG_TABLE_NAME,
      old.id_respuesta_ficha, inet_client_addr());
  ELSE
    INSERT INTO public."HistorialUsuarios"(
      usu_username, historial_fecha, historial_tipo_accion,
      historial_nombre_tabla, historial_pk_tabla, historial_ip)
      VALUES(USER, now(), 'ACTIVACION', TG_TABLE_NAME,
      old.id_respuesta_ficha, inet_client_addr());
  END IF;
  --Tambien actualizamos en las tablas que dependen de esta

  UPDATE public."AlumnoRespuestaFS"
  SET respuesta_almn_activo = new.respuesta_ficha_activa
  WHERE id_respuesta_ficha = old.id_respuesta_ficha;
  RETURN NEW;
END;
$respuesta_ficha_elim$ LANGUAGE plpgsql;

CREATE TRIGGER auditoria_respuesta_ficha
BEFORE UPDATE OF respuesta_ficha_activa
ON public."RespuestaFicha" FOR EACH ROW
EXECUTE PROCEDURE respuesta_ficha_elim();

--PermisoIngresoFichas
CREATE OR REPLACE FUNCTION permiso_ingreso_ficha_elim()
RETURNS TRIGGER AS $permiso_ingreso_ficha_elim$
BEGIN
  IF new.permiso_ingreso_activo = FALSE THEN
    INSERT INTO public."HistorialUsuarios"(
      usu_username, historial_fecha, historial_tipo_accion,
      historial_nombre_tabla, historial_pk_tabla, historial_ip)
      VALUES(USER, now(), 'DELETE', TG_TABLE_NAME,
      old.id_permiso_ingreso_ficha, inet_client_addr());
  ELSE
    INSERT INTO public."HistorialUsuarios"(
      usu_username, historial_fecha, historial_tipo_accion,
      historial_nombre_tabla, historial_pk_tabla, historial_ip)
      VALUES(USER, now(), 'ACTIVACION', TG_TABLE_NAME,
      old.id_permiso_ingreso_ficha, inet_client_addr());
  END IF;
  --Tambien actualizamos en las tablas que dependen de esta
  UPDATE public."PersonaFicha"
  SET persona_ficha_activa = new.permiso_ingreso_activo
  WHERE id_permiso_ingreso_ficha = old.id_permiso_ingreso_ficha;
  RETURN NEW;
END;
$permiso_ingreso_ficha_elim$ LANGUAGE plpgsql;

CREATE TRIGGER audotoria_permiso_ingreso_ficha
BEFORE UPDATE OF permiso_ingreso_activo
ON public."PermisoIngresoFichas" FOR EACH ROW
EXECUTE PROCEDURE permiso_ingreso_ficha_elim();
