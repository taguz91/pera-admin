<script type="text/javascript">

    $(document).ready(function(){
      $('.actualizarBtn').on('click',function(){
        $('#actualizarPregunta').modal('show');
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

          $('#preguntaA').val(datos_a[2]);
          $('#idPreguntaA').val(datos_a[0]);
          $('#listaSeccionesActualizar').val(datos_a[3]);


      });
    }
    );
  </script>

  <script>

  var bar=false;
  var x=1;
  document.getElementById("tipoPregunta").addEventListener("change", generarRespuestas);
  

  function generarRespuestas(){
    
    if (document.getElementById("respuestasMenu")){

      document.getElementById("respuestasMenu").innerHTML="";
      bar=false;
    }


    if (document.getElementById("respuestas")){

      document.getElementById("respuestas").innerHTML="";
      
    }
    
    console.log(document.getElementById("tipoPregunta").value) ;

    if (document.getElementById("tipoPregunta").value!=1 ) {

    

        if (!bar){
              var div0 = document.createElement("div");
              var btn1 = document.createElement("button");
              var btn2 = document.createElement("button");
              var lbl = document.createElement("label");

              div0.setAttribute("class", "btn-group float-right");
              
              btn1.setAttribute("class", "btn btn-outline-info waves-effect" );
              btn2.setAttribute("class", "btn btn-outline-danger waves-effect");
              lbl.setAttribute("for", "listaRespuestas");

              btn1.setAttribute("type", "button" );
              btn1.setAttribute("id", "crearRespuesta" );
              btn1.innerHTML="Agregar";
              btn2.setAttribute("type", "button");
              btn2.setAttribute("id", "eliminarRespuesta" );
              btn2.innerHTML="Quitar";
              lbl.innerHTML="Respuesta | Puntaje:"

              div0.appendChild(lbl);
              div0.appendChild(btn1);
              div0.appendChild(btn2);
              
              var cont = document.getElementById("respuestasMenu");
              cont.appendChild(lbl);
              cont.appendChild(div0);

              bar=true;
          }

    }
            
    
      if (bar){

        document.getElementById("crearRespuesta").addEventListener("click", crearRespuesta);
        document.getElementById("eliminarRespuesta").addEventListener("click", eliminarRespuesta);
     
    }


  




  function crearRespuesta() {
    
    console.log(x);

   

    var div1 = document.createElement("div");
    var div2 = document.createElement("div");
    var div3 = document.createElement("div");
    var tpp = document.createElement("input");
    div1.setAttribute("class", "input-group mb-3");
    div2.setAttribute("class", "input-group-prepend");
    div3.setAttribute("class", "input-group-text");
    tpp.setAttribute("id","respuesta"+x);
    tpp.setAttribute("onclick","return false");
   

    if (document.getElementById("tipoPregunta").value==3){
      
      
      tpp.setAttribute("type","radio");
      
    }else{
      

      tpp.setAttribute("type","checkbox");
     
    }
    
    tpp.setAttribute("id","respuesta"+x);
    tpp.setAttribute("onclick","return false");

    var input = document.createElement("input");
    var peso = document.createElement("input");


    input.setAttribute("class", "form-control")
    input.setAttribute("type", "text")
            
            
    peso.setAttribute("class", "form-control")
    peso.setAttribute("type", "number")              
    peso.setAttribute("id","peso"+x);

            

  

    div1.appendChild(div2);
    div2.appendChild(div3);
            

    div3.appendChild(tpp);

          
    div1.appendChild(input);
    div1.appendChild(peso);

    var cont = document.getElementById("respuestas");
            
    cont.appendChild(div1);

    x=x+1;
    console.log(x);




  }

  function eliminarRespuesta() {

    var res=document.getElementById("respuestas");

    if (res.childElementCount>0){
      res.removeChild(res.lastChild);
    }
    
  }



}






</script>


<script>

document.getElementById("cancelar").addEventListener("click", quitarRespuestas);

function quitarRespuestas() {

var respuestasMenu=document.getElementById("respuestasMenu");

respuestasMenu.innerHTML="";

var respuestas=document.getElementById("respuestas");

respuestas.innerHTML="";

document.getElementById("tipoPregunta").value=1;

}


</script>
