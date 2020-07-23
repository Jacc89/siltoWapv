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
cellColor('A3:M3','bf4914');



//combinar celdas 
$objPHPExcel->setActiveSheetIndex(0) ->mergeCells('A1:M1') 
->setCellValue('A1', 'Listado de Rutas');

//centrar texto lateral  del titulo
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A1:M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//centrar texto lateral  del celda
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A3:M3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


//color de texto titulo
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A1:M1')->getFont()->getColor()->setARGB('bf4914');


//color de texto celdas
$objPHPExcel->setActiveSheetIndex(0)
->getStyle('A3:M3')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

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

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('F')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('G')->setWidth(25,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('H')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('I')->setWidth(25,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('I')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('J')->setWidth(25,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('K')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('L')->setWidth(15,78);

$objPHPExcel->setActiveSheetIndex(0)
->getColumnDimension('M')->setWidth(25,78);
//FIN DE MODIFICACIONES


$objPHPExcel->setActiveSheetIndex(0)
            
            ->setCellValue('A3', 'Id ruta')
            ->setCellValue('B3', 'Fecha ruta')
            ->setCellValue('C3', 'Hora salida')
            ->setCellValue('D3', 'Hora llegada')
            ->setCellValue('E3', 'Tipo ruta')
            ->setCellValue('F3', 'Precinto')
            ->setCellValue('G3', 'Conductor')
            ->setCellValue('H3', 'Placa')
            ->setCellValue('I3', 'Centros')
            ->setCellValue('J3', 'Productos')
            ->setCellValue('K3', 'Id solicitud')
            ->setCellValue('L3', 'Estado')
            ->setCellValue('M3', 'Observaciones');

 $informe = getruta();
 $i = 4; 
   while($row = $informe->fetch_array(MYSQLI_ASSOC))
            {
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue("A$i", $row['id_ruta'])
                ->setCellValue("B$i", $row['fecha_ruta'])
                ->setCellValue("C$i", $row['hora_salida'])
                ->setCellValue("D$i", $row['hora_llegada'])
                ->setCellValue("E$i", $row['tipo_ruta'])
                ->setCellValue("F$i", $row['precinto'])
                ->setCellValue("G$i", $row['nombreConductor'])
                ->setCellValue("H$i", $row['placa'])
                ->setCellValue("I$i", $row['nombreCentro'])
                ->setCellValue("J$i", $row['variedad_productos'])
                ->setCellValue("K$i", $row['id_solicitud'])
                ->setCellValue("L$i", $row['estado'])
                ->setCellValue("M$i", $row['observaciones']);
               

    $i++;
            }
  $objPHPExcel->getActiveSheet()->setTitle('Informe de producto');


            
$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment;filename="Rutas.xls"'); //nombre del documento
header('Cache-Control: max-age=0');
	
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');
exit;