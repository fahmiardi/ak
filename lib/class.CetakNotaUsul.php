<?php
class Nota extends FPDF {
	
	function level($data, $w) {
		for($i=0;$i<count($data);$i++){
	        $this->Cell($w[$i],6,$data[$i],1,0,'L',1);
		}		
	    $this->Ln();
		return $w;
	}
	
	function level_0($data) {
		//Kategori Root
	    $w=array(7,138,20,25);//total 190
	    for($i=0;$i<count($data);$i++){
	        $this->Cell($w[$i],6,$data[$i],1,0,'L',1);
		}		
	    $this->Ln();
		//Akhir Kategori Root
		return $w;
	}
	
	function level_1($data) {
		//Kategori Root
	    $w=array(7,10,128,20,25);
	    $x = $this->GetX();
		$y = $this->GetY();
		
		
		$this->Cell($w[0],5,$data[0],1,0,'L',1);
		$this->Cell($w[1],5,$data[1],1,0,'L',1);
		
		$y1 = $this->GetY();
		$this->MultiCell($w[2], 5, $data[2],1,1,'R',1);	
		$y2 = $this->GetY();
		$yH = $y2 - $y1;
		
		$this->SetXY($x + $w[0] + $w[1] + $w[2], $this->GetY() - $yH);
		
		$this->Cell($w[3],5,$data[3],1,0,'L',1);
		$this->Cell($w[4],5,$data[4],1,0,'L',1);
		
		/**
		for($i=0;$i<count($data);$i++){
	        $this->Cell($w[$i],5,$data[$i],1,0,'L',1);
		}**/
		//Akhir Kategori Root
		return $w;
	}
	
	function level_2($data) {
		//Kategori Root
	    $w=array(7,10,12,116,20,25);
	    for($i=0;$i<count($data);$i++){
	        $this->Cell($w[$i],5,$data[$i],1,0,'L',1);
		}
	    $this->Ln();
		//Akhir Kategori Root
		return $w;
	}
	
	function level_3($data) {
		//Kategori Root
	    $w=array(7,10,12,14,102,20,25);
	    for($i=0;$i<count($data);$i++){
	        $this->Cell($w[$i],5,$data[$i],1,0,'L',1);
		}
	    $this->Ln();
		//Akhir Kategori Root
		return $w;
	}
	
	function level_4($data) {
		//Kategori Root
	    $w=array(7,10,12,14,17,85,20,25);
	    for($i=0;$i<count($data);$i++){
	        $this->Cell($w[$i],5,$data[$i],1,0,'L',1);
		}
	    $this->Ln();
		//Akhir Kategori Root
		return $w;
	}
	
	function level_5($data) {
		//Kategori Root
	    $w=array(7,10,12,14,17,20,65,20,25);
	    for($i=0;$i<count($data);$i++){
	        $this->Cell($w[$i],5,$data[$i],1,0,'L',1);
		}
	    $this->Ln();
		//Akhir Kategori Root
		return $w;
	}
	
	function cetakTotalKUM($data) {
		$this->Ln();
		$w=array(145,45);
	    for($i=0;$i<count($data);$i++){
			if($i==0) {
				$letak="R";
			}
			else {
				$letak="L";
			}
	        $this->Cell($w[$i],6,$data[$i],1,0,$letak,1);
		}
	    $this->Ln();
		return $w;
	}
	
	function color() {
		//Colors, line width and bold font
	    $this->SetFillColor(255,255,255);
	    $this->SetTextColor(0,0,0);
	    $this->SetDrawColor(0,0,0);
	    $this->SetLineWidth(0.1);
	    $this->SetFont('','',9);
	}
	
	function renderCell($w) {
		$this->Cell(array_sum($w),0,'','T');
	}
	
	//Page header
	function Header() {
		
	}

	//Page footer
	function Footer() {
	    //Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    //Arial italic 8
	    $this->SetFont('Arial','I',8);
	    //Page number
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
	}
}
?>