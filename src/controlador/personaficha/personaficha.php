<?php

require_once "src/modelo/personaficha/personafichabd.php";
require_once "src/modelo/permisoingreso/permisoingresobd.php";
require_once "src/modelo/personaficha/enviar.php";
require_once "src/modelo/clases/personamd.php";

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

  public function guardarpersona()
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

          if ($idTipoFicha->idTipoFicha == 1) {

            $correosEst = PersonaFichaBD::getCorreosEst($numCiclo, $pf->idPermisoIngFicha);
            if (empty($correosEst)) {
              echo "<h3>Estos ciclos ya se guardaron como fichas</h3>";
            } else {
              $numPassEst = sizeof($correosEst);
              $passEst = self::generarContrasena($numPassEst);
              $val = false;

              for ($i = 0; $i < $numPassEst; $i++) {
                if (EnviarCorreo::enviar($correosEst[$i], $passEst[$i])) {
                  set_time_limit(300);
                  $mensaje = "Se envío correctamente los correos a count($correosEst) estudiantes";
                  echo $mensaje;
                  $pf->idPersona = $correosEst[$i]->idPersona;
                  $pf->clave = $passEst[$i];
                  $pf->fechaIngreso = $_POST['fechaInicio'];
                  $pf->fechaModificacion = $_POST['fechaModificación'];

                  //Se debe validar antes de guardar

                  $res = PersonaFichaBD::guardarPersonaFicha($pf);
                  if ($res) {
                    echo "<h3>Guardamos correctamente a {$pf->fechaIngreso}</h3>";
                    $val = true;
                    //$this->inicio();
                   
                  } else {
                    echo "<h3>No se puedo guardar correctamente a {$pf->idPersonaFicha}</h3>";
                    $val = false;
                  }
                } else {
                  $mensaje = "No se pudo enviar corectamente todos los correos, se enviaron a" . count($correosEst) . " estudiantes";
                  echo $mensaje;
                }
              } 
              if(val == true){
                $this->inicio();
              }
            }

            //   if (EnviarCorreo::enviar($correosEst, $passEst)) {
            //     $mensaje = "Se envío correctamente los correos a count($correosEst) estudiantes";
            //     $pf->idPersona = $_POST['tipoficha'];
            //     $pf->fechaInicio = $_POST['fechaInicio'];
            //     $pf->fechaFin = $_POST['fechaFin'];

            //     //Se debe validar antes de guardar

            //     $res = PermisoIngresoBD::guardar($pf);
            //     if ($res) {
            //       echo "<h3>Guardamos correctamente a {$pf->fechaInicio}</h3>";

            //       $this->inicio();
            //     }
            //   } else {
            //     $mensaje = "No se pudo enviar corectamente todos los correos, se enviaron a count($correosEst) estudiantes";
            //   }
            //}


          } else if ($idTipoFicha->idTipoFicha == 2) {

            $correosDoc = PersonaFichaBD::getCorreosDoc($numCiclo, $pf->idPermisoIngFicha);

            if (empty($correosDoc)) {

              echo "<h3>Estos ciclos ya se guardaron como fichas</h3>";
            } else {
              $numPassDoc = sizeof($correosDoc);
              $passDoc = self::generarContrasena($numPassDoc);

              for ($i = 0; $i < $numPassDoc; $i++) {
                if (EnviarCorreo::enviar($correosDoc, $passDoc)) {
                  $mensaje = "Se envío correctamente los correos a count($correosDoc) estudiantes";
                  echo $mensaje;

                  $pf->idPersona = $correosDoc[$i]->idPersona;
                  $pf->clave = $passDoc[$i];
                  $pf->fechaIngreso = $_POST['fechaInicio'];
                  $pf->fechaModificacion = $_POST['fechaModificación'];
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


              // if (EnviarCorreo::enviar($correosEst, $passDoc)) {
              //   $mensaje = "Se envío correctamente los correos a count($correosDoc estudiantes";

              //   $pf->idPersona = $_POST['tipoficha'];
              //   $pf->fechaInicio = $_POST['fechaInicio'];
              //   $pf->fechaFin = $_POST['fechaFin'];

              //   //Se debe validar antes de guardar

              //   $res = PermisoIngresoBD::guardar($pf);
              //   if ($res) {
              //     echo "<h3>Guardamos correctamente a {$pf->fechaInicio}</h3>";

              //     $this->inicio();
              //   }
              // } else {
              //   $mensaje = "No se pudo enviar corectamente todos los correos, se enviaron a count($correosDoc) estudiantes";
              // }
            
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
    } else{
      
    }
  }

  public function reenviarCorreo()
  {

    if (
      isset($_POST['correo'])
    ) {
      $correo = $_POST['correo'];
      $pass = generarContrasena(1);
      if (EnviarCorreo::enviarEditar($correo, $pass)) {
        $mensaje = "Se envío conrrectamente el mensaje";
      } else {
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

  public function enviarCorreoIndividual($correo)
  {

    if (
      isset($_POST['permiso']) &&
      isset($_POST['ciclo']) &&
      isset($_POST['fechaInicio']) &&
      isset($_POST['fechaModificación']) &&
      isset($_POST['correo'])
    ) {

      //No vengan datos vaciossss y que no tenga XSS

      $passDoc = self::generarContrasena(1);
      $personaFicha = new PersonaFichaMD();
      $personaFicha->idPermisoIngFicha = $_POST['permiso'];
      $personaFicha->idPersona = '';
      
      if (EnviarCorreo::enviarEditar($correo, $passDoc[0])) {
        $mensaje = "Se envío correctamente el correo";
        echo $mensaje;
        $personaFicha->clave = $passDoc[0];
        $personaFicha->fechaIngreso = $_POST['fechaInicio'];
        $personaFicha->fechaModificacion = $_POST['fechaModificación'];

        //Se debe validar antes de guardar

        $res = PersonaFichaBD::guardarPersonaFicha($personaFicha);
        if ($res) {
          echo "<h3>Guardamos correctamente a {$personaFicha->fechaIngreso}</h3>";

          $this->inicio();
        } else {
          echo "<h3>No se puedo guardar correctamente</h3>";
        }
      } else {
        $mensaje = "No se pudo enviar corectamente el correo";
        echo $mensaje;
      }
    }
  }
}
