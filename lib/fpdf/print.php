<?
include('fpdf.php');
$temp = $_GET['id'];

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$temp);
$pdf->Output();
?>