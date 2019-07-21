<?php
require_once "src/modelo/permisoingreso/permisoingresobd.php";
require_once "src/modelo/clases/periodolectivobd.php";
require_once "src/modelo/tipoficha/tipofichabd.php";

class PermisoFichaCTR extends CTR implements DCTR {

  public $permisoingresos = [];

  function __construct(){
    parent::__construct("src/vista/permisoingreso/");
  }

  public function inicio(){
    //Consultamos todos los permisos ingresos que tengamos
    //El nombre de la variable en la que guardaremos debe ser la misma en vista
    $permisoingresos =PermisoIngresoBD::getAll();
    //Esto equivale a lo que esta comentado abajo
    require $this->cargarVista('index.php');
    //require "vista/permisoingreso/index.php";
  }

  public function guardar(){
    if(isset($_POST['guardar'])){

      if(
        isset($_POST['periodo']) &&
        isset($_POST['tipoficha']) &&
        isset($_POST['fechaInicio']) &&
        isset($_POST['fechaFin'])
      ){
        //var_dump($_POST);
        $pf = new PermisoIngresoMD();
        $pf->idPeriodo = $_POST['periodo'];
        $pf->idTipoFicha = $_POST['tipoficha'];
        $pf->fechaInicio = $_POST['fechaInicio'];
        $pf->fechaFin = $_POST['fechaFin'];

        //Se debe validar antes de guardar

        $res = PermisoIngresoBD::guardar($pf);
        if($res){
          echo "<h3>Guardamos correctamente a {$pf->fechaInicio}</h3>";

          $this->inicio();
        }
      }else{
        Errores::errorVariableNoEncontrada();
      }
    }else{
      $periodos = PeriodoLectivoBD::getParaCombo();
      $tipofichas = TipoFichaBD::getParaCombo();

      require $this->cargarVista('guardar.php');
    }

  }

  public function editar(){

    if(isset($_GET['id'])){
      echo "Vamos a editar";

      $pi = PermisoIngresoBD::getPorId($_GET['id']);
      if($pi != null){
          require $this->cargarVista('editar.php');
      }else{
        Errores::errorEditar("Permiso Ingreso Ficha");
      }

    }

    if(isset($_POST['editar'])){

      if(
        isset($_POST['periodo']) &&
        isset($_POST['tipoficha']) &&
        isset($_POST['fechaInicio']) &&
        isset($_POST['fechaFin']) &&
        isset($_POST['id'])
      ){
        //var_dump($_POST);

        $pf = new PermisoIngresoMD();
        $pf->id = $_POST['id'];
        $pf->idPeriodo = $_POST['periodo'];
        $pf->idTipoFicha = $_POST['tipoficha'];
        $pf->fechaInicio = $_POST['fechaInicio'];
        $pf->fechaFin = $_POST['fechaFin'];

        //Se debe validar antes de guardar

        $res = PermisoIngresoBD::editar($pf);
        if($res){
          echo "<h3>Editamos correctamente a {$pf->fechaInicio}</h3>";

          $this->inicio();
        }
      }else{
        var_dump($_POST);
      }
    }
  }

  public function eliminar(){
    if(isset($_GET['id'])){
      echo "Vamos a eliminar";
      $res = PermisoIngresoBD::eliminar($_GET['id']);
      if($res){
          echo "<h1>Eliminaremos con el id {$_GET['id']}</h1>";
          $this->inicio();
      }else{
        Errores::errorEliminar("Permiso Ingreso Ficha");
      }

    }

  }
}

 ?>
