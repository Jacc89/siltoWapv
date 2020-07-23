<?php

function getvehiculos(){
 
    $mysqli = getConnexion();
    $query =('SELECT  veh.placa, veh.capacidad, veh.seguro, veh.tecnomecanica,
    veh.tipo_vehiculo,   veh.gps,  veh.fecha_registro, usu.nombre as nombreconductor, veh.estado
    FROM vehiculo as veh
    INNER JOIN usuario as usu on usu.identificacion=veh.identificacion');
    return $mysqli->query($query);
}

function getusuario(){
 
    $mysqli = getConnexion();
    $query =('SELECT identificacion, nombre, apellido, email, telefono, whatsapp, cargo, estado,fecha_ingreso FROM usuario');
    return $mysqli->query($query);
}

function getsolicitud(){
 
    $mysqli = getConnexion();
    $query =('SELECT sol.id_solicitud, sol.fecha_solicitud, sol.descripcion, 
    cent.nombre as nombreCentro, usu.nombre as nombreUsuario
    FROM solicitud as sol
    INNER JOIN centro as cent on cent.id_centro=sol.id_centro
    INNER JOIN usuario as usu on usu.identificacion=sol.identificacion');
    return $mysqli->query($query);
}

function getruta(){
 
    $mysqli = getConnexion();
    $query =('SELECT
    rut.id_ruta, rut.fecha_ruta, rut.hora_salida, rut.hora_llegada, rut.tipo_ruta, rut.precinto, usu.nombre as nombreConductor, rut.placa, cent.nombre as nombreCentro, rut.variedad_productos, rut.id_solicitud, rut.estado, rut.observaciones
    FROM rutas as rut
    INNER JOIN usuario as usu on usu.identificacion=rut.identificacion
    INNER JOIN centro as cent on cent.id_centro=rut.id_centro
    ');
    return $mysqli->query($query);
}
function getproducto(){
 
    $mysqli = getConnexion();
    $query =('SELECT * FROM producto');
    return $mysqli->query($query);
}

function getcentro(){
 
    $mysqli = getConnexion();
    $query =('SELECT cent.id_centro, cent.nombre as nombrecentro, cent.email, cent.telefono, cent.whatsapp, depa.departamento, ciud.ciudad, usu.nombre as nombreusuario, cent.tipo_centro, cent.direccion 
    FROM centro as cent
    INNER JOIN departamentos as depa on depa.idDepa=cent.departamento
    INNER JOIN ciudades as ciud on ciud.idCiud=cent.ciudad
    INNER JOIN usuario as usu on usu.identificacion=cent.identificacion
    ');
    return $mysqli->query($query);
}
?>