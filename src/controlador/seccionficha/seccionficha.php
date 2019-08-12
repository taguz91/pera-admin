<?php
declare(strict_types=1);

class SeccionFichaCTR extends CTR implements DCTR {


    function __construct()
    {
        parent::__construct("src/vista/seccionFichaV/");

    }

    public function inicio(){

        require $this->cargarVista('index.php');
    }


}
