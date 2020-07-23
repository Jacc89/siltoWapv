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

$objPHPExcel->getDefaultStyle()->getFont('A1:I1')->setName('Arial Narrow Bold')->setSize(15);  

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
cellColor('A3:I3','bf4914');

//combinar celdas 
$objPHPExcel->setActiveSheetIndex(0) ->mergeCells('A1:I1') 
->setCellValue('A1', 'Listado de Vehìculos');

//centrar texto lateral  del titulo
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A1:I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//centrar texto lateral  del celda
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A3:I3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


//color de texto titulo
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A1:I1')->getFont()->getColor()->setARGB('bf4914');


//color de texto celdas
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A3:I3')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

$objPHPExcel->getDefaultStyle()->getFont('A3:I3')->setName('Arial Narrow Bold')->setSize(13); 

//ANCHO DE celda
$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('A')->setWidth(8,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('B')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('C')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('D')->setWidth(20,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('E')->setWidth(20,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('F')->setWidth(7,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('G')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('H')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('I')->setWidth(20,78);

//FIN DE MODIFICACIONES


           
$objPHPExcel->setActiveSheetIndex(0) 
            ->setCellValue('A3', 'Placa')
            ->setCellValue('B3', 'Capacidad')
            ->setCellValue('C3', 'Seguridad')
            ->setCellValue('D3', 'Tecnomecanica')
            ->setCellValue('E3', 'Tipo de vehiculo')
            ->setCellValue('F3', 'Gps')
            ->setCellValue('G3', 'Estados')
            ->setCellValue('H3', 'Conductor')
            ->setCellValue('I3', 'Fecha de registro');

 $informe = getvehiculos();
 $i = 4;
   while($row = $informe->fetch_array(MYSQLI_ASSOC))
            {
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue("A$i", $row['placa'])
                ->setCellValue("B$i", $row['capacidad'])
                ->setCellValue("C$i", $row['seguro'])
                ->setCellValue("D$i", $row['tecnomecanica'])
                ->setCellValue("E$i", $row['tipo_vehiculo'])
                ->setCellValue("F$i", $row['gps'])
                ->setCellValue("G$i", $row['estado'])
                ->setCellValue("H$i", $row['nombreconductor'])
                ->setCellValue("I$i", $row['fecha_registro']);

    $i++;
            }
  $objPHPExcel->getActiveSheet()->setTitle('Informe de vehiculos');


            
$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment;filename="Vehìculos.xls"'); //nombre del documento
header('Cache-Control: max-age=0');
	
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');
exit;