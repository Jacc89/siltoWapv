<?php
    if ($_SESSION['cargo']!="administrador") {
        echo "<script>alert('Señor usuario,esta intentando acceder de forma incorrecta al sistema!')</script>";
        header("location: ../index/logout");  
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
                            <h1 class="text-center"><i class="fa fa-users" aria-hidden="true"></i> Listado de Usuarios</h1>
                            <div class="row">
                            <button type="button" class="btn btn-success loginbtn" onClick='window.location.assign("<?php echo constant('URL'); ?>usuario/crear")'>Crear Usuario</button>
                            <button type="button" class="btn btn-success loginbtn" onClick='window.location.assign("<?php echo constant('URL'); ?>public/pdf/usuario.php")'>PDF</button>
                            <button type="button" class="btn btn-success loginbtn" onClick='window.location.assign("<?php echo constant('URL'); ?>public/excel/functions/usuario/createExcel.php")'>EXCEL</button>
                            </div><br>

                            <div class="row container-sm">

                            <table id="tabla" class="table table-hover table table-bordered ">

                                <thead class="thead-dark">
                                    <tr class="text-center btn-warning">
                                        <th scope="col">Identificación</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Whatsapp</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Fecha de ingreso</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col" >Editar</th>
                                        <th scope="col" >Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-data">
                                    <?php
                                        include_once 'models/usuario.php';
                                        if(count($this->usuarios)>0){
                                            foreach ($this->usuarios as $row){
                                                $usuario = new UsuarioDAO();
                                                $usuario = $row;
                                    ?>
                                    <tr id="fila-<?php echo $usuario->identificacion; ?>">
                                        <td><?php echo $usuario->identificacion; ?></td>
                                        <td><?php echo $usuario->nombre; ?></td>
                                        <td><?php echo $usuario->apellido; ?></td>
                                        <td><?php echo $usuario->email; ?></td>
                                        <td><?php echo $usuario->telefono; ?></td>
                                        <td><?php echo $usuario->whatsapp; ?></td>
                                        <td><?php echo $usuario->cargo; ?></td>
                                        <td><?php echo $usuario->estado; ?></td>
                                        <td><?php echo $usuario->fecha_ingreso; ?></td>
                                        <td><img src="<?php echo constant('URL') . $usuario->foto; ?>" alt="imagen usuario" width="100" height="100"> </td>
                                        <td><button class="btn-info"><a href="<?php echo constant('URL') . 'usuario/leer/' . $usuario->identificacion; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button></td> <!--url/controlador/metodo-->
                                        <td><button class="bEliminar btn-danger" data-url="<?php echo constant('URL');?>" data-controlador="usuario" data-accion="eliminar" data-id="<?php echo $usuario->identificacion; ?>"><i class="fa fa-trash-o" aria-hidden="true"></button></td> 
                                    </tr>
                                    <?php   
                                            } 
                                        }else{
                                    ?>
                                    <tr><td colspan="6" class="text-center">NO HAY USUARIOS</td></tr>
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