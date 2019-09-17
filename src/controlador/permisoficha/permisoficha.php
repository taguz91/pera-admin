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
    $permisoingresos =PermisoIngresoBD::getAll();
    require $this->cargarVista('index.php');
  }

  public function guardar(){
    //Validarrrr
    if(isset($_POST['guardar'])){
      $pf = $this->permisoFichaPOST();

      if($pf != null){
        $res = PermisoIngresoBD::guardar($pf);
        if($res){
          echo "<h3>Guardamos correctamente a {$pf->fechaInicio}</h3>";
        }
        $this->inicio();
      }else{
        Errores::errorVariableNoEncontrada();
      }
    }else{
      // Cargamos el formulario
      $periodos = PeriodoLectivoBD::getParaCombo();
      $tipofichas = TipoFichaBD::getParaCombo();
      require $this->cargarVista('guardar.php');
    }

  }

  public function editar(){
    if(isset($_GET['id'])){
      $pi = PermisoIngresoBD::getPorId($_GET['id']);
      if($pi != null){
        require $this->cargarVista('editar.php');
      }else{
        Errores::errorEditar("Permiso Ingreso Ficha");
      }
    }

    if(isset($_POST['editar'])){
      $pf = $this->permisoFichaPOST();
      if(isset($_POST['id']) && $pf != null){
        //var_dump($_POST);
        //Validamos que el perioo no sea nulo o ''
        //Validamos que las fechas sea fecha
        //Validamos que tengamos una id
        //Validamos que todos no tengan codigo HTML JS o SQL
        //XSS InyeccionSQL PHP
        $pf->id = $_POST['id'];
        $res = PermisoIngresoBD::editar($pf);
        if($res){
          echo "<h3>Editamos correctamente a {$pf->fechaInicio}</h3>";
        }
      }
      $this->inicio();
    }
  }

  function eliminar(){
    if(isset($_GET['id'])){
      $res = PermisoIngresoBD::eliminar($_GET['id']);
      if($res){
          echo "<h1>Eliminaremos con el id {$_GET['id']}</h1>";
      }else{
        Errores::errorEliminar("Permiso Ingreso Ficha");
      }
      $this->inicio();
    }
  }

  private function permisoFichaPOST() {
    if(
      isset($_POST['periodo']) &&
      isset($_POST['tipoficha']) &&
      isset($_POST['fechaInicio']) &&
      isset($_POST['fechaFin'])
    ){
      $pf = new PermisoIngresoMD();
      $pf->idPeriodo = $_POST['periodo'];
      $pf->idTipoFicha = $_POST['tipoficha'];
      $pf->fechaInicio = $_POST['fechaInicio'];
      $pf->fechaFin = $_POST['fechaFin'];
      return $pf;
    }
  }

}


 ?>
