<!doctype html>
<html class="no-js" lang="es">

<head>
<?php require 'views/head.php'; ?>
</head>
<body>

   <!-- Cabecera y menu -->
<header id="header-home">
  <div class="hero">
    <div class="container-fluid">
      <div class="container-log">
        <div class="row-back">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="col-md-4">
                      <a href="<?php echo constant('URL'); ?>">
                          <img src="<?php echo constant('URL'); ?>public/img/SILTO.png" alt="logo de la pagina">
                      </a>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                  <a href="<?php echo constant('URL'); ?>" class="btn btn-danger">INICIO</a>
                  </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="back-link back-backend"></div>
              </div>
        </div>
        <div class="row-log">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-6">
                <div class="hpanel">
                  <div class="panel-body">
                    <h1>INICIAR SESIÓN</h1>
                        <form action="<?php echo constant('URL'); ?>main" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="email">USUARIO</label>                              <input type="email" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="email" id="email" class="form-control">               <span class="help-block small">Escriba su usuario</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">CONTRASEÑA</label>                      <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control"><span class="help-block small">Escriba su contraseña</span>
                                <input type="hidden" name="auth" value="auth"/>
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Ingresar</button>
                       </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
      </div>
    </div>
  </div>
</header>
<?php require 'views/footer.php'; ?>
<script>
  txtusu.focus();
</script>
</body>

</html>
