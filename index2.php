<?
require('html2fpdf.php');
$pdf=new HTML2FPDF();
$pdf->AddPage();
/*
$fp = fopen("page.php?u=kepegawaian&act=cetakDUK","r");
$strContent = fread($fp, filesize("page.php?u=kepegawaian&act=cetakDUK"));
fclose($fp);
*/
$pdf->WriteHTML("a");
$pdf->Output();
echo "PDF file is generated successfully!";
?>