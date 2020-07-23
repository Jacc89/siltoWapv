<?php
require ('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../img/SILTO.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    $this->Cell(150);
    // Título
    $this->Cell(70,10,utf8_decode('Reporte De Vehículos'),0,0,'C');
    // Salto de línea
    $this->Ln(20);


    $this->cell(25,10, 'Placa', 1, 0,'C', 0);
    $this->cell(35,10, 'Capacidad', 1, 0,'C', 0);
    $this->cell(35,10, 'Seguro', 1, 0,'C', 0);
    $this->cell(50,10, 'Tecnomecanica', 1, 0,'C', 0);
    $this->cell(45,10, 'Tipo vehiculo', 1, 0,'C', 0);
    $this->cell(20,10, 'GPS', 1, 0,'C', 0);
    $this->cell(33,10, 'Estado', 1, 0,'C', 0);
    $this->cell(40,10, 'Conductor', 1, 0,'C', 0);
    $this->cell(50,10, 'Fecha registro', 1, 1,'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}

//llamar la la base
require 'base.php';
$consulta = ('SELECT  veh.placa, veh.capacidad, veh.seguro, veh.tecnomecanica,
veh.tipo_vehiculo,   veh.gps,  veh.fecha_registro, usu.nombre as nombreconductor, veh.estado
FROM vehiculo as veh
INNER JOIN usuario as usu on usu.identificacion=veh.identificacion
');

$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->aliasNbPages();
$pdf->AddPage('L','Legal');
$pdf->SetFont('Arial','',10);

while($row = $resultado->fetch_assoc()){
    $pdf->cell(25,10, $row['placa'], 1, 0,'', 0);
    $pdf->cell(35,10, $row['capacidad'], 1, 0,'', 0);
    $pdf->cell(35,10, $row['seguro'], 1, 0,'', 0);
    $pdf->cell(50,10, $row['tecnomecanica'], 1, 0,'', 0);
    $pdf->cell(45,10, $row['tipo_vehiculo'], 1, 0,'', 0);
    $pdf->cell(20,10, $row['gps'], 1, 0,'C', 0);
    $pdf->cell(33,10, $row['estado'], 1, 0,'C', 0);
    $pdf->cell(40,10, $row['nombreconductor'], 1, 0,'', 0);
    $pdf->cell(50,10, $row['fecha_registro'], 1, 1,'C', 0);
}

$pdf->Output();
?>
