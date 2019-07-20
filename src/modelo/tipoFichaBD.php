<?php
    include("conexionBD.php");
    class tipoFichaBD{
        function __construct(){
            echo "Ejecutando clase tipoFichaBD";
        }

        public function guardar(){
            $sql="INSERT INTO public.\"TipoFicha\"(
                id_tipo_ficha, tipo_ficha, tipo_ficha_descripcion, tipo_ficha_activo)
                VALUES (1, 'socieconomica', 'ficha socioeconomica', true);";
                $ct=getCon();
                try{
                    if($ct != null){
                        $res=$ct->query($sql);
                        echo "<br>"."Datos guardados correctamente"."<br>";
                        var_dump($res);
                    }else{
                        echo "No podemos guardar los datos";
                    }
                }catch(\Exception $e){
                   echo $e->getMessage();
                }
        }
    }
    $ejecucion= new tipoFichaBD;
    $ejecucion->guardar(); //pruebas funcionales
?>