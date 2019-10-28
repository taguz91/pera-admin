-- Creamos el usuario al registrarse en el sistema
CREATE OR REPLACE FUNCTION registrar_usuario()
RETURNS TRIGGER AS $registrar_usuario$
BEGIN
  INSERT INTO public."UsersWeb" (
    id_persona, user_name, user_clave, is_superuser
  ) VALUES (
    new.id_persona,
    new.persona_identificacion,
    md5( md5('web') || new.persona_identificacion || 'web'),
    'false'
  );
  RETURN NEW;
END;
$registrar_usuario$ LANGUAGE plpgsql;

CREATE TRIGGER nuevo_usuario_web
AFTER INSERT ON public."Personas" FOR EACH ROW
EXECUTE PROCEDURE registrar_usuario();
