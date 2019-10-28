<?php
require_once 'src/vista/templates/headersp.php';
 ?>

  <div class="row m-auto border rounded bg-white sombra-login">

    <div class="col-12">
      <div class="row  border-bottom border-warning h-25">

        <div class="col-sm-12 mx-auto py-2">

            <div class="text-ista-blue text-center titulo-login">
              <img src="<?php echo constant('URL'); ?>public/img/icons/pera.png" width="50" height="50" class="d-inline-block mr-auto" alt="">
              <span>Login</span>
            </div>

        </div>

        <div class="col-12 mx-auto" id="errorlogin"></div>

      </div>

      <div class="row">


        <div class="col-sm-5 my-auto pl-4">
          <img class="d-block m-auto" src="<?php echo constant('URL'); ?>public/img/icons/ista-logo.png" alt="No encontramos el logo">
        </div>


              <div class="col-sm-7">

                  <form class="form-horizontal mr-4 mt-3"
                  action="<?php echo constant('URL'); ?>login/ingresar"
                  method="post" id="loginform">

                    <div class="form-group">
                      <label for="txtUsuario" class="control-label">
                          Usuario:
                      </label>
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            U
                          </span>
				                </div>
                        <input type="text" class="form-control" id="pera-user" name="txtUsuario" placeholder="Ingrese su usuario">
                      </div>

                    </div>

                    <div class="form-group">
                        <label for="txtPass" class="control-label">
                            Password:
                        </label>
                        <div class="input-group">
                          <div class="input-group-append">
                            <span class="input-group-text">
                              P
                            </span>
					                </div>
                          <input type="password" class="form-control" id="pera-password" name="txtPass" placeholder="Ingrese su password">
                        </div>

                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-warning btn-block text-white bg-ista-yellow"
                        name="ingresar"
                        id="pera-ingresar"
                        onclick="loguear('<?php echo constant('URLAPI').'api/v1/usuario/admin/' ?>')">
                            Ingresar
                        </button>


                      </div>

                  </form>

              </div>

      </div>
    </div>


  </div>


  <script type="text/javascript">

  const formlogin = document.querySelector('#loginform');
  const errorlogin = document.querySelector('#errorlogin');
  formlogin.addEventListener('submit', (e) => {
    e.preventDefault();
  });

  function loguear(url){
    var data = new FormData(formlogin);

    if(data.get('txtUsuario') != '' && data.get('txtPass') != ''){
      comprobarLogin(url, data);
    }else{
      errorLogin('No ingreso usuario ni contrasena.');
    }
  }

  function comprobarLogin(url, data){
    fetch(url, {
      method: 'POST',
      body: data
    })
    .then(res => res.json())
    .then(data => {
      if(data.statuscode  == 200){
        formlogin.submit();
      }else{
        errorLogin(data.mensaje);
        //console.log(data);
      }
    })
    .catch(e =>{
      console.log('Errores: ' + e);
    })
  }

  function errorLogin(msg){
    errorlogin.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span>` + msg + `</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button> </div>`;
  }

  </script>

<?php
require_once 'src/vista/templates/footersp.php';
 ?>
