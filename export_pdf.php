<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nuiz
 * Date: 16/12/2556
 * Time: 5:42 น.
 * To change this template use File | Settings | File Templates.
 */

include_once("App.php");
require('fpdf17/fpdf.php');

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
//$header = array('วัน เดือน ปี', 'ชื่อยา', 'ขนาด', 'ราคา/หน่วย', 'ขนาดบรรจุ', 'ปริมาณ', 'ราคาสุทธิ', 'โรงพยาบาล');
$header = array('วัน เดือน ปี', 'ชื่อยา','ปริมาณ', 'ราคาสุทธิ', 'โรงพยาบาล');
$drugs = App::allDrug($input);
$data = array();
foreach($drugs as $key => $value){
    $dateTime = new DateTime($value["receive_date"]);
    //$data[] = array($dateTime->format("d/m/Y"), $value["NAME"], $value["CONTENT"], $value["price"], $value["pack"], $value["qty"], $value["total_money"], $value["hospital_name"]);
    $data[] = array($dateTime->format("d/m/Y"), $value["NAME"], $value["qty"], $value["total_money"], $value["hospital_name"]);
}

class PDF extends FPDF
{
    // Simple table
    function BasicTable($header, $data)
    {
        // Header
        $this->SetFillColor(249,249,249);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        foreach($header as $col){
            $this->SetFont('angsana','B',16);
            $this->Cell(38,7,iconv( 'UTF-8','cp874' , $col ),1,0,"C",true);
        }
        $this->Ln();
        // Data
        $this->SetFillColor(224,235,255);
        foreach($data as $row)
        {
            foreach($row as $col){
                $this->SetFont('angsana','',16);
                $this->Cell(38,6,iconv( 'UTF-8','cp874' , $col ),1);
            }
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$pdf->AddFont('angsana','','angsa.php');
$pdf->AddFont('angsana','B','angsab.php');
$pdf->AddFont('angsana','I','angsai.php');
$pdf->AddFont('angsana','BI','angsaz.php');

$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();