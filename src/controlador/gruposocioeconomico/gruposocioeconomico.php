<?php
require_once "src/modelo/tipoficha/tipofichabd.php";
require_once "src/modelo/gruposocioeconomico/gruposocioeconomicobd.php";

class GrupoSocioeconomicoCTR extends CTR implements DCTR {

  function __construct(){
    parent::__construct("src/vista/gruposocioeconomico/");
  }

  public function inicio (){
    $grupoSocioeconomico = GrupoSocioEconomicoBD::getAll();
    require $this->cargarVista('index.php');
  }

  public function guardar(){
    if(isset($_POST['guardar'])){
      $gS = $this->grupoSocionomicoPOST();
      if($gS != null){
        $res = GrupoSocioEconomicoBD::guardar($gS);
        if($res){
          echo "<h3>Guardamos correctamente a {$gS->grupoSocioeconomico}</h3>";
        }
        $this->inicio();
      } else {
        Errores::errorVariableNoEncontrada();
      }
    } else {
      $tipofichas = TipoFichaBD::getParaCombo();
      require $this->cargarVista('guardar.php');
    }
  }

  public function editar(){

    if(isset($_GET['id'])){
      $gs = GrupoSocioEconomicoBD::getPorId($_GET['id']);
      if($gs != null){
          require $this->cargarVista('editar.php');
      }else{
        Errores::errorEditar("Grupo Socioeconomico");
      }
    }

    if(isset($_POST['editar'])){
      $gS = $this->grupoSocionomicoPOST();
      if($gS != null && isset($_POST['id'])) {
        $gS->id = $_POST['id'];

        //Se debe validar antes de guardar

        $res = GrupoSocioEconomicoBD::editar($gS);
        if($res){
          echo "<h3>Editamos correctamente a {$gS->grupoSocionomico}</h3>";
        }
      }
      $this->inicio();
    }
  }

  public function eliminar(){
    if(isset($_GET['id'])){
      $res = GrupoSocioEconomicoBD::eliminar($_GET['id']);
      if($res){
          echo "<h1>Eliminaremos con el id {$_GET['id']}</h1>";
          $this->inicio();
      } else {
        Errores::errorEliminar("Grupo Socioeconomico");
      }
    }
  }

  private function grupoSocionomicoPOST(){
    if(
        isset($_POST['tipoficha']) &&
        isset($_POST['grupoSocioeconomico']) &&
        isset($_POST['puntajeMinimo']) &&
        isset($_POST['puntajeMaximo'])
      ){
        // Sin datos vacios y que el puntaje maximo sea mayor al minimo
        $gS = new GrupoSocioEconomicoMD();
        $gS->idTipoFicha = $_POST['tipoficha'];
        $gS->grupoSocioeconomico = $_POST['gruposocioeconomico'];
        $gS->puntajeMinimo = $_POST['puntajeMinimo'];
        $gS->puntajeMaximo = $_POST['puntajeMaximo'];
    }
  }

}

?>
