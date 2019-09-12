<?php
require 'src/vista/templates/headerform.php';

require_once 'src/vista/respuesta/reportehead.php';

$resficha = $reportes['respuestas'];
//var_dump($resficha);
 ?>

 <div class="m-5">

   <button type="button" name="button" onclick="exportar()">Exportar</button>

   <div class="row mt-4">
     <table class="table" id="tblexport" >
       <thead class="thead-dark bg-ista-blue">
         <tr>
           <th scope="col" colspan="35">Alumno</th>
           <th scope="col" colspan="2">Ficha</th>
           <?php echo $ths ?>
         </tr>
         <tr>
           <!--PERSONA-->
           <th scope="col">Identificación</th>
           <th scope="col">Primer Apellido</th>
           <th scope="col">Segundo Apellido</th>
           <th scope="col">Primer Nombre</th>
           <th scope="col">Segundo Nombre</th>
           <th scope="col">País Nacimiento</th>
           <th scope="col">Provincia Nacimiento</th>
           <th scope="col">Ciudad Nacimiento</th>
           <th scope="col">Parroquia Nacimiento</th>
           <th scope="col">País Residencia</th>
           <th scope="col">Provincia Residencia</th>
           <th scope="col">Ciudad Residencia</th>
           <th scope="col">Parroquia Residencia</th>
           <th scope="col">Género</th>
           <th scope="col">Sexo</th>
           <th scope="col">Estado Civil</th>
           <th scope="col">Etnia</th>
           <th scope="col">Idioma Raiz</th>
           <th scope="col">Tipo Sangre</th>
           <th scope="col">Teléfono</th>
           <th scope="col">Celular</th>
           <th scope="col">Correo</th>
           <th scope="col">Discapacidad</th>
           <th scope="col">Tipo Discapacidad</th>
           <th scope="col">Porcentaje Discapacidad</th>
           <th scope="col">Carnet Conadis</th>
           <th scope="col">Calle Principal</th>
           <th scope="col">Calle Secundaria</th>
           <th scope="col">Rerencia</th>
           <th scope="col">Sector</th>
           <th scope="col">Número Casa</th>
           <th scope="col">Idioma</th>
           <th scope="col">Tipo Residencia</th>
           <th scope="col">Fecha Nacimiento</th>
           <th scope="col">Persona Categoria Migratoria</th>
           <!--/PERSONA-->
           <!--FICHA-->
           <th scope="col">Fecha Ingreso</th>
           <th scope="col">Fecha Modificación</th>
           <!--/FICHA-->
           <?php echo $thi ?>
         </tr>
       </thead>
       <tbody id="tblresfs">

         <?php foreach ($resficha as $rf): ?>
           <tr>
           <?php $per = $rf['persona'];


           ?>
           <?php foreach ($per[0] as $p): ?>
             <td><?php echo $p; ?></td>
           <?php endforeach;

             $pr = $rf['preguntas'];
           ?>

           <?php foreach ($pr as $pfa): ?>

            <?php  $resu = $pfa['pre_unica'];?>

            <?php if ($resu != null): ?>
              <?php foreach ($resu as $rp): ?>
                <td class="res--<?php echo $pfa['id_pregunta_ficha'] ?>">
                  <?php echo $rp['respuesta_ficha'] ?>
                </td>
              <?php endforeach; ?>
            <?php endif; ?>

            <?php $resl = $pfa['res_libre'];?>

             <?php if ($resl != null): ?>
               <td class="res--<?php echo $pfa['id_pregunta_ficha'] ?>">
                <?php foreach ($resl as $rl): ?>
                    <?php echo $rl['alumno_fs_libre'] . ' <br> ';?>
                <?php endforeach; ?>
                </td>
             <?php endif;?>

             <?php if ($resu == null && $resl == null): ?>
               <td class="res--<?php echo $pfa['id_pregunta_ficha'] ?>"></td>
             <?php endif; ?>

           <?php endforeach; ?>

           </tr>
         <?php endforeach; ?>

       </tbody>
     </table>

   </div>

 </div>

 </tr>

<?php
require 'src/vista/templates/footerform.php';
 ?>


 <script type="text/javascript">
   const COLS = document.querySelectorAll('.pre');
   const TBL = document.querySelector('#tblresfs');

   COLS.forEach(c => {
     let clase = c.className;
     let num = clase.split('--');
     let id = num[num.length - 1];
     let VALS = document.querySelectorAll('.res--'+id);
     let color = getRandomColor();
     c.style.backgroundColor = color;
     VALS.forEach(v => {
       v.style.backgroundColor = color;
       console.log(v.rows);
     });
   });

  function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }

 </script>


 <!--EXPORTARR-->

 <script lang="javascript" src="<?php echo constant('URL'); ?>public/Libs/FileSaver/FileSaver.min.js"></script>
 <script lang="javascript" src="<?php echo constant('URL') ?>public/Libs/xlsx/xlsx.full.min.js"></script>

 <script type="text/javascript">
 var wb = XLSX.utils.table_to_book(
   document.querySelector('#tblexport'),
   {
     sheet: "EJEMPLOOOOOOO"
   }
 );

 var wbout = XLSX.write(
   wb, {
     bookType:'xlsx',
     bookSST:true,
     type: 'binary'
   }
 );

 function s2ab(a) {
   var buf = new ArrayBuffer(a.length);
   var view = new Uint8Array(buf);
   for(var i = 0; i < a.length; i++){
     view[i] = a.charCodeAt(i) & 0xFF;
   }
   return buf;
 }

 function exportar(){
   saveAs(new Blob(
     [s2ab(wbout)], {
       type: "application/octet-stream"
     }),
     'test.xlsx'
   );
 }

 </script>
