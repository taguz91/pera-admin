<?php
require 'src/vista/templates/header.php';
 ?>

<div class="h-100 my-5">
  <div class="container">

    <div class="card mx-auto">
        <h1 class="text-center m-3">
          Bienvenido
        </h1>
    </div>

    <div class="card mx-auto my-3">
      <h1 class="text-center bg-ista-yellow py-2 text-white">
        <?php
        echo "$usuario->user";
         ?>
      </h1>
      <h2 class="text-center my-2">
        <?php
        //echo $usuario->persona->primerNombre;
        echo $usuario->persona->primerNombre
        ." ". $usuario->persona->primerApellido;
        ?>
      </h2>
    </div>

  </div>
</div>

<?php
require 'src/vista/templates/footer.php';
 ?>
