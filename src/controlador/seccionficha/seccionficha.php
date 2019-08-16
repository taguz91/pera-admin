<?php
declare(strict_types=1);
require_once "src/modelo/seccionFichaM/SeccionFichaMD.php";
require_once "src/modelo/seccionFichaM/SeccionFichaBD.php";

class SeccionFichaCTR extends CTR implements DCTR {


    function __construct()
    {
        parent::__construct("src/vista/seccionFichaV/");

    }

    public function inicio(){
        

        $fichas = SeccionFichaBD::seleccionarSeccionFicha(null,0);

        require $this->cargarVista('index.php');


    }

    public function actualizar(){
        

        
        require $this->cargarVista('actualizar.php');


    }




}
