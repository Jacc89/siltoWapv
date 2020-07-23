<?php
if ($_SESSION['cargo'] != "administrador") {
    if ($_SESSION['cargo'] != "supervisor") {
        echo "<script>alert('Señor usuario,esta intentando acceder de forma incorrecta al sistema!')</script>";
        header("location: ../index/logout");
    }
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
            <div class="text-center custom-login mt-20px">
                <h3><i class="fa fa-truck" aria-hidden="true"></i> Registro Vehìculo</h3>
                <p>Todos los campos son obligatorios</p>
            </div>
            <div class="center"><?php echo $this->mensaje;?></div>
            <div class="hpanel">
                <div class="panel-body">
                <form action="<?php echo constant('URL'); ?>vehiculo/crear" method="POST">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="placa">Placa de vehículo</label>
                            <input type="text" class="form-control" name="placa" id="placa" required >
                            <small id="placaHelp" class="form-text text-muted">Digite placa del vehículo</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="capacidad">Capacidad del vehículo</label>
                            <input type="text" class="form-control" name="capacidad" id="capacidad" required >
                            <small id="capadidadHelp" class="form-text text-muted">Capacidad de carga del vehículo</small>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="seguro">Vencimiento seguro del vehículo</label>
                            <input type="date" class="form-control" name="seguro" id="seguro" required >
                            <small id="seguroHelp" class="form-text text-muted">Digite  fecha de vencimiento de la poliza del seguro</small>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tecnomecanica">Vencimiento tecnomecánica del vehículo</label>
                            <input type="date" class="form-control" name="tecnomecanica" id="tecnomecanica" required >
                            <small id="tecnomecanicaHelp" class="form-text text-muted"> Digite la fecha de vencimiento de la tecnomecánica del vehículo</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_vehiculo">Tipo de vehículo</label>
                            <select  class="form-control" name="tipo_vehiculo" id="tipo_vehiculo"  required >
                                <option selected value="">Seleccione tipo de vehículo</option>
                                <option value="Furgon">Furgon</option>
                                <option value="Tractocamión">Tractocamion</option>
                                <option value="Estaca">Estacas</option>
                            </select>
                            <small id="tipo_vehiculoHelp" class="form-text text-muted">Tipo de vehículo</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="estado">Estado en la empresa</label>
                            <select id="estado"  name="estado" class="form-control" required  >
                                <option selected value="">Seleccione estado</option>
                                <option value="contratista">Contratista</option>
                                <option value="propiedad">Propiedad</option>
                            </select>
                            <small id="estadopHelp" class="form-text text-muted">Diligencie el el estado del vehículo en la empresa</small>
                        </div>

                        <div class="form-group col-md-6">
                                <label for="identificacion">Conductor</label>
                                <select class="form-control" id="identificacion" name="identificacion" style="width:100%" required >
                                    <option selected value="">Seleccione...</option>
                                                
                                        <?php
                                            include_once 'models/usuario.php';

                                            if(count($this->ddl_usuarios)>0){
                                                foreach ($this->ddl_usuarios as $usuario) {
                                                $ddl_usuario = new UsuarioDAO();
                                                $ddl_usuario = $usuario;
                                        ?>
                                                <option  value="<?php echo $ddl_usuario->identificacion;?>"><?php echo $ddl_usuario->identificacion;?>-<?php echo $ddl_usuario->nombre;?>-<?php echo $ddl_usuario->apellido; ?>-<?php echo $ddl_usuario->cargo; ?></option>
                                                <?php
                                                }
                                            }
                                                ?>
                                </select>
                                <small id="identificacionHelp" class="form-text text-muted">Diligencie el encargado de la solicitud.</small>
                            </div>
                           
                        <div class="form-group col-md-6">
                            <label for="gps" >GPS</label><br>
                            <input class="custom-control-input"required type="radio" name="gps" id="gps1" value="si" checked>SI
                            <input class="custom-control-input" type="radio" name="gps" id="gps0" value="no">NO<br>
                            <small id="whatsappHelp" class="form-text text-muted">Diligencie si el vehiculo tiene gps</small>
                        </div>
                    </div>
                    
                    <div class="text-center ">
                        <button type="submit" class="btn btn-info">Registrar vehículo</button>
                        <button class="btn btn-danger">Cancelar</button>
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