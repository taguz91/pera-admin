-- Modificaciones
ALTER TABLE public."SeccionesFicha" ADD COLUMN seccion_ficha_posicion integer NOT NULL DEFAULT 1;

ALTER TABLE public."PreguntasFicha" ADD COLUMN pregunta_ficha_posicion integer NOT NULL DEFAULT 1;
