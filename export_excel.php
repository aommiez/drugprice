<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nuiz
 * Date: 16/12/2556
 * Time: 6:17 น.
 * To change this template use File | Settings | File Templates.
 */
include_once "App.php";
require_once 'Classes/PHPExcel.php';
$user = App::getUser();

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
    ->setLastModifiedBy("Maarten Balliauw")
    ->setTitle("Office 2007 XLSX Test Document")
    ->setSubject("Office 2007 XLSX Test Document")
    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");

$header = array('วัน เดือน ปี', 'ชื่อยา', 'ขนาด', 'ราคา/หน่วย', 'ขนาดบรรจุ', 'ปริมาณ', 'ราคาสุทธิ', 'โรงพยาบาล');
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', $header[0])
    ->setCellValue('B1', $header[1])
    ->setCellValue('C1', $header[2])
    ->setCellValue('D1', $header[3])
    ->setCellValue('E1', $header[4])
    ->setCellValue('F1', $header[5])
    ->setCellValue('G1', $header[6])
    ->setCellValue('H1', $header[7]);

$input = array();
foreach($_GET as $key=>$value){
    if(!empty($value)){
        $input[$key] = $value;
    }
}
if(!empty($input["dt1"])){
    $ex = explode("/", $input["dt1"]);
    $input["dt1"] = $ex[2]."-".$ex[1]."-".$ex[0];
}
if(!empty($input["dt2"])){
    $ex = explode("/", $input["dt2"]);
    $input["dt2"] = $ex[2]."-".$ex[1]."-".$ex[0];
}
if(count($input)==0){
    $input = null;
}
$drugs = App::allDrug($input);
$data = array();
foreach($drugs as $key => $value){
    $dateTime = new DateTime($value["dt1"]);
    $value2 = array($dateTime->format("d/m/Y"), $value["NAME"], $value["CONTENT"], $value["price"], $value["pack"], $value["qty"], $value["total_money"], $value["hospital_name"]);

    $i = $key+2;
    $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $value2[0]);
    $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $value2[1]);
    $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $value2[2]);
    $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $value2[3]);
    $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $value2[4]);
    $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $value2[5]);
    $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $value2[6]);
    $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $value2[7]);
}

$objPHPExcel->getActiveSheet()->setTitle('Drug');
$objPHPExcel->setActiveSheetIndex(0);

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=export_excel.xls");
header("Content-Transfer-Encoding: binary ");
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');