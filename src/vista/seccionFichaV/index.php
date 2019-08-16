<?php
require 'src/vista/templates/header.php';
require_once 'src/vista/seccionFichaV/actualizar.php';
 ?>

<br>
<div class="active-cyan-4 mb-4" style="width: 70%;margin-left:50px;" >
  <input class="form-control" type="text" placeholder="Buscar..." aria-label="Search" >
</div>

<table class="table table-hover" style="width: 90%"  align="center" >
  <thead >
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tipo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Estado</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>

  <?php
        

        foreach($fichas as $ficha){
            echo "<tr>
            <th scope='row'>{$ficha[0]}</th>
            <td>{$ficha[1]}</td>
            <td>{$ficha[2]}</td>
            <td>{$ficha[3]}</td>
            <td><button type='button' class='btn btn-primary editbtn'
            data-toggle='modal' data-target='#exampleModal'>Actualizar</button>
            <button type='button' class='btn btn-danger'>Eliminar</button></td>
            </tr>";

        }

       
  ?>
    
    
  </tbody>
</table>

<script>
  $(document).ready(function(){
    $('.editbtn').on('click',function(){
      $('#exampleModal').modal('show');
        $tr = $(this).closest('tr');
        var c=0;
        
        var data1 = $tr.children("th").map(function(){
          
        
           return $(this).text();
        

        }).get();

        var data2 = $tr.children("td").map(function(){
          c++;
          if(c<4){
           return $(this).text();
          }

        }).get();

        var data =data1.concat(data2)

        console.log(data);

        $('#exampleInputEmail1').val(data[2]);
    });
  });

</script>


<?php
require 'src/vista/templates/footer.php';
 ?>
