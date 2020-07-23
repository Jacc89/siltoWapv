<!DOCTYPE html>
<html lang="es">

<head>
    <?php require 'views/head.php'; ?>
</head>

<body>

    <?php require 'views/header.php'; ?>
    <div class="container-fluid">
        <div class="row container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="text-center custom-login">
                    <h3><i class="fa fa-user" aria-hidden="true"></i>Editar usuario</h3>
                    <p>Todos los campos son obligatorios</p>
                </div>
                <h4> Identificación del usuario: <?php echo strtoupper($this->usuario->identificacion); ?></h4>
                <div><?php echo $this->mensaje; ?></div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo constant('URL'); ?>usuario/editar" method="POST" enctype="multipart/form-data">
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
                                    <label for="telefono"><i class="fa fa-phone" aria-hidden="true"></i>Número Telefónico</label>
                                    <input type="number" name="telefono" id="telefono" class="form-control" value="<?php echo $this->usuario->telefono; ?>" placeholder="Ej: 3040000000" required>
                                    <small id="telefonoHelp" class="form-text text-muted">Diligencie el numero de telefono del usuario</small>
                                </div>

                                <div class="form-group  col-md-6">
                                    <label for="whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp</label><br>
                                    <input class="custom-control-input" required type="radio" name="whatsapp" id="whatsapp1" value="SI" checked>SI
                                    <input class="custom-control-input" type="radio" name="whatsapp" id="whatsapp0" value="NO">NO<br>
                                    <small id="whatsappHelp" class="form-text text-muted">Confirme el whatsapp el numero de telefono ingresado</small>
                                </div>

                                <div class="form-group col-md-7">
                                    <label for="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $this->usuario->email; ?>" placeholder="Ej: usuario@gmail.com" required>
                                    <small id="emailHelp" class="form-text text-muted">Diligencie el email del usuario</small>
                                </div>

                                <!-- Boton cambio password -->
                                <div class="form-group col-md-5 ">
                                    <label for="pass"><i class="fa fa-key" aria-hidden="true"></i>Contraseña</label>
                                    <button type="button" class="btn btn-info form-control" onClick='window.location.assign("<?php echo constant('URL') . 'pass_usu/leer/' . $this->usuario->identificacion; ?>") '>Reestablecer Contraseña</button>
                                    <small  id="passHelp" class="form-text text-muted"> Solo para reestablecer la contraseña</small>
                                </div>

                                <div id="cargo" name="cargo" class="form-group col-md-6">
                                    <label for="cargo">Cargo</label>
                                    <select id="cargo" name="cargo" class="form-control" required>
                                        <option value="<?php echo $this->usuario->cargo; ?>"><?php echo $this->usuario->cargo; ?></option>
                                        <option value="administrador">Administrador</option>
                                        <option value="supervisor">Supervisor</option>
                                        <option value="bodeguero">Bodeguero</option>
                                        <option value="conductor">Conductor</option>
                                    </select>
                                    <small id="cargopHelp" class="form-text text-muted">Diligencie el cargo a desempeñar el usuario</small>
                                </div>

                                <div id="estado" name="estado" class="form-group col-md-6">
                                    <label for="estado">Estado</label>
                                    <select id="estado" name="estado" class="form-control" required>
                                        <option value="<?php echo $this->usuario->estado; ?>"><?php echo $this->usuario->estado; ?></option>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    </select>
                                    <small id="estadopHelp" class="form-text text-muted">Estado en la aplicación</small>
                                </div>

                                <!-- contenedor seccion foto -->
                                
                                <div class="form-group col-md-6">
                                    <label for="foto">Cambiar Foto de perfil</label>
                                    <input type="file" name="foto" id="foto" class="form-control" accept=".jpg, .png, .jpeg">
                                    <small id="foto" class="form-text text-muted"> Seleccione una imagen nueva si desea cambiar su foto</small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="foto">Foto de Perfil Actual</label><br>
                                    <input type="hidden" name="fotoriginal" value="<?php echo $this->usuario->foto; ?>">
                                    <img src="<?php echo constant('URL') . $this->usuario->foto; ?>" alt="imagen usuario" width="80" height="80">

                                </div>
                               
                                <div class="text-center col-md-12">
                                    <input type="submit" class="btn btn-info" value="Actualizar Usuario">
                                    <input type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>usuario")' value="Cancelar">
                                </div>

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