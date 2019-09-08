<?php
require 'src/vista/templates/headerform.php';

require_once 'src/vista/respuesta/reportehead.php';

$resficha = $reportes['respuestas'];
//var_dump($resficha);
 ?>

 <div class="m-5">

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
           <?php $per = $rf['persona'] ?>
           <?php foreach ($per[0] as $p): ?>
             <td><?php echo $p; ?></td>
           <?php endforeach; ?>
           <?php $resu = $rf['pre_unica']; ?>

           <?php if ($resu != null): ?>
             <?php $rper = $rf['pre_unica']; ?>
             <?php foreach ($rper as $rp): ?>
               <td class="res-<?php echo $rp['id_pregunta_ficha'] ?>"><?php echo $rp['respuesta_ficha'] ?></td>
             <?php endforeach; ?>
          <?php endif; ?>

          <?php $resl = $rf['pre_libre']; ?>

          <?php if ($resl != null): ?>
             <?php foreach ($resl as $rl): ?>
               <td class="res--<?php echo $rl['id_pregunta_ficha'] ?>">
                 <?php foreach ($rl['res_libre'] as $r): ?>
                   <?php echo $r['alumno_fs_libre'] . ' <br> ';?>
                 <?php endforeach; ?>
               </td>
             <?php endforeach; ?>
          <?php endif; ?>

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
 
<!--
 <script type="text/javascript">

  $(document).ready(function() {

    $('#tblexport').DataTable( {
      dom: "B",
      buttons: [
          //'copy', 'csv', 'excel', 'pdf', 'print'
          {
            extend: 'print',
            text: 'Imprimir',
            titleAttr: 'Print',
            className: 'btn btn-info my-2',
            title: 'Imprimir Respuestas'
          },
          {
            extend: 'excelHtml5',
            text: 'Exportar a Excel',
            titleAttr: 'Excel',
            className: 'btn btn-info my-2',
            title: 'Reporte de Respuestas'
          }
      ]
    });

  });
 </script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js">

  </script>

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">

  </script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js">

  </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">

  </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js">

  </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">

  </script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js">

  </script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js">

  </script>
-->
