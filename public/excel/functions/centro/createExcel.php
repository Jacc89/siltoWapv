<?php

require_once '../../Classes/PHPExcel.php';
require '../conexion.php';
require '../modulos.php';

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("SILTO")
               ->setLastModifiedBy("Maarten Balliauw")
               ->setTitle("Office 2007 XLSX Test Document")
               ->setSubject("Office 2007 XLSX Test Document")
               ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
               ->setKeywords("office 2007 openxml php")
               ->setCategory("Test result file");

$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial Narrow Bold')->setSize(15);  


//MODIFICACIONES
function cellColor($cells,$color){
  global $objPHPExcel;

  $objPHPExcel->setActiveSheetIndex(0)->getStyle($cells)->getFill()->applyFromArray(array(
      'type' => PHPExcel_Style_Fill::FILL_SOLID,
      'startcolor' => array(
           'rgb' => $color
      )
  ));
}
cellColor('A3:J3','bf4914');

$objPHPExcel->setActiveSheetIndex(0) ->mergeCells('A1:J1') 
->setCellValue('A1', ' Listado De Centros ');

$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A1:J1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



//color de texto
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A1:J1')->getFont()->getColor()->setARGB('bf4914');


//color de texto
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A3:J3')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

$objPHPExcel->getDefaultStyle()->getFont('A3:I3')->setName('Arial Narrow Bold')->setSize(13); 

//ANCHO DE 
$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('A')->setWidth(10,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('B')->setWidth(14,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('C')->setWidth(30,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('D')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('E')->setWidth(13,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('F')->setWidth(20,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('G')->setWidth(14,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('H')->setWidth(20,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('I')->setWidth(15,78);


$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('J')->setWidth(25,78);
//FIN DE MODIFICACIONES

//FIN DE MODIFICACIONES



$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A3', 'Id Centro')
            ->setCellValue('B3', 'Nombre')
            ->setCellValue('C3', 'Email')
            ->setCellValue('D3', 'Telefono')
            ->setCellValue('E3', 'Whatsapp')
            ->setCellValue('F3', 'Departamento')
            ->setCellValue('G3', 'Ciudad')
            ->setCellValue('H3', 'Encargado')
            ->setCellValue('I3', 'Tipo Centro')
            ->setCellValue('J3', 'Direccion');
 
$informe = getcentro();
 $i = 4; 
   while($row = $informe->fetch_array(MYSQLI_ASSOC))
            {
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue("A$i", $row['id_centro'])
                ->setCellValue("B$i", $row['nombrecentro'])
                ->setCellValue("C$i", $row['email'])
                ->setCellValue("D$i", $row['telefono'])
                ->setCellValue("E$i", $row['whatsapp'])
                ->setCellValue("F$i", $row['departamento'])
                ->setCellValue("G$i", $row['ciudad'])
                ->setCellValue("H$i", $row['nombreusuario'])
                ->setCellValue("I$i", $row['tipo_centro'])
                ->setCellValue("J$i", $row['direccion']);

    $i++;
            }
  $objPHPExcel->getActiveSheet()->setTitle('Informe de producto');



$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment;filename="Centros.xls"'); //nombre del documento
header('Cache-Control: max-age=0');
	
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');
exit;