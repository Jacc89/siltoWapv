<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../img/logosilto.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de producto',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(35, 10, 'ID', 1, 0, 'C',0);
    $this->Cell(100, 10, 'Nombre', 1, 0, 'C',0);
    $this->Cell(50, 10, 'Costo', 1, 1, 'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'base.php';
$consulta ="SELECT * FROM producto";
$resultado =  $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
// $pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));
while($row = $resultado->fetch_assoc()){
    $pdf->Cell(35, 10, $row['id_producto'], 1, 0, 'C',0);
    $pdf->Cell(100, 10, $row['nombre'], 1, 0, 'C',0);
    $pdf->Cell(50, 10, $row['costo'], 1, 1, 'C',0);

}

$pdf->Output();
?>