<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pera - Login</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Fira+Code|Source+Sans+Pro&display=swap" rel="stylesheet">
  </head>
  <body class="fondo-login">


      <div class="container h-100">
        <div class="d-flex justify-content-center h-100">

          <div class="row m-auto bordered rounded bg-white sombra-login">

            <div class="col-12">
              <div class="row  border-bottom border-warning h-25">

                <div class="col-sm-12 mx-auto py-2">

                    <div class="text-ista-blue text-center titulo-login">
                      <img src="<?php echo constant('URL'); ?>public/img/icons/pera.png" width="50" height="50" class="d-inline-block mr-auto" alt="">
                      <span>Login</span>
                    </div>

                </div>

              </div>

              <div class="row">


                <div class="col-sm-5 my-auto pl-4">
                  <img src="<?php echo constant('URL'); ?>public/img/icons/ista-logo.png" alt="No encontramos el logo">
                </div>


                      <div class="col-sm-7">

                          <form class="form-horizontal mr-4 mt-3"
                          action="<?php echo constant('URL'); ?>login/ingresar"
                          method="post">

                            <div class="form-group">
                              <label for="txtUsuario" class="control-label">
                                  Usuario:
                              </label>
                              <div class="input-group">
                                <div class="input-group-append">
                                  <span class="input-group-text">
                                    <!--<i class="fas fa-key"></i>-->
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
                                      <!--<i class="fas fa-key"></i>-->
                                      P
                                    </span>
    							                </div>
                                  <input type="password" class="form-control" id="pera-password" name="txtPass" placeholder="Ingrese su password">
                                </div>

                            </div>

                            <div class="form-group">

                                <button type="submit" class="btn btn-warning btn-block text-white bg-ista-yellow"
                                name="ingresar"
                                id="pera-ingresar">
                                    Ingresar
                                </button>

                                <button type="submit" class="btn btn-link btn-block"
                                name="olvide">
                                    Olvide la contrasena
                                </button>

                              </div>
                          </form>

                      </div>

              </div>
            </div>


          </div>
        </div>
      </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  </body>
</html>
