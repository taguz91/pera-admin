--Para las preguntas
INSERT INTO public."SeccionesFicha"(
  id_tipo_ficha, seccion_ficha_nombre)
VALUES
(1, 'Caracteristicas de la vivienda'),
(1, 'Acceso a tecnologia'),
(1, 'Posesion de bienes'),
(1, 'Habitos de consumo'),
(1, 'Nivel de educacion'),
(1, 'Actividad economica del hogar');

INSERT INTO public."PreguntasFicha"(
  id_seccion_ficha, pregunta_ficha,
  pregunta_ficha_ayuda)
VALUES
(
  SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Habitos de consumo',
   '¿Alguien en el hogar compra vestimenta en centros comerciales?',
'Compra de vestimenta.'),
(
  SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Habitos de consumo',
  '¿En el hogar alguien ha usado internet en los últimos 6 meses?',
'Uso de internet en el hogar.'),
(
  SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Habitos de consumo',
  '¿En el hogar alguien utiliza correo electrónico que no es del trabajo?',
'Uso de correo electrónico en el hogar.'),
(
  SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Habitos de consumo',
  '¿En el hogar alguien esta registrado en una red social?',
'Registro red social.'),
(
  SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Habitos de consumo',
  'Exceptuando los libros de textos o manuales de estudio y lectura del trabajo ¿Alguien del hogar ha leído algún libro completo en los últimos 3 meses?',
'Lectura de libro completo.');

INSERT INTO public."RespuestaFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
(
  SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Alguien en el hogar compra vestimenta en centros comerciales?',
  'No', 0),
(1, 'Si', 6);

(
  SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿En el hogar alguien ha usado internet en los últimos 6 meses?',
  'No', 0),
(1, 'Si', 26);

(
  SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿En el hogar alguien utiliza correo electrónico que no es del trabajo?',
  'No', 0),
(1, 'Si', 27);

(
  SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿En el hogar alguien utiliza correo electrónico que no es del trabajo?',
  'No', 0),
(1, 'Si', 28);

(
  SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'Exceptuando los libros de textos o manuales de estudio y lectura del trabajo ¿Alguien del hogar ha leído algún libro completo en los últimos 3 meses?',
  'No', 0),
(1, 'Si', 12);

