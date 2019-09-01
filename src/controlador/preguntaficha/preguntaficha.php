<?php
declare (strict_types = 1);

require_once 'src/controlador/preguntaficha/preguntaFichaAJAX.php';
require_once "src/modelo/preguntaFichaM/PreguntaFichaMD.php";
require_once "src/modelo/preguntaFichaM/PreguntaFichaBD.php";
require_once "src/modelo/respuestaFichaM/RespuestaFichaMD.php";
require_once "src/modelo/respuestaFichaM/RespuestaFichaBD.php";
require_once "src/modelo/seccionFichaM/SeccionFichaBD.php";

class PreguntaFichaCTR extends CTR implements DCTR
{

    private $seccionesFicha;

    public function __construct()
    {
        parent::__construct("src/vista/preguntaFichaV/");
    }

    public function inicio()
    {

        $seccionesFicha = SeccionFichaBD::seleccionarSeccionFicha(null, 0);
        $preguntas = PreguntaFichaBD::seleccionarPreguntaFicha(null, 0);

        require $this->cargarVista('index.php');

    }

    public function insertar()
    {

        if ($_POST) {

            $seccion = (int) $_POST['seccionPregunta'];

            $pregunta = $_POST["pregunta"];

            $ayudaPregunta = $_POST["ayudaPregunta"];

            $tipoRespuesta = (int) $_POST["tipoRespuesta"];

            $tipoPregunta = null;
            if (isset($_POST["tipoPregunta"])) {

                $tipoPregunta = 1;
            } else {

                $tipoPregunta = 0;
            }

            $nuevaPregunta = new PreguntaFichaMD(null, $seccion, $pregunta, $ayudaPregunta, $tipoPregunta, $tipoRespuesta);

            $quiz = PreguntaFichaBD::insertarPreguntaFicha($nuevaPregunta);

            $x = 1;
            $aux = true;

            while ($aux) {

                if (isset($_POST["respuesta{$x}"]) && isset($_POST["peso{$x}"])) {

                    $nuevaRespuesta = new RespuestaFichaMD(null, (int) $quiz, $_POST["respuesta{$x}"], (int) $_POST["peso{$x}"]);
                    RespuestaFichaBD::insertarRespuestaFicha($nuevaRespuesta);
                } else {
                    $aux = false;
                }
                $x = $x + 1;

            }

            $ruta = constant('URL');

            echo "<script>window.location='{$ruta}/preguntaFicha'</script>";

            $this->inicio();

        }

    }

    public function actualizar()
    {

        if ($_POST) {

            $id = (int) $_POST["idPregunta"];

            $seccion = (int) $_POST['seccionPregunta'];

            $pregunta = $_POST["pregunta"];

            $ayudaPregunta = $_POST["ayudaPregunta"];

            $tipoRespuesta = (int) $_POST["tipoRespuesta"];

            $tipoPregunta = null;
            if (isset($_POST["tipoPregunta"])) {

                $tipoPregunta = 1;
            } else {

                $tipoPregunta = 0;
            }

            $pregunta = new PreguntaFichaMD($id, $seccion, $pregunta, $ayudaPregunta, $tipoPregunta, $tipoRespuesta);

             PreguntaFichaBD::actualizarPreguntaFicha($pregunta);

            $respuestasBD = RespuestaFichaBD::seleccionarRespuestaFicha($id);
            
            
            $x = 1;
            $aux = true;

            while ($aux) {

                if (isset($_POST["respuesta{$x}"]) && isset($_POST["peso{$x}"])) {
                  
                    $nuevaRespuesta = new RespuestaFichaMD(null, $id, $_POST["respuesta{$x}"], (int) $_POST["peso{$x}"]);
                    RespuestaFichaBD::insertarRespuestaFicha($nuevaRespuesta);
                } else  {

                    foreach ($respuestasBD as $respuestaBD) {
                        if (isset($_POST["{$respuestaBD[0]}"]) && isset($_POST["p{$respuestaBD[0]}"])) {
                            
                            if(isset($_POST["id{$respuestaBD[0]}"])){
                                $respuesta = new RespuestaFichaMD((int) $_POST["id{$respuestaBD[0]}"], $id, $_POST["{$respuestaBD[0]}"], (int) $_POST["p{$respuestaBD[0]}"]);
                                
                                RespuestaFichaBD::actualizarRespuestaFicha($respuesta);
                            }


                        }else{
                            
                            $respuesta=new RespuestaFichaMD((int) $respuestaBD[0],null,null,null,false);
                            RespuestaFichaBD::eliminarRespuestaFicha($respuesta);
                        }
                    }
                    $aux = false;
                }
                $x = $x + 1;

            }

            $ruta = constant('URL');

            echo "<script>window.location='{$ruta}/preguntaFicha'</script>";

            $this->inicio();

        }

    }

    public function buscar(){
        
        if ($_GET){
           
           
            
            $key =$_GET["key"];


            
            
            $preguntas = PreguntaFichaBD::seleccionarPreguntaFicha($key,4);

            require $this->cargarVista('index.php');

            

        }
        


    }


    public function eliminar(){


        if ($_POST){
 
            $id = (int) $_POST["idPregunta"];
             
             
           
             
             
             $pregunta = new PreguntaFichaMD($id, null, null ,null, null, null, false);
            $ok = PreguntaFichaBD::eliminarPreguntaFicha($pregunta);
             $ruta=constant('URL');
             
             echo "<script>window.location='{$ruta}/preguntaFicha'</script>";
                 
             $this->inicio();
        }
 
 
        
 
     }

}
