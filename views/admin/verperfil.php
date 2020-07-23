<!DOCTYPE html>
<html lang="es">

<head>
    <?php require 'views/head.php'; ?>
</head>

<body>
    <?php require 'views/header.php'; ?>

    <div class="container text-center">
        <h1 class="h1">Mi Perfil</h1>
        <br><br><br>

        <div class="container">
            <div class="row">

                <!--Div Lista-->
                <div class="col-lg-3">
                    <ul>
                        <?php
                        include_once 'models/perfil.php';
                        if (count($this->usuarios) > 0) {
                            foreach ($this->usuarios as $row) {
                                $usuario = new PerfilDAO();
                                $usuario = $row;
                        ?>
                                <li>
                                    <p><b>Identificación: </b><?php echo $usuario->identificacion; ?></p>
                                </li>
                                <li>
                                    <p><b>Nombres: </b><?php echo $usuario->nombre; ?></p>
                                </li>
                                <li>
                                    <p><b>Apellido: </b><?php echo $usuario->apellido; ?></p>
                                </li>
                                <li>
                                    <p><b>Email: </b><?php echo $usuario->email; ?></p>
                                </li>
                                <li>
                                    <p><b>Teléfono: </b><?php echo $usuario->telefono; ?></p>
                                </li>
                                <li>
                                    <p><b>¿Tiene WhatsApp?: </b><?php echo $usuario->whatsapp; ?></p>
                                </li>
                                <li>
                                    <a href="<?php echo constant('URL') . 'perfil/leer/' . $usuario->identificacion; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                                </li>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="11" class="text-center">Error al cargar la información</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                
                <!--Div Foto-->
                <div class="col-lg-6">
                    <td><img src="<?php echo constant('URL') . $usuario->foto; ?>" alt="imagen usuario" width="100" height="100"> </td>
                </div>
                
                <div class="col-lg-1"></div>

            </div>
        </div>
    </div>
    <br><br>

    <?php require 'views/footer.php'; ?>
</body>
</html>