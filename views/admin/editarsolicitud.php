<?php
    if ($_SESSION['cargo']=="bodeguero") {
        echo "<script>alert('Señor usuario,esta intentando acceder de forma incorrecta al sistema!')</script>";
        header("location: ../../index/logout");  
    }
?>

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
                <h3><i class="fa fa-edit" aria-hidden="true"></i> Editar  Solicitud De vehículo</h3>
                <p>Todos los campos son obligatorios  <br>para la actualizacion porfavor confirmar todos los campos</p>
            </div>
            <h1>ID solicitud : <?php echo strtoupper($this->solicitud->id_solicitud); ?></h1>
            <div><?php echo $this->mensaje; ?></div>
            <div class="hpanel">
                <div class="panel-body">
                <form action="<?php echo constant('URL'); ?>solicitud/editar" method="POST">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="id_solicitud">Id solicitud</label>
                            <input type="number" class="form-control" value="<?php echo $this->solicitud->id_solicitud; ?>" name="id_solicitud" id="id_solicitud" readonly>
                            <small id="id_solicitudHelp" class="form-text text-muted">Ingrese el Id de la solicitud</small>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fecha_solicitud">Fecha de Solicitud</label>
                            <input type="date" class="form-control" value="<?php echo $this->solicitud->fecha_solicitud; ?>" name="fecha_solicitud" id="fecha_solicitud" required>
                            <small id="solicitudHelp" class="form-text text-muted">Diligencie la solicitud de ruta</small>
                        </div>
                        <div class="form-group col-md-6">
                                <label for="id_centro">Centro Solicitante</label>
                                <select class="form-control" id="id_centro" name="id_centro"  required>
                                    <option selected value="<?php echo $this->solicitud->id_centro; ?>"><?php echo $this->solicitud->id_centro; ?></option>
                                        <?php
                                            include_once 'models/centro.php';

                                            if(count($this->ddl_centros)>0){
                                                foreach ($this->ddl_centros as $centro) {
                                                $ddl_centro = new CentroDAO();
                                                $ddl_centro = $centro;
                                                if($this->solicitud->id_centro==$centro->id_centro){
                                                    $seleccionado = "selected";
                                                }else{
                                                    $seleccionado = '';
                                                }
                                        ?>
                                                <option <?php echo $seleccionado; ?>  value="<?php echo $ddl_centro->id_centro;?>"><?php echo $ddl_centro->nombre;?>
                                            </option>
                                                <?php
                                                }
                                            }
                                                ?>
                                </select>
                                <small id="id_centroHelp" class="form-text text-muted">Diligencie el centro solicitante de la solicitud.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="identificacion">Encargado de centro</label>
                                <select class="form-control" id="identificacion" name="identificacion"  required>
                                    <option selected value="<?php echo $this->solicitud->identificacion;?>"><?php echo $this->solicitud->identificacion; ?></option>
                                        <?php
                                            include_once 'models/usuario.php';

                                            if(count($this->ddl_usuarios)>0){
                                                foreach ($this->ddl_usuarios as $usuario) {
                                                $ddl_usuario = new UsuarioDAO();
                                                $ddl_usuario = $usuario;
                                                if($this->solicitud->identificacion==$usuario->identificacion){
                                                    $seleccionado = "selected";
                                                }else{
                                                    $seleccionado = '';
                                                }
                                        ?>
                                                <option <?php echo $seleccionado; ?>  value="<?php echo $ddl_usuario->identificacion;?>"><?php echo $ddl_usuario->identificacion;?>-<?php echo $ddl_usuario->nombre;?>-<?php echo $ddl_usuario->apellido; ?>-<?php echo $ddl_usuario->cargo; ?></option>
                                                <?php
                                                }
                                            }
                                                ?>
                                </select>
                                <small id="identificacionHelp" class="form-text text-muted">Diligencie el encargado de la solicitud.</small>
                            </div>
                        <div class="form-group col-md-12">
                            <label for="descripcion">Descripciòn</label>
                            <textarea  class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" value="<?php echo $this->solicitud->descripcion; ?>"><?php echo $this->solicitud->descripcion; ?></textarea>
                            <small id="descripcionHelp" class="form-text text-muted">Diligencie el descripcion de la solicitud.</small>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-info" value="Actualizar centro" >
                        <input type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>solicitud")' value="Cancelar">
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