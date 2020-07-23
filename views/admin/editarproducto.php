<!DOCTYPE html>
<html lang="es">
<head>
<?php require 'views/head.php'; ?>
</head>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
        <div class="col-md-8 col-md-8 col-sm-8 col-xs-12">
            <div class="text-center custom-login mt-20px">
                <h3><i class="fa fa-edit" aria-hidden="true"></i> Editar Producto</h3>
                <p>Todos los campos son obligatorios</p>
            </div>
            <h1><?php echo strtoupper($this->producto->nombre); ?></h1>
            <div><?php echo $this->mensaje; ?></div>
            <div class="hpanel">
                <div class="panel-body">
                <form action="<?php  echo constant('URL'); ?>producto/editar" method="POST">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_producto">Codigo</label>
                                <input type="number" name="id_producto"  id="id_producto" class="form-control" value="<?php echo $this->producto->id_producto; ?>" readonly>
                                <small id="id_productoHelp" class="form-text text-muted">Ingrese el Id del producto</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre de Producto</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $this->producto->nombre; ?>" required>
                                <small id="nombreHelp" class="form-text text-muted">Ingrese el nombre del producto</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="costo">Costo Kl</label>
                                <input type="text" name="costo" id="costo" class="form-control" value="<?php echo $this->producto->costo; ?>" required>
                                <small id="costoHelp" class="form-text text-muted">Ingrese el costo del producto por kilo</small>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-info" value="Actualizar Producto" >
                            <input type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>producto")' value="Cancelar">
                        </div>
                    </form>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
    </div>
</div><br>
    <?php require 'views/footer.php'; ?>
</body>
</html>