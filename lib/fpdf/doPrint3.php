<?php
require('fpdf.php');

class PDF extends FPDF
{
//Load data
function LoadData($file)
{
    //Read file lines
    foreach($file as $line)
        $data[]=explode(',',$line);
    return $data;
}

//Colored table
function FancyTable($header,$data)
{
    //Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
	
	
    //Header
    $w=array(40,35);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',1);
    $this->Ln();
    //Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
	
    //Data
    $fill=0;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'BLRT',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'BLRT',0,'L',$fill);
		
        $this->Ln();
		
        $fill=!$fill;
    }
    $this->Cell(array_sum($w),0,'','T');
}
//Page header
function Header()
{
    //Logo
    $this->Image('logo.jpg',10,8,25);
	//margin atas
	$this->Cell(80,5);
	 $this->Ln();
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Move to the right
    $this->Cell(80);
    //Title
    $this->Cell(50,0,'Toko Shabrina Fashion',0,1,'C');
	//Line break
    $this->Ln();
	
	//Arial bold 15
    $this->SetFont('Arial','B',10);
    //Move to the right
    $this->Cell(80);
    $this->Cell(50,10,'Jalan Banding Raya Blok D12 No. 1 Komplek Kehakiman Tangerang',0,1,'C');

   	$this->SetFont('Arial','B',7);
	$this->Cell(80);
	$this->Cell(50,0,'Tlp (021) 5543539, HP 08176653531 , Fax (021) 5543531',0,1,'C');
	//Line break
    $this->Ln(20);
	$this->setLineWidth(0.40);
	$this->Line(30, 35, 200, 35);
	$this->setLineWidth(0.22);
	$this->Line(40, 36, 190, 36);
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

$pdf=new PDF();
//Column titles
$header=array('Nama Produk','Harga');

//Data loading
$conn=mysql_connect("localhost","root","rahasia");
mysql_select_db("shabrina",$conn);
$sql="SELECT nama_produk, harga FROM produk";
$query=mysql_query($sql);
while($row=mysql_fetch_array($query)) {
	$isi[] = "$row[nama_produk],$row[harga]";
}

$data=$pdf->LoadData($isi);
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>