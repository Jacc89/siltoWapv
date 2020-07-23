<?php
require('fpdf.php');

    class PDF extends FPDF{
    // Cabecera de página
        function Header(){
            // Logo
            $this->Image('../img/logosilto.png',10,8,33);
            // Arial bold 15
            $this->SetFont('Arial','B',12);
            // Movernos a la derecha
            $this->Cell(60);
            // Título
            $this->Cell(70,10,'Reporte Centros y Bodega Principal',0,0,'C');
            // Salto de línea
            $this->Ln(20);

            $this->Cell(20, 10, 'ID', 1, 0, 'C',0);
            $this->Cell(30, 10, 'Nombre', 1, 0, 'C',0);
            $this->Cell(50, 10, 'Email', 1, 0, 'C',0);
            $this->Cell(25, 10, 'Telefono', 1, 0, 'C',0);
            $this->Cell(25, 10, 'Whatsapp', 1, 0, 'C',0);
            $this->Cell(40, 10, 'Departamento', 1, 0, 'C',0);
            $this->Cell(30, 10, 'Ciudad', 1, 0, 'C',0);
            $this->Cell(40, 10, 'Encargado', 1, 0, 'C',0);
            $this->Cell(30, 10, 'Tipo Centro', 1, 0, 'C',0);
            $this->Cell(48, 10, 'Direccion', 1, 1, 'C',0);

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
    $consulta ="SELECT cent.id_centro, cent.nombre as nombrecentro, cent.email, cent.telefono, cent.whatsapp, depa.departamento, ciud.ciudad, usu.nombre as nombreusuario, cent.tipo_centro, cent.direccion 
    FROM centro as cent
    INNER JOIN departamentos as depa on depa.idDepa=cent.departamento
    INNER JOIN ciudades as ciud on ciud.idCiud=cent.ciudad
    INNER JOIN usuario as usu on usu.identificacion=cent.identificacion";
    $resultado =  $mysqli->query($consulta);


    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','Legal');
    $pdf->SetFont('Arial','',10);
    // $pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));
    while($row = $resultado->fetch_assoc()){
        $pdf->Cell(20, 10, $row['id_centro'], 1, 0, 'C',0);
        $pdf->Cell(30, 10, $row['nombrecentro'], 1, 0, 'C',0);
        $pdf->Cell(50, 10, $row['email'], 1, 0, 'C',0);
        $pdf->Cell(25, 10, $row['telefono'], 1, 0, 'C',0);
        $pdf->Cell(25, 10, $row['whatsapp'], 1, 0, 'C',0);
        $pdf->Cell(40, 10, $row['departamento'], 1, 0, 'C',0);
        $pdf->Cell(30, 10, $row['ciudad'], 1, 0, 'C',0);
        $pdf->Cell(40, 10, $row['nombreusuario'], 1, 0, 'C',0);
        $pdf->Cell(30, 10, $row['tipo_centro'], 1, 0, 'C',0);
        $pdf->Cell(48, 10, $row['direccion'], 1, 1, 'C',0);

    }

    $pdf->Output();
?>