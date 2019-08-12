<?php
declare(strict_types=1);
require_once('src/modelo/seccionFichaM/SeccionFichaMD.php');


abstract class SeccionFichaBD{

    
    static function insertarSeccionFicha(SeccionFichaMD $nuevaSeccion){
       
        $pst=getCon()->prepare('INSERT INTO "SeccionesFicha" 
                                VALUES(id_tipo_ficha=?, seccion_ficha_nombre=?, seccion_ficha_activa=?)');
       return $pst->execute(array($nuevaSeccion->getIdTipoFicha(),$nuevaSeccion->getSeccionFichaNombre(),$nuevaSeccion->getSeccionFichaActiva()));
    
    }


    static function seleccionarSeccionFicha(SeccionFichaMD $seccion=null, int $key){

        $pst=null;
        if($seccion==null && $key==null){
            $pst=getCon()->prepare('SELECT id_seccion_ficha, id_tipo_ficha, seccion_ficha_nombre, seccion_ficha_activa
                                    FROM "SeccionesFicha"');
            $pst->execute();
        }else if ($seccion!=null && $key!=null){
            
            switch($key){

                case 1:
                $pst=getCon()->prepare('SELECT id_seccion_ficha, id_tipo_ficha, seccion_ficha_nombre, seccion_ficha_activa
                                    FROM "SeccionesFicha" WHERE id_seccion_ficha=?');
               $pst->execute($seccion->getIdSeccionFicha());
    
               break;

                case 2:
                $pst=getCon()->prepare('SELECT id_seccion_ficha, id_tipo_ficha, seccion_ficha_nombre, seccion_ficha_activa
                                    FROM "SeccionesFicha" WHERE id_tipo_ficha=?');
                $pst->execute($seccion->getIdTipoFicha());
                break;

                case 3:
                $pst=getCon()->prepare('SELECT id_seccion_ficha, id_tipo_ficha, seccion_ficha_nombre, seccion_ficha_activa
                                    FROM "SeccionesFicha" WHERE seccion_ficha_nombre=?');
                $pst->execute($seccion->getSeccionFichaNombre());
                break;

                case 4:
                $pst=getCon()->prepare('SELECT id_seccion_ficha, id_tipo_ficha, seccion_ficha_nombre, seccion_ficha_activa
                                    FROM "SeccionesFicha" WHERE seccion_ficha_activa=?');
                $pst->execute($seccion->getSeccionFichaActiva());
                break;

                default:
                break;
            }
            
        }
     
        return $pst->fetchAll();
    }


    static function actualizarSeccionFicha(SeccionFichaMD $nuevaSeccion){

        $pst=getCon()->prepare('INSERT INTO "SeccionesFicha"
                                SET  id_tipo_ficha=?, seccion_ficha_nombre=?, seccion_ficha_activa=?
                                WHERE id_seccion_ficha=?');
        return $pst->execute(array($nuevaSeccion->getIdTipoFicha(),$nuevaSeccion->getSeccionFichaNombre(),$nuevaSeccion->getSeccionFichaActiva(),$nuevaSeccion->getIdSeccionFicha()));
 
    }


    static function eliminarSeccionFicha(SeccionFichaMD $seccion){

        $pst=getCon()->prepare('INSERT INTO "SeccionesFicha"
                                SET  seccion_ficha_activa=?
                                WHERE id_seccion_ficha=?');

        return $pst->execute(array($seccion->getSeccionFichaActiva(),$seccion->getIdSeccionFicha()));
  
    }




}

