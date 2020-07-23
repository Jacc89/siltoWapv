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
cellColor('A3:C3','bf4914');
//combinar celdas 
$objPHPExcel->setActiveSheetIndex(0) ->mergeCells('A1:C1') 
->setCellValue('A1', 'Listado de Productos');

//centrar texto lateral  del titulo
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A1:C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//centrar texto lateral  del celda
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A3:C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


//color de texto titulo
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A1:C1')->getFont()->getColor()->setARGB('bf4914');


//color de texto celdas
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A3:C3')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

$objPHPExcel->getDefaultStyle()->getFont('A3:C3')->setName('Arial Narrow Bold')->setSize(13); 

//ANCHO DE celda
$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('A')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('B')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('C')->setWidth(15,78);

//FIN DE MODIFICACIONES



$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A3', 'Id producto')
            ->setCellValue('B3', 'Nombre')
            ->setCellValue('C3', 'Costo');

 $informe = getproducto();
 $i = 4; 
   while($row = $informe->fetch_array(MYSQLI_ASSOC))
            {
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue("A$i", $row['id_producto'])
                ->setCellValue("B$i", $row['nombre'])
                ->setCellValue("C$i", $row['costo']);
               

    $i++;
            }
  $objPHPExcel->getActiveSheet()->setTitle('Informe de producto');


            
$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment;filename="Productos.xls"'); //nombre del documento
header('Cache-Control: max-age=0');
	
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');
exit;