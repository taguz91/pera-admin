INSERT INTO public."TipoFicha"(tipo_ficha, tipo_ficha_descripcion)
VALUES ('Ficha Socioeconomica', 'Ficha que nos servira para establecer el nivel socieonomico de los estudiantes.');

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
  WHERE seccion_ficha_nombre = 'Caracteristicas de la vivienda',
   'Cual es el tipo de vivienda?',
'Tipo de vivienda.'),
(
  SELECT id_seccion_ficha FROM public."SeccionesFicha"
  WHERE seccion_ficha_nombre = 'Caracteristicas de la vivienda',
  'El material predominante de las paredes exteriores de la vivienda es de:',
'Material de la vivienda'),
(1, 'El material predominante al piso de la vivienda es de:',
'Material unicamente del piso.'),
(1, 'Cuantos cuartos de bano con ducha de uso exclusivo tiene este hogar?',
'Duchas que unicamente usan sus familiares.'),
(1, 'El tipo de servicio higienico con que cuenta este hogar es:',
'Tipo de servicios');

INSERT INTO public."RespuestaFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
(
  SELECT id_pregunta_ficha FROM public."PreguntasFicha"
  WHERE pregunta_ficha = 'El material predominante de las paredes exteriores de la vivienda es de:',
  'Suite de lujo', 59),
(1, 'Departamento en casa o edificio', 59),
(1, 'Casa/Villa', 59),
(1, 'Media agua', 40),
(1, 'Rancho', 4),
(1, 'Choza/Covacha/Otro', 0);



---NO tocan
INSERT INTO public."GrupoSocioeconomico"(
  id_tipo_ficha, grupo_socioeconomico,
  puntaje_minimo, puntaje_maximo)
VALUES
(1, 'A (Alto)', 845.10, 1000),
(1, 'B (Medio alto)', 696.10, 845),
(1, 'C+ (Medio tipico)', 535.10, 696),
(1, 'C- (Medio bajo)', 316.10, 535),
(1, 'D (Bajo)', 0, 316);
