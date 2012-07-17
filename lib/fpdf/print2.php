<?
include('fpdf.php');

class PDF extends FPDF
{
//Page header
function Header()
{
    //Logo
    $this->Image('jendral.jpg',10,8,15);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Move to the right
    $this->Cell(80);
    //Title
    $this->Cell(30,0,'Toko Shabrina Fashion',0,1,'C');
	//Line break
    $this->Ln(1);
	
	//Arial bold 15
    $this->SetFont('Arial','B',9);
    //Move to the right
    $this->Cell(80);
    //Title
    $this->Cell(30,10,'Jl. Pejuang NO 1',0,1,'C');
	//Line break
    $this->Ln(20);
	$this->Line(1, 20, 200, 20);
}

//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
?>
