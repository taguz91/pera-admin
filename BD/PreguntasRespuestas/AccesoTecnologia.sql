INSERT INTO public."PreguntasFicha"(
  id_seccion_ficha, pregunta_ficha,
  pregunta_ficha_ayuda)
VALUES
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Acceso a Tecnología'),
    '¿Tiene este hogar servicio de internet?',
'Si/No'),
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Acceso a Tecnología'),
  '¿Tiene computadora de escritorio?',
'Si/No'),
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Acceso a Tecnología'),
  '¿Tiene computadora portátil?',
'Si/No'),
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Acceso a Tecnología'),
  '¿Cuántos celulares activados tienen en este hogar?',
'Número de celulares que posee');


--RespuestaFicha

INSERT INTO public."RespuestaFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene este hogar servicio de internet?'),
  'No', 0),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene este hogar servicio de internet?'),
  'Sí', 45),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene computadora de escritorio?'),
  'No', 0),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene computadora de escritorio?'),
  'Sí', 35),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene computadora portátil?'),
  'No', 0),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene computadora portátil?'),
  'Sí', 39),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cuántos celulares activados tienen en este hogar?'),
  'No tiene celular nadie en el hogar', 0),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cuántos celulares activados tienen en este hogar?'),
  'Tiene 1 celular', 8),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cuántos celulares activados tienen en este hogar?'),
  'Tiene 2 celulares', 22),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cuántos celulares activados tienen en este hogar?'),
  'Tiene 3 celulares', 32),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cuántos celulares activados tienen en este hogar?'),
  'Tiene 4 celulares', 42);
