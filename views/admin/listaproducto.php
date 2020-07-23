<?php
if ($_SESSION['cargo'] != "administrador") {
    if ($_SESSION['cargo'] != "supervisor") {
        echo "<script>alert('Señor usuario,esta intentando acceder de forma incorrecta al sistema!')</script>";
        header("location: index/logout");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<?php require 'views/head.php'; ?>
<body>

    <?php require 'views/header.php'; ?>
    <div class="product-status mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <div id="main" class="container-fluid">
                            <div id="respuesta"><?php echo $this->mensaje; ?></div>
                            <h1 class="text-center"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Listado de Productos </h1>
                            <div class=" row">
                            <button type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>producto/crear")'>Crear Producto</button>
                            <button type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>public/pdf/producto.php")'>PDF</button>
                            <button type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>public/excel/functions/productos/createExcel.php")'>EXCEL</button>
                           
                            </div> <br>
                            <div class="row">
                            

                            <table id="tabla" class="table table-hover table table-bordered" >
                                <thead >
                                    <tr class="text-center btn-warning">
                                        <th  scope="col">Código Producto</th>
                                        <th  scope="col">Nombre</th>
                                        <th  scope="col">Costo</th>
                                        <th  scope="col">Editar</th>
                                        <th  scope="col"><b class="text-center">Eliminar</b></th>
                                        
                                    </tr>
                                </thead>
                                <tbody id="tbody-data" class="table table-sm">
                            <?php
                                include_once 'models/producto.php';
                                if(count($this->productos)>0){
                                    foreach ($this->productos as $row) {
                                        $producto = new ProductoDAO();
                                        $producto = $row;
                            ?>
                                        <tr id="fila-<?php echo $producto->id_producto; ?>">
                                            <td><?php echo $producto->id_producto; ?>
                                            <td><?php echo $producto->nombre; ?>
                                            <td><?php echo $producto->costo; ?>
                                            <td><button class="btn-info text-center"><a href="<?php echo constant('URL') . 'producto/leer/' . $producto->id_producto; ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button></td>
                                            <td><button class="bEliminar btn-danger" data-url="<?php echo constant('URL');?>" data-controlador="producto" data-accion="eliminar" data-id="<?php echo $producto->id_producto; ?>"><i class="fa fa-trash-o" aria-hidden="true"></button></td>
                                        </tr>
                            <?php
                                    }
                                }else{
                            ?>
                                <tr><td colspan="6" class="text-center">NO HAY PRODUCTOS DISPONIBLES</td></tr>
                            <?php
                                }
                            ?>
                                </tbody>
                            </table><br>
                            <!-- paginacion de las hojas -->
                            <div class="custom-pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="">1</a></li>
                                        <li class="page-item"><a class="page-link" href="">2</a></li>
                                        <li class="page-item"><a class="page-link" href="">3</a></li>
                                        <li class="page-item"><a class="page-link" href="">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'views/footer.php'; ?>
</body>
</html>