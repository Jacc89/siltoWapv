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
</head>
<body>

    <?php require 'views/header.php'; ?>
    <div class="product-status mg-tb-15">
            <div class="container-sm">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap ">
                            <div id="main" class="container-fluid">
                                <div id="respuesta"><?php echo $this->mensaje; ?></div>
                                <h1 class="text-center"><i class="fa fa-eye" aria-hidden="true"></i> Listado de Centros de Acopio</h1>
                                <div class="row">
                                <button type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>centro/crear")'>Crear Centro</button>
                                <button type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>public/pdf/centro.php")'>PDF</button>
                                <button type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>public/excel/functions/centro/createExcel.php")'>EXCEL</button>
                                </div><br>
                                <div class="row">
                                <table id="tabla" class="table table-hover table table-bordered">
                                    <thead>
                                        <tr class="text-center btn-warning">
                                            <th  scope="col">Código de Centro</th>
                                            <th  scope="col">Nombre</th>
                                            <th  scope="col">Email</th>
                                            <th  scope="col">Telefono</th>
                                            <th  scope="col">Whatsapp</th>
                                            <th  scope="col">Departamento</th>
                                            <th  scope="col">Ciudad</th>
                                            <th  scope="col">Direccion</th>
                                            <th  scope="col">Encargado</th>
                                            <th  scope="col">Tipo de Centro</th>
                                            <th  scope="col">Editar</th>
                                            <th  scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                        
                                    <tbody id="tbody-data">
                                <?php
                                    include_once 'models/centro.php';
                                    if(count($this->centros)>0){
                                        foreach ($this->centros as $row) {
                                            $centro = new CentroDAO();
                                            $centro = $row;
                                ?>
                                            <tr id="fila-<?php echo $centro->id_centro; ?>">
                                                <td><?php echo $centro->id_centro; ?></td>
                                                <td><?php echo $centro->nombre; ?></td>
                                                <td><?php echo $centro->email; ?>
                                                <td><?php echo $centro->telefono; ?>
                                                <td><?php echo $centro->whatsapp; ?>
                                                <td><?php echo $centro->departamento; ?>
                                                <td><?php echo $centro->ciudad; ?>
                                                <td><?php echo $centro->direccion; ?>
                                                <td><?php echo $centro->identificacion; ?>
                                                <td><?php echo $centro->tipo_centro; ?>
                                                <td><button class="btn-info"><a href="<?php echo constant('URL') . 'centro/leer/' . $centro->id_centro; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button></td>
                                                <td><button class="bEliminar btn-danger" data-url="<?php echo constant('URL');?>" data-controlador="centro" data-accion="eliminar" data-id="<?php echo $centro->id_centro; ?>"><i class="fa fa-trash-o" aria-hidden="true"></button></td>
                                            </tr>
                                <?php
                                        }
                                    }else{
                                ?>
                                    <tr><td colspan="12" class="text-center">NO HAY CENTROS PROGRAMAS DISPONIBLES</td></tr>
                                <?php
                                    }
                                ?>
                                    </tbody>
                                </table>

                                <div class="custom-pagination">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
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
