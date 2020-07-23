<!DOCTYPE html>
<html lang="es">

<head>
    <?php require 'views/head.php'; ?>
</head>

<body>

    <?php require 'views/header.php'; ?>
    <div class="container-fluid">
        <div class="row container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3><i class="fa fa-user" aria-hidden="true"></i> Reestablecer el password </h3>
                    <p>Todos los campos son obligatorios</p>
                </div>
                <h4> Identificación del usuario: <?php echo strtoupper($this->usuario->identificacion); ?></h4>
                <div><?php echo $this->mensaje; ?></div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo constant('URL'); ?>pass_usu/editar" method="POST" enctype="multipart/form-data" id="formulariopass">
                            <div class="row">
                                <input type="hidden" class="form-control" value="<?php echo $this->usuario->identificacion; ?>" name="identificacion" id="identificacion" readonly>

                                <input type="hidden" name="nombre" id="nombre" class="form-control" value="<?php echo $this->usuario->nombre; ?>">

                                <input type="hidden" name="apellido" id="apellido" class="form-control" value="<?php echo $this->usuario->apellido; ?>">

                                <input type="hidden" name="email" id="email" class="form-control" value="<?php echo $this->usuario->email; ?>">

                                <input type="hidden" name="telefono" id="telefono" class="form-control" value="<?php echo $this->usuario->telefono; ?>">

                                <input type="hidden" name="whatsapp" id="whatsapp" class="form-control" value="<?php echo $this->usuario->whatsapp; ?>">

                                <input type="hidden" name="cargo" value="<?php echo $this->usuario->cargo; ?>">

                                <input type="hidden" name="estado" value="<?php echo $this->usuario->estado; ?>">

                                <input type="hidden" name="fotoriginal" value="<?php echo $this->usuario->foto; ?>">


                                <div class="form-group col-md-12">
                                    <label for="pass">Nuevo Password</label>
                                    <input type="password" name="pass" id="pass"  class="form-control" placeholder="*****" required>
                                    <small id="passHelp" class="form-text text-muted">Digite el nuevo Password a asignar</small>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="pass">Confirme Password</label>
                                    <input type="password" name="passy" id="passy"  class="form-control" placeholder="*****" required>
                                    <small id="passHelp" class="form-text text-muted">Confirme el nuevo Password</small><br>
                                    <input type="checkbox" onclick="verPassword2()"> Ver Password
                                </div>
                                <!-- Campo para generar alerta cuando los password no coinciden -->
                                <div class="text-center" id="alerta"></div>

                                <div class="text-center col-md-12">
                                    <input type="submit" class="btn btn-info" value="Actualizar Password" onclick="validapassword();">
                                    <input type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL') . 'usuario/leer/' . $_SESSION['usuactual']; ?>")' value="Cancelar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
    </div><br>
    <?php require 'views/footer.php'; ?>
</body>

</html>