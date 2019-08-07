INSERT INTO public."TipoFicha"(tipo_ficha, tipo_ficha_descripcion)
VALUES ('Ficha Socioeconomica', 'Ficha que nos servira para establecer el nivel socieonomico de los estudiantes.');

--Para las preguntas
INSERT INTO public."SeccionesFicha"(
  id_tipo_ficha, seccion_ficha_nombre)
VALUES
(1, 'Caracteristicas de la vivienda')
(1, 'Acceso a tecnologia')
(1, 'Posesion de bienes')
(1, 'Habitos de consumo')
(1, 'Nivel de educacion')
(1, 'Actividad economica del hogar')

INSERT INTO public."PreguntasFicha"(
  id_seccion_ficha, pregunta_ficha,
  pregunta_ficha_ayuda)
VALUES
(1, 'Cual es el tipo de vivienda?',
'Tipo de vivienda.')
(1, 'El material predominante de las paredes exteriores de la vivienda es de:',
'Material de la vivienda')
(1, 'El material predominante al piso de la vivienda es de:',
'Material unicamente del piso.')
(1, 'Cuantos cuartos de bano con ducha de uso exclusivo tiene este hogar?',
'Duchas que unicamente usan sus familiares.')
(1, 'El tipo de servicio higienico con que cuenta este hogar es:',
'Tipo de servicios')

INSERT INTO public."RespuestasFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
(1, 'Suite de lujo', 59)
(1, 'Departamento en casa o edificio', 59)
(1, 'Casa/Villa', 59)
(1, 'Media agua', 40)
(1, 'Rancho', 4)
(1, 'Choza/Covacha/Otro', 0)


INSERT INTO public."GrupoSocioeconomico"(
  id_tipo_ficha, grupo_socioeconomico,
  puntaje_minimo, puntaje_maximo)
VALUES
(1, 'A (Alto)', 845.1, 1000)
(1, 'B (Medio alto)', 696.1, 845)
(1, 'C+ (Medio tipico)', 535.1, 696)
(1, 'C- (Medio bajo)', 316.1, 535)
(1, 'D (Bajo)', 0, 316)
