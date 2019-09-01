<?php
require 'src/vista/templates/header.php';
 ?>

 <div class="container my-5">

   <div class="col-md-8 col-lg-6 mx-auto border rounded">

     <h3 class="text-center my-3">
       Ingreso de Permiso Ficha
     </h3>
     <form class="form-horizontal" action="<?php echo constant('URL') . 'tipoficha/guardar'; ?>" method="post">

       <div class="form-group">
         <label for="">Nombre Ficha:</label>
         <input type="text" class="form-control" name="nombreficha" value=""
         placeholder="Ingrese el nombre de la ficha." required>
       </div>

       <div class="form-group">
         <label for="">Descripcion:</label>
         <textarea name="descripcionficha" class="form-control" rows="5" cols="5"
         placeholder="Ingrese una breve descripcion de la ficha que creara." required></textarea>

       </div>

       <div class="form-group">
          <input class="btn btn-success btn-block"
          type="submit" name="guardar" value="Guardar">
       </div>

     </form>

   </div>
 </div>

<?php
require 'src/vista/templates/footer.php';
?>
