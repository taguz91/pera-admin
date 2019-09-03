INSERT INTO public."PreguntasFicha"(
  id_seccion_ficha, pregunta_ficha,
  pregunta_ficha_ayuda)
VALUES
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Nivel de Educación'),
   '¿Cual es el nivel de instruccion del jefe del hogar?',
'Nivel de intruccion jefe hogar');

INSERT INTO public."RespuestaFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cual es el nivel de instruccion del jefe del hogar?'),
  'Sin estudios', 0),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cual es el nivel de instruccion del jefe del hogar?'),
  'Primaria incompleta', 21),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cual es el nivel de instruccion del jefe del hogar?'),
  'Primaria completa', 39),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cual es el nivel de instruccion del jefe del hogar?'),
  'Secundaria incompleta', 41),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cual es el nivel de instruccion del jefe del hogar?'),
  'Secundaria completa', 65),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cual es el nivel de instruccion del jefe del hogar?'),
  'Hasta 3 años de educacion superior', 91),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cual es el nivel de instruccion del jefe del hogar?'),
  '4 o mas años de educacion superior (sin post grado)', 127),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cual es el nivel de instruccion del jefe del hogar?'),
  'Post grado', 171);
