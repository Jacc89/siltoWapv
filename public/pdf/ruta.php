<?php
require ('fpdf.php');

class PDF extends FPDF{
    // Cabecera de página
    function Header(){
        // Logo
        $this->Image('../img/logosilto.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',12);
        // Movernos a la derecha
        $this->Cell(100);
        // Título
        $this->Cell(70,10,utf8_decode('Reporte Rutas de vehículos'),0,0,'C');
        // Salto de línea
        $this->Ln(20);

        $this->Cell(10, 10, 'ID', 1, 0, 'C',0);
        $this->Cell(25, 10, 'Fecha', 1, 0, 'C',0);
        $this->Cell(25, 10, 'Salida', 1, 0, 'C',0);
        $this->Cell(25, 10, 'Llegada', 1, 0, 'C',0);
        $this->Cell(25, 10, 'Tipo ruta', 1, 0, 'C',0);
        $this->Cell(25, 10, 'Precinto', 1, 0, 'C',0);
        $this->Cell(40, 10, 'Encargado', 1, 0, 'C',0);
        $this->Cell(25, 10, utf8_decode('Vehículo'), 1, 0, 'C',0);
        $this->Cell(25, 10, 'Centro', 1, 0, 'C',0);
        $this->Cell(18, 10, 'Solicitid', 1, 0, 'C',0);
        $this->Cell(18, 10, 'Estado', 1, 0, 'C',0);
        $this->Cell(80, 10, 'Productos', 1, 1, 'C',0);

        // $this->Cell(80, 10, 'Observacion', 1, 1, 'C',0);

    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Pagina').$this->PageNo().'/{nb}',0,0,'C');
    }
}


require 'base.php';
$consulta ="SELECT
rut.id_ruta, rut.fecha_ruta, rut.hora_salida, rut.hora_llegada, rut.tipo_ruta, rut.precinto, usu.nombre as nombreConductor, rut.placa, cent.nombre as nombreCentro, rut.variedad_productos, rut.id_solicitud, rut.estado, rut.observaciones
FROM rutas as rut
INNER JOIN usuario as usu on usu.identificacion=rut.identificacion
INNER JOIN centro as cent on cent.id_centro=rut.id_centro";
$resultado =  $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','Legal');
$pdf->SetFont('Arial','',10);
// $pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));
while($row = $resultado->fetch_assoc()){

    $pdf->Cell(10, 10, $row['id_ruta'], 1, 0, 'C',0);
    $pdf->Cell(25, 10, $row['fecha_ruta'], 1, 0, 'C',0);
    $pdf->Cell(25, 10, $row['hora_salida'], 1, 0, 'C',0);
    $pdf->Cell(25, 10, $row['hora_llegada'], 1, 0, 'C',0);
    $pdf->Cell(25, 10, $row['tipo_ruta'], 1, 0, 'C',0);
    $pdf->Cell(25, 10, $row['precinto'], 1, 0, 'C',0);
    $pdf->Cell(40, 10, $row['nombreConductor'], 1, 0, 'C',0);
    $pdf->Cell(25, 10, $row['placa'], 1, 0, 'C',0);
    $pdf->Cell(25, 10, $row['nombreCentro'], 1, 0, 'C',0);
    $pdf->Cell(18, 10, $row['id_solicitud'], 1, 0, 'C',0);
    $pdf->Cell(18, 10, $row['estado'], 1, 0, 'C',0);
    $pdf->MultiCell(80, 10, $row['variedad_productos'], 1, 1, '',0);    
    // $pdf->MultiCell(80, 5, $row['observaciones'], 1, 1, '',0);


}

$pdf->Output();
?>