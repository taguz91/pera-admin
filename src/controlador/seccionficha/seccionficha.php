<?php
declare(strict_types=1);
require_once "src/modelo/seccionFichaM/SeccionFichaMD.php";
require_once "src/modelo/seccionFichaM/SeccionFichaBD.php";
require_once "src/modelo/tipoficha/tipofichabd.php";

class SeccionFichaCTR extends CTR implements DCTR {


    private $tiposSeccion;
    function __construct()
    {
        
        parent::__construct("src/vista/seccionFichaV/");

    }

    public function inicio(){
        
        
        $tiposSeccion = TipoFichaBD::getAll();
        $secciones = SeccionFichaBD::seleccionarSeccionFicha(null,0);

       
        require $this->cargarVista('index.php');


    }


    public function buscar(){
        
        if ($_GET){
           
           
            
            $key =$_GET["key"];


            
            $tiposSeccion = TipoFichaBD::getAll();
            $secciones = SeccionFichaBD::seleccionarSeccionFicha($key,4);

            require $this->cargarVista('index.php');

            

        }
        


    }

 

    public function insertar(){


       if ($_POST){

            
            $tipo=(int)$_POST['tipoSeccion'];
            $nombre=$_POST["nombreSeccion"];
          
            
            $nuevaSeccion = new SeccionFichaMD(null,$tipo,$nombre);
            $ok = SeccionFichaBD::insertarSeccionFicha($nuevaSeccion);
            
            $ruta=constant('URL');
            echo "<script>window.location='{$ruta}/seccionFicha'</script>";
                
            $this->inicio();
       }


       

    }


    public function actualizar(){
        
        //require $this->cargarVista('actualizar.php');

        
       if ($_POST){

            $id=(int)$_POST["idSeccion"];
            $tipo=(int)$_POST['tipoSeccion'];
            $nombre=$_POST["nombreSeccion"];
        

            $seccion = new SeccionFichaMD($id,$tipo,$nombre);

            $ok = SeccionFichaBD::actualizarSeccionFicha($seccion);
            
            $ruta=constant('URL');
            echo "<script>window.location='{$ruta}/seccionFicha'</script>";

            $this->inicio();
        }


        
    }

    public function eliminar(){


       if ($_POST){

            $id=(int)$_POST["idSeccion"];
            
            
          
            
            $seccion = new SeccionFichaMD($id,null,null,false);
            $ok = SeccionFichaBD::eliminarSeccionFicha($seccion);
       
            $ruta=constant('URL');
            
            echo "<script>window.location='{$ruta}/seccionFicha'</script>";
                
            $this->inicio();
       }


       

    }

    




}



   
