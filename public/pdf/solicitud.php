<?php
require ('fpdf.php');

class PDF extends FPDF{
    // Cabecera de página
    function Header(){
        // Logo
        $this->Image('../img/logosilto.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',18);
        // Movernos a la derecha
        $this->Cell(100);
        // Título
        $this->Cell(70,10,utf8_decode('Reporte de Solicitudes de vehículo'),0,0,'C');
        // Salto de línea
        $this->Ln(20);

        $this->Cell(20, 10, 'ID', 1, 0, 'C',0);
        $this->Cell(60, 10, 'Fecha', 1, 0, 'C',0);
        $this->Cell(30, 10, 'Centro', 1, 0, 'C',0);
        $this->Cell(40, 10, 'Encargado', 1, 0, 'C',0);
        $this->Cell(185, 10, 'Descripcion', 1, 1, 'C',0);

    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
    }
}


require 'base.php';
$consulta ="SELECT sol.id_solicitud, sol.fecha_solicitud, sol.descripcion, 
cent.nombre as nombreCentro, usu.nombre as nombreUsuario
FROM solicitud as sol
INNER JOIN centro as cent on cent.id_centro=sol.id_centro
INNER JOIN usuario as usu on usu.identificacion=sol.identificacion";
$resultado =  $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','Legal');
$pdf->SetFont('Arial','',16);
// $pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));
while($row = $resultado->fetch_assoc()){
    $pdf->Cell(20, 10, $row['id_solicitud'], 1, 0, 'C',0);
    $pdf->Cell(60, 10, $row['fecha_solicitud'], 1, 0, 'C',0);
    $pdf->Cell(30, 10, $row['nombreCentro'], 1, 0, 'C',0);
    $pdf->Cell(40, 10, $row['nombreUsuario'], 1, 0, 'C',0);
    $pdf->MultiCell(185, 10, $row['descripcion'], 1, 1, '',0);

}

$pdf->Output();
?>