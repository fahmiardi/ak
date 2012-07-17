<?php
	class CetakPerolehan extends FPDF {
		private $PG_W = 190;
		private $id = 0;
		
		
		public function setId($id) {
			$this->id=$id;
		}
		
		function valid() {
			global $DB;
			$auth=false;
			
			$sqlCek="	SELECT idPerolehan 
						FROM ak_perolehan 
						WHERE idPerolehan='".$this->id."'";
			$DB->executeQuery($sqlCek);
			if($DB->getRows()==1) {
				$auth=true;
			}
			return $auth;
		}
		
		public function fetch($parent, $level) {
			global $DB;
			
			$sqlShow="	SELECT kdKategori, namaKategori 
						FROM ak_kategori 
						WHERE parentId='".$parent."'";
			$queryShow=mysql_query($sqlShow,$DB->opendb());
			if($queryShow!=null) {
				if(mysql_num_rows($queryShow)>0) {
					while($rowShow=mysql_fetch_array($queryShow)) {
						$sqlDiambil="	SELECT Rk.kdKategori, Pd.valueKUM 
										FROM ak_perolehan P, ak_perolehan_detail Pd, ak_relasi_kategori Rk 
										WHERE P.idPerolehan='".$this->id."' 
										AND P.idPerolehan=Pd.idPerolehan 
										AND Pd.valueKd='5' 
										AND Pd.idRelasiKat=Rk.idRelasiKat 
										AND Rk.kdKategori='".$rowShow['kdKategori']."'";
						$DB->executeQuery($sqlDiambil);
						if($DB->getRows()>0) {
							$kum=0;
							while($rowDiambil=$DB->getResult()) {
								$kum+=$rowDiambil['valueKUM'];
							}
						}
						else {
							$kum="";
						}
						$name=$rowShow['namaKategori'];
						$kd=$rowShow['kdKategori'].".";		
						switch($level) {
							case 0:
								$data=array($kd,$name,$kum,'');
								$w=$this->listPerolehan($data);
								break;
							case 1:
								$data=array($kd,$name,$kum,'');
								$w=$this->listPerolehan($data);
								break;
							case 2:
								$data=array($kd,$name,$kum,'');
								$w=$this->listPerolehan($data);
								break;
							case 3:
								$data=array($kd,$name,$kum,'');
								$w=$this->listPerolehan($data);
								break;
							case 4:
								$data=array($kd,$name,$kum,'');
								$w=$this->listPerolehan($data);
								break;
							case 5:
								$data=array($kd,$name,$kum,'');
								$w=$this->listPerolehan($data);								
								break;
						}					
						$this->fetch($rowShow['kdKategori'],$level+1);
					}
				}
			}
			return $w;		
		}
		
		public function listPerolehan($data) {			
			$this->SetDataFont();
			$this->AddPage();
			
			$width=array(7,138,20,25);
			
			for($i=0; $i<count($data); $i++) {
				$this->Cell($w[$i],5,$data[$i],1,0,'L',1);
			}
			$this->Ln();
		}
		
		public function renderCell($w) {
			$this->Cell(array_sum($w),0,'','T');
		}
		
		private function setDataFont($isBold = false) {
			$this->SetFont('Courier', $isBold ? 'B' : '', 8);
		}
	}
?>