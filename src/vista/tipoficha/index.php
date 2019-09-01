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

     <div class="col-sm-2">
       <a href="<?php echo constant('URL'); ?>permisoficha/guardar"
       class="btn btn-success btn-block">Ingresar</a>
     </div>

   </div>

   <div class="row mt-4">
     <table class="table">
       <thead class="thead-dark bg-ista-blue">
         <tr>
           <th scope="col">ID</th>
           <th scope="col">Tipo Ficha</th>
           <th scope="col">Descripcion</th>
           <th scope="col">Editar</th>
           <th scope="col">Eliminar</th>
         </tr>
       </thead>
       <tbody>
         <?php if(isset($tiposfichas)){?>

           <?php foreach ($tiposfichas as $tf): ?>
             <tr scope="row">
               <td><?php echo $tf->id; ?></td>
               <td><?php echo $tf->tipoFicha; ?></td>
               <td><?php echo $tf->descripcion; ?></td>
               <td> <a href="<?php echo constant('URL').'tipoficha/editar/?editar='.$tf->id; ?>"> Editar </a> </td>
               <td> <a href="#">Eliminar</a> </td>
             </tr>
           <?php endforeach; ?>
         <?php }else{
           Errores::errorBuscar("No encontramos tipos de fichas");
         }
          ?>

       </tbody>
     </table>

   </div>

 </div>

<?php
require 'src/vista/templates/footer.php';
 ?>
