INSERT INTO public."PreguntasFicha"(
  id_seccion_ficha, pregunta_ficha,
  pregunta_ficha_ayuda)
VALUES
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Hábitos de Consumo'),
   '¿Alguien en el hogar compra vestimenta en centros comerciales?',
'Compra de vestimenta.'),
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Hábitos de Consumo'),
  '¿En el hogar alguien ha usado internet en los últimos 6 meses?',
'Uso de internet en el hogar.'),
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Hábitos de Consumo'),
  '¿En el hogar alguien utiliza correo electrónico que no es del trabajo?',
'Uso de correo electrónico en el hogar.'),
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Hábitos de Consumo'),
  '¿En el hogar alguien esta registrado en una red social?',
'Registro red social.'),
(
  (SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Hábitos de Consumo'),
  'Exceptuando los libros de textos o manuales de estudio y lectura del trabajo ¿Alguien del hogar ha leído algún libro completo en los últimos 3 meses?',
'Lectura de libro completo.');



INSERT INTO public."RespuestaFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿Alguien en el hogar compra vestimenta en centros comerciales?'),
  'No', 0),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
WHERE pregunta_ficha = '¿Alguien en el hogar compra vestimenta en centros comerciales?'), 'Si', 6),

(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿En el hogar alguien ha usado internet en los últimos 6 meses?'),
  'No', 0),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
WHERE pregunta_ficha = '¿En el hogar alguien ha usado internet en los últimos 6 meses?'), 'Si', 26),

(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿En el hogar alguien utiliza correo electrónico que no es del trabajo?'),
  'No', 0),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
WHERE pregunta_ficha = '¿En el hogar alguien utiliza correo electrónico que no es del trabajo?'), 'Si', 27),

(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = '¿En el hogar alguien utiliza correo electrónico que no es del trabajo?'),
  'No', 0),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
WHERE pregunta_ficha = '¿En el hogar alguien utiliza correo electrónico que no es del trabajo?'), 'Si', 28),

(
  (SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'Exceptuando los libros de textos o manuales de estudio y lectura del trabajo ¿Alguien del hogar ha leído algún libro completo en los últimos 3 meses?'),
  'No', 0),
((SELECT id_pregunta_ficha FROM public."PreguntasFicha"
WHERE pregunta_ficha = 'Exceptuando los libros de textos o manuales de estudio y lectura del trabajo ¿Alguien del hogar ha leído algún libro completo en los últimos 3 meses?'), 'Si', 12);
