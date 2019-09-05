<?php
require 'src/vista/templates/header.php';
 ?>

 <div class="container my-4">

   <div class="row">

     <div class="col-sm-10">

       <form action="#" method="get" class="form-inline my-auto">

        <div class="form-group">
          <label for="txtBuscar">Buscar:</label>

          <div class="input-group mx-md-2">
            <input type="text" id="query" name="txtBuscar" class="form-control" placeholder="Ingreso lo que buscara">
            <div class="input-group-append">
              <button type="button" name="button" class="btn btn-primary btn-sm">BU</button>
            </div>
          </div>

          <span class="text-danger">Errores</span>

        </div>

       </form>

     </div>

   </div>

   <div class="row mt-4">
     <table class="table" id="tblexport" >
       <thead class="thead-dark bg-ista-blue">
         <tr>
           <th scope="col">Periodo</th>
           <th scope="col">Nombre</th>
           <th scope="col">Identificacion</th>
           <th scope="col">Correo</th>
           <th scope="col">Fecha Ingreso</th>
           <th scope="col">Fecha Modificacion</th>
         </tr>
       </thead>
       <tbody id="tblresfs">

       </tbody>
     </table>

   </div>

 </div>

<?php
require 'src/vista/templates/footer.php';
 ?>

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
  <!--PARA EXPORTAR -->
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
