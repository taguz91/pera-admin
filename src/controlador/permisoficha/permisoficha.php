<?php
require_once "src/modelo/permisoingreso/permisoingresobd.php";
require_once "src/modelo/clases/periodolectivobd.php";
require_once "src/modelo/tipoficha/tipofichabd.php";


class PermisoFichaCTR extends CTR implements DCTR {

  function __construct(){
    parent::__construct("src/vista/permisoingreso/");
  }

  public function inicio($mensaje = null){
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
          echo "<h3>Guardamos correctamente a {$pf['fecha_inicio']}</h3>";
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
      // Cargamos el formulario
      $periodos = PeriodoLectivoBD::getParaCombo();
      $tipofichas = TipoFichaBD::getParaCombo();

      if($pi != null){
        require $this->cargarVista('editar.php');
      }else{
        Errores::errorEditar("Permiso Ingreso Ficha");
      }
    }

    if(isset($_POST['editar'])){
      $pf = $this->permisoFichaPOST();
      if(isset($_POST['id']) && $pf != null){
        $pf['id_permiso_ingreso_ficha'] = $_POST['id'];
        $res = PermisoIngresoBD::editar($pf);
        if($res){
          echo "<h3>Editamos correctamente a {$pf['id_permiso_ingreso_ficha']}</h3>";
        }
      }
      $this->inicio();
    }
  }

  function eliminar(){
    if(isset($_GET['id'])){
      $res = PermisoIngresoBD::eliminar($_GET['id']);
      if($res){
        JSON::confirmacion('Eliminamos correctamente');
      }else{
        JSON::error('No pudimos eliminarlo');
      }
    } else {
      JSON::error('No encontramos el metodo');
    }
  }

  private function permisoFichaPOST() {
    if(
      isset($_POST['periodo']) &&
      isset($_POST['tipoficha']) &&
      isset($_POST['fechaInicio']) &&
      isset($_POST['fechaFin'])
    ){
      $pf = [
        'id_prd_lectivo' => $_POST['periodo'],
        'id_tipo_ficha' => $_POST['tipoficha'],
        'fecha_inicio' => $_POST['fechaInicio'],
        'fecha_fin' => $_POST['fechaFin']
      ];
      return $pf;
    }
  }

}


 ?>
