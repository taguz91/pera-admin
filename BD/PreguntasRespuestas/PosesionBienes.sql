
INSERT INTO public."PreguntasFicha"(
  id_seccion_ficha, pregunta_ficha,
  pregunta_ficha_ayuda)
VALUES
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Posesión de bienes'),
   '¿Tiene este hogar servicio de teléfono convencional?',
'Sí / No'),
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Posesión de bienes'),
  '¿Tiene cocina con horno?',
'Sí / No'),
( 
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Posesión de bienes'), 
  '¿Tiene refrigeradora?',
'Sí / No'),

(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Posesión de bienes'),
  '¿Tiene lavadora?',
'Sí / No'),

(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Posesión de bienes'),
  '¿Tiene equipo de sonido?',
'Sí / No'),

(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Posesión de bienes'),
  '¿Cuántos TV a color tienen en este hogar?',
'Pertenencia de TVs'),

(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Posesión de bienes'),
  '¿Cuántos vehículos de uso exclusivo tiene este hogar?',
'Pertenencia de vehículos');



INSERT INTO public."RespuestaFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene este hogar servicio de teléfono convencional?'),
  'No', 0),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene este hogar servicio de teléfono convencional?'),
  'Sí', 19),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene cocina con horno?'),
  'No', 0),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene cocina con horno?'),
  'Sí', 29),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene refrigeradora?'),
  'No', 0),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene refrigeradora?'),
  'Sí', 30),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene lavadora?'),
  'No', 0),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene lavadora?'),
  'Sí', 18),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene equipo de sonido?'),
  'No', 0),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Tiene equipo de sonido?'),
  'Sí', 18),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cuántos TV a color tienen en este hogar?'),
  'No tiene TV a color en el hogar ', 0),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cuántos TV a color tienen en este hogar?'),
  'Tiene 1 TV a color', 9),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cuántos TV a color tienen en este hogar?'),
  'Tiene 2 TV a color ', 23),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cuántos TV a color tienen en este hogar?'),
  'Tiene 3 ó más TV a color', 34),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cuántos vehículos de uso exclusivo tiene este hogar?'),
  'No tiene vehículo exclusivo para el hogar', 0),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cuántos vehículos de uso exclusivo tiene este hogar?'),
  'Tiene 1 vehículo exclusivo', 6),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cuántos vehículos de uso exclusivo tiene este hogar?'),
  'Tiene 2 vehículo exclusivo', 11),
  (
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Cuántos vehículos de uso exclusivo tiene este hogar?'),
  'Tiene 3 ó más vehículos exclusivos', 15)
  ;

