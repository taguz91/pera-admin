<?php 
require_once "src/modelo/tipoficha/tipofichabd.php";
require_once "src/modelo/gruposocioeconomico/gruposocioeconomicobd.php";

class PermisoFichaCTR extends CTR implements DCTR {

    public $grupoSocioeconomico = [];

    function __construct(){
        parent::__construct("src/vista/gruposocioeconomico/");
      }

      public function inicio (){
        $grupoSocioeconomico = GrupoSocioEconomicoBD::getAll();
        require $this->cargarVista('index.php');
      }
     
      public function guardar(){
        if(isset($_POST['guardar'])){
            if(
                isset($_POST['tipoficha']) &&
                isset($_POST['grupoSocioeconomico']) &&
                isset($_POST['puntajeMinimo']) &&
                isset($_POST['puntajeMaximo'])
              ){
                $gS-> new GrupoSocioEconomicoMD();
                $gS->idTipoFicha = $_POST['tipoficha'];
                $gS->grupoSocioeconomico = $_POST['gruposocioeconomico'];
                $gS->puntajeMinimo = $_POST['puntajeMinimo'];
                $gS->puntajeMaximo = $_POST['puntajeMaximo'];

                $res = GrupoSocioEconomicoBD::guardar($gS);
                if($res){
                echo "<h3>Guardamos correctamente a {$gS->grupoSocioeconomico}</h3>";

                $this->inicio();
                }
              }else {
                Errores::errorVariableNoEncontrada();
            }
        }else {
            $tipofichas = TipoFichaBD::getParaCombo();
            require $this->cargarVista('guardar.php');
        }
      }

      public function editar(){

        if(isset($_GET['id'])){
          echo "Vamos a editar";
    
          $pi = GrupoSocioEconomicoBD::getPorId($_GET['id']);
          if($pi != null){
              require $this->cargarVista('editar.php');
          }else{
            Errores::errorEditar("Grupo Socioeconomico");
          }
        }
    
        if(isset($_POST['editar'])){
          if(
            isset($_POST['tipoficha']) &&
            isset($_POST['grupoSocioeconomico']) &&
            isset($_POST['puntajeMinimo']) &&
            isset($_POST['puntajeMaximo']) &&
            isset($_POST['id'])
          ){
             
            $gS = new GrupoSocioEconomicoMD();
            $gS->id = $_POST['id'];
            $gS->idTipoFicha = $_POST['tipoficha'];
            $gS->grupoSocionomico = $_POST['grupoSocioeconomico'];
            $gS->puntajeMinimo = $_POST['puntajeMinimo'];
            $gS->puntajeMaximo = $_POST['puntajeMaximo'];

    
            //Se debe validar antes de guardar
    
            $res = GrupoSocioEconomicoBD::editar($gS);
            if($res){
              echo "<h3>Editamos correctamente a {$gS->grupoSocionomico}</h3>";
    
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
          $res = GrupoSocioEconomicoBD::eliminar($_GET['id']);
          if($res){
              echo "<h1>Eliminaremos con el id {$_GET['id']}</h1>";
              $this->inicio();
          }else{
            Errores::errorEliminar("Grupo Socioeconomico");
          }
    
        }
    
      }
      


}

?>