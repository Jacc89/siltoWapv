<!DOCTYPE html>
<html lang="es">

<head>
    <?php require 'views/head.php'; ?>
</head>

<body>

    <?php require 'views/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
            <div class="col-md-8 col-md-8 col-sm-8 col-xs-12">
                <div class="text-center custom-login">
                    <h3><i class="fa fa-user" aria-hidden="true"></i> Editar mi Perfil</h3>
                    <p>Todos los campos son obligatorios</p>
                </div>
                <h4> Identificación del usuario: <?php echo strtoupper($this->usuario->identificacion); ?></h4>
                <div><?php echo $this->mensaje; ?></div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo constant('URL'); ?>perfil/editar" method="POST"                enctype="multipart/form-data" id="formularioeditar">
                            <div class="row">

                                <input type="hidden" class="form-control" value="<?php echo $this->usuario->identificacion; ?>" name="identificacion" id="identificacion" readonly>

                                <div class="form-group col-md-6">
                                    <label for="nombre">Nombres</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $this->usuario->nombre; ?>" placeholder="Ej: Luis Felipe" required>
                                    <small id="nombreHelp" class="form-text text-muted">Diligencie el nombre del usuario</small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="apellido">Apellidos</label>
                                    <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $this->usuario->apellido; ?>" placeholder="Ej: Agudelo Restrepo" required>
                                    <small id="apellidoHelp" class="form-text text-muted">Diligencie los apellidos del usuario</small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $this->usuario->email; ?>" placeholder="Ej: usuario@gmail.com" required>
                                    <small id="emailHelp" class="form-text text-muted">Diligencie el email del usuario</small>
                                </div>
                                 <!-- Boton cambio password -->
                                 <div class="form-group col-md-6">
                                 <label for="pass"><i class="fa fa-key" aria-hidden="true"></i> Password</label>
                                    <button type="button" class="btn btn-info form-control" onClick='window.location.assign("<?php echo constant('URL') . 'pass/leer/'; ?>") '>Cambiar  Contraseña</button>
                                    <small class="form-text text-muted">Solo si desea cambiar su contraseña.</small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="telefono"><i class="fa fa-phone" aria-hidden="true"></i> Telefonico</label>
                                    <input type="number" name="telefono" id="telefono" class="form-control" value="<?php echo $this->usuario->telefono; ?>" placeholder="Ej: 3040000000" required>
                                    <small id="telefonoHelp" class="form-text text-muted">Diligencie el numero de telefono del usuario</small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp</label><br>
                                    <input class="custom-control-input" required type="radio" name="whatsapp" id="whatsapp1" value="SI" checked>SI
                                    <input class="custom-control-input" type="radio" name="whatsapp" id="whatsapp0" value="NO">NO<br>
                                    <small id="whatsappHelp" class="form-text text-muted">Confirme whatsapp del telefono ingresado</small>
                                </div>
                                <!-- Contenedor Seccion foto -->
                                <div class="form-group col-md-7">
                                    <label for="foto">Cambiar Foto de perfil</label>
                                    <input type="file" name="foto" id="foto" class="form-control" accept=".jpg, .png, .jpeg">
                                    <small id="fotoHelp" class="form-text text-muted"> Seleccione  imagen si desea cambiar la foto</small>
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="foto">Foto de Perfil Actual</label><br>
                                    <input type="hidden" name="fotoriginal" value="<?php echo $this->usuario->foto; ?>">
                                    <img src="<?php echo constant('URL') . $this->usuario->foto; ?>" alt="imagen usuario" width="80" height="80">
                                </div>

                                <div class="text-center col-md-12">
                                    <input type="submit" class="btn btn-info" value="Actualizar Perfil">
                                    <input type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>perfil")' value="Cancelar">
                                </div>
                                <input type="hidden" name="cargo" value="<?php echo $this->usuario->cargo; ?>">

                                <input type="hidden" name="estado" value="<?php echo $this->usuario->estado; ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
        </div>
    </div><br>
    <?php require 'views/footer.php'; ?>
</body>

</html>