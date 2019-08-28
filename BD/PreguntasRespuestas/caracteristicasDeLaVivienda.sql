--Pregunta Cual es el tipo de vivienda?
INSERT INTO public."PreguntasFicha"(
  id_seccion_ficha, pregunta_ficha,
  pregunta_ficha_ayuda)
VALUES
(
  SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Caracteristicas de la vivienda',
   'Cual es el tipo de vivienda?',
'Tipo de vivienda.');

--Respuesta
INSERT INTO public."RespuestaFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
(
  SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'Cual es el tipo de vivienda?',
  'Suite de lujo', 59),
(1, 'Departamento en casa o edificio', 59),
(1, 'Cuarto(s) en casa de inquilinato', 59),
(1, 'Casa/Villa', 59),
(1, 'Media agua', 40),
(1, 'Rancho', 4),
(1, 'Choza/Covacha/Otro', 0);


---Ya tengo lo de arriba ^

--Pregunta El material predominante de las paredes exteriores de la vivienda es de:
INSERT INTO public."PreguntasFicha"(
  id_seccion_ficha, pregunta_ficha,
  pregunta_ficha_ayuda)
VALUES
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Caracteristicas de la vivienda'),
   'El material predominante de las paredes exteriores de la vivienda es de:',
   'Tipo de material de las paredes.');

--Respuesta
INSERT INTO public."RespuestaFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El material predominante de las paredes exteriores de la vivienda es de:'),
  'Hormigon', 59),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El material predominante de las paredes exteriores de la vivienda es de:'), 'Ladrillo o bloque', 55),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El material predominante de las paredes exteriores de la vivienda es de:'), 'Adobe/Tapia', 47),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El material predominante de las paredes exteriores de la vivienda es de:'), 'Caña revestida o bahareque/Madera', 17),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El material predominante de las paredes exteriores de la vivienda es de:'), 'Caña no revestida/Otros materiales', 0);


--Pregunta El material predominante del piso de la vivienda es de:
INSERT INTO public."PreguntasFicha"(
  id_seccion_ficha, pregunta_ficha,
  pregunta_ficha_ayuda)
VALUES
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Caracteristicas de la vivienda'),
   'El material predominante del piso de la vivienda es de:',
   'Tipo de material del piso de su vivienda.');

--Respuesta
INSERT INTO public."RespuestaFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha ILIKE 'El material predominante del piso de la vivienda es de:'),
  'Duela,parquet,tablon o piso flotante', 48),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El material predominante del piso de la vivienda es de:'), 'Ceramica,baldosa,vinil o marmeton', 46),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El material predominante del piso de la vivienda es de:'), 'Ladrillo o cemento', 34),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El material predominante del piso de la vivienda es de:'), 'Tabla sin tratar', 34),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El material predominante del piso de la vivienda es de:'), 'Tierra/Caña/Otros materiales', 32);


--Pregunta El material predominante del piso de la vivienda es de:
INSERT INTO public."PreguntasFicha"(
  id_seccion_ficha, pregunta_ficha,
  pregunta_ficha_ayuda)
VALUES
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Caracteristicas de la vivienda'),
   'Cuantos cuartos de baño con ducha de uso exclusivo tiene este hogar?',
   'Cuartos de baño de uso exclusivo que tiene su hogar.');

--Respuesta
INSERT INTO public."RespuestaFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'Cuantos cuartos de baño con ducha de uso exclusivo tiene este hogar?'),
  'No tiene cuarto de baño exclusivo con ducha en el hogar', 0),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'Cuantos cuartos de baño con ducha de uso exclusivo tiene este hogar?'),
  'Tiene 1 cuarto de baño exclusivo con ducha', 12),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'Cuantos cuartos de baño con ducha de uso exclusivo tiene este hogar?'),
  'Tiene 2 cuartos de baño exclusivos con ducha', 24),
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'Cuantos cuartos de baño con ducha de uso exclusivo tiene este hogar?'),
  'Tiene 3 o mas cuartos de baño exclusivos con ducha', 32);


--El tipo de servicio higienico con que cuenta este hogar es:
INSERT INTO public."PreguntasFicha"(
  id_seccion_ficha, pregunta_ficha,
  pregunta_ficha_ayuda)
VALUES
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Caracteristicas de la vivienda'),
   'El tipo de servicio higienico con que cuenta este hogar es:',
   'Tipo de servicio higienico que dispone en su hogar.');

--Respuesta
INSERT INTO public."RespuestaFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El tipo de servicio higienico con que cuenta este hogar es:'),
  'No tiene', 0),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El tipo de servicio higienico con que cuenta este hogar es:'),
  'Letrina', 15),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El tipo de servicio higienico con que cuenta este hogar es:')
  , 'Con descarga directa al mar,rio,lago o quebrada', 18),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El tipo de servicio higienico con que cuenta este hogar es:'),
   'Conectado a pozo ciego', 18),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El tipo de servicio higienico con que cuenta este hogar es:')
  , 'Conectado a pozo septico', 22),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El tipo de servicio higienico con que cuenta este hogar es:'),
  'Conectado a red publica de alcantarillado', 38);
