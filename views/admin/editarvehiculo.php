<!DOCTYPE html>
<html lang="es">
<head>
<title><?php  echo constant('NOMBRESITIO'); ?></title>
</head>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
        <div class="col-md-8 col-md-8 col-sm-8 col-xs-12">
            <div class="text-center custom-login mt-20px">
                <h3><i class="fa fa-truck" aria-hidden="true"></i> Editar Vehículo</h3>
                <p>Todos los campos son obligatorios</p>
            </div>
            <h1>PLACA = <?php echo strtoupper($this->vehiculo->placa); ?></h1>
            <div><?php echo $this->mensaje; ?></div>
            <div class="hpanel">
                <div class="panel-body">
                <form action="<?php echo constant('URL'); ?>vehiculo/editar" method="POST">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="placa">Placa de vehículo</label>
                            <input type="text" class="form-control" value="<?php echo $this->vehiculo->placa; ?>" name="placa" id="placa" readonly>
                            <small id="placaHelp" class="form-text text-muted">Digite placas del vehículo</small>
                        </div>
         
                        <div class="form-group col-md-6">
                            <label for="capacidad"> Capacidad del vehículo</label>
                            <input type="text" class="form-control" value="<?php echo $this->vehiculo->capacidad; ?>" name="capacidad" id="capacidad" required>
                            <small id="capadidadHelp" class="form-text text-muted">Digite  fecha de vencimiento de la poliza del seguro</small>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="seguro">Vencimiento seguro del vehículo</label>
                            <input type="date" class="form-control" value="<?php echo $this->vehiculo->seguro; ?>" name="seguro" id="seguro" required>
                            <small id="seguroHelp" class="form-text text-muted">Digite numero de la poliza del seguro</small>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tecnomecanica">Vencimiento tecnomecánica del vehículo</label>
                            <input type="date" class="form-control" value="<?php echo $this->vehiculo->tecnomecanica; ?>" name="tecnomecanica" id="tecnomecanica" required>
                            <small id="tecnomecanicaHelp" class="form-text text-muted"> Digite la fecha de vencimiento del la tecnomecánica del vehículo</small>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tipo_vehiculo">Tipo de vehículo</label>
                            <select  class="form-control" name="tipo_vehiculo" id="tipo_vehiculo" required>
                                <option selected value="<?php echo $this->vehiculo->tipo_vehiculo;?>"><?php echo $this->vehiculo->tipo_vehiculo;?></option>
                                <option value="furgon">Furgon</option>
                                <option value="tractocamion">Tractocamion</option>
                                <option value="estaca">Estacas</option>
                            </select>
                            <small id="tipo_vehiculoHelp" class="form-text text-muted">Tipo de vehículo</small>
                        </div>
                        <div class="form-group col-md-4">
                                <label for="identificacion">Conductor</label>
                                <select class="form-control" id="identificacion" name="identificacion" style="width:100%" required>

                                    <option selected value="<?php echo $this->vehiculo->identificacion;?>"><?php echo $this->vehiculo->identificacion;?></option>
                                        <?php
                                            include_once 'models/usuario.php';

                                            if(count($this->ddl_usuarios)>0){
                                                foreach ($this->ddl_usuarios as $usuario) {
                                                $ddl_usuario = new UsuarioDAO();
                                                $ddl_usuario = $usuario;
                                                if($this->vehiculo->identificacion==$usuario->identificacion){
                                                    $seleccionado = "selected";
                                                }else{
                                                    $seleccionado = '';
                                                }
                                        ?>
                                                <option <?php echo $seleccionado; ?>  value="<?php echo $ddl_usuario->identificacion; ?>"><?php echo $ddl_usuario->identificacion; ?>-<?php echo $ddl_usuario->nombre; ?>-<?php echo $ddl_usuario->apellido; ?>-<?php echo $ddl_usuario->cargo; ?></option>
                                                <?php
                                                }
                                            }
                                                ?>
                                </select>
                                <small id="identificacionHelp" class="form-text text-muted">Diligencie el encargado de la solicitud.</small>
                            </div>

                        
                        <div class="form-group col-md-6">
                            <label for="whatsapp">GPS</label><br>
                            <input class="custom-control-input"required type="radio" name="gps" id="gps1" value="SI" checked>SI
                            <input class="custom-control-input" type="radio" name="gps" id="gps0" value="NO">NO<br>
                            <small id="gpsHelp" class="form-text text-muted">Confirme si tiene whatsapp el numero de telefono ingresado</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="estado">Estado en la empresa</label>
                            <select id="estado"  name="estado" class="form-control" required>
                                <option selected value="<?php echo $this->vehiculo->estado; ?>"><?php echo $this->vehiculo->estado; ?></option>
                                <option value="Contratista">Contratista</option>
                                <option value="Propiedad">Propiedad</option>
                            </select>
                            <small id="estadopHelp" class="form-text text-muted">Diligencie el el estado del vehiculo en la empresa</small>
                        </div>
                      
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-info" value="Actualizar vehículo" >
                        <input type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>vehiculo")' value="Cancelar">
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