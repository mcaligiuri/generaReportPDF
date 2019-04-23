<?php 
include "CMyPdf.php"; 

if(empty($_GET['tab']) || empty($_GET['lang']) || empty($_GET['nome']))
    die("Access Denied!");

$n = $_GET['tab'];
$path = $_GET['nome'];

$pdf = new CMyPdf();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4');
$pdf->SetIntestazione();
$pdf->SetColonne($n);
include "core.php";
$pdf->Output('F',$path.".pdf");
?>