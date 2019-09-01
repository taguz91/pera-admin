<?php

require_once "src/modelo/personaficha/personafichabd.php";
require_once "src/modelo/permisoingreso/permisoingresobd.php";
require_once "src/modelo/personaficha/enviar.php";
//require_once "src/modelo/clases/personamd.php";

class PersonaFichaCTR extends CTR implements DCTR
{

  public $personaFichas = [];

  function __construct()
  {
    parent::__construct("src/vista/personaficha/");
  }

  public function inicio()
  {
    $personaFichas = PersonaFichaBD::getAll();
    require $this->cargarVista('index.php');
  }

  public function guardar()
  {
    if (isset($_POST['guardar'])) {

      if (
        isset($_POST['permiso']) &&
        isset($_POST['ciclo']) &&
        isset($_POST['fechaInicio']) &&
        isset($_POST['fechaModificación'])
      ) {
        //var_dump($_POST);
        $pf = new PersonaFichaMD();
        $pf->idPermisoIngFicha = $_POST['permiso'];
        $numCiclo = $_POST['ciclo'];
        $idTipoFicha = PermisoIngresoBD::getPorId($pf->idPermisoIngFicha);
        //Faltan las validaciones

        if ($idTipoFicha == 1) {

          $correosEst = PersonaFichaBD::getCorreosEst($numCiclo, $pf->idPermisoIngFicha);
          if (empty($correosEst)) {
            echo "<h3>Estos ciclos ya se guardaron como fichas</h3>";
          } else {
            $numPassEst = sizeof($correosEst);
            $passEst = self::generarContrasena($numPassEst);
            if (EnviarCorreo::enviar($correosEst, $passEst)) {
              $mensaje = "Se envío correctamente los correos a count($correosEst) estudiantes";
              $pf->idPersona = $_POST['tipoficha'];
              $pf->fechaInicio = $_POST['fechaInicio'];
              $pf->fechaFin = $_POST['fechaFin'];

              //Se debe validar antes de guardar

              $res = PermisoIngresoBD::guardar($pf);
              if ($res) {
                echo "<h3>Guardamos correctamente a {$pf->fechaInicio}</h3>";

                $this->inicio();
              }
            } else {
              $mensaje = "No se pudo enviar corectamente todos los correos, se enviaron a count($correosEst) estudiantes";
            }
          }

        } else if ($idTipoFicha == 2) {

          $correosDoc = PersonaFichaBD::getCorreosDoc($numCiclo, $pf->idPermisoIngFicha);

          if(empty($correosDoc)){

            echo "<h3>Estos ciclos ya se guardaron como fichas</h3>";

          } else{
            $numPassDoc = sizeof($correosDoc);
            $passDoc = self::generarContrasena($numPassDoc);
            if (EnviarCorreo::enviar($correosEst, $passDoc)) {
              $mensaje = "Se envío correctamente los correos a count($correosDoc estudiantes";

              $pf->idPersona = $_POST['tipoficha'];
              $pf->fechaInicio = $_POST['fechaInicio'];
              $pf->fechaFin = $_POST['fechaFin'];

              //Se debe validar antes de guardar

              $res = PermisoIngresoBD::guardar($pf);
              if ($res) {
                echo "<h3>Guardamos correctamente a {$pf->fechaInicio}</h3>";

                $this->inicio();
              }
            } else {
              $mensaje = "No se pudo enviar corectamente todos los correos, se enviaron a count($correosDoc) estudiantes";
            }
          }
        }
      } else {
        Errores::errorVariableNoEncontrada();
      }
    } else {
      $permisos = PermisoIngresoBD::getAll();

      require $this->cargarVista('guardarpersona.php');
    }
  }

  private function generarContrasena($num)
  {

    $pass = array();
    for ($i = 0; $i < $num; $i++) {
      $generate = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
      array_push($pass, $generate);
    }

    return $pass;
  }

  //Falta acabar la funcionalidad
  public function editar()
  {

    if (isset($_GET['id'])) {
      echo "Vamos a editar";

      $pi = PersonaFichaBD::getPorId($_GET['id']);
      if ($pi != null) {
        require $this->cargarVista('editarpersona.php');
      } else {
        Errores::errorEditar("Permiso Ingreso Ficha");
      }
    }

    if (isset($_POST['editar'])) {

      if (
        isset($_POST['password'])
      ) {
        //var_dump($_POST);

        $pf = new PersonaFichaMD();
        $pf->clave = $_POST['password'];

        // $p = new PersonaMD();
        // $p->personaCorreo = $_POST['correo'];
        // $p->idPersona = $POST['idPersona'];

        //Se debe validar antes de guardar

        $res = PersonaFichaBD::editarPersonaFicha($pf);
        if ($res) {
          echo "<h3>Editamos correctamente </h3>";

          $this->inicio();
        }
      } else {
        var_dump($_POST);
      }
    }
  }

  public function reenviarCorreo(){

    if (
      isset($_POST['correo'])
    ) {
      $correo = $_POST['correo'];
      $pass = generarContrasena(1);
      if(EnviarCorreo::enviarEditar($correo, $pass)){
        $mensaje = "Se envío conrrectamente el mensaje";
      } else{
        $mensaje = "No se pudo enviar el correo";
      }
    }

  }

  //Todavía falta crear la vista para eliminar a uan ficha de persona
  public function eliminar()
  {
    if (isset($_GET['id'])) {
      echo "Vamos a eliminar";
      $res = PersonaFichaBD::eliminarPersonaFicha($_GET['id']);
      if ($res) {
        echo "<h1>Eliminaremos con el id {$_GET['id']}</h1>";
        $this->inicio();
      } else {
        Errores::errorEliminar("Permiso Ingreso Ficha");
      }
    }
  }

}
