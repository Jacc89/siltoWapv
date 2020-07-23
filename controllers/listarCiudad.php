<?php
require '../models/model.php';

$Modeldeptos = new Model();
$iddepartamento = $_POST['iddepartamento'];
$consulta = $Modeldeptos->listarCiudades($iddepartamento);
echo json_encode($consulta);


?>