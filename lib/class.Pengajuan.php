<?php
	class Pengajuan {
		
		function getTypeKenaikanString() {
			global $DB;
			global $user;
			global $AK;
			
			$sqlValid="	SELECT Tk.namaKenaikan 
						FROM ak_tipe_kenaikan Tk, ak_skenario S, ak_perolehan P 
						WHERE Tk.idKenaikan=S.idKenaikan 
						AND S.idSkenario=P.idSkenario 
						AND P.nip='".$user->getNIP()."' 
						AND P.currentGol='".$AK->getPangkatSekarangID()."'";
			$DB->executeQuery($sqlValid);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowValid=$DB->getResult();
				}
			}
			return $rowValid['namaKenaikan'];
		}
		
		function getPangkatYangDipilihString() {
			global $DB;
			global $user;
			global $AK;
			
			$sqlValid="	SELECT P.namaPangkat 
						FROM pang_pangkat P, pang_golongan G, ak_perolehan Pr 
						WHERE Pr.nip='".$user->getNIP()."' 
						AND Pr.statusPerolehan='1' 
						AND Pr.toGol=G.idGolongan 
						AND G.idPangkat=P.idPangkat";
			$DB->executeQuery($sqlValid);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowValid=$DB->getResult();
				}
			}
			return ucwords($rowValid['namaPangkat']);
		}
		
		function getSyaratKUMyangDipilih() {
			global $DB;
			global $user;
			global $AK;
			
			$sqlValid="	SELECT G.syaratKUM 
						FROM pang_golongan G, ak_perolehan Pr 
						WHERE Pr.nip='".$user->getNIP()."' 
						AND Pr.statusPerolehan='1' 
						AND Pr.toGol=G.idGolongan";
			$DB->executeQuery($sqlValid);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowValid=$DB->getResult();
				}
			}
			return $rowValid['syaratKUM'];
		}
		
		function getValidPengajuan() {		
			global $DB;
			global $user;
			global $AK;
			
			$sqlPer="	SELECT idPerolehan 
						FROM ak_perolehan 
						WHERE currentGol='".$AK->getPangkatSekarangID()."' 
						AND nip='".$user->getNIP()."' 
						AND statusPerolehan='1'";
			$DB->executeQuery($sqlPer);
			if($DB->getRows()==1) {
				$auth=true;
			}
			else {
				$auth=false;
			}
			return $auth;
		}
		
		function getKurangKUMyangDipilih() {
			global $AK;
			
			return $this->getSyaratKUMyangDipilih()-$AK->getTotalKUM();
		}
		
		function getTanggalPengajuan() {
			global $DB;
			global $AK;
			global $user;
			global $general;
			
			$sqlTgl="	SELECT tglPerolehan 
						FROM ak_perolehan 
						WHERE currentGol='".$AK->getPangkatSekarangID()."' 
						AND nip='".$user->getNIP()."' 
						AND statusPerolehan='1'";
			$DB->executeQuery($sqlTgl);
			if($DB->getRows()==1) {
				$rowTgl=$DB->getResult();
			}
			return $general->formatTanggal2($rowTgl['tglPerolehan']);
		}
		
		function getPerolehanIDCetak() {		
			global $DB;
			global $user;
			global $AK;
			
			$sqlPer="	SELECT idPerolehan 
						FROM ak_perolehan 
						WHERE currentGol='".$AK->getPangkatSekarangID()."' 
						AND nip='".$user->getNIP()."' 
						AND statusPerolehan='3'";
			$DB->executeQuery($sqlPer);
			if($DB->getRows()==1) {
				$rowPer=$DB->getResult();
			}
			return $rowPer['idPerolehan'];
		}
		
		function getPerolehanID() {		
			global $DB;
			global $user;
			global $AK;
			
			$sqlPer="	SELECT idPerolehan 
						FROM ak_perolehan 
						WHERE currentGol='".$AK->getPangkatSekarangID()."' 
						AND nip='".$user->getNIP()."' 
						AND statusPerolehan='1'";
			$DB->executeQuery($sqlPer);
			if($DB->getRows()==1) {
				$rowPer=$DB->getResult();
			}
			return $rowPer['idPerolehan'];
		}
		
		function getTotalPengajuanKUM() {
			global $DB;
			
			$sqlPeroleh="	SELECT Pd.valueKUM 
							FROM ak_perolehan_detail Pd 
							WHERE Pd.idPerolehan='".$this->getPerolehanID()."' 
							AND Pd.valueKd='5'";
			$DB->executeQuery($sqlPeroleh);
			if($DB->rs()) {				
				while($rowPeroleh=$DB->getResult()) {
					$total+=$rowPeroleh['valueKUM'];
				}
			}
			else {
				$total=0;
			}
			return $total;
		}
		
		function getSisaKekuranganKUM() {
			return $this->getKurangKUMyangDipilih()-$this->getTotalPengajuanKUM();
		}
		
		function getValidSaving() {
			global $user;
			global $DB;
			global $AK;
			
			$sqlPangkat="	SELECT saving 
							FROM pang_pangkat 
							WHERE idPangkat='".$AK->getPangkatID()."'";
			$DB->executeQuery($sqlPangkat);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowPangkat=$DB->getResult();
					if($rowPangkat['saving']=="1") {
						$auth=true;
					}
					else {
						$auth=false;
					}
				}
			}
			return $auth;
		}
		
		function onProgress() {
			global $DB;
			global $user;
			global $AK;
			
			$sqlPer="	SELECT idPerolehan 
						FROM ak_perolehan 
						WHERE currentGol='".$AK->getPangkatSekarangID()."' 
						AND nip='".$user->getNIP()."' 
						AND statusPerolehan!='1'";
			$DB->executeQuery($sqlPer);
			if($DB->getRows()==1) {
				$auth=true;
			}
			else {
				$auth=false;
			}
			return $auth;
		}
		
		function approved() {
			global $DB;
			
			$sqlPer="	SELECT idPerolehan 
						FROM ak_perolehan 
						WHERE idPerolehan='".$this->getPerolehanID()."' 
						AND approve='1'";
			$DB->executeQuery($sqlPer);
			if($DB->getRows()==1) {
				$auth=true;
			}
			else {
				$auth=false;
			}
			return $auth;
		}
		
		function getSisa($id) {
			global $DB;
			
			$sqlPer="	SELECT totalKekurangan 
						FROM ak_perolehan 
						WHERE idPerolehan='".$id."'";
			$DB->executeQuery($sqlPer);
			if($DB->getRows()==1) {
				$row=$DB->getResult();
			}
			
			return $row['totalKekurangan'];
		}
	}
?>