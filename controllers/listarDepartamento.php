<?php
require '../models/model.php';

$Modeldeptos = new Model();
$consulta = $Modeldeptos->listarDepartamentos();
echo json_encode($consulta);


?>