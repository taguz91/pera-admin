<?php
declare(strict_types=1);
require_once "src/modelo/preguntaFichaM/PreguntaFichaMD.php";
require_once "src/modelo/preguntaFichaM/PreguntaFichaBD.php";
require_once "src/modelo/seccionFichaM/SeccionFichaBD.php";

class PreguntaFichaCTR extends CTR implements DCTR{

    private $seccionesFicha;

    function __construct()
    {
      parent::__construct("src/vista/preguntaFichaV/");  
    }

    public function inicio(){
        
        
        $seccionesFicha = SeccionFichaBD::seleccionarSeccionFicha(null,0);
        $preguntas = PreguntaFichaBD::seleccionarPreguntaFicha(null,0);
        
       
        require $this->cargarVista('index.php');


    }

    public function insertar(){


      if ($_POST){

           
           $seccion=(int) $_POST['seccionPregunta'];
           
           $pregunta=$_POST["pregunta"];
         
           
           $nuevaPregunta = new PreguntaFichaMD(null,$seccion,$pregunta,"Ayuda",1,2);
            
          
           $ok = PreguntaFichaBD::insertarPreguntaFicha($nuevaPregunta);
           
           $ruta=constant('URL');
           echo "<script>window.location='{$ruta}/preguntaFicha'</script>";
               
           $this->inicio();
      }


      

   }


}