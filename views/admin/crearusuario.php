<?php
    if ($_SESSION['cargo']!="administrador") {
        echo "<script>alert('Señor usuario,esta intentando acceder de forma incorrecta al sistema!')</script>";
        header("location: ../index/logout");  
    }
?>

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
                    <h3><i class="fa fa-user" aria-hidden="true"></i> Registrar Usuario</h3>
                    <p>Todos los campos son obligatorios</p>
                </div>
                <div><?php echo $this->mensaje; ?></div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo constant('URL'); ?>usuario/crear" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="identificacion">Identificación</label>
                                    <input type="number" class="form-control" name="identificacion" id="identificacion" placeholder="Ej: 107000000" required >
                                    <small id="identificacionHelp" class="form-text text-muted">Diligencie el numero de identificación del usuario</small>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="nombre">Nombres</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ej: Luis Felipe" required >
                                    <small id="nombreHelp" class="form-text text-muted">Diligencie el nombre del usuario</small>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="apellido">Apellidos</label>
                                    <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ej: Agudelo Restrepo" required >
                                    <small id="apellidoHelp" class="form-text text-muted">Diligencie los apellidos del usuario</small>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="telefono"><i class="fa fa-phone" aria-hidden="true"></i> Número Telefónico</label>
                                    <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Ej: 304123456" required >
                                    <small id="telefonoHelp" class="form-text text-muted">Diligencie el numero de telefono del usuario</small>
                                </div>

                                <div class="custom-control custom-radio col-lg-6">
                                    <label for=""><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp</label><br>
                                    <input class="custom-control-input" type="radio" name="whatsapp" id="whatsapp1" value="Si"> SI
                                    <input class="custom-control-input" type="radio" name="whatsapp" id="whatsapp2" value="No"> NO<br>
                                    <small id="whatsappHelp" class="form-text text-muted">Confirme si tiene whatsapp el numero telefonico ingresado</small>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Ej: usuario@gmail.com" required >
                                    <small id="emailHelp" class="form-text text-muted">Diligencie el email del usuario</small>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="pass"><i class="fa fa-key" aria-hidden="true"></i>Contraseña</label>
                                    <input type="password" name="pass" id="pass" class="form-control"required >
                                    <small id="passHelp" class="form-text text-muted">Diligencie la contraseña del email</small>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="pass"><i class="fa fa-key" aria-hidden="true"></i> Confirme Contraseña</label>
                                    <input type="password" name="pass2" id="passy" class="form-control"required >
                                    <small id="passHelp" class="form-text text-muted">Repita la contraseña del email</small>
                                    <input type="checkbox" onclick="verPassword2()"><i class="fa fa-eye" aria-hidden="true"></i> Ver Contraseña
                                </div>
                                <!-- Campo para generar alerta cuando los password no coinciden -->
                                <div class="text-center" id="alerta"></div>

                                <div id="cargo" name="cargo" class="form-group col-lg-6">
                                    <label for="cargo">Cargo</label>
                                    <select id="cargo" name="cargo" class="form-control"required >
                                        <option>Seleccionar</option>
                                        <option value="administrador">Administrador</option>
                                        <option value="supervisor">Supervisor</option>
                                        <option value="bodeguero">Bodeguero</option>
                                        <option value="conductor">Conductor</option>
                                    </select>
                                    <small id="cargopHelp" class="form-text text-muted">Diligencie el cargo a desempeñar el usuario</small>
                                </div>
                                <div id="estado" name="estado" class="form-group col-lg-6">
                                    <label for="estado">Estado</label>
                                    <select id="estado" name="estado" class="form-control" required >
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    </select>
                                    <small id="estadopHelp" class="form-text text-muted">Estado en la aplicación</small>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="foto">Foto de perfil</label>
                                    <input type="file" name="foto" id="foto" class="form-control" accept=".jpg, .png, .jpeg" required  >
                                    <small id="foto" class="form-text text-muted"> Seleccione de su equipo una foto en formatos .jpg, .png, .jpeg</small>

                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" onclick="validapassword();" class="btn btn-info" value="Registrar Usuario" >
                                <input type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>usuario")' value="Cancelar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>

</body>

</html>