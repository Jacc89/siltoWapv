<?php
if ($_SESSION['cargo'] != "administrador") {
    if ($_SESSION['cargo'] != "supervisor") {
        if ($_SESSION['cargo'] != "bodeguero") {
            echo "<script>alert('Señor usuario,esta intentando acceder de forma incorrecta al sistema!')</script>";
            header("location: ../index/logout");
        }
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
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
            <div class="text-center custom-login mt-20px">
                <h3><i class="fa fa-edit" aria-hidden="true"></i> Registro de Solicitud de Vehículo</h3>
                <p>Todos los campos son obligatorios</p>
            </div>
            <div class="center"><?php echo $this->mensaje;?></div>
            <div class="hpanel">
                <div class="panel-body">
                <form action="<?php echo constant('URL'); ?>solicitud/crear" method="POST">
                    <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_centro">Centro Solicitante</label>
                                <select class="form-control" id="id_centro" name="id_centro" style="width:100%" required >
                                    <option selected value="">Seleccione...</option>
                                        <?php
                                            include_once 'models/centro.php';

                                            if(count($this->ddl_centros)>0){
                                                foreach ($this->ddl_centros as $centro) {
                                                $ddl_centro = new CentroDAO();
                                                $ddl_centro = $centro;
                                        ?>
                                                <option  value="<?php echo $ddl_centro->id_centro;?>"><?php echo $ddl_centro->id_centro;?>-<?php echo $ddl_centro->nombre;?>
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
                            <div class="form-group col-md-12">
                                <label for="descripcion">Descripciòn de solicitud</label>
                                <textarea  class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" required ></textarea>
                                <small id="descripcionHelp" class="form-text text-muted">Diligencie el descripcion de la solicitud.</small>
                            </div>
                            </div>
                            <div class="text-center ">
                        <button type="submit" class="btn btn-info">Registrar Solicitud</button>
                        <button class="btn btn-danger">Cancelar</button>
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