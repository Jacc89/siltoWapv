<?php
if ($_SESSION['cargo'] != "administrador") {
    if ($_SESSION['cargo'] != "supervisor") {
        echo "<script>alert('Señor usuario,esta intentando acceder de forma incorrecta al sistema!')</script>";
        header("location: ../index/logout");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
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
                <h3><i class="fa fa-map-marker" aria-hidden="true"></i> Registro Ruta</h3>
                <p>Todos los campos son obligatorios</p>
            </div>
            <div class="center"><?php echo $this->mensaje;?></div>
            <div class="hpanel">
                <div class="panel-body">
                    <form action="<?php echo constant('URL'); ?>ruta/crear" method="POST">
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="fecha_ruta">Fecha Ruta</label>
                                <input type="date" class="form-control" name="fecha_ruta" id="fecha_ruta" required >
                                <small id="fecha_rutaHelp" class="form-text text-muted">Diligencie la fecha de la ruta</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="hora_salida">Hora Salida</label>
                                <input type="time" class="form-control" name="hora_salida" id="hora_salida" required >
                                <small id="hora_salidaHelp" class="form-text text-muted">Diligencie la hora de salida</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="hora_llegada">Hora Llegada</label>
                                <input type="time" class="form-control" name="hora_llegada" id="hora_llegada" required >
                                <small id="hora_llegadaHelp" class="form-text text-muted">Diligencie la hora de llegada</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipo_ruta">Tipo de la ruta</label>
                                <select class="form-control" id="tipo_ruta" name="tipo_ruta" style="width:100%" required >
                                    <option value="Acopio">Acopio</option>
                                    <option value="Aeropuerto">Aeropuerto</option>
                                
                                </select>
                                <small id="tipo_rutaHelp" class="form-text text-muted">Seleccione el Tipo de Ruta</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="precinto">Precinto</label>
                                <input type="text" class="form-control" name="precinto" id="precinto" required >
                                <small id="precintoHelp" class="form-text text-muted">Precinto </small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_solicitud">Descripción de Solicitud</label>
                                <select class="form-control" id="id_solicitud" name="id_solicitud" required >
                                    <option selected value="">Seleccione...</option>
                                    <?php    
                                            include_once 'models/solicitud.php';

                                            if(count($this->ddl_solicitudes)>0){
                                                foreach ($this->ddl_solicitudes as $solicitud) {
                                                $ddl_solicitud = new SolicitudDAO();
                                                $ddl_solicitud = $solicitud;
                                        ?>
                                                <option  value="<?php echo $ddl_solicitud->id_solicitud;?>"><?php echo $ddl_solicitud->id_solicitud;?>-<?php echo $ddl_solicitud->descripcion;?>
                                            </option>
                                                <?php
                                                }
                                            }
                                                ?>
                                </select>
                                <small id="id_solicitudHelp" class="form-text text-muted">Seleccione la solicitud</small>
                                        
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_centro">Centro Solicitante</label>
                                <select class="form-control" id="id_centro" name="id_centro" required >
                                    <option selected value="">Seleccione...</option>
                                        <?php
                                            include_once 'models/centro.php';

                                            if(count($this->ddl_centros)>0){
                                                foreach ($this->ddl_centros as $centro) {
                                                $ddl_centro = new CentroDAO();
                                                $ddl_centro = $centro;
                                        ?>
                                                <option  value="<?php echo $ddl_centro->id_centro;?>"><?php echo $ddl_centro->nombre;?>
                                            </option>
                                                <?php
                                                }
                                            }
                                                ?>
                                </select>
                                <small id="id_centroHelp" class="form-text text-muted">Seleccione el centro solicitante</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="identificacion">Encargado del centro</label>
                                <select class="form-control" id="identificacion" name="identificacion"  required >
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
                                <small id="identificacionHelp" class="form-text text-muted">Seleccione el encargado de la solicitud</small>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="placa">Asignar Vehículo</label>
                                <select class="form-control" id="placa" name="placa"  required >
                                    <option selected value="">Seleccione...</option>
                                        <?php
                                            include_once 'models/vehiculo.php';

                                            if(count($this->ddl_vehiculos)>0){
                                                foreach ($this->ddl_vehiculos as $vehiculo) {
                                                $ddl_vehiculo = new VehiculoDAO();
                                                $ddl_vehiculo = $vehiculo;
                                        ?>
                                                <option  value="<?php echo $ddl_vehiculo->placa;?>"><?php echo $ddl_vehiculo->placa;?></option>
                                                <?php
                                                }
                                            }
                                                ?>
                                </select>
                                <small id="placaHelp" class="form-text text-muted">Diligencie la placa del vehiculo</small>
                            </div>
                            
                            
                            <div class="form-group col-md-4">
                                <label for="estado">Estado de la ruta</label>
                                <select class="form-control" id="estado" name="estado" required >
                                    <option value="Activo">Activo</option>
                                    <option value="Cancelada">Cancelada</option>
                                </select>
                                <small id="estadoHelp" class="form-text text-muted">Seleccione el Estado de la ruta</small>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-text text-muted">Productos en la ruta</label><br>
                                <input type="checkbox" id="producto_0" name="productos[0]" value="uchuva" class="form-check-input">
                                <label class="form-check-label" for="producto_0">Uchuva</label>
                                <input type="checkbox" id="producto_1" name="productos[1]" value="maracuya" class="form-check-input">
                                <label class="form-check-label" for="producto_1">Maracuyá</label>
                                <input type="checkbox" id="producto_2" name="productos[2]" value="gulupa" class="form-check-input">
                                <label class="form-check-label" for="producto_2">Gulupa</label>
                                <input type="checkbox" id="producto_3" name="productos[3]" value="arandanos" class="form-check-input">
                                <label class="form-check-label" for="producto_3">Arándanos</label>
                                <input type="checkbox" id="producto_4" name="productos[4]" value="pitaya" class="form-check-input">
                                <label class="form-check-label" for="producto_4">Pitaya</label><br>
                                <input type="checkbox" id="producto_5" name="productos[5]" value="granadilla" class="form-check-input">
                                <label class="form-check-label" for="producto_5">Granadilla</label>
                                <input type="checkbox" id="producto_6" name="productos[6]" value="freijoa" class="form-check-input">
                                <label class="form-check-label" for="producto_6">Freijoa</label>
                                <input type="checkbox" id="producto_7" name="productos[7]" value="lulo" class="form-check-input">
                                <label class="form-check-label" for="producto_7">Lulo</label>
                                <input type="checkbox" id="producto_8" name="productos[8]" value="guanabana" class="form-check-input">
                                <label class="form-check-label" for="producto_8">Guanabana</label>
                                <input type="checkbox" id="producto_9" name="productos[9]" value="tamarillo" class="form-check-input">
                                <label class="form-check-label" for="producto_9">Tamarillo</label>
                                <input type="checkbox" id="producto_10" name="productos[10]" value="babybanana" class="form-check-input">
                                <label class="form-check-label" for="producto_10">Babybanana</label><br>

                                <small id="productosHelp" class="form-text text-muted">Diligencie los productos que pide la solicitud</small>

                            </div>
                            <div class="form-group col-md-12">
                                <label for="observaciones">Observaciones</label>
                                <textarea  class="form-control" name="observaciones" id="observaciones" cols="30" rows="10" required ></textarea>
                                <small id="observacionesHelp" class="form-text text-muted">Observaciones de la ruta creada</small>
                            </div>
                        </div>
                        <div class="text-center ">
                            <button class="btn btn-info">Registrar ruta</button>
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