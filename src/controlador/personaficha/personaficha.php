<?php
require_once "src/modelo/personaficha/personafichabd.php";
require_once "src/modelo/permisoingreso/permisoingresobd.php";
require_once "src/modelo/clases/periodolectivobd.php";
require_once "src/modelo/tipoficha/tipofichabd.php";
require_once "src/modelo/personaficha/enviar.php";
require_once "src/modelo/clases/personamd.php";

class PersonaFichaCTR extends CTR implements DCTR
{

  public $personaFichas = [];

  private $mensaje = "
      <h1> Ficha Socioecon&oacute;mica </h1>
      El motivo de este mensaje es comunicarle sobre el llenado de la Ficha Socioecon&oacute;mica <br>
      El cual lo deber&aacute; hacer con su Usuario y Contrase&ntilde;a, los cuales serán su Cédula de Ciudadanía <br>
      Adem&aacute;s de esto necesita una Contraseña para el llenado de la Ficha antes mencionada, la cual es la siguiente: <br> <br>
      <strong>Contrase&ntilde;a:</strong> pass<br>";

  function __construct() {
    parent::__construct("src/vista/personaficha/");
  }

  public function inicio($mensaje = null) {
    $personaFichas = PersonaFichaBD::getAll();
    require $this->cargarVista('index.php');
  }

  public function guardar() {
    if (isset($_POST['guardar'])) {

      if (
        isset($_POST['permiso']) &&
        isset($_POST['ciclo']) &&
        isset($_POST['correo'])
      ) {
        $pf = new PersonaFichaMD();
        $pf->idPermisoIngFicha = $_POST['permiso'];
        $numCiclo = $_POST['ciclo'];
        $tipoFicha = PermisoIngresoBD::getPorId($pf->idPermisoIngFicha);

          if ($tipoFicha->idTipoFicha == 1) {

            $correosEst = PersonaFichaBD::getCorreosEst($numCiclo, $pf->idPermisoIngFicha);
            if (empty($correosEst)) {
              echo "<h3>Estos ciclos ya se guardaron como fichas</h3>";
            } else {
              $this->enviarCorreos($correosEst, $_POST['correo']);
              if($val == true){
                $this->inicio();
              }
            }

          } else if ($tipoFicha->idTipoFicha == 2) {
            $correosDoc = PersonaFichaBD::getCorreosDoc($numCiclo, $pf->idPermisoIngFicha);

            if (empty($correosDoc)) {
              echo "<h3>Estos ciclos ya se guardaron como fichas</h3>";
            } else {
              $numPassDoc = sizeof($correosDoc);
              $passDoc = self::generarContrasena($numPassDoc);

              for ($i = 0; $i < $numPassDoc; $i++) {
                if (EnviarCorreo::enviar($correosDoc->correo, $passDoc, $this->mensaje)) {
                  $mensaje = "Se envío correctamente los correos a count($correosDoc) estudiantes";
                  echo $mensaje;

                  $pf->idPersona = $correosDoc[$i]->idPersona;
                  $pf->clave = $passDoc[$i];
                  $res = PersonaFichaBD::guardarPersonaFicha($pf);
                  if ($res) {
                    echo "<h3>Guardamos correctamente a {$pf->fechaIngreso}</h3>";
                    $this->inicio();
                  } else {
                    echo "<h3>No se puedo guardar correctamente</h3>";
                  }
                } else {
                  $mensaje = "No se pudo enviar corectamente todos los correos, se enviaron a" . count($correosEst) . " estudiantes";
                  echo $mensaje;
                }
              }
            }
          }
      } else {
        Errores::errorVariableNoEncontrada();
      }
    } else {
      $periodos = PeriodoLectivoBD::getParaCombo();
      $tipofichas = TipoFichaBD::getParaCombo();

      $permisos = PermisoIngresoBD::getAll();
      require $this->cargarVista('guardar.php');
    }
  }

  function editar(){
    if(isset($_POST['guardar'])){
      $correo = $_POST['correo'];
      $id = $_POST['idperficha'];
      $mensaje = $_POST['mensaje'];
      $pass = $this->getRandomPass();

      if(EnviarCorreo::enviar($correo, $pass, $mensaje)){
        $res = PersonaFichaBD::editarPersonaFicha($id, $pass);
        if($res){
          $this->inicio('Se reenvio el correo correctamente.');
        }
      }
    }
  }


  function enviarCorreo() {
    if(isset($_POST['guardar'])){
      $idPersona = $_POST['idpersona'];
      $idPermiso = $_POST['permiso'];
      $correo = $_POST['correo'];
      $mensaje = $_POST['mensaje'];
      $pass = $this->getRandomPass();
      if(EnviarCorreo::enviar($correo, $pass, $mensaje)){
        var_dump($idPersona);
        $pf = new PersonaFichaMD();
        $pf->idPermisoIngFicha = $idPermiso;
        $pf->idPersona = $idPersona;
        $pf->clave = $pass;
        $res = PersonaFichaBD::guardarPersonaFicha($pf);
        if($res){
          $this->inicio();
        }
      }
    }
  }

  function reenviar(){
    if(isset($_GET['id'])){
      require $this->cargarVista('reenviar.php');
    }
  }

  function enviar() {
    if(isset($_GET['idpersona'])){
      $permisos = PermisoIngresoBD::getAll();
      require $this->cargarVista('enviaruno.php');
    }
  }

  private function enviarCorreos($correos, $mensaje){
    $numPass = sizeof($correos);
    $pass = self::generarContrasena($numPass);
    $count = 0;
    for ($i = 0; $i < $numPass; $i++) {
      if (EnviarCorreo::enviar($correos[$i], $pass[$i], $mensaje)) {
        set_time_limit(300);
        $pf->idPersona = $correos[$i]->idPersona;
        $pf->clave = $pass[$i];
        //Se debe validar antes de guardar
        $res = PersonaFichaBD::guardarPersonaFicha($pf);
        if ($res) {
          $count++;
        }
      }
    }
    return $count;
  }

  private function generarContrasena($num){
    $pass = array();
    for ($i = 0; $i < $num; $i++) {
      array_push($pass, $this->getRandomPass());
    }
    return $pass;
  }

  private function getRandomPass(){
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
  }

  //Todavía falta crear la vista para eliminar una ficha de persona
  public function eliminar(){
    if (isset($_GET['id'])) {
      $res = PersonaFichaBD::eliminar($_GET['id']);
      if ($res) {
        $this->inicio();
      } else {
        Errores::errorEliminar("Permiso Ingreso Ficha");
      }
    }
  }

  public function enviarCorreoIndividual($idPersona, $correo, $mensajePersonalizado){
    //Revisa que todos los componentes esten llenos
    if (
      isset($_POST['permiso']) &&
      isset($_POST['correo'])
    ) {
      $passDoc = self::generarContrasena(1);
      $personaFicha = new PersonaFichaMD();
      $personaFicha->idPermisoIngFicha = $_POST['permiso'];
      $personaFicha->idPersona = $idPersona;

      if (EnviarCorreo::enviar($correo, $passDoc[0], $mensajePersonalizado)) {
        $mensaje = "Se envío correctamente el correo";
        echo $mensaje;
        $personaFicha->clave = $passDoc[0];

        $res = PersonaFichaBD::guardarPersonaFicha($personaFicha);
        if ($res) {
          $this->inicio();
        } else {
          echo "<h3>No se puedo guardar correctamente</h3>";
        }
      } else {
        $mensaje = "No se pudo enviar corectamente el correo";
      }
    }
  }

}
