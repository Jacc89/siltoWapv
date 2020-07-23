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
cellColor('A3:E3','bf4914');


//combinar celdas 
$objPHPExcel->setActiveSheetIndex(0) ->mergeCells('A1:E1') 
->setCellValue('A1', 'Listado de Solicitud');

//centrar texto lateral  del titulo
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A1:E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//centrar texto lateral  del celda
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A3:E3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


//color de texto titulo
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A1:E1')->getFont()->getColor()->setARGB('bf4914');


//color de texto celdas
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A3:E3')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

$objPHPExcel->getDefaultStyle()->getFont('A3:C3')->setName('Arial Narrow Bold')->setSize(13); 

//ANCHO DE celda
$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('A')->setWidth(8,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('B')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('C')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('D')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('E')->setWidth(15,78);

//FIN DE MODIFICACIONES



$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A3', 'Id ')
            ->setCellValue('B3', 'Fecha solicitud')
            ->setCellValue('C3', 'Descripcion')
            ->setCellValue('D3', 'Centro')
            ->setCellValue('E3', 'Encargado');
 
 
            $informe = getsolicitud();
 $i = 4; 
   while($row = $informe->fetch_array(MYSQLI_ASSOC))
            {
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue("A$i", $row['id_solicitud'])
                ->setCellValue("B$i", $row['fecha_solicitud'])
                ->setCellValue("C$i", $row['descripcion'])
                ->setCellValue("D$i", $row['nombreCentro'])
                ->setCellValue("E$i", $row['nombreUsuario']);
              
    $i++;
            }
  $objPHPExcel->getActiveSheet()->setTitle('Informe de vehiculos');


            
$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment;filename="Solicitudes.xls"'); //nombre del documento
header('Cache-Control: max-age=0');
	
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');
exit;