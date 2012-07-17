<?php
	class Persentasi {
		var $idGroupPersentasi=array();
		var $typePersentasi=array();
		var $nilaiTypePersentasi=array();
		var $totalPersentasi=array();
		var $total=array();
		var $kelebihan=array();
		var $saving=array();
		var $totalPengajuan=0;
		var $totalValid=0;
		var $totalSave=0;
		
		function setTotalPengajuan($totalPengajuan) {
			$this->totalPengajuan=$totalPengajuan;
		}
		
		function setTotalValid($totalValid) {
			$this->totalValid=$totalValid;
		}
		
		function setTotalSavingValid($save) {
			$this->totalSave=$save;
		}
		
		function setPersentasi($idGroupPersentasi,$typePersentasi,$nilaiTypePersentasi,$totalPersentasi) {
			$this->idGroupPersentasi[$idGroupPersentasi]=$idGroupPersentasi;
			$this->typePersentasi[$idGroupPersentasi]=$typePersentasi;
			$this->nilaiTypePersentasi[$idGroupPersentasi]=$nilaiTypePersentasi;
			$this->totalPersentasi[$idGroupPersentasi]=$totalPersentasi;
		}
		
		function setNilaiKelayakan($idGroupPerolehan,$totalPerolehan) {
			global $pengajuan;
			
			if($pengajuan->getValidSaving()) {
				if($this->typePersentasi[$idGroupPerolehan]=="min") {
					if($totalPerolehan<=$this->totalPersentasi[$idGroupPerolehan]) {
						$this->total[$idGroupPerolehan]=$totalPerolehan;
						$this->kelebihan[$idGroupPerolehan]=0;
						$this->saving[$idGroupPerolehan]=0;
					}
					else {
						$this->total[$idGroupPerolehan]=$this->totalPersentasi[$idGroupPerolehan];
						if($this->total[$idGroupPerolehan]!=0) {
							$this->kelebihan[$idGroupPerolehan]=$totalPerolehan-$this->totalPersentasi[$idGroupPerolehan];
						}
						else {
							$this->kelebihan[$idGroupPerolehan]=0;
						}
						$this->saving[$idGroupPerolehan]=$this->kelebihan[$idGroupPerolehan];
					}
				}
				else {
					if($totalPerolehan<=$this->totalPersentasi[$idGroupPerolehan]) {
						$this->total[$idGroupPerolehan]=$totalPerolehan;
						if($this->total[$idGroupPerolehan]!=0) {
							$this->kelebihan[$idGroupPerolehan]=$totalPerolehan-$this->total[$idGroupPerolehan];
						}
						else {
							$this->kelebihan[$idGroupPerolehan]=0;
						}
						$this->saving[$idGroupPerolehan]=$this->kelebihan[$idGroupPerolehan];
					}
					else {
						$this->total[$idGroupPerolehan]=$this->totalPersentasi[$idGroupPerolehan];
						if($this->total[$idGroupPerolehan]!=0) {
							$this->kelebihan[$idGroupPerolehan]=$totalPerolehan-$this->totalPersentasi[$idGroupPerolehan];
						}
						else {
							$this->kelebihan[$idGroupPerolehan]=0;
						}
						$this->saving[$idGroupPerolehan]=0;
					}
				}
			}
			else {
				if($totalPerolehan<=$this->totalPersentasi[$idGroupPerolehan]) {
					$this->total[$idGroupPerolehan]=$totalPerolehan;
					if($this->total[$idGroupPerolehan]!=0) {
						$this->kelebihan[$idGroupPerolehan]=$totalPerolehan-$this->total[$idGroupPerolehan];
					}
					else {
						$this->kelebihan[$idGroupPerolehan]=0;
					}
					$this->saving[$idGroupPerolehan]=0;
				}
				else {
					$this->total[$idGroupPerolehan]=$this->totalPersentasi[$idGroupPerolehan];
					$_SESSION['total'][]=$this->totalPersentasi[$idGroupPerolehan];
					if($this->total[$idGroupPerolehan]!=0) {
						$this->kelebihan[$idGroupPerolehan]=$totalPerolehan-$this->total[$idGroupPerolehan];
					}
					else {
						$this->kelebihan[$idGroupPerolehan]=0;
					}
					$this->saving[$idGroupPerolehan]=0;
				}
			}
		}
		
		function getTotalPengajuan() {
			return $this->totalPengajuan;
		}
		
		function getTotalValid() {
			return $this->totalValid;
		}
		
		function getTotal($idGroup) {
			return $this->total[$idGroup];
		}
		
		function getKelebihan($idGroup) {
			return $this->kelebihan[$idGroup];
		}
		
		function getSaving($idGroup) {
			return $this->saving[$idGroup];
		}
		
		function updatePerolehan() {
			global $DB;
			global $pengajuan;
			
			foreach($this->idGroupPersentasi as $idGroup) {
				$sqlGroup="	SELECT Pg.idGenerate 
							FROM ak_presentasi_kategori Pk, ak_perolehan_generate Pg  
							WHERE Pk.idGroup='".$idGroup."' 
							AND Pk.idPresentasi=Pg.idPresentasi 
							AND Pg.idPerolehan='".$pengajuan->getPerolehanID()."'";
				$DB->executeQuery($sqlGroup);
				if($DB->getRows()==1) {
					$rowGroup=$DB->getResult();
					$idGenerate=$rowGroup['idGenerate'];
					$sqlUpGenerate="UPDATE ak_perolehan_generate 
									SET kelayakan='".$this->getTotal($idGroup)."', 
										kelebihan='".$this->getKelebihan($idGroup)."', 
										saving='".$this->getSaving($idGroup)."' 
									WHERE idGenerate='".$idGenerate."'";
					$DB->executeQuery($sqlUpGenerate);					
				}
			}
			
			
		}
		
		function getTotalKelayakanKUM() {
			global $DB;
			global $pengajuan;
			
			$sqlLayak="	SELECT kelayakan 
						FROM ak_perolehan_generate 
						WHERE idPerolehan='".$pengajuan->getPerolehanID()."'";
			$DB->executeQuery($sqlLayak);
			if($DB->rs()) {
				if($DB->getRows()>0) {
					while($rowLayak=$DB->getResult()) {
						$total+=$rowLayak['kelayakan'];
					}
				}
			}
			return $total;
		}
		
		function getTotalKelayakanKUMMin() {
			global $DB;
			global $pengajuan;
			
			$sqlLayak="	SELECT Pg.kelayakan 
						FROM ak_perolehan_generate Pg, ak_presentasi_kategori Pk 
						WHERE Pg.idPerolehan='".$pengajuan->getPerolehanID()."' 
						AND Pg.idPresentasi=Pk.idPresentasi 
						AND Pk.type='min'";
			$DB->executeQuery($sqlLayak);
			if($DB->rs()) {
				if($DB->getRows()>0) {
					while($rowLayak=$DB->getResult()) {
						$total+=$rowLayak['kelayakan'];
					}
				}
			}
			return $total;
		}
		
		function getTotalKetentuan() {
			global $DB;
			global $pengajuan;
			
			$sqlLayak="	SELECT ketentuanAngka  
						FROM ak_perolehan_generate 
						WHERE idPerolehan='".$pengajuan->getPerolehanID()."'";
			$DB->executeQuery($sqlLayak);
			if($DB->rs()) {
				if($DB->getRows()>0) {
					while($rowLayak=$DB->getResult()) {
						$total+=$rowLayak['ketentuanAngka'];
					}
				}
			}
			return $total;
		}
		
		function getTotalKetentuanMin() {
			global $DB;
			global $pengajuan;
			
			$sqlLayak="	SELECT Pg.ketentuanAngka 
						FROM ak_perolehan_generate Pg, ak_presentasi_kategori Pk 
						WHERE Pg.idPerolehan='".$pengajuan->getPerolehanID()."' 
						AND Pg.idPresentasi=Pk.idPresentasi 
						AND Pk.type='min'";
			$DB->executeQuery($sqlLayak);
			if($DB->rs()) {
				if($DB->getRows()>0) {
					while($rowLayak=$DB->getResult()) {
						$total+=$rowLayak['ketentuanAngka'];
					}
				}
			}
			return $total;
		}
		
		function getSisaKelayakanKUM() {
			global $DB;
			global $pengajuan;
			
			$patokanKetentuan=$this->getTotalKetentuan();
			$patokanKetentuanMin=$this->getTotalKetentuanMin();
			$patokanKelayakan=$this->getTotalKelayakanKUM();
			$patokanKelayakanMin=$this->getTotalKelayakanKUMMin();
			$lebihMin=$this->getTotalKelebihanKUMMin();
			$savingMin=$this->getTotalSavingMin();
			$kurangKUM=$pengajuan->getKurangKUMyangDipilih();
			$valid=$pengajuan->getValidSaving();
			$dikjarKetentuan=$this->getTotalDikjarKetentuan();
			$dikjarKelayakan=$this->getTotalDikjarKelayakan();
			$penelitianKetentuan=$this->getTotalPenelitianKetentuan();
			$penelitianKelayakan=$this->getTotalPenelitianKelayakan();
			
			if($patokanKetentuan==$patokanKelayakan) {	
				if($valid) {
					if($lebihMin==$savingMin) {
						$totalPengajuan=$patokanKelayakan+$savingMin;
						if($lebihMin==0) {							
							$sisa=$kurangKUM-$totalPengajuan;
						}
						else {
							$sisa=$totalPengajuan-$kurangKUM;
							
						}
						if($sisa>=0) {
							$totalSisa=0;
						}
						else {
							$totalSisa=$sisa;
						}
						$this->setTotalPengajuan($totalPengajuan);
						$this->setTotalValid($totalPengajuan);
						$this->setTotalSavingValid($this->getTotalSaving());
					}
					/*
					else {
						$totalPengajuan=$patokanKelayakan+$lebihMin;
						$sisa=$totalPengajuan-$kurangKUM;
						if($sisa>=0) {
							$totalSisa=0;
							$this->setTotalPengajuan($kurangKUM);
						}
						else {
							$totalSisa=$sisa;
							$this->setTotalPengajuan($totalPengajuan);
						}
					}*/
				}
				else {
					if($lebihMin!=$savingMin) {						
						$totalPengajuan=$patokanKelayakan+$lebihMin;
						if($lebihMin==0) {							
							$sisa=$kurangKUM-$totalPengajuan;
						}
						else {
							//if($totalPengajuan<$kurangKUM) {
							if($totalPengajuan<$kurangKUM) { //revisi 23 januari 2011
								$sisa=$kurangKUM-$totalPengajuan;
							}
							else {
								//$sisa=$totalPengajuan-$kurangKUM;
								$sisa=$kurangKUM-$totalPengajuan; //revisi 9/12/2010
							}
						}
						/* 
						if($sisa>=0) {
							$totalSisa=0;
							$this->setTotalPengajuan($kurangKUM);
						}
						else {*/
							//if($sisa<0) {
						if($sisa<=0) { //revisi 21/1/2011 pengajuan asisten ahli 150
							$totalSisa=0;
							$this->setTotalValid($totalPengajuan);
							$totalPengajuan=$kurangKUM;
							$this->setTotalPengajuan($totalPengajuan);							
						}
						else {
							$totalSisa=$sisa;
							$this->setTotalPengajuan($totalPengajuan);
							$this->setTotalValid($totalPengajuan);
						}
						//} 
					}
				}			
			}
			else {
				//revisi 23 jan 2011
				if($patokanKetentuanMin!=$patokanKelayakanMin) {
					$totalPengajuan=$patokanKelayakan;
				}
				else {
					$totalPengajuan=$patokanKelayakan+$lebihMin;
				}
				//$totalPengajuan=$patokanKelayakan+$lebihMin;
				if($valid) {
					//if() {}
					if($lebihMin==$savingMin) {						
						if($lebihMin!=0) {
							if($patokanKetentuanMin!=$patokanKelayakanMin) {
								$validSave=0;								
							}
							else {
								$validSave=$this->getTotalSaving();
								$totalPengajuan=$patokanKelayakan+$lebihMin;
							}
							$sisa=$kurangKUM-$totalPengajuan;
							if($totalPengajuan<$kurangKUM) {	
								$totalSisa=$sisa;
							}
							else {
								$totalSisa=0;
							}							
						}
						else {
							$sisa=$kurangKUM-$totalPengajuan;
							$totalSisa=$sisa;
							$validSave=0;
						}
					}
				}
				else {
					$validSave=0;
					if($lebihMin!=0) {						
						$sisa=$kurangKUM-$totalPengajuan;
						if($sisa<$kurangKUM) {
							//$totalSisa=$sisa;
							if($sisa<0) {
								$totalSisa=0;
								$totalPengajuan=$kurangKUM;
							}
							else {
								$totalSisa=$sisa;
								
							}
						}
						else {
							//$totalSisa=0
							$totalSisa=$sisa;
						}						
					}
					else {
						$sisa=$kurangKUM-$totalPengajuan;
						$totalSisa=$sisa;
					}					
				}
				$this->setTotalPengajuan($totalPengajuan);
				$this->setTotalValid($totalPengajuan);
				$this->setTotalSavingValid($validSave);
			}			
			return $totalSisa;
		}
		
		function getTotalKelebihanKUM() {
			global $DB;
			global $pengajuan;
			
			$sqlLayak="	SELECT kelebihan 
						FROM ak_perolehan_generate 
						WHERE idPerolehan='".$pengajuan->getPerolehanID()."'";
			$DB->executeQuery($sqlLayak);
			if($DB->rs()) {
				if($DB->getRows()>0) {
					while($rowLayak=$DB->getResult()) {
						$total+=$rowLayak['kelebihan'];
					}
				}
			}
			return $total;
		}
		
		function getTotalKelebihanKUMMin() {
			global $DB;
			global $pengajuan;
			
			$sqlLayak="	SELECT Pg.kelebihan 
						FROM ak_perolehan_generate Pg, ak_presentasi_kategori Pk 
						WHERE Pg.idPerolehan='".$pengajuan->getPerolehanID()."' 
						AND Pg.idPresentasi=Pk.idPresentasi 
						AND Pk.type='min'";
			$DB->executeQuery($sqlLayak);
			if($DB->rs()) {
				if($DB->getRows()>0) {
					while($rowLayak=$DB->getResult()) {
						$total+=$rowLayak['kelebihan'];
					}
				}
			}
			return $total;
		}
		
		function getTotalSaving() {
			global $DB;
			global $pengajuan;
			
			$sqlLayak="	SELECT saving 
						FROM ak_perolehan_generate 
						WHERE idPerolehan='".$pengajuan->getPerolehanID()."'";
			$DB->executeQuery($sqlLayak);
			if($DB->rs()) {
				if($DB->getRows()>0) {
					while($rowLayak=$DB->getResult()) {
						$total+=$rowLayak['saving'];
					}
				}
			}
			return $total;
		}
		
		function getTotalSavingValid() {
			return $this->totalSave;
		}
		
		function getTotalSavingMin() {
			global $DB;
			global $pengajuan;
			
			$sqlLayak="	SELECT Pg.saving 
						FROM ak_perolehan_generate Pg, ak_presentasi_kategori Pk 
						WHERE idPerolehan='".$pengajuan->getPerolehanID()."' 
						AND Pg.idPresentasi=Pk.idPresentasi 
						AND Pk.type='min'";
			$DB->executeQuery($sqlLayak);
			if($DB->rs()) {
				if($DB->getRows()>0) {
					while($rowLayak=$DB->getResult()) {
						$total+=$rowLayak['saving'];
					}
				}
			}
			return $total;
		}
		
		function getTotalDikjarKelayakan() {
			global $DB;
			global $pengajuan;
			
			$sqlCek="	SELECT Pg.kelayakan 
						FROM ak_perolehan_generate Pg, ak_presentasi_kategori Pk 
						WHERE idPerolehan='".$pengajuan->getPerolehanID()."' 
						AND Pg.idPresentasi=Pk.idPresentasi 
						AND Pk.type='min' 
						AND Pk.idGroup='2'";
			$DB->executeQuery($sqlCek);
			if($DB->rs()) {
				if($DB->getRows()>0) {
					while($rowCek=$DB->getResult()) {
						$total+=$rowCek['kelayakan'];
					}
				}
			}
			return $total;
		}
		
		function getTotalDikjarKetentuan() {
			global $DB;
			global $pengajuan;
			
			$sqlCek="	SELECT Pg.ketentuanAngka 
						FROM ak_perolehan_generate Pg, ak_presentasi_kategori Pk 
						WHERE idPerolehan='".$pengajuan->getPerolehanID()."' 
						AND Pg.idPresentasi=Pk.idPresentasi 
						AND Pk.type='min' 
						AND Pk.idGroup='2'";
			$DB->executeQuery($sqlCek);
			if($DB->rs()) {
				if($DB->getRows()>0) {
					while($rowCek=$DB->getResult()) {
						$total+=$rowCek['ketentuanAngka'];
					}
				}
			}
			return $total;
		}
		
		function getTotalPenelitianKelayakan() {
			global $DB;
			global $pengajuan;
			
			$sqlCek="	SELECT Pg.kelayakan 
						FROM ak_perolehan_generate Pg, ak_presentasi_kategori Pk 
						WHERE idPerolehan='".$pengajuan->getPerolehanID()."' 
						AND Pg.idPresentasi=Pk.idPresentasi 
						AND Pk.type='min' 
						AND Pk.idGroup='3'";
			$DB->executeQuery($sqlCek);
			if($DB->rs()) {
				if($DB->getRows()>0) {
					while($rowCek=$DB->getResult()) {
						$total+=$rowCek['kelayakan'];
					}
				}
			}
			return $total;
		}
		
		function getTotalPenelitianKetentuan() {
			global $DB;
			global $pengajuan;
			
			$sqlCek="	SELECT Pg.ketentuanAngka 
						FROM ak_perolehan_generate Pg, ak_presentasi_kategori Pk 
						WHERE idPerolehan='".$pengajuan->getPerolehanID()."' 
						AND Pg.idPresentasi=Pk.idPresentasi 
						AND Pk.type='min' 
						AND Pk.idGroup='3'";
			$DB->executeQuery($sqlCek);
			if($DB->rs()) {
				if($DB->getRows()>0) {
					while($rowCek=$DB->getResult()) {
						$total+=$rowCek['ketentuanAngka'];
					}
				}
			}
			return $total;
		}
	}
?>