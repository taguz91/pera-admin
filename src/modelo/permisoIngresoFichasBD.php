<?php
  include("conexionBD.php");
class permisoIngresoFichasBD
{ 
    function __construct()
    {
       echo "Ejecutando clase permisoIngresoFichasBD";
    }

   public function guardar(){
        $sql="INSERT INTO public.\"PermisoIngresoFichas\"(
    id_prd_lectivo, id_tipo_ficha, permiso_ingreso_fecha_inicio, permiso_ingreso_fecha_fin, permiso_ingreso_activo)
    VALUES (1, 2, '2020/03/17', '2021/03/17', true);";
        $ct=getCon();
        try{
            if($ct != null){
                $res=$ct->query($sql);
                echo "<br>"."Datos guardados"."<br>";
                var_dump($res);
            }else{
                echo "No podemos guardar los datos";
            }
        }catch(\Exception $e){
           echo $e->getMessage();
        }
    }
}
$ejecucion= new permisoIngresoFichasBD;
$ejecucion->guardar(); //para pruebas funcionales
?>
