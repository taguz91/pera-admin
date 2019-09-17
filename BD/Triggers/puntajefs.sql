CREATE OR REPLACE FUNCTION puntaje_respuesta()
RETURNS TRIGGER AS $puntaje_pregunta$
DECLARE
  puntaje INT := 0;
BEGIN
  SELECT respuesta_ficha_puntaje INTO puntaje
  FROM public."RespuestaFicha"
  WHERE id_respuesta_ficha = new.id_respuesta_ficha;
  new.respuesta_almn_puntaje = puntaje;
  RETURN NEW;
END;
$puntaje_pregunta$ LANGUAGE plpgsql;

CREATE TRIGGER actualiza_puntaje_respuesta
BEFORE UPDATE OF id_respuesta_ficha
ON public."AlumnoRespuestaFS" FOR EACH ROW
EXECUTE PROCEDURE puntaje_respuesta();
