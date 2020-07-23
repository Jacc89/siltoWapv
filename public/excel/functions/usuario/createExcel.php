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
//FUCION DEL COLOR DE LAS CELDAS
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
//COMBINAR CELDAS 
$objPHPExcel->setActiveSheetIndex(0) ->mergeCells('A1:I1') 
->setCellValue('A1', 'Listado de Usuarios');

$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A1:I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

//color de texto
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A1:I1')->getFont()->getColor()->setARGB('bf4914');


//color de texto
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A3:I3')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

$objPHPExcel->getDefaultStyle()->getFont('A3:I3')->setName('Arial Narrow Bold')->setSize(13); 

//ANCHO DE 
$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('A')->setWidth(14,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('B')->setWidth(30,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('C')->setWidth(30,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('D')->setWidth(35,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('E')->setWidth(14,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('F')->setWidth(14,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('G')->setWidth(14,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('H')->setWidth(10,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('I')->setWidth(18,78);
//FIN DE MODIFICACIONES



$objPHPExcel->setActiveSheetIndex(0) 
            ->setCellValue('A3', 'Identificacion')
            ->setCellValue('B3', 'Nombre')
            ->setCellValue('C3', 'Apellido')
            ->setCellValue('D3', 'Email')
            ->setCellValue('E3', 'Telefono')  
            ->setCellValue('F3', 'Whatsapp')  
            ->setCellValue('G3', 'Cargo')  
            ->setCellValue('H3', 'Estado')  
            ->setCellValue('I3', 'Fecha de ingreso');

 $informe = getusuario();
 $i = 4; 
   while($row = $informe->fetch_array(MYSQLI_ASSOC))
            {
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue("A$i", $row['identificacion'])
                ->setCellValue("B$i", $row['nombre'])
                ->setCellValue("C$i", $row['apellido'])
                ->setCellValue("D$i", $row['email'])
                ->setCellValue("E$i", $row['telefono'])
                ->setCellValue("F$i", $row['whatsapp'])
                ->setCellValue("G$i", $row['cargo'])
                ->setCellValue("H$i", $row['estado'])
                ->setCellValue("I$i", $row['fecha_ingreso']);
               

    $i++;
            }
  $objPHPExcel->getActiveSheet()->setTitle('Informe de usuario');


            
$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment;filename="Usuarios.xls"'); //nombre del documento
header('Cache-Control: max-age=0');
	
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');
exit;