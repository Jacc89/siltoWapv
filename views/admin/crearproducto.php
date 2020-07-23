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

    <!-- Formulario de registro -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
            <div class="text-center  mt-20px">
                <h3><i class="fa fa-edit" aria-hidden="true"></i> Registro Producto</h3>
                <p>Todos los campos son obligatorios</p>
            </div>
            <div class="center"><?php echo $this->mensaje;?></div>
            <div class="hpanel">
                <div class="panel-body">
                    <form action="<?php  echo constant('URL'); ?>producto/crear" id="" method="POST">
                        <div class="row ">
                            <div class="form-group col-md-6">
                                <label for="id_producto">Código de producto</label>
                                <input type="number" name="id_producto"  id="id_producto" class="form-control" required >
                                <small id="id_productoHelp" class="form-text text-muted">Ingrese el Código del producto</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required >
                                <small id="nombreHelp" class="form-text text-muted">Ingrese el nombre del producto</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="costo">Costo kl</label>
                                <input type="text" name="costo" id="costo" class="form-control" required >
                                <small id="costoHelp" class="form-text text-muted">Ingrese el costo del producto por kilo</small>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-info">Registrar producto</button>
                            <button class="btn btn-danger">Cancelar</button>
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
