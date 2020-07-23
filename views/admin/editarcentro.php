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
                <h3><i class="fa fa-edit" aria-hidden="true"></i>Editar Centro o Bodega</h3>
                <p>Todos los campos son obligatorios</p>
            </div>
            <div class="center"><?php echo $this->mensaje;?></div>
            <div class="hpanel">
                <div class="panel-body">
                    <form action="<?php echo constant('URL'); ?>centro/editar" method="POST">
                        <div class="row">
                        <div class="form-group col-md-6">
                                <label for="id_centro">Codigo de Centro</label>
                                <input type="number" class="form-control" value="<?php echo $this->centro->id_centro; ?>" name="id_centro" id="id_centro" readonly>
                                <small id="id_centroHelp" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre de centro</label>
                                <input type="text" class="form-control" value="<?php echo $this->centro->nombre; ?>" name="nombre" id="nombre" required>
                                <small id="nombreHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email</label>
                                <input type="email" class="form-control" value="<?php echo $this->centro->email; ?>" name="email" id="email" required>
                                <small id="emailHelp" class="form-text text-muted">Diligencie el email del Centro</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telefono"><i class="fa fa-phone" aria-hidden="true"></i> Teléfono</label>
                                <input type="number" class="form-control" value="<?php echo $this->centro->telefono; ?>" name="telefono" id="telefono" required>
                                <small id="telefonoHelp" class="form-text text-muted">Diligencie el número de teléfono del Centro</small>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp</label><br>
                                <input class="custom-control-input"required type="radio" name="whatsapp" id="whatsapp1" value="SI" checked>SI
                                <input class="custom-control-input" type="radio" name="whatsapp" id="whatsapp0" value="NO">NO<br>
                                <small id="whatsappHelp" class="form-text text-muted">Confirme si tiene whatsapp el número de teléfono ingresado</small>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="tipo_centro">Tipo de Centro</label>
                                <select class="form-control" id="tipo_centro" name="tipo_centro" style="width:100%"  required>
                                    <option selected value="<?php echo $this->centro->tipo_centro; ?>"><?php echo $this->centro->tipo_centro; ?></option>
                                    <option  value="Acopio">Centro Acopio</option>
                                    <option  value="Bodega">Bodega Principal</option>
                                </select>
                                <small id="tipo_centroHelp" class="form-text text-muted">tipo de centro</small>

                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                <div class="form-group col-md-6">
                                    <label for="departamento">Seleccione Departamento</label>
                                    <select class="form-control" id="departamento" name="departamento" style="width:100%" required alt="Departamento">
                                    <option selected value="<?php echo $this->centro->departamento; ?>"><?php echo $this->centro->departamento; ?></option>
                                        <?php
                                        include_once 'models/departament.php';

                                        if (count($this->ddl_departamentos) > 0) {
                                            foreach ($this->ddl_departamentos as $departamento) {
                                                $ddl_departamento = new DepartamentDAO();
                                                $ddl_departamento = $departamento;
                                                if($this->centro->departamento==$departamento->idDepa){
                                                    $seleccionado = "selected";
                                                }else{
                                                    $seleccionado = '';
                                                }
                                        ?>
                                                <option <?php echo $seleccionado; ?> value="<?php echo $ddl_departamento->idDepa; ?>"><?php echo $ddl_departamento->departamento; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <small id="identificacionHelp" class="form-text text-muted">Diligencie el Departamento de la centro.</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ciudad">Ingrese la Ciudad</label>
                                    <input type="text" class="form-control" value="<?php echo $this->centro->ciudad; ?>"  name="ciudad" id="ciudad" required>
                                    <small id="ciudadHelp" class="form-text text-muted">Diligencie el ciudad del Centro</small>
                                </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" value="<?php echo $this->centro->direccion; ?>" name="direccion" id="direccion" required>
                                <small id="direccionHelp" class="form-text text-muted">Diligencie la dirección del Centro</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="identificacion">Encargado del Centro</label>
                                <select class="form-control" id="identificacion" name="identificacion"  required>

                                    <option selected value="<?php echo $this->centro->identificacion;?>"><?php echo $this->centro->identificacion;?></option>
                                        <?php
                                            include_once 'models/usuario.php';

                                            if(count($this->ddl_usuarios)>0){
                                                foreach ($this->ddl_usuarios as $usuario) {
                                                $ddl_usuario = new UsuarioDAO();
                                                $ddl_usuario = $usuario;
                                                if($this->centro->identificacion==$usuario->identificacion){
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
                        </div>
                        <div class="text-center ">
                            <button type="submit" class="btn btn-info">Actualizar centro</button>
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
