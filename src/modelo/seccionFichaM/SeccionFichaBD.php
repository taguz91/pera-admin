<?php
declare(strict_types=1);
require_once('src/modelo/seccionFichaM/SeccionFichaMD.php');


abstract class SeccionFichaBD{

    
    static function insertarSeccionFicha(SeccionFichaMD $nuevaSeccion){
       
        $pst=getCon()->prepare('INSERT INTO "SeccionesFicha"(
                                id_tipo_ficha, seccion_ficha_nombre, seccion_ficha_activa)
                                VALUES (?, ?, ?)');
       return $pst->execute(array($nuevaSeccion->getIdTipoFicha(),$nuevaSeccion->getSeccionFichaNombre(),$nuevaSeccion->getSeccionFichaActiva()));
    
    }


    static function seleccionarSeccionFicha($key, int $op){

        $pst=null;
        if($key==null){
            $pst=getCon()->prepare('SELECT id_seccion_ficha, tf.tipo_ficha, seccion_ficha_nombre, seccion_ficha_activa,sf.id_tipo_ficha
                                    FROM "SeccionesFicha" sf JOIN "TipoFicha" tf 
                                    ON tf.id_tipo_ficha=sf.id_tipo_ficha 
                                    WHERE seccion_ficha_activa=true 
                                    ORDER BY seccion_ficha_nombre');
            $pst->execute();
        }else{
            
            switch($op){

                case 1:
                $pst=getCon()->prepare('SELECT id_seccion_ficha, tf.tipo_ficha, seccion_ficha_nombre, seccion_ficha_activa,sf.id_tipo_ficha
                                        FROM "SeccionesFicha" sf JOIN "TipoFicha" tf 
                                        ON tf.id_tipo_ficha=sf.id_tipo_ficha 
                                        WHERE seccion_ficha_activa=true 
                                        AND id_seccion_ficha=?');
                 $pst->execute($key);
    
               break;

                case 2:
                $pst=getCon()->prepare('SELECT id_seccion_ficha, tf.tipo_ficha, seccion_ficha_nombre, seccion_ficha_activa,sf.id_tipo_ficha
                                        FROM "SeccionesFicha" sf JOIN "TipoFicha" tf 
                                        ON tf.id_tipo_ficha=sf.id_tipo_ficha 
                                        WHERE seccion_ficha_activa=true 
                                        AND tf.tipo_ficha=?');
                $pst->execute($key);
                break;

                case 3:
                $pst=getCon()->prepare('SELECT id_seccion_ficha, tf.tipo_ficha, seccion_ficha_nombre, seccion_ficha_activa,sf.id_tipo_ficha
                                        FROM "SeccionesFicha" sf JOIN "TipoFicha" tf 
                                        ON tf.id_tipo_ficha=sf.id_tipo_ficha 
                                        WHERE seccion_ficha_activa=true
                                        AND seccion_ficha_nombre=?');
                $pst->execute($key);
                break;

    
                case 4:
            
                $pst=getCon()->prepare("SELECT id_seccion_ficha, tf.tipo_ficha, seccion_ficha_nombre, seccion_ficha_activa,sf.id_tipo_ficha
                                        FROM \"SeccionesFicha\" sf JOIN \"TipoFicha\" tf 
                                        ON tf.id_tipo_ficha=sf.id_tipo_ficha
                                        WHERE seccion_ficha_activa=true 
                                        AND seccion_ficha_nombre ILIKE '%{$key}%'");
                                        
                $pst->execute();
    
                break;

                default:
                break;
            }
            
        }
     
        return $pst->fetchAll();
    }


    static function actualizarSeccionFicha(SeccionFichaMD $seccion){

        $pst=getCon()->prepare('UPDATE "SeccionesFicha"
                                SET  id_tipo_ficha=?, seccion_ficha_nombre=?, seccion_ficha_activa=?
                                WHERE id_seccion_ficha=?');
        return $pst->execute(array($seccion->getIdTipoFicha(),$seccion->getSeccionFichaNombre(),$seccion->getSeccionFichaActiva(),$seccion->getIdSeccionFicha()));
 
    }


    static function eliminarSeccionFicha(SeccionFichaMD $seccion){

        $pst=getCon()->prepare('UPDATE "SeccionesFicha"
                                SET  seccion_ficha_activa=false
                                WHERE id_seccion_ficha=?');

        return $pst->execute(array($seccion->getIdSeccionFicha()));
  
    }




}

