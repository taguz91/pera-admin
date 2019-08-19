<?php
declare(strict_types=1);

class SeccionFichaMD{

    private $idSeccionFicha;
    private $idTipoFicha;
    private $seccionFichaNombre;
    private $seccionFichaActiva;

    function __construct(int $idSeccionFicha=null, int $idTipoFicha=null, string $seccionFichaNombre=null, bool $seccionFichaActiva=true)
    {
        if($idSeccionFicha!=null){
            
            $this->idSeccionFicha=$idSeccionFicha;
        }
        $this->idTipoFicha=$idTipoFicha;
        $this->seccionFichaNombre=$seccionFichaNombre;
        $this->seccionFichaActiva=$seccionFichaActiva;
    }


    
    

    
    public function getIdSeccionFicha():int
    {
        return $this->idSeccionFicha;
    }

 
    public function setIdSeccionFicha(int $idSeccionFicha)
    {
        $this->idSeccionFicha = $idSeccionFicha;

        return $this;
    }

    public function getIdTipoFicha():int
    {
        return $this->idTipoFicha;
    }


    public function setIdTipoFicha(int $idTipoFicha)
    {
        $this->idTipoFicha = $idTipoFicha;

        return $this;
    }

    public function getSeccionFichaNombre():string
    {
        return $this->seccionFichaNombre;
    }


    public function setSeccionFichaNombre(string $seccionFichaNombre)
    {
        $this->seccionFichaNombre = $seccionFichaNombre;

        return $this;
    }

 
    public function getSeccionFichaActiva():bool
    {
        return $this->seccionFichaActiva;
    }


    public function setSeccionFichaActiva(bool $seccionFichaActiva)
    {
        $this->seccionFichaActiva = $seccionFichaActiva;

        return $this;
    }
}

?>

<script>
  $(document).ready(function(){
    $('.actualizarBtn').on('click',function(){
      $('#actualizarSeccion').modal('show');
        $tr_a = $(this).closest('tr');
        var contador_a=0;
        
        var datos_a1 = $tr_a.children("th").map(function(){
          
        
           return $(this).text();
        

        }).get();

        var datos_a2 = $tr_a.children("td").map(function(){
          contador_a++;
          if(contador_a<4){
           return $(this).text();
          }

        }).get();

        var datos_a =datos_a1.concat(datos_a2)

        console.log(datos_a);

        $('#nombreSeccion').val(datos_a[2]);
        $('#idSeccion').val(datos_a[0]);
        $('#listaTiposActualizar').val(datos_a[3]);
        
       
    });
  }
  );
</script>


<script>

$(document).ready(function(){
    $('.eliminarBtn').on('click',function(){
      $('#eliminarSeccion').modal('show');
        $tr_e = $(this).closest('tr');
        var contador_e=0;
        
        var datos_e1 = $tr_e.children("th").map(function(){
          
        
           return $(this).text();
        

        }).get();

        var datos_e2 = $tr_e.children("td").map(function(){
          contador_e++;
          if( contador_e<4){
           return $(this).text();
          }

        }).get();

        var datos_e =datos_e1.concat(datos_e2)

        console.log(datos_e);

        $('#nombreSeccionE').val(datos_e[2]);
        $('#idSeccionE').val(datos_e[0]);        
        $('#listaTiposEliminar').val(datos_e[3]);
        
    });
  }
  );


</script>


<script>

    var b = document.getElementById("busqueda");
    b.addEventListener("keydown", function (e) {
        if (String(b.value).trim() !="" && e.keyCode === 13) {  
          window.location.href = "<?php echo constant('URL'); ?>seccionFicha/buscar?key="+b.value;
          
        }
    });
</script>

<script>

        var selIn = document.getElementById("listaTiposInsertar"); 
        var dimIn= document.getElementsByClassName("tiposSeccion").length; 
      
        

        for(var i = 0; i<=dimIn-2; i+=2) {
            var elIn = document.createElement("option");
            elIn.textContent = document.getElementsByClassName("tiposSeccion")[i+1].value;
            elIn.value = document.getElementsByClassName("tiposSeccion")[i].value;
            selIn.appendChild(elIn);
        }

</script>
   

<script>
    
        var selAc = document.getElementById("listaTiposActualizar"); 
        var dimAc= document.getElementsByClassName("tiposSeccion").length; 
      
        

        for(var j = 0; j<=dimAc-2; j+=2) {
            var elAc = document.createElement("option");
            elAc.textContent = document.getElementsByClassName("tiposSeccion")[j+1].value;
            elAc.value = document.getElementsByClassName("tiposSeccion")[j].value;
            selAc.appendChild(elAc);
        }

</script>


<script>
    
    var selEl = document.getElementById("listaTiposEliminar"); 
    var dimEl= document.getElementsByClassName("tiposSeccion").length; 
  
    

    for(var k = 0; k<=dimEl-2; k+=2) {
        var elEl = document.createElement("option");
        elEl.textContent = document.getElementsByClassName("tiposSeccion")[k+1].value;
        elEl.value = document.getElementsByClassName("tiposSeccion")[k].value;
        selEl.appendChild(elEl);
    }

</script>
   