--Para actualizar la posicion de las secciones de una ficha si actualizamos una seccion anterior.
CREATE OR REPLACE FUNCTION posicion_seccion()
RETURNS TRIGGER AS $posicion_seccion$
DECLARE
  id INT := 0;
  idTF INT := new.id_tipo_ficha;
BEGIN
  SELECT id_seccion_ficha INTO id
  FROM public."SeccionesFicha"
  WHERE seccion_ficha_posicion >= new.seccion_ficha_posicion AND
  id_tipo_ficha = idTF AND
  id_seccion_ficha <> new.id_seccion_ficha
  OFFSET  0 ROWS
  FETCH FIRST 1 ROW ONLY;
  IF id <> 0 THEN
    UPDATE public."SeccionesFicha"
    SET seccion_ficha_posicion = new.seccion_ficha_posicion + 1
    WHERE id_seccion_ficha = id;
  END IF;
  RETURN NEW;
END;
$posicion_seccion$ LANGUAGE plpgsql;

--Actualizamos la posicion de una pregunta se actualizamos su posicion

CREATE OR REPLACE FUNCTION posicion_pregunta()
RETURNS TRIGGER AS $posicion_pregunta$
DECLARE
  id INT := 0;
  idSeccion INT := new.id_seccion_ficha;
BEGIN
  SELECT id_pregunta_ficha INTO id
  FROM public."PreguntasFicha"
  WHERE pregunta_ficha_posicion >= new.pregunta_ficha_posicion AND
  id_seccion_ficha = idSeccion AND
  id_pregunta_ficha <> new.id_pregunta_ficha
  OFFSET  0 ROWS
  FETCH FIRST 1 ROW ONLY;
  IF id <> 0 THEN
    UPDATE public."PreguntasFicha"
    SET pregunta_ficha_posicion = new.pregunta_ficha_posicion + 1
    WHERE id_pregunta_ficha = id;
  END IF;
  RETURN NEW;
END;
$posicion_pregunta$ LANGUAGE plpgsql;


CREATE TRIGGER act_posicion_seccion
AFTER INSERT OR UPDATE OF seccion_ficha_posicion
ON public."SeccionesFicha" FOR EACH ROW
EXECUTE PROCEDURE posicion_seccion();


CREATE TRIGGER act_posicion_pregunta
AFTER INSERT OR UPDATE OF pregunta_ficha_posicion
ON public."PreguntasFicha" FOR EACH ROW
EXECUTE PROCEDURE posicion_pregunta();

DROP TRIGGER act_posicion_seccion ON public."SeccionesFicha";
DROP TRIGGER act_posicion_pregunta ON public."PreguntasFicha";
