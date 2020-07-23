<?php
function getConnexion(){
    $mysqli = new mysqli("localhost", "root", "", "silto");
    if($mysqli->connect_errno) exit ('error en la conexion:' . $mysqli->connect_errno);
    $mysqli->set_charset('utf8');
    return $mysqli;
}
?>