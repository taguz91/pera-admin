INSERT INTO public."PreguntasFicha"(
  id_seccion_ficha, pregunta_ficha,
  pregunta_ficha_ayuda)
VALUES
((select id_seccion_ficha from public."SeccionesFicha" where seccion_ficha_nombre='Actividad Económica del Hogar'), '¿Alguien en el hogar está afiliado o cubierto por el  seguro del IESS (general, voluntario o campesino) y/o seguro del ISSFA o ISSPOL?','Seguro Del IESS.'),
((select id_seccion_ficha from public."SeccionesFicha" where seccion_ficha_nombre='Actividad Económica del Hogar'), '¿Alguien en el hogar tiene seguro de salud privada con  hospitalización, seguro de salud privada sin hospitalización, seguro internacional, seguros municipales y de Consejos Provinciales y/o seguro de vida?',
'Seguro privado'),
((select id_seccion_ficha from public."SeccionesFicha" where seccion_ficha_nombre='Actividad Económica del Hogar'), '¿Cuál es la ocupación del Jefe del hogar?',
'Ocupación del jefe del hogar');


INSERT INTO public."RespuestaFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Alguien en el hogar está afiliado o cubierto por el  seguro del IESS (general, voluntario o campesino) y/o seguro del ISSFA o ISSPOL?'), 'No', 0),
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Alguien en el hogar está afiliado o cubierto por el  seguro del IESS (general, voluntario o campesino) y/o seguro del ISSFA o ISSPOL?'), 'Si', 39);

INSERT INTO public."RespuestaFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Alguien en el hogar tiene seguro de salud privada con  hospitalización, seguro de salud privada sin hospitalización, seguro internacional, seguros municipales y de Consejos Provinciales y/o seguro de vida?'), 'No', 0),
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Alguien en el hogar tiene seguro de salud privada con  hospitalización, seguro de salud privada sin hospitalización, seguro internacional, seguros municipales y de Consejos Provinciales y/o seguro de vida?'), 'Si', 55);


INSERT INTO public."RespuestaFicha"(
  id_pregunta_ficha, respuesta_ficha,
  respuesta_ficha_puntaje)
VALUES
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Cuál es la ocupación del Jefe del hogar?'), 'Personal directivo de la Administración Pública y de empresas', 76),
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Cuál es la ocupación del Jefe del hogar?'), 'Profesionales científicos e intelectuales', 69),
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Cuál es la ocupación del Jefe del hogar?'), 'Técnicos y profesionales de nivel medio', 46),
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Cuál es la ocupación del Jefe del hogar?'), 'Empleados de oficina', 31),
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Cuál es la ocupación del Jefe del hogar?'), 'Trabajador de los servicios y comerciantes', 18),
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Cuál es la ocupación del Jefe del hogar?'), 'Trabajador calificados agropecuarios y pesqueros', 17),
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Cuál es la ocupación del Jefe del hogar?'), 'Oficiales operarios y artesanos', 17),
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Cuál es la ocupación del Jefe del hogar?'), 'Operadores de instalaciones y máquinas', 17),
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Cuál es la ocupación del Jefe del hogar?'), 'Trabajadores no calificados', 0),
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Cuál es la ocupación del Jefe del hogar?'), 'Fuerzas Armadas', 54),
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Cuál es la ocupación del Jefe del hogar?'), 'Desocupados', 14),
((select id_pregunta_ficha from public."PreguntasFicha" where pregunta_ficha='¿Cuál es la ocupación del Jefe del hogar?'), 'Inactivos', 17);
