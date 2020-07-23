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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <div id="main" class="container-xs">
                            <div id="respuesta"><?php echo $this->mensaje; ?></div>
                            <h1 class="text-center"><i class="fa fa-map" aria-hidden="true"></i> Listado de Rutas</h1>
                            <div class="row">
                            <button type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>/ruta/crear")'>Crear Ruta</button>
                            <button type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>public/pdf/ruta.php")'>PDF</button>
                            <button type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>public/excel/functions/ruta/createExcel.php")'>EXCEL</button>
                            </div><br>
                            <div class="row">
                                <table id="tabla" class="table table-hover table table-bordered">
                                    <thead class="thead-dark">
                                        <tr class="text-center btn-warning">
                                            <th  scope="col">Código Ruta</th>
                                            <th  scope="col">Fecha Ruta</th>
                                            <th  scope="col">Hora Salida</th>
                                            <th  scope="col">Hora Llegada</th>
                                            <th  scope="col">Tipo de Ruta</th>
                                            <th  scope="col">Precinto</th>
                                            <th  scope="col">Responsable De solicitud</th>
                                            <th  scope="col">Vehículo Asignado</th>
                                            <th  scope="col">Centro Solicitante</th>
                                            <th  scope="col">Productos</th>
                                            <th  scope="col">Descripción de Solicitud</th>
                                            <th  scope="col">Estado</th>
                                            <th  scope="col">Observaciones</th>
                                            <th  scope="col">Editar</th>
                                            <th  scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-data">
                                <?php
                                    include_once 'models/ruta.php';
                                    if(count($this->rutas)>0){
                                        foreach ($this->rutas as $row) {
                                            $ruta = new RutaDAO();
                                            $ruta = $row;
                                ?>
                                            <tr id="fila-<?php echo $ruta->id_ruta; ?>">
                                                <td><?php echo $ruta->id_ruta; ?></td>
                                                <td><?php echo $ruta->fecha_ruta; ?></td>
                                                <td><?php echo $ruta->hora_salida; ?></td>
                                                <td><?php echo $ruta->hora_llegada; ?></td>
                                                <td><?php echo $ruta->tipo_ruta; ?></td>
                                                <td><?php echo $ruta->precinto; ?></td>
                                                <td><?php echo $ruta->identificacion; ?></td>
                                                <td><?php echo $ruta->placa; ?></td>
                                                <td><?php echo $ruta->id_centro; ?></td>
                                                <td><?php echo $ruta->variedad_productos; ?></td>
                                                <td><?php echo $ruta->id_solicitud; ?></td>
                                                <td><?php echo $ruta->estado; ?></td>
                                                <td><?php echo $ruta->observaciones; ?></td>
                                                <td><button class="btn-info"><a href="<?php echo constant('URL') . 'ruta/leer/' . $ruta->id_ruta; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button></td>
                                                <td><button class="bEliminar btn-danger" data-url="<?php echo constant('URL');?>" data-controlador="ruta" data-accion="eliminar" data-id="<?php echo $ruta->id_ruta; ?>"><i class="fa fa-trash-o" aria-hidden="true"></button></td>
                                            </tr>
                                <?php   
                                        } 
                                    }else{
                                ?>
                                    <tr><td colspan="6" class="text-center">NO HAY CENTROS RUTAS DISPONIBLES</td></tr>
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