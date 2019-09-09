--Para actualizar la posicion de las secciones de una ficha si actualizamos una seccion anterior.

CREATE OR REPLACE FUNCTION posicion_seccion()
RETURNS TRIGGER AS $posicion_seccion$
DECLARE
  reg RECORD;
  c_secciones CURSOR FOR SELECT id_seccion_ficha
  FROM public."SeccionesFicha"
  WHERE seccion_ficha_posicion >= new.seccion_ficha_posicion AND
  id_seccion_ficha <> new.id_seccion_ficha;
BEGIN

  OPEN c_secciones;
  FETCH c_secciones INTO reg;
  WHILE ( FOUND ) LOOP
    UPDATE public."SeccionesFicha"
    SET posicion_seccion = new.seccion_ficha_posicion + 1
    WHERE id_seccion_ficha = reg.id_seccion_ficha;
  END LOOP;
  CLOSE c_secciones;
  RETURN NEW;
END;
$posicion_seccion$ LANGUAGE plpgsql;

--Actualizamos la posicion de una pregunta se actualizamos su posicion
CREATE OR REPLACE FUNCTION posicion_pregunta()
RETURNS TRIGGER AS $posicion_pregunta$
DECLARE
  reg RECORD;
  c_preguntas CURSOR FOR SELECT id_pregunta_ficha
  FROM public."PreguntasFicha"
  WHERE pregunta_ficha_posicion > new.pregunta_ficha_posicion AND
  id_pregunta_ficha <> new.id_pregunta_ficha;
BEGIN

  OPEN c_preguntas;
  FETCH c_preguntas INTO reg;
  WHILE ( FOUND ) LOOP
    UPDATE public."PreguntasFicha"
    SET pregunta_ficha_posicion = new.pregunta_ficha_posicion + 1
    WHERE id_pregunta_ficha = reg.id_pregunta_ficha;
  END LOOP;

END;
$posicion_pregunta$ LANGUAGE plpgsql;



CREATE TRIGGER act_posicion_seccion
AFTER UPDATE OF seccion_ficha_posicion
ON public."SeccionesFicha" FOR EACH ROW
EXECUTE PROCEDURE posicion_seccion();


CREATE TRIGGER act_posicion_pregunta
AFTER UPDATE OF pregunta_ficha_posicion
ON public."PreguntasFicha" FOR EACH ROW
EXECUTE PROCEDURE posicion_pregunta();
