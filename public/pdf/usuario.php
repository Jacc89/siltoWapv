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
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(150);
    // Título
    $this->Cell(70,10,utf8_decode('Reporte De Usuarios'),0,0,'C');
    // Salto de línea
    $this->Ln(20);


    $this->cell(30,10, utf8_decode('Identificacìon'), 1, 0,'C', 0);
    $this->cell(40,10, 'Nombres', 1, 0,'C', 0);
    $this->cell(40,10, 'Apellidos', 1, 0,'C', 0);
    $this->cell(70,10, 'Email', 1, 0,'C', 0);
    $this->cell(30,10, 'Telefono', 1, 0,'C', 0);
    $this->cell(20,10, 'Wtapp', 1, 0,'C', 0);
    $this->cell(30,10, 'Cargo', 1, 0,'C', 0);
    $this->cell(25,10, 'Estado', 1, 0,'C', 0);
    $this->cell(40,10, 'Fecha registro', 1, 1,'C', 0);
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
$consulta = ('SELECT * FROM usuario ');

$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->aliasNbPages();
$pdf->AddPage('L','Legal');
$pdf->SetFont('Arial','B',10);

while($row = $resultado->fetch_assoc()){
    $pdf->cell(30,10, $row['identificacion'], 1, 0,'C', 0);
    $pdf->cell(40,10, $row['nombre'], 1, 0,'', 0);
    $pdf->cell(40,10, $row['apellido'], 1, 0,'', 0);
    $pdf->cell(70,10, $row['email'], 1, 0,'', 0);
    $pdf->cell(30,10, $row['telefono'], 1, 0,'', 0);
    $pdf->cell(20,10, $row['whatsapp'], 1, 0,'C', 0);
    $pdf->cell(30,10, $row['cargo'], 1, 0,'C', 0);
    $pdf->cell(25,10, $row['estado'], 1, 0,'C', 0);
    $pdf->cell(40,10, $row['fecha_ingreso'], 1, 1,'C', 0);
}

$pdf->Output();
?>
